<div class="inner-bg">
    <div class="container">
        <div class="wrapper">
            <p class="inner-msg">Not A Member Yet? <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/register">Join Now</a> And Get <?= Yii::app()->params['user_intial_points']; ?> free points Today!</p>
            <div class="col-md-12 col-xs-12 inner">
                <div class="col-md-12 col-xs-12 faq">
                    <h3 class="title">FAQ</h3>
                    <?php
                    if($faqs){
                        $i=0;
                        foreach($faqs as $faq){
                            if($i == 0){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a href="#collapse_<?=$faq->id?>" data-parent="#accordion" data-toggle="collapse" class="">
                                         <?= $faq->question; ?>
                                        </a>
                                      </h4>
                                    </div>
                                    <div class="panel-collapse collapse in" id="collapse_<?=$faq->id?>" style="">
                                      <div class="panel-body">
                                       <?= $faq->answer; ?>
                                      </div>
                                    </div>
                                </div>
                            <?php
                            }else{ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a href="#collapse_<?=$faq->id?>" data-parent="#accordion" data-toggle="collapse" class="">
                                         <?= $faq->question; ?>
                                        </a>
                                      </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse_<?=$faq->id?>" style="">
                                      <div class="panel-body">
                                       <?= $faq->answer; ?>
                                      </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?> 
                    <?php
                        $i++;
                        }
                    }
                    ?>
                </div>
            </div><!--end inner-->
        </div>
    </div>