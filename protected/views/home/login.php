<div class="inner-bg">
        <div class="container">
            <div class="wrapper">
                <div class="col-md-12 col-xs-12 inner">
                    <div class="col-md-6 col-xs-12 sign-left">
                        <h3 class="title">sign in</h3>
                        <?php
                        if(Yii::app()->user->hasFlash('active_success')){ ?>
                            <div class="alert success-alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?= Yii::app()->user->getFlash('active_success'); ?>
                            </div>
                        <?php
                        }elseif(Yii::app()->user->hasFlash('ErrorMsg')){ ?>
                            <div class="alert success-alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?= Yii::app()->user->getFlash('ErrorMsg'); ?>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if(Yii::app()->user->hasFlash('resetMsg')){ ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?= Yii::app()->user->getFlash('resetMsg'); ?>
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
                                    <?php echo $form->textField($model, 'username' , array('class'=>'form-control', 'placeholder'=>'Email')); ?>
                                    <?php echo $form->error($model, 'username'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <?php echo $form->passwordField($model, 'password', array('class'=>'form-control' , 'placeholder'=>'Password') ); ?>
                                    <?php echo $form->error($model, 'password'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo $form->checkBox($model, 'rememberMe'); ?>
                                             Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="checkbox">
                                        <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/forgotpass" class="forget">forget password ?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <button class="btn btn-default" type="submit">Sign in</button>
                                </div>
                            </div>
                      <?php $this->endWidget(); ?>
                    </div><!--end sign-left-->

                    <div class="col-md-6 col-xs-12 sign-right">
                        <p>Not A Member Yet? <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/register">Sign Up</a> And Get <?= Yii::app()->params['user_intial_points']; ?> FREE POINTS Today!</p>
                    </div><!--end sign-right-->
                </div><!--end sign-part-->
            </div>
        </div>
</div><!--end inner-bg-->
