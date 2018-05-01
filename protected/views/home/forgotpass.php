<div class="inner-bg">
    <div class="container">
        <div class="wrapper">
            <div class="col-md-12 col-xs-12 inner">
                <div class="col-md-6 col-xs-12 sign-left">
                    <h3 class="title">Forget Password</h3>
                    <?php
                    if(Yii::app()->user->hasFlash('ErrorMsg')){ ?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?= Yii::app()->user->getFlash('ErrorMsg'); ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(Yii::app()->user->hasFlash('email-error')){ ?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?= Yii::app()->user->getFlash('email-error'); ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(Yii::app()->user->hasFlash('forget-success')){ ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?= Yii::app()->user->getFlash('forget-success'); ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                            'id'=>'login-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                            ),
                            'htmlOptions' => array('class' => 'form-horizontal sing-form')
                    )); ?>
                        <div class="form-group">
                            <div class="col-sm-11">
                                <?php echo $form->textFieldRow($model,'email' ,array('class'=>'form-control', 'required' => true)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button class="btn btn-default" type="submit">Send</button>
                            </div>
                        </div>
                    <?php $this->endWidget(); ?>
                </div><!--end sign-left-->
                <div class="col-md-6 col-xs-12 sign-right signup">
                      <p><span>notice</span>Enter Your Email to Send You How To Reset Your Password</p>
                    <p>Not A Member Yet? <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/register">Sign Up</a> And Get <?= Yii::app()->params['user_intial_points']; ?> FREE POINTS Today!</p>
                </div><!--end sign-right-->
            </div><!--end sign-part-->
        </div>
    </div>
</div>