
<div class="col-md-12 col-xs-12 slider">
    <div class="container">
        <div class="wrap">
            <div data-ride="carousel" class="carousel slide" id="carousel-example-captions">
                <ol class="carousel-indicators">
                    <li class="" data-slide-to="0" data-target="#carousel-example-captions"></li>
                    <li data-slide-to="1" data-target="#carousel-example-captions" class="active"></li>
                    <li data-slide-to="2" data-target="#carousel-example-captions" class=""></li>
                </ol>
                <div class="carousel-inner">
                   <?php  
                   $i=1;
                   foreach ($banners as $banner){
                       ?>

                       <div class="item <?php if($i==1)  echo  'active'  ?>">
                            <img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/banner/<?php echo $banner->image ;  ?>" alt="" class="animated fadeInRight delay-05s" />
                            <div class="carousel-caption">
                                <h3 class="animated fadeInRightBig"><?php echo $banner->header ;  ?></h3>
                                <p class="animated fadeInLeftBig"><?php echo $banner->details ;  ?></p>
                                <a href="<?=Yii::app()->request->baseUrl?>/home/register" class="btn btn-default join">join now</a>
                            </div>
                        </div>
                    <?php
                       $i++;
                   }

                   ?>
                </div>
                <a data-slide="prev" role="button" href="#carousel-example-captions" class="left carousel-control">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a data-slide="next" role="button" href="#carousel-example-captions" class="right carousel-control">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 col-xs-12 parag">
    <h3 class="animated fadeInLeft">Boost your website's Alexa ranking.</h3>
    <p class="animated fadeInLeft delay-02s"><?= Yii::app()->params['alexa_ranking']; ?></p>
    <span class="parag-arrow"><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/img/front/parag-bg.png" alt=""></span>
</div><!--end parag-->

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

<div class="col-md-12 col-xs-12 features">
    <div class="container">
        <div class="wrap">
            <h3>features</h3>
            <div class="col-md-12 col-xs-12 all-feaures animated wp4">
                <?php  
                foreach ($features as $feature) {
                $color= $feature->color 
                 ?>
                     <div class="col-md-2 col-xs-12 feature-box <?php   Features::getClass($color)  ?>">
                         <div class="circle1">
                             <img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/features/<?php echo $feature->home_image ; ?>" alt="<?php echo $feature->title ; ?>"  style="width:58px;height: 58px;"/>
                         </div>
                         <span><?php echo $feature->title ; ?></span>
                     </div>
                 <?php
                 }
                 ?>
            </div><!--end all-features-->
        </div>
    </div>
</div><!--end featuers-->

<div class="col-md-12 col-xs-12 main-pricing">
    <div class="container">
        <div class="wrap">
            <p class="page-title"><span>For your first registration you will get <?= Yii::app()->params['user_intial_points']; ?> points for free ,</span>For more boosts you can purchase more points. 
            </p>
            <div class="col-md-offset-1 col-md-10 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 pricing animated wp1">
                <?php
                if($subscribe_packages)
                {
                    foreach ($subscribe_packages as $i=>$sp){
                ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 box box<?=$i+1?>">
                            <h3><?=$sp->title?></h3>
                            <h4><?=$sp->traffic_ratio?>%</h4>
                            <label>Traffic ratio</label>
                            <h4><?=$sp->num_of_sites?></h4>
                            <label>Sites</label>
                            <h2><?=$sp->points?></h2>
                            <span class="small-text">Points</span><br>
                            <label>Monthly bonus</label>
                            <div class="circle">
                                <span class="price">$<?=$sp->price?></span>
                            </div><!--end circle-->

                            <a href="<?=Yii::app()->request->baseUrl?>/userpanel/subscribeNow/<?=$sp->id?>">buy now</a>
                        </div>
                <?php 
                    }
                }
                ?>
            </div><!--end pricing-->
        </div>
    </div>
</div><!--end main-pricing-->


<div class="col-md-12 col-xs-12 how-it-works">
    <div class="container">
        <div class="col-md-12 col-xs-12 parag">
            <h3 class="">How it Works !</h3>
            <p class="">
                <?php  
                foreach ($howWorks as $howWork) {
                    echo $howWork->title.",";
                }
                ?>
            </p>
             <?php  
              $i=1;
                   foreach ($howWorks as $howWork) {
                ?>
                    <div class="works-block col-md-4 col-sm-6 col-xs-12 center-block">
                        <div class="works-img">
                           <img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/how_work/<?php echo $howWork->image ; ?>" alt="<?php echo $howWork->title ; ?>" class="center-block img-responsive" />
                           <span class=""><?php   echo $i ; ?></span>
                        </div>
                        <h4 class=""><?php echo $howWork->title ; ?></h4>
                        <p class="col-sm-offset-2 col-sm-8 col-xs-12"><?php echo $howWork->description ; ?></p>
                    </div>
            <?php
             $i++;     
            }
            ?>
        </div><!--end parag-->
    </div>
</div>
<div class="col-md-12 col-xs-12 how-it-works">
    <div class="container">
        <div class="col-md-12 col-xs-12 parag bottom-parag">
            <h3 class="wp3">Boost your websites’s alexa ranking</h3>
            <h6 class="wp3 delay-02s col-sm-8 col-xs-12 col-sm-offset-2 text-center"><?= Yii::app()->params['alexa_ranking']; ?></h6>
            <span class="parag-arrow"><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/img/front/parag-bg.png" alt=""></span>
        </div><!--end parag-->
    </div>
</div>
