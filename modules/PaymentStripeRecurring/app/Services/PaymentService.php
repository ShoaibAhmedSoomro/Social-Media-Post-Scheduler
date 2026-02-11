<?php

namespace Modules\PaymentStripeRecurring\Services;

use Exception;
use Stripe\StripeClient;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;
use Modules\Payment\Interfaces\RecurringPaymentInterface;

class PaymentService implements RecurringPaymentInterface
{
    protected StripeClient $stripe;

    public function __construct()
    {
        $stripe_secret_key = get_option("stripe_recurring_secret_key");
        if (!$stripe_secret_key) {
            throw new Exception("Stripe API key is not configured.");
        }
        $this->stripe = new StripeClient($stripe_secret_key);
    }

    public function createSubscription(array $params)
	{
	    if (empty($params['email']) || empty($params['amount']) || empty($params['plan_name'])) {
	        throw new \InvalidArgumentException('Missing required params');
	    }

	    $interval = 'month';
	    $interval_count = 1;
	    if ($params['plan_type'] == 2) {
	        $interval = 'year';
	    } elseif ($params['plan_type'] == 3) {
	        $interval = 'year';
	        $interval_count = 100;
	    }

	    $currency = $params['currency'] ?? 'USD';
	    $amount = $params['amount'];
	    $unit_amount = isZeroDecimalCurrency($currency)
	        ? (int) $amount
	        : (int) ($amount * 100);

	    try {
	        $customer = $this->stripe->customers->create([
	            'email'    => $params['email'],
	            'name'     => $params['fullname'] ?? null,
	            'metadata' => [
	                'username' => $params['username'] ?? '',
	                'plan_id'  => $params['plan_id'] ?? '',
	            ],
	        ]);

	        $product = $this->stripe->products->create([
	            'name'        => $params['plan_name'],
	            'description' => $params['plan_desc'] ?? '',
	        ]);

	        $price = $this->stripe->prices->create([
	            'unit_amount'  => $unit_amount,
	            'currency'     => strtolower($currency),
	            'product'      => $product->id,
	            'metadata'     => [
	                'plan_id'   => $params['plan_id'] ?? '',
	                'plan_name' => $params['plan_name'] ?? '',
	            ],
	            'recurring'    => [
	                'interval'       => $interval,
	                'interval_count' => $interval_count,
	            ],
	            'nickname' => $params['plan_type'] == 3 ? 'Lifetime' : null,
	        ]);

	        $session = $this->stripe->checkout->sessions->create([
	            'mode' => 'subscription',
	            'customer' => $customer->id,
	            'line_items' => [
	                ['price' => $price->id, 'quantity' => 1]
	            ],
	            'success_url' => $params['return_url'],
	            'cancel_url'  => $params['cancel_url'],
	            'subscription_data' => [
			        'metadata' => [
			            'plan_id' 	=> $params['plan_id'] ?? '',
			            'plan_type' 	=> $params['plan_type'] ?? '',
			            'user_id' 	=> $params['user_id'] ?? ''
			        ],
			    ],
	        ]);

	        return [
	            'gateway'      => 'stripe',
	            'payment_link' => $session->url,
	            'session_id'   => $session->id,
	            'customer_id'  => $customer->id,
	        ];
	    } catch (\Exception $e) {
	        \Log::error('Stripe subscription error: ' . $e->getMessage());
	        throw $e;
	    }
	}

    public function cancelSubscription(string $subscriptionId)
	{
	    try {
	        $subscription = $this->stripe->subscriptions->retrieve($subscriptionId);

	        $cancelStatuses = ['canceled', 'unpaid', 'incomplete_expired'];
	        if (in_array($subscription->status, $cancelStatuses)) {
	            return [
	                'status'  => 1,
	                'message' => __("Subscription already canceled or expired."),
	            ];
	        }

	        $subscription = $this->stripe->subscriptions->cancel($subscriptionId, []);

	        return [
	            'status'  => 1,
	            'message' => __("Subscription canceled successfully."),
	        ];
	    } catch (\Stripe\Exception\InvalidRequestException $e) {
	        if (strpos($e->getMessage(), 'No such subscription') !== false) {
	            return [
	                'status'  => 1,
	                'message' => __("Subscription does not exist (may be already canceled or deleted)."),
	            ];
	        }
	        return [
	            'status'  => 0,
	            'message' => $e->getMessage(),
	        ];
	    } catch (\Throwable $e) {
	        return [
	            'status'  => 0,
	            'message' => $e->getMessage(),
	        ];
	    }
	}

    public function renewSubscription(string $subscriptionId){}

    public function syncSubscription(string $subscriptionId)
	{
	    try {
	        $subscription = $this->stripe->subscriptions->retrieve($subscriptionId, []);
	        return [
	            'status'              => 1,
	            'gateway'             => 'stripe',
	            'subscription_id'     => $subscription->id,
	            'customer_id'         => $subscription->customer ?? null,
	            'status'              => $subscription->status,
	            'plan_id'             => $subscription->items->data[0]->plan->id ?? null,
	            'plan_nickname'       => $subscription->items->data[0]->plan->nickname ?? null,
	            'current_period_start'=> $subscription->current_period_start ?? null,
	            'current_period_end'  => $subscription->current_period_end ?? null,
	            'cancel_at_period_end'=> $subscription->cancel_at_period_end ?? false,
	            'cancel_at'           => $subscription->cancel_at ?? null,
	            'canceled_at'         => $subscription->canceled_at ?? null,
	            'trial_end'           => $subscription->trial_end ?? null,
	            'created'             => $subscription->created ?? null,
	            'raw'                 => $subscription,
	        ];
	    } catch (\Throwable $e) {
	        return [
	            'success' => false,
	            'error'   => $e->getMessage(),
	        ];
	    }
	}

