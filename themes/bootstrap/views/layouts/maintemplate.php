<!DOCTYPE html>
<!--[if lt IE 7]>       <html class="no-js lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>          <html class="no-js lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>          <html class="no-js lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="description" content="AhmedHany: Bootstrap Responsive Admin Theme">
        <?php Yii::app()->bootstrap->register(); ?>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.metisMenu.js"></script>

        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css">


        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/morris-0.4.3.min.css">
    </head>
    <?php
    if (Yii::app()->user->getState('wide_screen') == 1) {
        $classN = "hide-sidebar";
    } else {
        $classN = '';
    }
    ?>
    <body class="<?= $classN; ?>"  >
        <!-- BEGIN WRAP -->
        <div id="wrap"> 

            <!-- BEGIN TOP BAR -->
            <div id="top"> 
                <!-- .navbar -->
                <div class="navbar navbar-inverse navbar-static-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">  
                            <a class="brand span4" href="<?php echo Yii::app()->request->baseUrl; ?>/home/index">
                                <?= Yii::app()->name; ?>
                            </a> 
                            <!-- .topnav -->
                            <div class="btn-toolbar topnav">
                                <div class="btn-group"> <a id="changeSidebarPos" class="btn btn-success header_btns" rel="tooltip"
                                                           data-original-title="Show / Hide Sidebar" data-placement="bottom" onClick=""> <i class="fa fa-outdent"></i> </a> </div>
                                <!--<div class="btn-group">
                                <?php
                                /*
                                  echo CHtml::ajaxLink(
                                  "<i class='icon-resize-horizontal'></i>",
                                  Yii::app()->createUrl( 'admin/dashboard/ajaxRequest' ),
                                  array( // ajaxOptions
                                  'type' =>'POST',
                                  'beforeSend' => "function( request )
                                  {
                                  // Set up any pre-sending stuff like initializing progress indicators
                                  }",
                                  'success' => "function( data )
                                  {
                                  // handle return data
                                  //alert( data );
                                  }",
                                  'data' => array( 'val1' => '1', )
                                  ),
                                  array( //htmlOptions
                                  'href' => Yii::app()->createUrl( 'admin/dashboard/ajaxRequest' ),
                                  'class' => 'btn btn-success',
                                  'id'=>'changeSidebarPos',
                                  'data-original-title'=>'Show / Hide Sidebar',
                                  )
                                  );
                                 */
                                ?>
                     </div>-->

                                <div class="btn-group dropdown"> <a class="btn header_btns dropdown-toggle" rel="tooltip" href="#" data-original-title="Lists"
                                                                    data-placement="bottom" data-toggle="dropdown" >
                                        <li class="fa fa-list"></li>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?= Yii::app()->request->baseUrl ?>/admin/pages"> Static Pages</a></li>
                                        <li><a href="<?= Yii::app()->request->baseUrl ?>/admin/faq"> FAQs</a></li>
                                        <li><a href="<?= Yii::app()->request->baseUrl ?>/admin/website">Websites</a></li>
                                        <li><a href="<?= Yii::app()->request->baseUrl ?>/admin/package">Packages</a></li>
                                        <li><a href="<?= Yii::app()->request->baseUrl ?>/admin/support">Support</a></li>
                                        <li><a href="<?= Yii::app()->request->baseUrl ?>/admin/feedback">Feedbacks</a></li>
                                        <li><a href="<?= Yii::app()->request->baseUrl ?>/admin/blog">Blog</a></li>
                                          <li><a href="<?= Yii::app()->request->baseUrl ?>/admin/banner">banner</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group dropdown"> <a class="btn header_btns dropdown-toggle" rel="tooltip" href="#" data-original-title="Users" data-toggle="dropdown" data-placement="bottom"> <i class="fa fa-users"></i> </a>
                                    <ul class="dropdown-menu pull-right">
                                        <?php if (Yii::app()->user->group == 1) { ?>
                                            <li><a href="<?= Yii::app()->request->baseUrl ?>/admin/User?usergroup=6"> Administrators</a> </li>
                                            <?php
                                        }
                                        ?>
                                        <li><a href="<?= Yii::app()->request->baseUrl ?>/admin/User?usergroup=1"> Individual users</a> </li>
                                    </ul>
                                </div>
                                <!--<div class="btn-group"> <a class="btn header_btns" data-placement="bottom" data-original-title="Logout" rel="tooltip"
                                                       href="<?php echo Yii::app()->request->baseUrl; ?>/admin/dashboard/logout"><i class="fa fa-power-off"></i></a></div>-->

                                <div class="btn-group dropdown"> <a class="btn header_btns dropdown-toggle" rel="tooltip" href="#" data-original-title="User" data-placement="bottom" data-toggle="dropdown">
                                        <i class="fa fa-user admin_icon"></i> <?php echo Yii::app()->user->username; ?> 
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/user/view/id/<?php echo Yii::app()->user->id; ?>"> Profile</a> </li>
                                        <li><a data-placement="bottom" data-original-title="Logout" rel="tooltip"
                                               href="<?php echo Yii::app()->request->baseUrl; ?>/admin/dashboard/logout"> Log Out</a> </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.navbar --> 
            </div>
            <!-- END TOP BAR --> 

            <!-- BEGIN HEADER.head -->
            <header class="head">
                <div class="search-bar">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="search-bar-inner"> <a id="menu-toggle" class="accordion-toggle btn btn-inverse visible-phone" data-toggle="collapse"
                                                              data-target=".menu"rel="tooltip" data-placement="bottom" data-original-title="Show/Hide Menu"> <i class="icon-sort"></i> </a>
                                <!--
                                <form class="main-search">
                                  <input class="input-block-level" type="text" placeholder="Live search...">
                                  <button id="searchBtn" type="submit" class="btn btn-inverse"><i class="fa fa-search"></i> </button>
                                </form>
                                -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ."main-bar -->
                <div class="main-bar">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="span12"> </div>
                        </div>
                        <!-- /.row-fluid --> 
                    </div>
                    <!-- /.container-fluid --> 
                </div>
                <!-- /.main-bar --> 
            </header>
            <!-- END HEADER.head --> 

            <!-- BEGIN LEFT  -->
            <div id="left"> 
                <!-- .user-media -->

                <!--
                <div class="media user-media hidden-phone"> <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/user/update/id/<? echo yii::app()->user->id; ?>" class="user-link">
                <?php
                if (Yii::app()->user->getState('admin_image') == '') {
                    $AdminImage = 'img/user.gif';
                } else {
                    $AdminImage = 'media/members/' . Yii::app()->user->admin_image;
                }
                ?>
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?= $AdminImage ?>" alt="" class="media-object img-polaroid user-img" width="100" height="150" style="margin:0 auto"> 
                  <span class="label user-label">16</span>
                  </a>
                  <div class="media-body hidden-tablet">
                    <h5 class="media-heading"><?php echo Yii::app()->name; ?></h5>
                    <ul class="unstyled user-info">
                      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/user/update/id/<?= Yii::app()->user->id; ?>">
                <?= User::model()->findByPk(Yii::app()->user->id)->username; ?>
                        </a></li>
                      <li>Last Access : <br/>
                        <small><i class="icon-calendar"></i>
                <?= Yii::app()->dateFormatter->formatDateTime(Yii::app()->user->getState('admin_last_login'), 'long', null); ?>
                        </small> </li>
                    </ul>
                  </div>
                </div>
                -->
                <!-- /.user-media --> 

                <!-- BEGIN MAIN NAVIGATION -->

                <div  class="menu">
                    <div class="unstyled accordion">
                        <?php
                        $this->widget('bootstrap.widgets.TbMenuUKPROM', array(
                            'type' => "list",
                            'items' => array(
                                array('label' => 'Main Site', 'url' => array('/home/index'), 'itemOptions' => array('class' => ''), "icon" => "fa fa-home", "parent" => ""),
                                array('label' => 'Dashboard', 'url' => array('/admin/dashboard/index'), 'itemOptions' => array('class' => Helper::active_admin('dashboard')),
                                    "icon" => "fa fa-tachometer", "parent" => ""),
                                array('label' => 'List', "parent" => "", 'url' => '#',
                                    "itemOptions" => array('class' => Helper::active_admin(array('faq', 'faqCat', 'Countries', 'Banner'))),
                                    "icon" => "fa fa-list", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#subnav6", 'class' => ''),
                                    'items' => array(
                                        array('label' => 'FAQs', 'url' => array('/admin/faq'), "icon" => "fa fa-globe"),
                                        array('label' => 'Support', 'url' => array('/admin/support'), "icon" => "fa fa-globe"),
                                        array('label' => 'Feedbacks', 'url' => array('/admin/feedback'), "icon" => "fa fa-globe"),
                                        array('label' => 'Blog Categories', 'url' => array('/admin/blogCategory'), "icon" => "fa fa-globe"),
                                        array('label' => 'Blogs', 'url' => array('/admin/blog'), "icon" => "fa fa-globe"),
                                        array('label' => 'Banner', 'url' => array('/admin/banner'), "icon" => "fa fa-globe"),
                                    ), 'itemOptions' => array('class' => ''), 'visible' => User::CheckAdmin()),
                                array('label' => 'Static Page', "parent" => "", 'url' => '#',
                                    "itemOptions" => array('class' => Helper::active_admin(array('Static Page', 'error page'))),
                                    "icon" => "fa fa-list", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#subnav111", 'class' => ''),
                                    'items' => array(
                                        array('label' => 'Static Page', 'url' => array('/admin/pages'),
                                            "icon" => "fa fa-globe"),
                                        array('label' => 'error page', 'url' => array('/admin/errormessage'),
                                            "icon" => "fa fa-globe"),
                                    ), 'itemOptions' => array('class' => ''), 'visible' => User::CheckAdmin()),
                                array('label' => 'Websites', "parent" => "", 'url' => array('/admin/website'), "icon" => "fa fa-globe"
                                    , 'itemOptions' => array('class' => ''),
                                    'visible' => User::CheckAdmin()),
                                
                                
                                array('label' => 'Packages', "parent" => "", 'url' => '#',
                                    "itemOptions" => array('class' => Helper::active_admin(array('order'))),
                                    "icon" => "fa fa-list", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#subnavpack", 'class' => ''),
                                    'items' => array(
                                        array('label' => 'Simple Packages', 'url' => array('/admin/package'), "icon" => "fa fa-globe"),
                                        array('label' => 'Subscribe Packages', 'url' => array('/admin/subscribePackage'), "icon" => "fa fa-globe"),
                                    ), 'itemOptions' => array('class' => ''), 'visible' => User::CheckAdmin()),
                                
                                                array('label' => 'features', "parent" => "", 'url' => '#',
                                    "itemOptions" => array('class' => Helper::active_admin(array('order'))),
                                    "icon" => "fa fa-list", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#features", 'class' => ''),
                                    'items' => array(
                                        array('label' => 'features', 'url' => array('/admin/features'), "icon" => "fa fa-globe"),
                                        array('label' => 'How it Works !', 'url' => array('/admin/howWork'), "icon" => "fa fa-globe"),            
                                          array('label' => 'Ranking', 'url' => array('/admin/rank'), "icon" => "fa fa-globe"),
                                    ), 'itemOptions' => array('class' => ''), 'visible' => User::CheckAdmin()),
                 
                                
                                
                                array('label' => 'Orders', "parent" => "", 'url' => '#',
                                    "itemOptions" => array('class' => Helper::active_admin(array('order'))),
                                    "icon" => "fa fa-shopping-cart", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#subnav10", 'class' => ''),
                                    'items' => array(
                                        array('label' => 'Orders', 'url' => array('/admin/order'), "icon" => "fa fa-shopping-cart"),
                                    ), 'itemOptions' => array('class' => ''), 'visible' => User::CheckAdmin()),
                                array('label' => 'Users', "icon" => "fa fa-user", "parent" => "", 'linkOptions' => array("data-toggle" => "collapse",
                                        "data-target" => "#subnav8", 'class' => ''), 'url' => '#',
                                    'items' => array(
                                        array('label' => 'Users', 'url' => array('/admin/user?usergroup=1'), "icon" => "fa fa-user"),
                                        array('label' => 'User Points', 'url' => array('/admin/userPoints'), "icon" => "fa fa-user"),
                                        array('label' => 'Referrals', 'url' => array('/admin/referrals'), "icon" => "fa fa-user"),
                                    ),
                                    'itemOptions' => array('class' => 'main-site-link3'), 'visible' => User::CheckAdmin()),
                                array('label' => 'Settings', "parent" => "", 'url' => '#',
                                    "itemOptions" => array('class' => Helper::active_admin(array('settings', 'settings/report'))),
                                    "icon" => "fa fa-cogs", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#subnav11", 'class' => ''),
                                    'items' => array(
                                        array('label' => 'General Settings', 'url' => array('/admin/settings'),
                                            "icon" => "fa fa-cogs"),
                                    ), 'itemOptions' => array('class' => ''), 'visible' => User::CheckAdmin()),
                                array('label' => 'Logout', "parent" => "", 'url' => array('/admin/dashboard/logout'), "icon" => "fa fa-power-off"
                                    , 'itemOptions' => array('class' => ''),
                                    'visible' => User::CheckAdmin()),
                                array('label' => 'divide', "divider" => "nav-divider"),
                            ),
                        ));
                        ?>
                    </div>
                </div>

                <!-- END MAIN NAVIGATION --> 

            </div>
            <!-- END LEFT --> 

            <!-- BEGIN MAIN CONTENT --> 
            <!-- #content -->
            <div id="content"> 
                <!-- .outer -->
                <div class="container-fluid outer">
                    <div class="row-fluid"> 
                        <!-- .inner -->
                        <div class="span12 inner"> 
                            <!--Begin Datatables-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box dark">
                                        <header>
                                            <div class="icons"><i class="fa fa-tachometer temp_icons"></i>
                                                <span class="page_title">Dashboard</span></div>
                                            <?php
                                            if (Yii::app()->controller->id == 'dashboard' and Yii::app()->controller->action->id == 'index') {
                                                // load the script for graphs or anything related to the index page
                                            } else {
                                                echo "<h5>" . $this->pageTitlecrumbs . "</h5>";
                                            }
                                            ?>
                                            <?php ?>

                                            <!-- .toolbar -->

                                            <div class="toolbar">
                                                <ul class="nav">
                                                    <li class="dropdown"> <a href="#" class="dropdown-toggle temp_icons" data-toggle="dropdown"> <i class="fa fa-th-large"></i> </a>
                                                        <ul class="dropdown-menu">
                                                            <?php
                                                            $this->beginWidget('zii.widgets.CPortlet', array(
                                                            ));
                                                            $this->widget('bootstrap.widgets.TbMenu', array(
                                                                'items' => $this->menu,
                                                                'htmlOptions' => array('class' => 'nav'),
                                                            ));
                                                            $this->endWidget();
                                                            ?>
                                                            <!-- <li><a href="Accounts-create.html">Create Account</a></li>
                                                                                      <li><a href="Accounts.html">View Accounts</a></li>
                                                                                      <li><a href="Accounts.html">View Account Reports</a></li>
                                                                                      <li><a href="Accounts-import.html">Import Accounts</a></li> -->
                                                        </ul>
                                                    </li>
                                                    <li> 
                                                        <!-- <a href="#div-1" data-toggle="collapse" class="accordion-toggle minimize-box">
                                                                                 <i class="icon-chevron-up"></i>
                                                                                 </a> --> 
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.toolbar --> 

                                        </header>
                                        <div id="collapse4" class="body"> <?php echo $content; ?> </div>
                                    </div>
                                </div>
                                <!--End Datatables--> 
                            </div>
                            <!-- /.row-fluid --> 
                        </div>
                        <!-- /.outer --> 
                    </div>
                    <!-- /#content --> 
                    <!-- #push do not remove -->
                    <div id="push"></div>
                    <!-- /#push --> 
                </div>
            </div>
            <!-- END CONTENT --> 

        </div>

        <!-- END WRAP --> 

        <!-- BEGIN FOOTER -->
        <div id="footer">
            <p><?php echo date('Y'); ?> &copy; </p>
        </div>
        <!-- END FOOTER -->


    </body>
</html>
