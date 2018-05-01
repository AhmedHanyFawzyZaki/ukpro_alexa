<section class="section">
    <div class="mockup-content">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <div class="row">
            <div class="heading">
                <div class="icons"><i class="fa fa-shopping-cart"></i></div>
                <h5>Package Subscription</h5>
            </div><!--end heading-->
        </div>

        <div class="col-md-12 inner">
            <div class="col-md-12 views">
                <div class="col-md-10 col-md-offset-1 tools">
                    <h1 class="text-center">Subscribe</h1>
                    <?php
                        if(Yii::app()->user->hasFlash('wrong')){
                            echo '<div class="alert alert-danger">'.Yii::app()->user->getFlash('wrong').'</div>';
                        }
                    ?>
                    <div class="col-md-10 col-md-offset-1 ">
                        <?php
                            if ($subscribe_packages) {
                                foreach ($subscribe_packages as $i => $sp) {
                                    ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="pricing-plan">
                                        <h3 class="pricing-title"><?= $sp->title ?></h3>
                                        <span class="pricing-label">Package</span>   
                                        <hr>
                                        <span class="pricing-price">
                                            <span class="pricing-amount"><?= $sp->traffic_ratio ?>% Traffic ratio</span>
                                        </span>
                                        <hr>
                                        <span class="pricing-price">
                                            <span class="pricing-amount"><?= $sp->num_of_sites ?> Sites</span>
                                        </span>
                                        <hr>
                                        <span class="pricing-price">
                                            <span class="pricing-amount"><?= $sp->points ?> Monthly bonus points</span>
                                        </span>
                                        <hr>
                                        <span class="pricing-price">
                                            <span class="pricing-amount"><?= $sp->price ?></span> USD
                                        </span>
                                        <div class="clear-fix">
                                            <button type="button" onclick="window.location = '<?= Yii::app()->request->baseUrl ?>/userpanel/subscribeNow/<?= $sp->id ?>'" class="btn btn-primary btn-lg" value="Buy now" name="">Buy now</button>
                                        </div>
                                    </div> <!-- /.pricing -->
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    
                    <?php
                        if(User::IsSuscribedUser(Yii::app()->user->id)){
                    ?>
                    <div class="col-md-10 col-md-offset-1 ">
                        <h2 class="text-center">Do you want to upgrade your package?</h2>
                        <span class="text-center"><a href="javascript:void(0);" onclick="unSubscribe()">Unsubscribe</a></span> firstly then buy your desired package.
                    </div>
                    <div class="col-md-10 col-md-offset-1 ">
                        <h2 class="text-center">Do you want to cancel your package?</h2>
                        <span class="text-center"><a href="javascript:void(0)" onclick="unSubscribe()">Unsubscribe</a></span>.
                    </div>
                    
                        <?php }?>

                </div>
            </div>
        </div>

    </div>

    <script>
        function unSubscribe(){
            var r=confirm('You are about to unsubscribe, Do you want to continue?');
            if(r){
                window.location="<?=Yii::app()->request->baseUrl?>/userpanel/Unsubscribe/<?=Yii::app()->user->id?>";
            }
        }
    </script>
</section>