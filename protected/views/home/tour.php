<div class="inner-bg">
    <div class="container">
        <div class="wrapper">
            <p class="inner-msg">Not A Member Yet? <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/register">Join Now</a> And Get <?= Yii::app()->params['user_intial_points']; ?> free points Today!</p>
            <div class="col-md-12 col-xs-12 inner">
                <h3 class="tour-title animated fadeInLeft">How it works !</h3>
                <p class="tour-parag col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0 animated fadeInLeft delay-02s"> 
                <?php  
                foreach ($howWorks as $howWork) {
                    echo $howWork->title.",";
                }
                ?> 
                </p>
                <div class="col-md-12 col-xs-12 video2">
                    <div class="col-md-12 col-xs-12">
                        <?php  
                        $i=1;
                            foreach ($howWorks as $howWork) {
                        ?>
                            <div class="works-block col-md-4 col-sm-6 col-xs-12 center-block">
                               <div class="works-img">
                                   <img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/how_work/<?php echo $howWork->image ; ?>" alt="<?php echo $howWork->title ; ?>" class="center-block img-responsive wp5" />
                                   <span class="wp7"><?php   echo $i ; ?></span>
                               </div>
                               <h4 class="wp2"><?php echo $howWork->title ; ?></h4>
                               <p class="col-sm-offset-2 col-sm-8 col-xs-12 wp2 delay-02s"><?php echo $howWork->description ; ?></p>
                           </div>
                        <?php
                        $i++;     
                        }
                        ?>
                    </div><!--end parag-->
                </div><!--end video-->
            </div><!--end inner-->
        </div>
    </div>
</div><!--end inner-bg-->
            <div class="clearfix"></div>
            <div class="col-md-12 col-xs-12 parag">
                <h3 class="animated fadeInLeft">Boots your website's Alexa ranking.</h3>
                <p class="animated fadeInLeft delay-02s"><?= Yii::app()->params['alexa_ranking']; ?></p>
                <span class="parag-arrow"><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/img/front/parag-bg.png" alt=""></span>
            </div><!--end parag-->
            <div class="clearfix"></div>
            <div class="in-tour">
                <div class="container">
                    <div class="wrap">
                        <div class="col-md-12 col-xs-12 ranking animated wp2">
                            <?php  
                            foreach ($ranks as $rank) {
                               ?>
                                <div class="col-md-4 col-sm-4 col-xs-12 block">
                                    <img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/rank/<?php echo $rank->image ; ?>" alt="<?php echo $rank->title ; ?>"  class="icons"/>
                                    <span><?php echo $rank->title ; ?></span>
                                    <p><?php echo $rank->description ; ?></p>
                                </div>
                            <?php
                            }
                            ?>
                        </div><!--end ranking-->
                    </div>
                </div>
            </div>