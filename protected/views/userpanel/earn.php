<section class="section">
    <div class="mockup-content">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <div class="row">
            <div class="heading">
                <div class="icons"><i class="fa fa-magic"></i></div>
                <h5>Earn points</h5>
            </div><!--end heading-->
        </div>

        <div class="col-md-12 inner">
            <div class="col-md-12 views">

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
                <div class="col-md-8">
                    <h3 class="mini-title">Auto Surf</h3>

                    <span>
                        Earn points by using our Auto Surf page.  Your browser will begin to surf other members websites, in return you will earn points and then your website will get viewed by other members.  For every website you visit you earn 1 point.  1 point = 1 hit to your website.  
                        <br>
                        To start:
                    </span>
                    <br/>
                    <br/>
                    <ol>
                        <li>Make sure you've installed the <a href="#">Alexa Toolbar extension</a>.</li>
                        <li>Add your website(s) to your account on the <a href="#">Manage Websites</a> page.  And make sure they are set to "Enabled".</li>
                        <li>Make sure you've enabled popups for Alexaboostup.com, click the "Allow Popups" button, this will attempt to load a popup and your browser may block it but gives the option to Enable popups for alexaboostup.com, click Allow.</li>
                        <li>Once that is done click the "Launch Autosurf Booster" button on the dashboard.  Or <a href="">Launch Auto Surf Now</a>.</li>
                    </ol>
                </div>
            </div>
        </div>
        
    </div>
</section>