	public function getSubscriptionInfo(string $subscriptionId)
	{
	    try {
	        $subscription = $this->stripe->subscriptions->retrieve($subscriptionId, []);
	        return [
	            'status'              => 1,
	            'gateway'             => 'stripe',
	            'subscription_id'     => $subscription->id,
	            'customer_id'         => $subscription->customer ?? null,
	            'status'              => $subscription->status,
	            'plan_id'             => $subscription->items->data[0]->plan->id ?? null,
	            'plan_nickname'       => $subscription->items->data[0]->plan->nickname ?? null,
	            'start_date'          => $subscription->start_date ?? null,
	            'current_period_start'=> $subscription->current_period_start ?? null,
	            'current_period_end'  => $subscription->current_period_end ?? null,
	            'cancel_at_period_end'=> $subscription->cancel_at_period_end ?? false,
	            'cancel_at'           => $subscription->cancel_at ?? null,
	            'canceled_at'         => $subscription->canceled_at ?? null,
	            'trial_end'           => $subscription->trial_end ?? null,
	            'created'             => $subscription->created ?? null,
	            'raw'                 => $subscription,
	        ];
	    } catch (\Throwable $e) {
	        return [
	            'success' => false,
	            'error'   => $e->getMessage(),
	        ];
	    }
	}

	public function handleWebhook($request)
	{
	    $payload = $request->getContent();
	    $sigHeader = $request->header('Stripe-Signature');
	    $webhookSecret = get_option("stripe_recurring_webhook_secret", "");

	    try {
	        $event = Webhook::constructEvent($payload, $sigHeader, $webhookSecret);
	    } catch (SignatureVerificationException $e) {
	        \Log::error("Stripe webhook signature verification failed: " . $e->getMessage());
	        return response()->json(['error' => 'Invalid signature'], 400);
	    } catch (\Exception $e) {
	        \Log::error("Stripe webhook error: " . $e->getMessage());
	        return response()->json(['error' => 'Webhook error'], 400);
	    }

	    $allowedEvents = [
	        'invoice.payment_succeeded',
	        'invoice.payment_failed',
	        'customer.subscription.deleted',
	        'customer.subscription.updated',
	    ];

	    if (!in_array($event->type, $allowedEvents)) {
	        return response()->json(['status' => 'ignored', 'message' => 'Event not handled'], 200);
	    }

	    $object = $event->data->object;
	    $subscriptionId = $object->subscription ?? $object->id ?? null;

	    $plan = $object->plan ?? null;
	    if (!$plan && isset($object->lines->data[0]->plan)) {
	        $plan = $object->lines->data[0]->plan;
	    }
	    $currency = $plan->currency ?? null;
	    $amount = isset($plan->amount)
	        ? (isZeroDecimalCurrency($currency) ? $plan->amount : $plan->amount / 100)
	        : null;

	    $metadata = $object->metadata ?? (object)[];
	    $userId = $metadata->user_id ?? null;
	    $planId = $metadata->plan_id ?? null;
	    $planType = $metadata->plan_type ?? null;

	    if (!$userId || !$planId || !$planType) {
	        $lines = $object->lines->data ?? [];
	        $firstLine = $lines[0] ?? null;
	        if ($firstLine && isset($firstLine->metadata)) {
	            $userId = $userId ?? $firstLine->metadata->user_id ?? null;
	            $planId = $planId ?? $firstLine->metadata->plan_id ?? null;
	            $planType = $planType ?? $firstLine->metadata->plan_type ?? null;
	        }
	    }

	    $data = [
	        'subscription_id' => $subscriptionId,
	        'user_id'         => $userId,
	        'plan_id'         => $planId,
	        'type'            => $planType,
	        'source'          => 'stripe',
	        'customer_id'     => $object->customer ?? null,
	        'amount'          => $amount,
	        'currency'        => $currency,
	        'raw_data'        => json_encode($object),
	    ];

	    \RecurringPayment::saveSubscription($data);

	    switch ($event->type) {
	        case 'invoice.payment_succeeded':
	            \RecurringPayment::updateSubscriptionStatus($subscriptionId, 1, 1);
	            break;
	        case 'invoice.payment_failed':
	            \RecurringPayment::updateSubscriptionStatus($subscriptionId, 0, 0);
	            break;
	        case 'customer.subscription.deleted':
	            \RecurringPayment::updateSubscriptionStatus($subscriptionId, 2, 0);
	            break;
	        case 'customer.subscription.updated':
	            $status    = $object->status ?? null;
	            $statusMap = [
	                'active'   => 1,
	                'past_due' => 0,
	                'canceled' => 2,
	                'unpaid'   => 2,
	            ];
	            \RecurringPayment::updateSubscriptionStatus($subscriptionId, $statusMap[$status] ?? 0, 0);
	            break;
	    }

	    return response()->json(['status' => 'success'], 200);
	}


}