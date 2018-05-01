<?php

class UserpanelController extends FrontController {

    public $layout = '//layouts/cpanel_layout';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }

    public function actionLogin() {

        $this->layout = ' ';

        if (!Yii::app()->user->isGuest) {
            if (Yii::app()->user->group == 1 || Yii::app()->user->group == 2) {
                $this->redirect(array('admin/dashboard'));
            } else {
                $this->redirect(array('index'));
            }
        }

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                if (Yii::app()->user->group == 1 || Yii::app()->user->group == 2) {
                    $this->redirect(array('admin/dashboard'));
                } else if (Yii::app()->user->group == 3 && Yii::app()->user->getState('user_active') == 1) {
                    $points = UserPoints::model()->findByAttributes(array('user_id' => Yii::app()->user->id, 'date_time' => date('Y-m-d')));
                    if (empty($points)) {
                        $po = new UserPoints;
                        $po->date_time = date('Y-m-d');
                        $po->user_id = Yii::app()->user->id;
                        $po->save(false);
                    }
                    $this->redirect(array('index'));
                } else {
                    $this->redirect(array('logout'));
                }
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionTools() {
        $this->render('tools');
    }

    public function actionLaunch() {
        $this->render('launch');
    }

    public function actionRandomWebsite() {
        $user_id = Yii::app()->user->id;
        $user = User::model()->findByPk($user_id);
        $website = Website::model()->find(array('condition' => 'active=1 and user_id in (select id from '.User::model()->tableSchema->name.' where id<>' . $user_id . ' and points>0 and active=1) and (limit_points=0 || limit_points<today_points)', 'order' => 'RAND()'));
        if ($website) {
            $arr['status'] = 'success';
            $arr['website'] = $website->title;
            if ($website->hide_referrals)
                $arr['website'] = "http://www.nullrefer.com/?" . $website->title;
            /*             * *increase the points of the current user** */
            $user->points+=Yii::app()->params['auto_surfing_points'];
            $user->save(false);
            $arr['points'] = $user->points;
            /*             * *decrease the points of the website owner** */
            $owner = User::model()->findByPk($website->user_id);
            $owner->points-=Yii::app()->params['auto_surfing_points'];
            $owner->save(false);
            /*             * *increase the points used today and we will reset this everyday by cron job** */
            $website->today_points+=Yii::app()->params['auto_surfing_points'];
            $website->save(false);
            /*             * ****track the points of the current user in the user_points table****** */
            $points = UserPoints::model()->findByAttributes(array('user_id' => Yii::app()->user->id, 'date_time' => date('Y-m-d')));
            if (empty($points)) {
                $po = new UserPoints;
                $po->date_time = date('Y-m-d');
                $po->user_id = Yii::app()->user->id;
                $po->gained = Yii::app()->params['auto_surfing_points'];
                $po->save(false);
            } else {
                $points->gained+=Yii::app()->params['auto_surfing_points'];
                $points->save(false);
            }
            /*             * ****track the points of the website owner in the user_points table****** */
            $points = UserPoints::model()->findByAttributes(array('user_id' => $website->user_id, 'date_time' => date('Y-m-d')));
            if (empty($points)) {
                $po = new UserPoints;
                $po->date_time = date('Y-m-d');
                $po->user_id = $website->user_id;
                $po->used = Yii::app()->params['auto_surfing_points'];
                $po->save(false);
            } else {
                $points->used+=Yii::app()->params['auto_surfing_points'];
                $points->save(false);
            }
        } else {
            $arr['status'] = 'fail';
        }
        echo json_encode($arr);
    }

    public function actionReferrals() {
        $referrals = Referrals::model()->findAll(array('condition' => 'referral_id=' . Yii::app()->user->id));
        $this->render('referrals', array('referrals' => $referrals));
    }

    public function actionWebsites() {
        $websites = Website::model()->findAll(array('condition' => 'user_id=' . Yii::app()->user->id));
        $this->render('websites', array('websites' => $websites));
    }

    public function actionCreateWebsite() {
        $model = new Website;
        if (isset($_POST['Website'])) {
            /*             * *check the num of websites created by user** */
            if (User::CanCreateWebsite()) {
                $model->attributes = $_POST['Website'];
                $model->user_id = Yii::app()->user->id;
                if ($model->save())
                    $this->redirect(array('websites'));
            }else {
                Yii::app()->user->setFlash('wrong', 'You can\'t create more websites, your websites quote has been finished.');
                $this->redirect(array('websites'));
            }
        }
        $this->render('website-form', array('model' => $model));
    }

    public function actionEditWebsite($id) {
        $model = Website::model()->findByPk($id);
        if (isset($_POST['Website'])) {
            $model->attributes = $_POST['Website'];
            $model->user_id = Yii::app()->user->id;
            if ($model->save())
                $this->redirect(array('websites'));
        }
        $this->render('website-form', array('model' => $model));
    }

    public function actionDeleteWebsite($id) {
        $model = Website::model()->findByPk($id);
        if ($model->delete()) {
            Yii::app()->user->setFlash('wrong', 'The selected website has been removed successfully.');
            $this->redirect(array('websites'));
        }
    }

    public function actionPurchase() {
        $packages = Package::model()->findAll();
        $this->render('packages', array('packages' => $packages));
    }

    public function actionSubscribe() {
        //echo '<h1>Still Under Development</h1>';die;
        $subscribe_packages = SubscribePackage::model()->findAll();
        $this->render('subscribe', array('subscribe_packages' => $subscribe_packages));
    }

    public function actionSubscribeNow($id) {
        $package = SubscribePackage::model()->findByPk($id);
        if ($package) {
            $is_subscribed = User::IsSuscribedUser(Yii::app()->user->id);
            if ($is_subscribed) {
                Yii::app()->user->setFlash('wrong', 'Wrong! You are already subscribed to one of our packages and it will be renewed automatically every 1 month, if you want to upgrade your package please unsubscribe from the current package then buy the new package but if you want to cancel your subscription you can unsbscribe.');
                $this->redirect(array('subscribe'));
            }//not a subscribed user so s/he can subscribe
            else {
                $paymentAmount = $package->price;
                $paymentType = "Sale";
                $resArray = Yii::app()->PaypalRecurring->CallShortcutExpressCheckout($paymentAmount, $paymentType, Yii::app()->name . ' Recurring Subscription Program');
                $ack = strtoupper($resArray["ACK"]);
                if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
                    $token = urldecode($resArray["TOKEN"]);
                    $user = User::model()->findByPk(Yii::app()->user->id);
                    if ($user) {
                        $user->subscription_token = $token;
                        $user->subscribed_package_id = $package->id;
                        $user->subscribed_package_renewal_date = Date('Y-m-d H:i:s', strtotime("+30 days"));
                        $user->subscribe_status = 1;
                        if ($user->save(false)) {
                            $_SESSION['reshash'] = $token;
                            Yii::app()->PaypalRecurring->RedirectToPayPal($token);
                        }
                    }
                } else {
                    //Display a user friendly Error on the page using any of the following error information returned by PayPal
                    $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
                    $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
                    $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
                    $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

                    echo " <br>SetExpressCheckout API call failed. <br>";
                    echo "Detailed Error Message: " . $ErrorLongMsg;
                    echo " <br>Short Error Message: " . $ErrorShortMsg;
                    echo " <br>Error Code: " . $ErrorCode;
                    echo " <br>Error Severity Code: " . $ErrorSeverityCode;
                }
            }
        } else {
            Yii::app()->user->setFlash('wrong', 'Payment security issue! Please choose one of the packages available.');
            $this->redirect(array('subscribe'));
        }
        //$this->render('subscribe_now',array('subscribe_packages'=>$subscribe_packages));
    }

    public function actionConfirmSubscribe() {
        $token = trim($_GET['token']);
        $payerID = trim($_GET['PayerID']);

        $criteria = new CDbCriteria;
        $criteria->condition = 'subscription_token=:Tokenw';
        $criteria->params = array(':Tokenw' => $token);
        $user = User::model()->find($criteria);

        $resArray = Yii::app()->PaypalRecurring->GetShippingDetails($token);
        $ack = strtoupper($resArray["ACK"]);
        
        if ($ack == "SUCCESS" || $ack == "SUCESSWITHWARNING") {
            if ($user->subscribe_status == "1") {
                $resPayment = Yii::app()->PaypalRecurring->ConfirmPayment($token, 'Sale', $payerID, $user->subscribedPackage->price);
                $ack = strtoupper($resPayment['ACK']);
                if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
                    $resRecurring = Yii::app()->PaypalRecurring->CreateRecurringPaymentsProfile($token, $resArray['SHIPTONAME'], $resArray['SHIPTOSTREET'], $resArray['SHIPTOCITY'], $resArray['SHIPTOSTATE'], $resArray['SHIPTOZIP'], $resArray['SHIPTOCOUNTRYCODE'], Yii::app()->name . ' Recurring Subscription Program', 'Month', 12, $used->subscribedPackage->price, 30);
                    $ack = strtoupper($resRecurring["ACK"]);
                    if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
                        $user->points+=$user->subscribedPackage->points;
                        $user->subscribe_status = 3; //completed
                        $user->paypal_profile_id = $resRecurring['PROFILEID'];
                        if ($user->save(false)) {
                            /*echo $resRecurring['TIMESTAMP'];
                            die;*/
                        }
                    } else {
                        //Display a user friendly Error on the page using any of the following error information returned by PayPal
                        $ErrorCode = urldecode($resRecurring["L_ERRORCODE0"]);
                        $ErrorShortMsg = urldecode($resRecurring["L_SHORTMESSAGE0"]);
                        $ErrorLongMsg = urldecode($resRecurring["L_LONGMESSAGE0"]);
                        $ErrorSeverityCode = urldecode($resRecurring["L_SEVERITYCODE0"]);

                        echo "CreateRecurring Payments Profile API call failed. <br>";
                        echo "Detailed Error Message: " . $ErrorLongMsg;
                        echo "<br>Short Error Message: " . $ErrorShortMsg;
                        echo "<br>Error Code: " . $ErrorCode;
                        echo "<br>Error Severity Code: " . $ErrorSeverityCode;
                    }
                } else {
                    //Display a user friendly Error on the page using any of the following error information returned by PayPal
                    $ErrorCode = urldecode($resPayment["L_ERRORCODE0"]);
                    $ErrorShortMsg = urldecode($resPayment["L_SHORTMESSAGE0"]);
                    $ErrorLongMsg = urldecode($resPayment["L_LONGMESSAGE0"]);
                    $ErrorSeverityCode = urldecode($resPayment["L_SEVERITYCODE0"]);

                    echo "GetRecurringCheckoutDetails API call failed. <br>";
                    echo "Detailed Error Message: " . $ErrorLongMsg;
                    echo "<br>Short Error Message: " . $ErrorShortMsg;
                    echo "<br>Error Code: " . $ErrorCode;
                    echo "<br>Error Severity Code: " . $ErrorSeverityCode;
                }
            } else {
                Yii::app()->user->setFlash('wrong', 'This order has been confirmed previously.');
                $this->redirect(array('subscribe'));
            }
        } else {
            //Display a user friendly Error on the page using any of the following error information returned by PayPal
            $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
            $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
            $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
            $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

            echo "GetExpressCheckoutDetails API call failed. <br>";
            echo "Detailed Error Message: " . $ErrorLongMsg;
            echo "<br>Short Error Message: " . $ErrorShortMsg;
            echo "<br>Error Code: " . $ErrorCode;
            echo "<br>Error Severity Code: " . $ErrorSeverityCode;
        }
        $this->render('orderconfirm');
    }

    public function actionCancelSubscribe() {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $user = User::model()->findByAttributes(array('subscription_token' => $token, 'subscribe_status' => 1));
            if ($user) {
                $user->subscribe_status = 2; //cancelled
                $user->save(false);
            } else {
                Yii::app()->user->setFlash('ErrorCancel', 'Wrong Token! This order token is valid and can\'t be used.');
            }
        } else {
            Yii::app()->user->setFlash('ErrorCancel', 'Wrong Redirection! Please try again later.');
        }

        $this->render('ordercancel');
    }

    public function actionEarn() {
        //echo '<h1>Still Under Development</h1>';die;
        $year = date('Y');
        $month = date('m');
        $current_month_points = UserPoints::model()->findAll(array('condition' => 'user_id=' . Yii::app()->user->id . ' and date_time like "%' . $year . '-' . $month . '%"', 'order' => 'id desc', 'limit' => 7));
        $this->render('earn', array('current_month_points' => $current_month_points));
    }

    public function actionCheckoutExpress($id = '') {
        if ($id) {
            $package = Package::model()->findByPk($id);
            $total = $package->price;
            $points = $package->points;
            $package_id = $package->id;
        } elseif (isset($_POST['points']) && isset($_POST['price']) && $_POST['price'] != '0' && $_POST['points'] != 0) {
            $sett = Settings::model()->findByPk(1);
            if (($_POST['price'] / $_POST['points']) != ($sett->cost_of_5k_points / 5000) || $_POST['points'] < $sett->slider_min_points || $_POST['points'] > $sett->slider_max_points) {
                //if not the same proportion or the points needed less than the min points or greater than the maximum points
                Yii::app()->user->setFlash('scammer', 'Security Issue! Please choose one of the packages available or use the price slider to choose the number of points you need.');
                $this->redirect(array('purchase'));
            }
            $total = $_POST['price'];
            $points = $_POST['points'];
            $package_id = '';
        } else {
            Yii::app()->user->setFlash('scammer', 'Payment security issue! Please choose one of the packages available or use the price slider to choose the number of points you need.');
            $this->redirect(array('purchase'));
        }
        $paymentInfo['Order']['theTotal'] = $total;
        $paymentInfo['Order']['description'] = Yii::app()->name . " payment for ordering (" . $points . ") points.";
        $paymentInfo['Order']['quantity'] = $points;

        Yii::app()->Paypal->returnUrl = Yii::app()->request->getBaseUrl('true') . '/Userpanel/confirmExpress';
        Yii::app()->Paypal->cancelUrl = Yii::app()->request->getBaseUrl('true') . '/Userpanel/cancelExpress';

        // call paypal 
        $result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo);
        
        //Detect Errors 
        if (!Yii::app()->Paypal->isCallSucceeded($result)) {
            if (Yii::app()->Paypal->apiLive === true) {
                //Live mode basic error message
                $error = 'We were unable to process your request. Please try again later';
            } else {
                //Sandbox output the actual error message to dive in.
                $error = $result['L_LONGMESSAGE0'];
            }
            echo $error;
            Yii::app()->end();
        } else {
            // send user to paypal 
            $token = urldecode($result["TOKEN"]);
            $order = new Order;
            $order->package_id = $package_id;
            $order->token = $token;
            $order->points = $points;
            $order->price = $total;
            $order->status_id = '1'; //pending
            $order->user_id = Yii::app()->user->id;
            if ($order->save(false)) {
                $payPalURL = Yii::app()->Paypal->paypalUrl . $token;
                $this->redirect($payPalURL);
            } else {
                Yii::app()->user->setFlash('scammer', 'Payment failed! Sorry try again later.');
                $this->redirect(array('purchase'));
            }
        }
    }

    public function actionConfirmExpress() {
        if (isset($_GET['token'])) {
            $token = trim($_GET['token']);
            $payerId = trim($_GET['PayerID']);

            $order = Order::model()->findByAttributes(array('token' => $token, 'status_id' => 1));
            if ($order) {
                $result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);
                $result['PAYERID'] = $payerId;
                $result['TOKEN'] = $token;
                $result['ORDERTOTAL'] = $order->price;

                //Detect errors 
                if (!Yii::app()->Paypal->isCallSucceeded($result)) {
                    if (Yii::app()->Paypal->apiLive === true) {
                        //Live mode basic error message
                        $error = 'We were unable to process your request. Please try again later';
                    } else {
                        //Sandbox output the actual error message to dive in.
                        $error = $result['L_LONGMESSAGE0'];
                    }
                    echo $error;
                    Yii::app()->end();
                } else {

                    $paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
                    //Detect errors  
                    if (!Yii::app()->Paypal->isCallSucceeded($paymentResult)) {
                        if (Yii::app()->Paypal->apiLive === true) {
                            //Live mode basic error message
                            $error = 'We were unable to process your request. Please try again later';
                        } else {
                            //Sandbox output the actual error message to dive in.
                            $error = $paymentResult['L_LONGMESSAGE0'];
                        }
                        echo $error;
                        Yii::app()->end();
                    } else {
                        //payment was completed successfully
                        $order->status_id = 3; //completed
                        $order->payer_id = $payerId;
                        if ($order->save(false)) {
                            $user = User::model()->findByPk($order->user_id);
                            if ($user) {
                                $user->points+=$order->points;
                                $user->save(false);
                            } else {
                                Yii::app()->user->setFlash('ErrorConfirm', 'User Not Found! Please contact the admin and give him the following code (' . $order->token . ') in order to track your order and recieved your points.');
                            }
                        } else {
                            Yii::app()->user->setFlash('ErrorConfirm', 'Confirmation Failed! Please contact the admin and give him the following code (' . $order->token . ') in order to track your order and recieved your points.');
                        }
                    }
                }
            } else {
                Yii::app()->user->setFlash('ErrorConfirm', 'Duplicate Confirmation! Your order has been already confirmed.');
            }
        } else {
            Yii::app()->user->setFlash('ErrorConfirm', 'Wrong Redirection! Please try again later.');
        }
        $this->render('orderconfirm');
    }

    public function actionCancelExpress() {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $order = Order::model()->findByAttributes(array('token' => $token, 'status_id' => 1));
            if ($order) {
                $order->status_id = 2; //cancelled
                $order->save(false);
            } else {
                Yii::app()->user->setFlash('ErrorCancel', 'Wrong Token! This order token is valid and can\'t be used.');
            }
        } else {
            Yii::app()->user->setFlash('ErrorCancel', 'Wrong Redirection! Please try again later.');
        }

        $this->render('ordercancel');
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        if (Yii::app()->user->isGuest)
            $this->redirect(Yii::app()->homeUrl);
        elseif (Yii::app()->user->group == 1 || Yii::app()->user->group == 2)
            $this->redirect(array('admin/dashboard'));

        $year = date('Y');
        $month = date('m');
        $current_month_points = UserPoints::model()->findAll(array('condition' => 'user_id=' . Yii::app()->user->id . ' and date_time like "%' . $year . '-' . $month . '%"', 'order' => 'id desc', 'limit' => 7));
        $gained = '0,0,0,0,0,0,0,0,0,0,0,0';
        $used = '0,0,0,0,0,0,0,0,0,0,0,0';
        for ($i = 1; $i < 13; $i++) {
            $points = UserPoints::model()->find(array('select' => 'sum(gained) as gained, sum(used) as used', 'condition' => 'user_id=' . Yii::app()->user->id . ' and date_time like "%' . $year . '-' . trim(sprintf("%02d\n", $i)) . '%"'));
            if ($points['gained'] == '') {
                $points['gained'] = 0;
            }
            if ($points['used'] == '') {
                $points['used'] = 0;
            }
            if ($i != 1) {
                $gained.=',' . $points['gained'];
                $used.=',' . $points['used'];
            } else {
                $gained = $points['gained'];
                $used = $points['used'];
            }
        }
        $this->render('index', array('gained' => $gained, 'used' => $used, 'current_month_points' => $current_month_points));
    }

    public function actionSettings() {
        $model = User::model()->findByPk(Yii::app()->user->id);
        if (isset($_POST['User'])) {
            $_POST['User']['email'] = $model->email; //don't allow email changing
            $model->attributes = $_POST['User'];
            $savedpass = $validatepass = 0;
            if ($_POST['User']['oldpassword'] != '') {

                $savedpass = $model->password;
                $validatepass = $model->hash($_POST['User']['oldpassword']);
                if ($savedpass == $validatepass) {
                    $model->password = User::simple_encrypt($_POST['User']['newpassword']);
                } else {
                    Yii::app()->user->setFlash('Passchange', 'The old password entered is wrong!');
                    $this->redirect(array('settings'));
                }
            }

            if ($model->save(false)) {
                Yii::app()->user->setFlash('Passchange', 'Your details have been updated successfully!');
                if ($savedpass == $validatepass) {
                    Yii::app()->user->setFlash('Passchange', 'Your password has been updated successfully!');
                }
                if ($model->active == 0) {
                    $this->redirect(array('logout'));
                }
                $this->redirect(array('settings'));
            }
        }
        $this->render('settings', array('model' => $model));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $report = false;
        if (isset($_POST['Report'])) {
            $model = new Report;
            $model->attributes = $_POST['Report'];
            $model->date_create = date('Y-m-d H:i:s');
            $model->page = filter_input(INPUT_SERVER, 'HTTP_REFERER');
            if ($model->save())
                $report = true;
        }

        $error = Yii::app()->errorHandler->error;
        $error['report'] = $report;

        if (Yii::app()->request->isAjaxRequest) {
            echo $error['message'];
            return;
        }
        $this->renderPartial('error', $error);
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionSupport() {

        $faqs = Faq::model()->findAll();
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";
                mail(Yii::app()->params['support_email'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contact us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('support', array('model' => $model, 'faqs' => $faqs));
    }

    public function actionUnsubscribe($id) {
        if ($id == Yii::app()->user->id) {
            $user = User::model()->findByPk($id);
            $user->subscribed_package_renewal_date = "";
            $user->subscribed_package_id = "";
            $user->subscription_token = "";
            $user->subscribe_status = 0;
            if ($user->save(false)) {
                //remove the number of websites exceeded the quota
                $websites = Website::model()->findAllByAttributes(array('user_id' => $user->id));
                $quote = Settings::model()->findByPk(1)->default_site_num;
                if (count($websites) > $quote) {
                    $i = 1;
                    foreach ($websites as $ws) {
                        if ($i > $quote) {
                            $ws->delete();
                        }
                        $i++;
                    }
                }
            }
            Yii::app()->user->setFlash('wrong', 'You have been unsubscribed successfully.');
            $this->redirect(array('subscribe'));
        } else {
            Yii::app()->user->setFlash('wrong', 'Wrong! you are using a wrong link.');
            $this->redirect(array('subscribe'));
        }
    }

    public function beforeAction($action) {
        if (Yii::app()->user->isGuest && (Yii::app()->controller->action->id == 'subscribeNow' || Yii::app()->controller->action->id == 'checkoutExpress'))
            $this->redirect(Yii::app()->homeUrl . '/home/login');
        elseif (Yii::app()->user->isGuest && Yii::app()->controller->action->id != 'login')
            $this->redirect(Yii::app()->homeUrl);

        return true;
    }

}
