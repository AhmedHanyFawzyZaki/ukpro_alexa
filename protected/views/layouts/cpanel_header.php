<!DOCTYPE html>
<html lang="en" class="no-js demo-7 ">
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <!-- InstanceEndEditable -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/style_dashboard.css" />

        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/ns-default.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/ns-style-attached.css" />
        <script src="<?= Yii::app()->request->baseUrl ?>/js/dashboard/jquery.js"></script>
        <!--[if lt IE 9]><script src="<?= Yii::app()->request->baseUrl ?>/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?= Yii::app()->request->baseUrl ?>/js/html5shiv.js"></script>
          <script src="<?= Yii::app()->request->baseUrl ?>/js/respond.min.js"></script>
        <![endif]-->
        <script src="<?= Yii::app()->request->baseUrl ?>/js/dashboard/modernizr.custom.js"></script>


        <!-- InstanceBeginEditable name="head" -->
        <!-- InstanceEndEditable -->
    </head>
    <body class="color-4">
        <div id="container" class="main-body">
            <!-- Top Navigation -->
            <header class="row">
                <a href="<?=Yii::app()->request->baseUrl?>/home" class="logo col-xs-12 col-md-8"><?=Yii::app()->name?></a>
                <div class="col-xs-12 col-md-4 pull-right top-menu">
                    <a href="#" class="h-menu" data-toggle="collapse" data-target="#top-menu">
                        <span class="fa fa-navicon"></span></a>                

                    <ul class="nav nav-pills pull-right collapse" id="top-menu">
                        <li><a href="<?=Yii::app()->request->baseUrl?>/userpanel" data-toggle="tooltip" data-placement="bottom" title="<?=Yii::app()->name?> home page" class="ttip"><i class="fa fa-home"></i></a></li>
                        <li><a href="<?=Yii::app()->request->baseUrl?>/userpanel/launch" data-toggle="tooltip" data-placement="bottom" title="Auto Surf" class="ttip"><i class="fa fa-rocket"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>&nbsp;<?=User::model()->findByPk(Yii::app()->user->id)->email?> <b class="caret"></b></a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="<?=Yii::app()->request->baseUrl?>/userpanel/settings"><i class="fa fa-user"></i>Settings</a></li>
                                <li><a href="<?=Yii::app()->request->baseUrl?>/userpanel/logout"><i class="fa fa-sign-out"></i>Logout</a></li>

                            </ul></li>
                    </ul>

                </div>


            </header>