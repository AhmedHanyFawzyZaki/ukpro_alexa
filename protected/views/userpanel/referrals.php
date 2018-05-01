<section class="section">
    <div class="mockup-content">
        <div class="row">
            <div class="heading">
                <div class="icons"><i class="fa fa-comments"></i></div>
                <h5>Referrals</h5>
            </div><!--end heading-->
        </div>


        <div class="col-md-12 inner">
            <div class="col-md-12 views">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p class="head-title">Refer a friend </p>
                    </div>

                    <div class="panel-body ref-cont">
                        <p>Refer a friend for <?=Yii::app()->name?> and earn <?=Yii::app()->params['referral_points']?> points*.  Use the link below to pass along to your fellow webmasters.</p>

                        <div class="form-group">
                            <label class="col-md-2">Referral URL</label>
                            <div class="col-md-6">
                                <input type="text" value="<?= Yii::app()->request->getBaseUrl(true).'?refid=' .Yii::app()->user->id?>" class="form-control">
                            </div>
                        </div>

                        <p>* Due to excessive referral signup fraud, we will only be crediting for REAL user signups.  You will only be credited once the user has verified their account, is an active user, and has earned 1,000 points on their own.</p>
                    </div>
                </div>

                <div class="ur-reff">
                    <h3 class="ref-title">Your Referrals</h3>
                    <p>Your referrals status may be "Pending" if the users is not being an active member of Alexa Boostup and haven't hit the points requirement.</p>


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($referrals){
                                    foreach ($referrals as $ref){
                            ?>
                                        <tr>
                                            <td><?=$ref->user->username?></td>
                                            <td><?=$ref->user->email?></td>
                                            <td><?=$ref->active?'Active':'InActive'?></td>

                                        </tr>
                            <?php
                                    }
                                }else{
                            ?>
                            <tr>
                                <td>No referrals.</td>
                                <td></td>
                                <td></td>

                            </tr>
                            <?php }?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>


</section>