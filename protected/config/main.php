<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'AlexaBoostop',
    'defaultController' => 'home',
    //'homeUrl'=>'home',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'ext.YiiMailer.YiiMailer',
        /*         * * for gallery extesnion *** */
        'ext.galleryManager.*',
        'ext.galleryManager.models.*',
        'ext.galleryManager.GalleryController',
        'ext.yiisortablemodel.models.*',
        'ext.yii_select2.Select2',
    ),
    //'viewPath' => 'views/admin',
    'controllerMap' => array(
        'floara' => array(
            'class' => 'ext.floara.FloaraController',
        ),
    ),
    //'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('*', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'phpThumb' => array(
            'class' => 'ext.EPhpThumb.EPhpThumb.EPhpThumb',
        ),
        // to disable caching
        'components' => array(
            'assetManager' => array(
                'linkAssets' => false,
            ),
        ),
        /*         * *For gallery extension  ** */
        'widgetFactory' => array(
            'class' => 'CWidgetFactory',
            'widgets' => array(
                'GalleryManager' => array(
                    'controllerRoute' => '/gallery',
                ),
            )
        ),
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
            // ImageMagick setup path
            'params' => array('directory' => '/var/www/projects/PHPLib/ImageMagick-6.8.6-8'),
        ),
        'mailer' => array(
            'class' => 'ext.mail.Mailer',
        ),
        'Paypal' => array(
            'class' => 'application.components.Paypal',
            /*'apiUsername' => 'prosel_8889975454_biz_api1.hany.com',
            'apiPassword' => '1355392425',
            'apiSignature' => 'A3wB9wrrNWmmaqiQQX9SVBFeXSFJMAS5DGVJQ4H9X99K1efvyNjmnZGs',*/
            'apiUsername' => 'ahmed.hany.fawzy-facilitator_api1.hotmail.com',
            'apiPassword' => 'AA86G2K284HDV3L2', //'1355392425',
            'apiSignature' => 'ArcoIsSBiDf1YkCyrHH34-M8jKo3AhzsU7eWzVM9-3t50NlXZqMw6JiR',
            'apiLive' => false,
            'returnUrl' => 'Home/confirm/', //regardless of url management component
            'cancelUrl' => 'Home/cancel/', //regardless of url management component
        ),
        'PaypalRecurring' => array(
            'class'=>'application.components.PaypalRecurring',
            /*'apiUsername' => 'proaccount_api1.ahany.com',
            'apiPassword' => '1381331558',
            'apiSignature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AExQKzO8RmqP7hJL8mHwI.EhNkG7',*/
            'apiUsername' => 'ahmed.hany.fawzy-facilitator_api1.hotmail.com',
            'apiPassword' => 'AA86G2K284HDV3L2', //'1355392425',
            'apiSignature' => 'ArcoIsSBiDf1YkCyrHH34-M8jKo3AhzsU7eWzVM9-3t50NlXZqMw6JiR',
            'apiLive' => false,

            'returnUrl' => 'Userpanel/confirmSubscribe/', //regardless of url management component
            'cancelUrl' => 'Userpanel/cancelSubscribe/', //regardless of url management component
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '_<slug>' => 'home/test',
                'admin' => 'admin/dashboard',
                'dashboard' => 'admin/dashboard',
                'page-<slug>' => 'home/pages',
                'contact-us' => 'home/contact',
                'blog-<slug>' => 'home/blogDetails',
            ),
            
        ),
        // uncomment the following to use a MySQL database
        'db' => require(dirname(__FILE__) . '/connection.php'),
        
        /*'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'home/error',
        ),*/
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages


            
           //   array(
           //   'class'=>'CWebLogRoute',
           //   ),
             
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'info@ahmed-hany-fawzy.com',
        'dateFormat'=>'yy-mm-dd', /*must be the same as the {{dateModelFormat}} but with Y instead of yy (m=>mm , d=>dd)*/
        'webSite' => 'http://www.domains4reg.com',
        'dateModelFormat'=>'Y-m-d',
    ),
);
