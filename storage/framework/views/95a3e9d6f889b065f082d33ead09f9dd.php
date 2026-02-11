<?php
	$summary = \UserReport::summary();
	$dailyRegistrations = \UserReport::dailyRegistrations();
	$monthly_growth_total =  $summary['monthly_growth']['total'];
	$monthly_growth_active =  $summary['monthly_growth']['active'];
	$monthly_growth_inactive =  $summary['monthly_growth']['inactive'];
	$monthly_growth_banned =  $summary['monthly_growth']['banned'];

	$weekly_growth_total =  $summary['weekly_growth']['total'];
	$weekly_growth_active =  $summary['weekly_growth']['active'];
	$weekly_growth_inactive =  $summary['weekly_growth']['inactive'];
	$weekly_growth_banned =  $summary['weekly_growth']['banned'];

	$latestUsers = \UserReport::latestUsers();
	$loginTypeChart = \UserReport::loginTypeStats();
?>

<div class="row">

	<div class="col-md-4">
		
		<div class="row">
			<div class="col-6 mb-4">
				<div class="card bg-squared">
					<div class="card-body">
						<div class="d-flex flex-column gap-35">
							<div class="size-40 b-r-10 bg-success-100 text-success fs-20 d-flex align-items-center justify-content-center ">
								<i class="fa-light fa-user"></i>
							</div>

							<div class="mt-auto">
								<div class="d-flex align-items-end gap-8">
									<div class="fw-6 fs-25"><?php echo e(Number::abbreviate($summary['total'])); ?></div>
									<div class="<?php echo e($monthly_growth_total >= 0 ? 'text-success':'text-danger'); ?> fs-12 fw-6">
										<i class="fa-light <?php echo e($monthly_growth_total >= 0 ? 'fa-arrow-trend-up':'fa-arrow-trend-down'); ?>"></i> 
										<?php echo e(Number::abbreviate($monthly_growth_total)); ?>% 
										<i class="fa-solid <?php echo e($monthly_growth_total >= 0 ? 'fa-caret-up':'fa-caret-down'); ?>"></i>
									</div>
								</div>
								<div class="fw-4 fs-13 text-gray-600"><?php echo e(__('Total user')); ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 mb-4">
				<div class="card bg-squared">
					<div class="card-body">
						<div class="d-flex flex-column gap-35">
							<div class="size-40 b-r-10 bg-primary-100 text-primary fs-20 d-flex align-items-center justify-content-center ">
								<i class="fa-light fa-user-check"></i>
							</div>

							<div class="mt-auto">
								<div class="d-flex align-items-end gap-8">
									<div class="fw-6 fs-25"><?php echo e(Number::abbreviate($summary['active'])); ?></div>
									<div class="<?php echo e($monthly_growth_active >= 0 ? 'text-success':'text-danger'); ?> fs-12 fw-6">
										<i class="fa-light <?php echo e($monthly_growth_active >= 0 ? 'fa-arrow-trend-up':'fa-arrow-trend-down'); ?>"></i> 
										<?php echo e(Number::abbreviate($monthly_growth_active)); ?>% 
										<i class="fa-solid <?php echo e($monthly_growth_active >= 0 ? 'fa-caret-up':'fa-caret-down'); ?>"></i>
									</div>
								</div>
								<div class="fw-4 fs-13 text-gray-600"><?php echo e(__('Active user')); ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 mb-4">
				<div class="card bg-squared">
					<div class="card-body">
						<div class="d-flex flex-column gap-35">
							<div class="size-40 b-r-10 bg-warning-100 text-warning fs-20 d-flex align-items-center justify-content-center ">
								<i class="fa-light fa-user-minus"></i>
							</div>

							<div class="mt-auto">
								<div class="d-flex align-items-end gap-8">
									<div class="fw-6 fs-25"><?php echo e(Number::abbreviate($summary['inactive'])); ?></div>
									<div class="<?php echo e($monthly_growth_inactive >= 0 ? 'text-success':'text-danger'); ?> fs-12 fw-6">
										<i class="fa-light <?php echo e($monthly_growth_inactive >= 0 ? 'fa-arrow-trend-up':'fa-arrow-trend-down'); ?>"></i> 
										<?php echo e(Number::abbreviate($monthly_growth_inactive)); ?>% 
										<i class="fa-solid <?php echo e($monthly_growth_inactive >= 0 ? 'fa-caret-up':'fa-caret-down'); ?>"></i>
									</div>
								</div>
								<div class="fw-4 fs-13 text-gray-600"><?php echo e(__('Inactive user')); ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 mb-4">
				<div class="card bg-squared">
					<div class="card-body">
						<div class="d-flex flex-column gap-35">
							<div class="size-40 b-r-10 bg-danger-100 text-danger fs-20 d-flex align-items-center justify-content-center ">
								<i class="fa-light fa-user-xmark"></i>
							</div>

							<div class="mt-auto">
								<div class="d-flex align-items-end gap-8">
									<div class="fw-6 fs-25"><?php echo e(Number::abbreviate($summary['banned'])); ?></div>
									<div class="<?php echo e($monthly_growth_banned >= 0 ? 'text-success':'text-danger'); ?> fs-12 fw-6">
										<i class="fa-light <?php echo e($monthly_growth_banned >= 0 ? 'fa-arrow-trend-up':'fa-arrow-trend-down'); ?>"></i> 
										<?php echo e(Number::abbreviate($monthly_growth_banned)); ?>% 
										<i class="fa-solid <?php echo e($monthly_growth_banned >= 0 ? 'fa-caret-up':'fa-caret-down'); ?>"></i>
									</div>
								</div>
								<div class="fw-4 fs-13 text-gray-600"><?php echo e(__('Banned user')); ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="col-md-8 mb-4">
		<div class="card hp-100">
			<div class="card-header">
				<div class="fw-5"><?php echo e(__("Daily User Registrations")); ?></div>
			</div>

			<div class="card-body py-2 px-2">
				<div class="export-chart h-290" id="daily-registrations-chart"></div>
			</div>
		</div>
	</div>

	<div class="col-md-6 mb-4">
		<div class="card hp-100">
			<div class="card-header">
				<div class="fw-5"><?php echo e(__("Latest Users")); ?></div>
			</div>

			<div class="card-body p-0 max-h-400 overflow-auto">
				<table class="table">
				<?php $__currentLoopData = $latestUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<tr>
						<td class="w-40 max-w-45">
							<div class="size-45 size-child border border-primary-200 pf-2 b-r-100">
								<img src="<?php echo e(Media::url($user->avatar)); ?>" class="b-r-100">
							</div>
						</td>
						<td class="w-220 text-truncate">
							<div class="d-flex flex-column max-w-250">
								<div class="fs-12 fw-5 lh-1.1 text-truncate"><?php echo e($user->fullname); ?></div>
								<div class="fs-12 text-gray-600 text-truncate"><?php echo e($user->email); ?></div>
							</div>
						</td>
						<td  class="w-70">
							<?php if($user->status == 2): ?>
								<span class="badge badge-outline badge-sm badge-success">
		                     		<?php echo e(__("Active")); ?>

			                    </span>
							<?php elseif($user->status == 1): ?>
								<span class="badge badge-outline badge-sm badge-warning">
		                     		<?php echo e(__("Inactive")); ?>

			                    </span>
							<?php else: ?>
								<span class="badge badge-outline badge-sm badge-danger">
		                     		<?php echo e(__("Banned")); ?>

			                    </span>
							<?php endif; ?>
						</td>
						<td  class="w-70 text-nowrap">
							<div class="fs-12"><?php echo e(time_elapsed_string($user->created)); ?></div>
						</td>
			    	</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>

			</div>
		</div>
	</div>
	<div class="col-md-6 mb-4">
		<div class="card hp-100">
			<div class="card-header">
				<div class="fw-5"><?php echo e(__("Login Method Breakdown")); ?></div>
			</div>

			<div class="card-body py-2 px-2">
				<div class="export-chart h-350" id="login-type-chart"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	

	var chartData = {
        categories: <?php echo json_encode($dailyRegistrations['categories']); ?>,
        series: <?php echo json_encode($dailyRegistrations['series']); ?>

    };

    Main.Chart('areaspline', chartData.series, 'daily-registrations-chart', {
    	
        title: ' ',
        legend: {
		    enabled: false
		},
        xAxis: {
            categories: chartData.categories,
            title: { text: ' ' },
            crosshair: {
                width: 2,
                color: '#ddd',
                dashStyle: 'Solid'
            },
            labels: {
                rotation: 0,
                useHTML: true,
                formatter: function () {
                    const pos = this.pos;
                    const total = this.axis.categories.length;

                    if (pos === 0) {
                        return `<div style="text-align: left; transform: translateX(60px); width: 140px;">${this.value}</div>`;
                    } else if (pos === total - 1) {
                        return `<div style="text-align: right; transform: translateX(-55px); width: 140px;">${this.value}</div>`;
                    }
                    return '';
                },
                style: {
                    fontSize: '13px',
                    whiteSpace: 'nowrap',
                },
                overflow: 'none',
                crop: false,
            },
        },
        plotOptions: {
            spline: {
		        fillOpacity: 0.1,
		        lineWidth: 3,
		        marker: {
		            enabled: false
		        }
		    },

		    series: {
		    	stacking: 'normal',
                marker: {
                    enabled: false,
                    states: {
                        hover: {
                            enabled: false
                        }
                    }
                },
		        color: '#675dff',
		        fillColor: {
		            linearGradient: [0, 0, 0, 200],
		            stops: [
		                [0, 'rgba(103, 93, 255, 0.4)'],
		                [1, 'rgba(255, 255, 255, 0)']
		            ]
		        }
		    }
        },
        
        yAxisTitle: ' '
    });

    Main.Chart('pie', <?php echo json_encode($loginTypeChart); ?>, 'login-type-chart', {
	    title: ' ',
        plotOptions: {
            pie: {
                showInLegend: true  // Ensure the pie chart slices are displayed in the legend
            }
        },
        legend: {
            enabled: true, // Make sure the legend is enabled
            align: 'center', // Align legend to the center
            verticalAlign: 'bottom', // Position the legend at the bottom
            layout: 'horizontal', // Display legend items horizontally
            itemStyle: {
                fontSize: '12px',
                fontWeight: 'normal',
            }
        }
	});

</script><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminUserReport/resources/views/partials/admin-dashboard-item.blade.php ENDPATH**/ ?>