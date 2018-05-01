<div class="inner-bg">
    <div class="container">
        <div class="wrapper">
            <p class="inner-msg">Not A Member Yet? <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/register">Join Now</a> And Get <?= Yii::app()->params['user_intial_points']; ?> free points Today!</p>
            <div class="col-md-12 col-xs-12 inner">
                <h3 class="tour-title animated fadeInLeft">Take a tour</h3>
                <p class="tour-parag col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0 animated fadeInLeft delay-02s"><?= Yii::app()->params['alexa_take_tour']; ?></p>

                <div class="col-md-12 col-xs-12 video">
                    <div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
                    <iframe width="100%" height="350"
                        src="<?= Yii::app()->params['how_work_video']; ?>">
                    </iframe>
                    </div>
                </div><!--end video-->

                <h3 class="tour-title animated wp3">Alexa Boostop Features overview</h3>
                <p class="tour-parag col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0 animated wp3 delay-02s"><?= Yii::app()->params['alexa_features']; ?></p>
                <div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-12 tour animated wp2">
                    <?php
                    if($features){
                    foreach($features as $feature){ ?>
                        <div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0 tour-feature">
                            <img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/features/<?=$feature->inner_image?>" alt="" />
                            <span><?=$feature->title;?></span>
                            <p><?=$feature->description;?></p>
                        </div>
                    <?php
                        }
                    }else{ ?>
                        <div class="alert success-alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            No Features Found!
                        </div>
                   <?php
                   } ?>
                </div><!--end tour-->
            </div><!--end inner-->
        </div>
    </div>
</div><!--end inner-bg-->