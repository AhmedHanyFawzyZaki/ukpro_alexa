<div class="inner-bg">
    <div class="container">
        <div class="wrapper">
            <div class="col-md-12 col-xs-12 inner">
                <div class="col-md-6 col-xs-12 sign-left">
                    <h3 class="title">sign up</h3>
                    <?php
                    if(Yii::app()->user->hasFlash('register-success')){ ?>
                        <div class="alert alert-success">
                            <?= Yii::app()->user->getFlash('register-success'); ?>
                        </div>
                    <?php
                    }elseif(Yii::app()->user->hasFlash('error')){ ?>
                        <div class="alert alert-error">
                            <?= Yii::app()->user->getFlash('error'); ?>
                        </div>
                    <?php
                    }else{
                        ?>
                        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                                'id'=>'user-register-form',
                                'enableAjaxValidation'=>false,
                                'htmlOptions' => array(
                                    'class' => 'form-horizontal sing-form'
                                )
                        )); ?>
                        <?php echo $form->errorSummary($model); ?>
                        <div class="form-group">
                            <div class="col-sm-11">
                                <?php echo $form->textField($model,'email',array('class'=>'form-control', 'placeholder' => 'Email')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-11">
                                <?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder' => 'Password')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-11">
                                <?php echo $form->passwordField($model,'password_repeat',array('class'=>'form-control', 'placeholder' => 'Confirm Password')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button class="btn btn-default" type="submit">Sign up</button>
                            </div>
                        </div>
                    <?php $this->endWidget(); ?>
                    <?php
                    }
                    ?>
                </div><!--end sign-left-->
                <div class="col-md-6 col-xs-12 sign-right signup">
                    <p><span>notice</span>By signing up you agree to our terms of service.
                        Your email will be required to be verified before your account will activated.</p>
                </div><!--end sign-right-->
                <p class="title2">Already have an account? <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/login">Sign in</a></p>
            </div><!--end sign-part-->
        </div>
    </div>
</div><!--end inner-bg-->