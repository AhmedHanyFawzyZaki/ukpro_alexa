<div class="inner-bg">
    <div class="container">
        <div class="wrapper">
        <p class="inner-msg">Not A Member Yet? <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/register">Join Now</a> And Get <?= Yii::app()->params['user_intial_points']; ?> free points Today!</p>
            <div class="col-md-12 col-xs-12 inner">
                <div class="col-md-6 col-xs-12 sign-left contact">
                    <h3 class="title">Support</h3>
                    
                    <?php
                    if(Yii::app()->user->hasFlash('support')){ ?>
                        <div class="alert alert-success">
                            <?= Yii::app()->user->getFlash('contact'); ?>
                        </div>
                    <?php
                    }elseif(Yii::app()->user->hasFlash('error')){ ?>
                        <div class="alert alert-success">
                            <?= Yii::app()->user->getFlash('error'); ?>
                        </div>
                    <?php
                    }else{ ?>

                        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                            'id'=>'contact-form',
                            'enableAjaxValidation'=>true,
                            'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class' => 'form-horizontal sing-form'),

                        )); ?>
                        <?php echo $form->errorSummary($model); ?>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <?php echo $form->textField($model,'email',array('class'=>'form-control', 'required' => true, 'placeholder' => 'Email', 'email' => 'email')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <?php echo $form->textField($model,'subject',array('class'=>'form-control', 'required' => true, 'placeholder' => 'Subject')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <?php echo $form->textArea($model,'content',array('rows'=>7, 'cols'=>50,'class'=>'form-control', 'required' => true, 'placeholder' => 'Message')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <?php //echo $form->fileField($model,'attachment',array('class'=>'form-control', 'multiple' => true)); ?>
                                    <?php
                                    $this->widget('CMultiFileUpload',
                                    array(
                                        'name'=>'Support[attachment][]',
                                        'accept'=>'jpg|gif|png|pdf|doc|docx|odt|txt|xlsx|xls|csv|zip|rar',
                                        'max'=>3,
                                        'denied'=>'File Is Not Allowed', 
                                        'duplicate'=>'File Appears Twice',
                                        'remove'=>'[x]',
                                        'htmlOptions'=>array('size'=>25, 'multiple' => true),
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-xs-12">
                                    <?php $this->widget('bootstrap.widgets.TbButton',
                                        array(
                                                'buttonType'=>'submit',
                                                'type'=>'primary',
                                                'label'=>'Send',
                                                'htmlOptions' => array(
                                                    'class' => 'btn btn-default',
                                                )
                                            )); 
                                    ?>
                                </div>
                            </div>
                        <?php $this->endWidget(); 
                    }?>
                </div><!--end sign-left-->

                <div class="col-md-6 col-xs-12 sign-right cont-right">

                    <p>Feedback? Comments? We'd like to hear about it! Or just let us know how awesome our site is.</p>
                    <p class="cont-title">contact</p>
                    <p><i><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/img/front/loc.png" alt="" /></i>Las Vegas, Nevada</p>
                    <p><i><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/img/front/msg.png" alt="" /></i>support@alexaboostop.com</p>

                    <span class="social-title">Social media</span>
                    <ul id="social" class="isocial">
                        <li><a href="#" class="face"></a></li>
                        <li><a href="#" class="twitter"></a></li>
                        <li><a href="#" class="youtube"></a></li>
                        <li><a href="#" class="google"></a></li>

                    </ul>
                </div><!--end sign-right-->
            </div><!--end sign-part-->
        </div>
    </div>
</div><!--end inner-bg-->
