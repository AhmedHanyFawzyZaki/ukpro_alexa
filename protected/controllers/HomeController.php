<?php

class HomeController extends FrontController {

    public $layout = '//layouts/front_main';

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

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {

        if (isset($_GET['refid'])) {
            Yii::app()->user->setState('ref_id', $_GET['refid']);
        }

        $subscribe_packages = SubscribePackage::model()->findAll(array('limit' => 3, 'order' => 'id DESC'));
        $banners = Banner::model()->findAll(array('condition' => 'publish = 1'));
        $ranks = Rank::model()->findAll();
        $features = Features::model()->findAll();
        $howWorks = HowWork::model()->findAll();
        $this->render('index', array('subscribe_packages' => $subscribe_packages, 'banners' => $banners, 'ranks' => $ranks, 'features' => $features, 'howWorks' => $howWorks));
    }

    public function actionFaq() {
        $model = Faq::model()->findAll(array('condition' => 'active = 1'));
        $this->render('faq', array('faqs' => $model));
    }

    public function actionPages() {

        $page = Pages::model()->findByAttributes(array('slug' => $_REQUEST['slug'], 'publish' => 1));
        if ($page->layout == 1) {
            $this->render('page_one', array('page' => $page));
        } elseif ($page->layout == 2) {
            $this->render('page_two', array('page' => $page));
        } else {
            $this->render('page_three', array('page' => $page));
        }
    }

    public function actionTour() {

        $howWorks = HowWork::model()->findAll();
        $ranks = Rank::model()->findAll();
        $this->render('tour', array('ranks' => $ranks, 'howWorks' => $howWorks));
    }

    public function actionSupport() {
        $model = new Support;
        if (isset($_POST['Support'])) {
            $model->attributes = $_POST['Support'];
            $attachments = array();
            $uploadedFiles = CUploadedFile::getInstances($model, 'attachment');
            if ($uploadedFiles) {
                $rnd = time();
                $i = 0;
                foreach ($uploadedFiles as $uploadFile) {
                    $fileName = "{$rnd}-{$uploadFile}";  // random number + file name
                    $attachments[$i] = $fileName;
                    $uploadFile->saveAs(Yii::app()->basePath . '/../media/attachments/' . $fileName);
                    $i++;
                }
            }
            $model->attachment = implode(',', $attachments);
            if ($model->save()) {
                $mail = new YiiMailer();
                $mail->setFrom($model->email);
                $mail->setTo(Yii::app()->params['support_email']);
                $mail->setSubject($model->subject);
                $message = $model->content . '  <br>';
                if ($attachments) {
                    for ($i = 0; $i < count($attachments); $i++) {
                        $message .= CHtml::link(Yii::app()->request->getBaseUrl(true) . '/media/attachments/' . $attachments[$i], array('class' => 'hello')) . ' <br>';
                    }
                }
                $mail->setBody($message);
                if ($mail->send()) {
                    Yii::app()->user->setFlash('support', 'Thank you for contacting us. We will respond to you as soon as possible.');
                } else {
                    Yii::app()->user->setFlash('error', 'Error while sending email: ' . $mail->getError());
                }
                $this->refresh();
            }
        }
        $this->render('support', array('model' => $model));
    }

    public function actionBuy() {

        $packges = Package::model()->findAll();
        $this->render('buy', array('packges' => $packges));
    }

    public function actionFeatures() {

        $features = Features::model()->findAll();
        $this->render('features', array('features' => $features));
    }

    public function actionBlog() {

        if (isset($_REQUEST['cat'])) {
            $cat = BlogCategory::model()->findByAttributes(array('slug' => $_REQUEST['cat']));
            $blogs = Blog::model()->findAll(array('condition' => 'publish = 1 and cat_id=' . $cat->id, 'order' => 'id DESC'));
        } else {
            $blogs = Blog::model()->findAll(array('condition' => 'publish = 1', 'order' => 'id DESC'));
        }
        $tops = BlogComment::model()->findAll(array('group' => 'blog_id'));
        $categories = BlogCategory::model()->findAll();

        $this->render('blog', array('blogs' => $blogs, 'categories' => $categories, 'tops' => $tops));
    }

