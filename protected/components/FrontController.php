<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontController extends Controller {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/main';

   
    public function init() {
        $parameters = Settings::model()->findByPk(1);

        Yii::app()->params['twitter'] = $parameters['twitter'];
        Yii::app()->params['support_email'] = $parameters['support_email'];
        Yii::app()->params['email'] = $parameters['email'];
        Yii::app()->params['adminEmail'] = $parameters['email'];
        Yii::app()->params['facebook'] = $parameters['facebook'];
        Yii::app()->params['google'] = $parameters['google'];
        Yii::app()->params['youtube'] = $parameters['youtube'];
        //Yii::app()->params['paypal_email'] = $parameters['paypal_email'];
        Yii::app()->params['address'] = $parameters['address'];
        Yii::app()->params['logo'] = $parameters['logo'];
        Yii::app()->params['business_hours'] = $parameters['business_hours'];
        Yii::app()->params['auto_surfing_points'] = $parameters['auto_surfing_points'];
        Yii::app()->params['cost_of_5k_points'] = $parameters['cost_of_5k_points'];
        Yii::app()->params['referral_points'] = $parameters['referral_points'];
        Yii::app()->params['surfing_period'] = $parameters['surfing_period'];
        Yii::app()->params['user_intial_points'] = $parameters['user_intial_points'];
        Yii::app()->params['slider_min_points'] = $parameters['slider_min_points'];
        Yii::app()->params['slider_max_points'] = $parameters['slider_max_points'];
        Yii::app()->params['how_work_video'] = $parameters['how_work_video'];
        Yii::app()->params['alexa_ranking'] = $parameters['alexa_ranking'];
        Yii::app()->params['alexa_features'] = $parameters['alexa_features'];
        Yii::app()->params['alexa_take_tour'] = $parameters['alexa_take_tour'];

        /*Yii::app()->Paypal->apiUsername = $parameters['api_username'];
        Yii::app()->Paypal->apiPassword = $parameters['api_password'];
        Yii::app()->Paypal->apiSignature = $parameters['signature'];
        if ($parameters['paypal_live'] == 1)
            Yii::app()->Paypal->apiLive = true;
        else
            Yii::app()->Paypal->apiLive = false;*/
        
        //load js files
         if (!Yii::app()->request->isAjaxRequest)
            $this->registerMainScripts();
        
    }
    
    
    
     protected function registerMainScripts() {
        /**
         * libs
         */
        //Yii::app()->clientScript->registerCoreScript('jquery'); //jQuery
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->getBaseUrl(true) . '/js/libs/bootstrap/bootstrap.js', CClientScript::POS_END); //Bootstrab
        /**
         * ui files
         */
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->getBaseUrl(true) . '/js/front/jquery.transit.min.js', CClientScript::POS_END);
        /**
         * dev files
         */
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->getBaseUrl(true) . '/js/front/dev.js', CClientScript::POS_END); //Custom js file for developers
    }

    

    protected function beforeAction($action) {

        ///////////////////////////error//////////////////////////////////////
        $parameters = Errormessage::model()->findByPk(1);
        Yii::app()->params['error_heading'] = $parameters['error_heading'];
        Yii::app()->params['error_subhead'] = $parameters['error_subhead'];
        Yii::app()->params['error_image'] = $parameters['error_image'];
        Yii::app()->params['error_home'] = $parameters['error_home'];
        Yii::app()->params['error_homeactive'] = $parameters['error_homeactive'];
        Yii::app()->params['error_prev'] = $parameters['error_prev'];
        Yii::app()->params['error_prevactive'] = $parameters['error_prevactive'];
        //////////////////////////////////error////////////////////////////////////
        return parent::beforeAction($action);
    }

}
