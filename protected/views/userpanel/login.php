<!DOCTYPE html>
<html lang="en" class="no-js demo-7">
    <head>
        <title><?=Yii::app()->name?> - Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl?>/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl?>/css/style_dashboard.css" />

                <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?=Yii::app()->request->baseUrl?>/js/html5shiv.js"></script>
          <script src="<?=Yii::app()->request->baseUrl?>/js/respond.min.js"></script>
        <![endif]-->

        <script src="<?=Yii::app()->request->baseUrl?>/js/dashboard/modernizr.custom.js"></script>
    </head>
    <body>
        <div id="container" class="main-body calls">
            <!-- Top Navigation -->
            <header class="row">
                <a href="index.html" class="logo col-xs-12 col-md-8">Alexaboostop</a>

            </header>

            <section class="section">
                <div class="mockup-content">
                    <div class="col-md-12">

                        <div class="col-md-4 col-md-offset-4 call-board ">

                            <div class="panel-heading" style="width:93%;">Log in</div>


                            <?php /** @var BootActiveForm $form */
                                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                'id'=>'login',
                                'enableClientValidation'=>true,
                                'clientOptions'=>array(
                                    'validateOnSubmit'=>true,
                                ),

                                ));
                             ?>
                                <div class="col-md-10 col-md-offset-1 keypad">
                                    <p>Boost your website's alexa ranking.</p>
                                    <div class="form-group">
                                        <?php echo $form->textField($model, 'username' , array('class'=>'form-control', 'placeholder'=>'Username')); ?>
                                        <?php echo $form->error($model, 'username'); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $form->passwordField($model, 'password', array('class'=>'form-control' , 'placeholder'=>'Password') ); ?>
                                        <?php echo $form->error($model, 'password'); ?>
                                    </div>

                                </div><!--end add-new-->


                                <div class="row">
                                    <div class="col-md-12 control-btns">
                                        <div class="col-md-10 col-md-offset-1 dials-btn">
                                            <?php
                                            if(Yii::app()->user->hasFlash('ErrorMsg') )
                                            {
                                            ?>
                                                <div class="alert alert-error">
                                                <!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
                                                <span class="close" data-dismiss="alert">&times;</span>
                                                <strong></strong> <?php echo Yii::app()->user->getFlash('ErrorMsg'); ?>.
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if(Yii::app()->user->hasFlash('Reset-success') )
                                            {
                                            ?>
                                                <div class="alert alert-error">
                                                <!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
                                                <span class="close" data-dismiss="alert">&times;</span>
                                                <strong></strong> <?php echo Yii::app()->user->getFlash('Reset-success'); ?>.
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if(Yii::app()->user->hasFlash('error') )
                                            {
                                            ?>
                                                <div class="alert alert-error">
                                                <!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
                                                <span class="close" data-dismiss="alert">&times;</span>
                                                <strong></strong> <?php echo Yii::app()->user->getFlash('error'); ?>.
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <button class="btn btn-success" type="submit" >Login</button>

                                            <a href="<?=Yii::app()->request->baseUrl?>/home/register"><button class="btn btn-danger" type="button" >Sign up</button></a>
                                        </div>
                                    </div>
                                </div><!--end control-btns-->
                            <?php $this->endWidget(); ?>
                        </div><!--end call-board-->



                    </div>




                </div>
            </section>

        </div><!-- /container -->

        <script src="<?=Yii::app()->request->baseUrl?>/js/dashboard/jquery.js"></script>
        <script src="<?=Yii::app()->request->baseUrl?>/js/dashboard/bootstrap.js"></script>

    </body>
</html>