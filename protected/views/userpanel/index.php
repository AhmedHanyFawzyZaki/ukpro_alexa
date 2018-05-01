

<section class="section">
    <div class="mockup-content">        
        <div class="col-md-3">
            <a class="btn btn-danger autoserf" href="<?=Yii::app()->request->baseUrl?>/userpanel/launch">
                <span>Boost your websites now</span>
                <i class="fa fa-rocket"></i>
            </a>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <i class="fa fa-history fa-fw"></i>Points History

                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Earned</th>
                                <th>Used</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($current_month_points)
                            {
                                foreach($current_month_points as $point)
                                {
                            
                            ?>
                            <tr>
                                <td><?=$point->date_time?></td>
                                <td><?=$point->gained?></td>
                                <td><?=$point->used?></td>
                            </tr>
                            <?php }
                            }
                            else{
                                echo '<tr><td colspan="3">No Points</td></tr>';
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Monthly points graph

                </div>
                <div class="panel-body">
                    <div id="points-graph"></div>
                </div>
            </div>
        </div>



    </div>
</section>
<script>
    $(function() {
        $('#points-graph').highcharts({
            title: {
                text: 'Monthly Points graph',
                x: -20 //center
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Points'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: 'Points'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                    name: 'Earned',
                    data: [<?=$gained?>]
                },
                {
                    name: 'Used',
                    data: [<?=$used?>]
                }]
        });
    });

</script>