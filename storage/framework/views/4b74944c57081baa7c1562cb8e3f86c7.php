<div class="row">
    <div class="col-md-8">
        <div class="card border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-5">
                    <?php echo e(__("Commission By Day")); ?>

                </div>
            </div> 
            <div class="card-body">
                <div class="export-chart" id="commission-day-chart" style="width:100%; height:400px;"></div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-5">
                    <?php echo e(__("Commission By Month")); ?>

                </div>
            </div> 
            <div class="card-body">
                <div class="export-chart" id="commission-month-chart" style="width:100%; height:400px;"></div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-5">
                    <?php echo e(__("Commission Status")); ?>

                </div>
            </div> 
            <div class="card-body">
                <div class="export-chart" id="status-chart"></div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-5">
                    <?php echo e(__("Withdrawal By Day")); ?>

                </div>
            </div> 
            <div class="card-body">
                <div class="export-chart" id="withdrawal-chart"></div>
            </div>
        </div>
    </div>

</div>

<div class="card shadow-none border-gray-300 mb-4">
    <div class="card-header">
        <div class="fw-5">
            <?php echo e(__("Affiliate Referral Summary")); ?>

        </div>
    </div> 
    <div class="card-body p-0">
        <table class="table table-bordered w-100 mb-0 border-bottom-0 fs-14">
            <tbody>
                <tr>
                    <th scope="row"><span class="fw-6 text-gray-900"><?php echo e(__("Clicks")); ?></span></th>
                    <td class="text-gray-800"><?php echo e(__("The number of times your referral link has been clicked by visitors.")); ?></td>
                    <td class="fw-6 text-end"><?php echo e($result['total_clicks'] ?? 0); ?></td>
                </tr>
                <tr>
                    <th scope="row"><span class="fw-6 text-gray-900"><?php echo e(__("Referrals")); ?></span></th>
                    <td class="text-gray-800"><?php echo e(__("This shows how many people have taken action through your link.")); ?></td>
                    <td class="fw-6 text-end"><?php echo e($result['total_clicks'] ?? 0); ?></td>
                </tr>
                <tr>
                    <th scope="row"><span class="fw-6 text-gray-900"><?php echo e(__("Pending")); ?></span></th>
                    <td class="text-gray-800"><?php echo e(__("This is the total commission awaiting approval.")); ?></td>
                    <td class="fw-6 text-end"><?php echo e($result['pending_count'] ?? 0); ?></td>
                </tr>                                
                <tr>
                    <th scope="row"><span class="fw-6 text-gray-900"><?php echo e(__("Approved")); ?></span></th>
                    <td class="text-gray-800"><?php echo e(__(" This represents commission that has been approved for payout.")); ?></td>
                    <td class="fw-6 text-end"><?php echo e($result['total_approved'] ?? 0); ?></td>
                </tr>                                                     
                <tr>
                    <th scope="row"><span class="fw-6 text-gray-900"><?php echo e(__("Paid")); ?></span></th>
                    <td class="text-gray-800"><?php echo e(__("The amount of commission that's actually been paid out.")); ?></td>
                    <td class="fw-6 text-end"><?php echo e($result['total_withdrawal'] ?? 0); ?></td>
                </tr>
                <tr>
                    <th scope="row"><span class="fw-6 text-gray-900"><?php echo e(__("Next payout")); ?></span></th>
                    <td class="text-gray-800"><?php echo e(__("This is the total remaining commission or earnings since the last payout.")); ?></td>
                    <td class="fw-6 text-end"><?php echo e($result['total_balance'] ?? 0); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer fs-12">
        <?php echo e(__("Affiliate referral stats including earnings, clicks, and conversions summary.")); ?>

    </div>
</div>     

<script type="text/javascript">

    var commissionChart = {
        categories: <?php echo json_encode($commissionChart['categories']); ?>,
        series: <?php echo json_encode($commissionChart['series']); ?>

    };

    Main.Chart('column', commissionChart.series, 'commission-month-chart', {
        title: ' ',
        xAxis: {
            categories: commissionChart.categories,
            title: { text: ' ' },
        },
        yAxisTitle: ' '
    });

    var commissionChartByDay = {
        categories: <?php echo json_encode($commissionChartByDay['categories']); ?>,
        series: <?php echo json_encode($commissionChartByDay['series']); ?>

    };

    Main.Chart('column', commissionChartByDay.series, 'commission-day-chart', {
        title: '  ',
        xAxis: {
            categories: commissionChartByDay.categories,
            title: { text: ' ' },
            labels: {
                rotation: 0,
                useHTML: true,
                formatter: function () {
                    const pos = this.pos;
                    const total = this.axis.categories.length;

                    if (pos === 0) {
                        // Sát trái
                        return `<div class="ml-15" style="text-align: right; ">${this.value}</div>`;
                    } else if (pos === total - 1) {
                        // Sát phải
                        return `<div class="mr-30" style="text-align: left; ">${this.value}</div>`;
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
        yAxisTitle: ' '
    });

    var statusData = <?php echo json_encode($statusData); ?>;

    Main.Chart('pie', statusData, 'status-chart', {
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

    var chartData = {
        categories: <?php echo json_encode($reportWithdrawalByDay['categories']); ?>,
        series: <?php echo json_encode($reportWithdrawalByDay['series']); ?>

    };

    Main.Chart('line', chartData.series, 'withdrawal-chart', {
        title: ' ',
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
                        // Sát trái
                        return `<div style="text-align: left; transform: translateX(60px); width: 140px;">${this.value}</div>`;
                    } else if (pos === total - 1) {
                        // Sát phải
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
            series: {
                stacking: 'normal',
                marker: {
                    enabled: false,
                    states: {
                        hover: {
                            enabled: false
                        }
                    }
                }
            },
            line: {
                marker: {
                    enabled: false
                }
            }
        },
        
        yAxisTitle: ' '
    });
</script>
<?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminAffiliate/resources/views/statistics.blade.php ENDPATH**/ ?>