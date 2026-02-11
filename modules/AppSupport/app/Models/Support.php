<?php

namespace Modules\AppSupport\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Auth;

class Support extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'support_tickets';

    /**
     * Retrieve a paginated list of tickets including joined data from:
     * - support_categories (fields: name and color)
     * - support_status (fields: name and color)
     * - support_labels (fields: name, color, icon) via support_map_labels
     * - users (fields: username, user_id, fullname, avatar, email)
     *
     * @param array $params Parameters such as start, length, order, cate_id, status, search, etc.
     *
     * @return array The paginated result including total records and data rows.
     */
    public static function getTicketsList(array $params)
    {
        $start    = isset($params['start']) ? (int)$params['start'] : 0;
        $per_page = isset($params['length']) ? (int)$params['length'] : 10;
        $current_page = intval($start / $per_page) + 1;

        $order_field = "t.id";
        $order_sort  = "desc";

        if (isset($params['order']) && is_array($params['order'])) {
            $order_arr = $params['order'][0] ?? null;
            if ($order_arr) {
                $order_index = $order_arr['column'] ?? 0;
                $order_sort  = (($order_arr['dir'] ?? 'asc') === "desc") ? "desc" : "asc";
                $columnsMapping = [
                    0 => 't.id_secure',
                    1 => 't.content',
                    2 => 'c.name',
                ];
                if (isset($columnsMapping[$order_index])) {
                    $order_field = $columnsMapping[$order_index];
                }
            }
        }

        Paginator::currentPageResolver(function () use ($current_page) {
            return $current_page;
        });

        // Build the main query with optimized joins using the pivot table
        $query = self::query()
            ->from('support_tickets as t')
            ->leftJoin('support_categories as c', 't.cate_id', '=', 'c.id')
            ->leftJoin('support_types as s', 't.type_id', '=', 's.id')
            ->leftJoin('support_map_labels as sml', 't.id', '=', 'sml.ticket_id')
            ->leftJoin('support_labels as l', 'sml.label_id', '=', 'l.id')
            ->select(
                't.id',
                't.id_secure',
                't.title',
                't.status',
                't.changed',
                't.created',
                't.user_read',
                't.admin_read',
                'c.name as category_name',
                'c.color as category_color',
                's.name as type_name',
                's.color as type_color',
                's.icon as type_icon',
                DB::raw("GROUP_CONCAT(COALESCE(l.name, '') SEPARATOR ',') as label_names"),
                DB::raw("GROUP_CONCAT(COALESCE(l.color, '') SEPARATOR ',') as label_colors"),
                DB::raw("GROUP_CONCAT(COALESCE(l.icon, '') SEPARATOR ',') as label_icons"),
            );

        $query->where('t.user_id', '=', Auth::id());

        if (isset($params['cate_id']) && $params['cate_id'] != -1) {
            $query->where('t.cate_id', '=', $params['cate_id']);
        }

        if (isset($params['label_id']) && $params['label_id'] != -1) {
            $query->where('sml.label_id', '=', $params['label_id']);
        }

        if (isset($params['status']) && $params['status'] != -1) {
            $query->where('t.status', '=', $params['status']);
        }

        if (isset($params['search']) && trim($params['search']) !== "") {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->orWhere('t.content', 'like', "%{$search}%")
                  ->orWhere('t.title', 'like', "%{$search}%")
                  ->orWhere('c.name', 'like', "%{$search}%");
            });
        }

        

        $query->groupBy('t.id')->orderBy($order_field, $order_sort);

        $pagination = $query->paginate($per_page);

        $data = $pagination->getCollection()->map(function ($record) {
            $record->label_names  = $record->label_names ? explode(',', $record->label_names) : [''];
            $record->label_colors = $record->label_colors ? explode(',', $record->label_colors) : [''];
            $record->label_icons  = $record->label_icons ? explode(',', $record->label_icons) : [''];
            return $record;
        })->toArray();

        return [
            'recordsTotal'    => $pagination->total(),
            'recordsFiltered' => $pagination->total(),
            'data'            => $data,
        ];
    }

    /**
     * Retrieve detailed information for a specific ticket.
     *
     * This method fetches ticket data along with:
     *  - Category details (name, color) from support_categories.
     *  - Status details (name, color, icon) from support_types.
     *  - Aggregated label details (name, color, icon) from support_labels via support_map_labels,
     *    returned as a JSON string.
     *
     * Note: Comments are not included.
     *
     * @param int $ticketId The ID of the ticket for which details are needed.
     *
     * @return object|null The ticket details object (or null if not found).
     */
    public static function getTicketDetail($ticketId)
    {
        if (!$ticketId) {
            return false;
        }

        $ticket = DB::table('support_tickets as t')
            // Join with support_categories to get the category details.
            ->leftJoin('support_categories as c', 't.cate_id', '=', 'c.id')
            // Join the users table for user details (fullname and avatar).
            ->leftJoin('users as u', 't.user_id', '=', 'u.id')
            // Join with support_types to get the type details.
            ->leftJoin('support_types as s', 't.type_id', '=', 's.id')
            // Join with the pivot table support_map_labels, then with support_labels to get label details.
            ->leftJoin('support_map_labels as sml', 't.id', '=', 'sml.ticket_id')
            ->leftJoin('support_labels as l', 'sml.label_id', '=', 'l.id')
            ->select(
                't.*',
                'c.name as category_name',
                'c.color as category_color',
                's.name as type_name',
                's.color as type_color',
                's.icon as type_icon',
                'u.fullname as user_fullname',
                'u.avatar as user_avatar',
                // Aggregate label information into a JSON formatted string.
                DB::raw("GROUP_CONCAT(COALESCE(l.id, '') SEPARATOR ',') as label_ids"),
                DB::raw("GROUP_CONCAT(COALESCE(l.name, '') SEPARATOR ',') as label_names"),
                DB::raw("GROUP_CONCAT(COALESCE(l.color, '') SEPARATOR ',') as label_colors"),
                DB::raw("GROUP_CONCAT(COALESCE(l.icon, '') SEPARATOR ',') as label_icons")
            )
            ->where('t.id_secure', $ticketId)
            ->where('t.user_id', Auth::id())
            ->groupBy('t.id')
            ->first();

        if (!$ticket) {
            return null;
        }

        $ticket->label_ids  = $ticket->label_ids ? explode(',', $ticket->label_ids) : [''];
        $ticket->label_names  = $ticket->label_names ? explode(',', $ticket->label_names) : [''];
        $ticket->label_colors = $ticket->label_colors ? explode(',', $ticket->label_colors) : [''];
        $ticket->label_icons  = $ticket->label_icons ? explode(',', $ticket->label_icons) : [''];

        // Count total comments for this ticket from the support_comments table.
        $totalComment = DB::table('support_comments')
                            ->where('ticket_id', $ticket->id)
                            ->count();

        // Attach the total count of comments to the ticket object.
        $ticket->total_comment = $totalComment;

        if($ticket != "user_id"){
            
        }

        return $ticket;
    }

    /**
     * Retrieve paginated comments for a specific ticket.
     *
     * This method fetches ticket comments with associated user information 
     * (e.g., user's avatar and fullname) from the support_comments table.
     * It uses pagination to limit the result to 10 comments per page.
     *
     * @param int $ticketId The ID of the ticket for which the comments are needed.
     * @param int $page (Optional) The current page number (default is 1).
     *
     * @return array An array containing the comments and pagination data:
     *               - 'comments': list of comment objects.
     *               - 'pagination': total, per_page, current_page, and last_page.
     */
    public static function getCommentsByTicket($ticketId, $page = 1)
    {
        $perPage = 50;
        $offset = ($page - 1) * $perPage;

        // Retrieve the ticket's comments along with user details (avatar & fullname)
        $comments = DB::table('support_comments as c')
            ->leftJoin('users as u', 'c.user_id', '=', 'u.id')
            ->select(
                'c.*',
                'u.avatar as user_avatar',
                'u.fullname as user_fullname'
            )
            ->where('c.ticket_id', $ticketId)
            ->orderBy('c.created', 'desc')
            ->offset($offset)
            ->limit($perPage)
            ->get();

        $comments = $comments->reverse()->values();

        // Count the total number of comments for the ticket to set pagination info.
        $totalComments = DB::table('support_comments')
            ->where('ticket_id', $ticketId)
            ->count();

        $lastPage = ceil($totalComments / $perPage);

        return [
            'comments' => $comments,
            'pagination' => [
                'total' => $totalComments,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => $lastPage,
            ]
        ];
    }


    public static function getRecentTickets($excludeTicketId)
    {
        // Query recent tickets with related category and status details.
        // Also, join a subquery to count total comments for each ticket.
        $tickets = DB::table('support_tickets as t')
            // Join support_categories to retrieve category details.
            ->leftJoin('support_categories as c', 't.cate_id', '=', 'c.id')
            // Join a subquery that counts comments for each ticket group by ticket_id.
            ->leftJoin(
                DB::raw('(SELECT ticket_id, COUNT(*) AS total_comment FROM support_comments GROUP BY ticket_id) as com'),
                't.id', '=', 'com.ticket_id'
            )
            ->select(
                't.*',
                'c.name as category_name',
                'c.color as category_color',
                // Use IFNULL to default to 0 when there are no comments.
                DB::raw("IFNULL(com.total_comment, 0) as total_comment")
            )
            // Exclude the ticket identified by $excludeTicketId.
            ->where('t.id_secure', '!=', $excludeTicketId)
            ->where('t.user_id', '==', Auth::id())
            ->orderBy('t.created', 'desc')
            ->limit(10)
            ->get();

        return $tickets;
    }
}
