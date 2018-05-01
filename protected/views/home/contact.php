<div class="inner-bg">
    <div class="container">
        <div class="wrapper">
            <p class="inner-msg">Not A Member Yet? <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/register">Join Now</a> And Get <?= Yii::app()->params['user_intial_points']; ?> free points Today!</p>
            <div class="col-md-12 col-xs-12 inner">
                <div class="col-md-6 col-xs-12 sign-left contact">
                    <h3 class="title">contact us</h3>
                    <?php
                    if(Yii::app()->user->hasFlash('contact')){ ?>
                        <div class="alert alert-success">
                            <?= Yii::app()->user->getFlash('contact'); ?>
                        </div>
                    <?php
                    }else{ ?>
                            <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                                'id'=>'contact-form',
                                'enableAjaxValidation'=>true,
                                'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class' => 'form-horizontal sing-form'),

                            )); ?>
                                <div class="form-group">
                                    <div class="col-sm-11">
                                        <?php echo $form->textField($model,'name',array('class'=>'form-control', 'required' => true, 'placeholder' => 'Name')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-11">
                                        <?php echo $form->textField($model,'email',array('class'=>'form-control', 'required' => true, 'placeholder' => 'Email')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-11">
                                        <?php echo $form->textField($model,'subject',array('class'=>'form-control', 'required' => true, 'placeholder' => 'Subject')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-11">
                                        <?php echo $form->textArea($model,'body',array('rows'=>7, 'cols'=>50,'class'=>'form-control', 'required' => true, 'placeholder' => 'Message')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-xs-12">
                                        <?php if(CCaptcha::checkRequirements()): ?>
                                            <?php $this->widget('CCaptcha'); ?>
                                            <?php echo $form->textFieldRow($model,'verifyCode',array('maxlength'=>100,'class'=>'span5')); ?>        
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <?php $this->widget('bootstrap.widgets.TbButton',
                                                array(
                                                    'buttonType'=>'submit',
                                                    'type'=>'primary',
                                                    'label'=>'Send',
                                                    'htmlOptions' => array(
                                                        'class' => 'btn btn-default',
                                                    )
                                                    )); ?>
                                    </div>
                                </div>
                        <?php $this->endWidget(); ?>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-6 col-xs-12 sign-right cont-right">
                    <p>Feedback? Comments? We'd like to hear about it! Or just let us know how awesome our site is.</p>
                    <p class="cont-title">contact</p>
                    <p><i><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/img/front/loc.png" alt="" /></i><?= Yii::app()->params['address']; ?></p>
                    <p><i><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/img/front/msg.png" alt="" /></i><?= Yii::app()->params['support_email']; ?></p>

                    <span class="social-title">Social media</span>
                    <ul id="social" class="isocial">
                        <li><a href="<?= Yii::app()->params['facebook']; ?>" target="_blank" class="face"></a></li>
                        <li><a href="<?= Yii::app()->params['twitter']; ?>" target="_blank" class="twitter"></a></li>
                        <li><a href="<?= Yii::app()->params['youtube']; ?>" target="_blank" class="youtube"></a></li>
                        <li><a href="<?= Yii::app()->params['google']; ?>" target="_blank" class="google"></a></li>
                    </ul>
                </div><!--end sign-right-->
            </div><!--end sign-part-->
        </div>
    </div>
