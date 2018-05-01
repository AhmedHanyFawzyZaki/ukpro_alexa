<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Ahmed Hany Fawzy">
        <title><?= Yii::app()->name; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?= Yii::app()->request->getBaseUrl(true); ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?= Yii::app()->request->getBaseUrl(true); ?>/css/font-awesome.css" rel="stylesheet">
        <!-- Documentation extras -->
        <link href="<?= Yii::app()->request->getBaseUrl(true); ?>/css/style_front.css" rel="stylesheet">
        <link href="<?= Yii::app()->request->getBaseUrl(true); ?>/css/animate.css" rel="stylesheet">
        <link href="<?= Yii::app()->request->getBaseUrl(true); ?>/css/open-sans.css" rel='stylesheet'>
        <link rel="shortcut icon" href="favicon.png">
    </head>
    <body>
        <header class="col-md-12 col-xs-12">
            <div class="container">
                <div class="wrap">
                    <div class="col-md-4 col-sm-7 col-xs-12 logo">
                        <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/index"><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/img/logo.png" alt="" /></a>
                    </div><!--end logo-->

                    <div class="col-md-8 col-sm-4 col-xs-12 sign pull-right">
                        <?php
                        if(!Yii::app()->user->isGuest){ ?>
                            <a class="btn btn-default" href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/logout">Logout</a>
                            <a class="btn btn-default" href="<?= Yii::app()->request->getBaseUrl(true) ?>/userpanel/index">Dashboard</a>
                        <?php
                        }else{ ?>
                            <a class="btn btn-default" href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/login">Sign in</a>
                        <?php
                        }
                        ?>
                    </div><!--end sign-->
                </div>
            </div>
        </header>

        <div class="col-md-12 col-xs-12 menu">
            <div class="container">
                <div class="wrap">
                    <nav class="navbar navbar-default" role="navigation">
                        
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li <?php if(Yii::app()->controller->action->id == 'index'){ echo 'class="active"'; } ?> ><a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/index">home</a></li>
                                <li <?php if(Yii::app()->controller->action->id == 'tour'){ echo 'class="active"'; } ?> ><a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/tour">tour</a></li>
                                <li <?php if(Yii::app()->controller->action->id == 'features'){ echo 'class="active"'; } ?> ><a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/features">features</a></li>
                                <li <?php if(Yii::app()->controller->action->id == 'buy'){ echo 'class="active"'; } ?> >
                                    <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/buy">buy</a>
                                </li>
                                <li <?php if(Yii::app()->controller->action->id == 'contact'){ echo 'class="active"'; } ?> ><a href="<?= Yii::app()->request->getBaseUrl(true);?>/contact-us">contact</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div><!--end menu-->