    public function actionBlogDetails() {

        $blog = Blog::model()->find(array('condition' => 'slug="' . $_REQUEST['slug'] . '"'));
        $categories = BlogCategory::model()->findAll();
        if (isset($_POST['comment'])) {
            if (Yii::app()->user->isGuest) {
                $this->redirect('home/login');
            } else {
                $comment = new BlogComment;
                $comment->user_id = Yii::app()->user->id;
                $comment->comment = $_POST['comment'];
                $comment->blog_id = $blog->id;
                $comment->save();
            }
        }
        $tops = BlogComment::model()->findAll(array('group' => 'blog_id'));
        $comments = BlogComment::model()->findAll(array('condition' => 'blog_id =' . $blog->id, 'order' => 'id DESC'));

        $this->render('blog_details', array('blog' => $blog, 'categories' => $categories, 'tops' => $tops, 'comments' => $comments));
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

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['support_email'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    public function actionRegister() {
        $model = new User('register');

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->username = $_POST['User']['email'];
            $model->groups_id = 3;
            $model->points = Yii::app()->params['user_intial_points'];
            $key = Helper::GenerateRandomKey();
            $model->active_code = $key;
            if ($model->save()) {
                /*                 * ***Increase the refferal points if the registered user is referred by someone***** */
                if (Yii::app()->user->hasState('ref_id')) {
                    $user = User::model()->findByPk(Yii::app()->user->getState('ref_id'));
                    if ($user) {
                        $ref = new Referrals;
                        $ref->user_id = $model->id;
                        $ref->referral_id = $user->id;
                        $ref->active = 0; //i will change this to be active on confirmation
                        $ref->save(false);
                    }
                }

                $mail = new YiiMailer();
                $mail->setFrom(Yii::app()->params['adminEmail'], Yii::app()->name . ' Admininstrator');
                $mail->setTo($model->email);
                $mail->setSubject(' New customer profile notification');
                $message = '
                                <br/>
                                User account information  <br/>
                                ________________________________________<br/>
                                Username:  ' . $model->username . '<br/>
                                Password:   ' . $model->simple_decrypt($model->password) . '<br/>
                                Activation Link: 	' . Yii::app()->request->getBaseUrl(true) . '/home/active/hash/' . $model->active_code;
                $mail->setBody($message);
                if ($mail->send()) {
                    Yii::app()->user->setFlash('register-success', 'Thank you! An activation email has been sent to your email address.');
                } else {
                    Yii::app()->user->setFlash('error', 'Error while sending email: ' . $mail->getError());
                }
            }
        }
        $this->render('register', array(
            'model' => $model,
        ));
    }

    public function actionActive($hash) {
        $criteria = new CDbCriteria;
        $criteria->condition = 'active_code=:Hash';
        $criteria->params = array(':Hash' => $hash);
        $user_found = User::model()->find($criteria);
        if (count($user_found) == 0) {
            $flag = 0;
            Yii::app()->user->setFlash('ErrorMsg', 'Sorry you have followed a wrong link .');
        } else {
            $flag = 1;
        }
        $user_found->active_code = '';
        $user_found->active = 1;
        if ($user_found->save(false)) {
            $ref = Referrals::model()->findByAttributes(array('user_id' => $user_found->id, 'active' => 0));
            if ($ref) {
                $ref->active = 1;
                if ($ref->save(false)) {
                    $user = User::model()->findByPk($ref->referral_id);
                    $user->points+=Yii::app()->params['referral_points'];
                    $user->save(false);
                }
            }
        }
        Yii::app()->user->setFlash('active_success', ' Please Login with your Username and Password');
        $this->redirect(array('home/login'));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        if (!Yii::app()->user->isGuest) {
            $this->redirect(array('index'));
        }
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
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
                    $this->redirect(array('userpanel/index'));
                } else {
                    $this->redirect(array('logout'));
                }
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionForgotpass() {

        $model = new User;
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];

            $criteria = new CDbCriteria;
            $criteria->condition = 'email=:email';
            $criteria->params = array(':email' => $model->email);
            $usermodel = User::model()->find($criteria);
            if (count($usermodel) == 0) {
                Yii::app()->user->setFlash('ErrorMsg', 'Sorry, there\'s no account associated with that email address');
            } else {

                //create randomkey
                $key = Helper::GenerateRandomKey();
                $usermodel->pass_reset = 1;
                $usermodel->pass_code = $key;
                $usermodel->save(false);

                $mail = new YiiMailer();
                $mail->setFrom(Yii::app()->params['adminEmail'], Yii::app()->name . ' Admininstrator');
                $mail->setTo($model->email);
                $mail->setSubject(Yii::app()->name . ' Password reset');

                $message = 'Dear customer,

					Please follow this link to reset your password :
					Username:' . $usermodel->username . '
					URL: 	' . Yii::app()->request->getBaseUrl(true) . '/home/reset/hash/' . $usermodel->pass_code . '

					';
                $mail->setBody($message);
                if ($mail->send()) {
                    Yii::app()->user->setFlash('forget-success', 'Check <b> ' . $usermodel->email . ' </b> for the confirmation email. It will have a link to reset your password..');
                } else {
                    Yii::app()->user->setFlash('email-error', 'Error while sending email: ' . $mail->getError());
                }
            }
        }
        $this->render('forgotpass', array('model' => $model));
    }

    public function actionReset($hash) {
        $criteria = new CDbCriteria;
        $criteria->condition = 'pass_code=:Hash and pass_reset=1';
        $criteria->params = array(':Hash' => $hash);
        $user_found = User::model()->find($criteria);
        if (count($user_found) == 0) {
            Yii::app()->user->setFlash('ErrorMsg', 'Sorry you have followed a wrong link .');
        }
        $model = new User('passreset');
        if (isset($_POST['User']) and count($user_found) != 0) {
            $model->attributes = $_POST['User'];
            $user_found->pass_reset = 0;
            $user_found->pass_code = '';
            $user_found->password = $model->newpassword = User::hash($_POST['User']['newpassword']);
            $user_found->save(false);
            Yii::app()->user->setFlash('resetMsg', ' Please Login with your new credentials');
            $this->redirect(array('home/login'));
        }
        $this->render('resetpass', array('model' => $model));
    }

    public function actionRecurringPayment() {
        $recurring_profile = trim($_REQUEST['recurring_payment_id']);
        if ($recurring_profile == '') {
            $recurring_profile = trim($_REQUEST['PROFILEID']);
        }
        if ($recurring_profile) {
            if ($_REQUEST['payment_status'] == 'Completed') {
                $criteria = new CDbCriteria;
                $criteria->condition = 'profile_id=:profile_id';
                $criteria->params = array(':paypal_profile_id' => $recurring_profile);
                $user = User::model()->find($criteria);

                $NewDate = Date('Y-m-d H:i:s', strtotime("+30 days"));
                $user->subscribed_package_renewal_date = $NewDate;
                $user->save(false);
            } else {
                $criteria = new CDbCriteria;
                $criteria->condition = 'profile_id=:profile_id';
                $criteria->params = array(':paypal_profile_id' => $recurring_profile);
                $user = User::model()->find($criteria);

                //$NewDate = Date('Y-m-d H:i:s', strtotime("+30 days"));
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
            }
        }
    }

}
