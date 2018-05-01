<div class="inner-bg">
    <div class="container">
        <div class="wrapper">
            <p class="inner-msg">Not A Member Yet? <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/register">Join Now</a> And Get <?= Yii::app()->params['user_intial_points']; ?> free points Today!</p>
            <div class="col-md-12 col-xs-12 inner">
                <p class="page-title"><span>For your first registration you will get 100 points for free ,</span>For more boosts you can purchase more points. 
                </p>
                <div class="col-xs-12 pricing">
                    <?php
                    if($packges){
                        foreach($packges as $package){ ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 pricing-block">
                                <div class="box col-xs-12">
                                    <h3><?=$package->title;?></h3>
                                    <h2><?=$package->points?></h2>
                                    <span class="small-text">Points</span>

                                    <div class="circle">
                                        <span class="price">$<?=$package->price?></span>
                                    </div><!--end circle-->

                                    <a href="<?= Yii::app()->request->baseUrl ?>/userpanel/checkoutExpress/<?= $package->id ?>">buy now</a>
                                </div>
                            </div>
                    <?php
                        }
                    }else{ ?>
                        <div class="alert success-alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            No Packages Found!
                        </div>
                    <?php
                    }
                    ?>
                </div><!--end pricing-->
            </div><!--end inner-->
        </div>
    </div>
</div><!--end inner-bg-->