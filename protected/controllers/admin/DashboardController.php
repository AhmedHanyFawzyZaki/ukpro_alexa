<?php
class DashboardController extends Controller
{
    public $pageTitlecrumbs;
    public function init(){
        // set the default theme for any other controller that inherit the admin controller
        Yii::app()->theme = 'bootstrap';
    }
    

    public function actionIndex()
    {
        $this->layout='column2';
        //$this->render('index');
        //groups id 1 form super admin and 2 for admin 
        if((! Yii::app()->user->isGuest)  and (Yii::app()->user->group == 1 or Yii::app()->user->group == 2) )
        {
            $this->render('dashboard');
        }else{
            $model=new LoginForm;
            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                $model->attributes=$_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if($model->validate() && $model->login())
                $this->redirect(array('admin/dashboard/index')	);
            }

            // display the login form
            $this->renderPartial('login',array('model'=>$model));
        }
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl.'/dashboard');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('dashboard/error', $error);
        }
    }

    public function actionAjaxRequest() 
    {
        if (Yii::app()->user->getState('wide_screen') == 1) {
            Yii::app()->user->setState('wide_screen', '0');
        } else if (Yii::app()->user->getState('wide_screen') == 0) {
            Yii::app()->user->setState('wide_screen', '1');
        }
        Yii::app()->end();
    }
    
    public function actionForgotpass()
    {
        
        $this->layout='column2';
        $model2=new LoginForm;
        $model = new User;
        if(isset($_POST['User']))
        {
           
            $model->attributes=$_POST['User'];
            $criteria=new CDbCriteria;
            $criteria->condition='email=:email';
            $criteria->params=array(':email'=>$_POST['User']['email']);
            $usermodel=User::model()->find($criteria);
            if(count($usermodel) ==0){
                 //echo "sdfsdf";
                Yii::app()->user->setFlash('ErrorMsg','Sorry, there\'s no account associated with that email address');
            }else
            {
                //create random key
                $key = Helper::GenerateRandomKey();
                $usermodel->pass_reset=1;
                $usermodel->pass_code=$key;
                $usermodel->save(false);
                $mail = new YiiMailer();
                $mail->setFrom(Yii::app()->params['adminEmail'],' EHRlinked Admininstrator');
                $mail->setTo($model->email);
                $mail->setSubject('EHRlinked Password reset');
                $message='Dear customer,
                        Please follow this link to reset your password :
                        Username:'.$usermodel->username.'
                        URL: 	'.Yii::app()->params['webSite'].'/admin/dashboard/reset/hash/'.$usermodel->pass_code.'

                        ';
                $mail->setBody($message);

                if ($mail->send()) {
                        Yii::app()->user->setFlash('Reset-success','Thank you! An email has been sent to your email address.');
                } else {
                        Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
                }
                Yii::app()->user->setFlash('ErrorMsg','Check <b> '.$usermodel->email.' </b> for the confirmation email. It will have a link to reset your password..');
                }
        }

        $this->redirect('index');
    }
    
    public function actionReset($hash)
    {
        //$this->layout='column2';
        $criteria=new CDbCriteria;
        $criteria->condition='pass_code=:Hash and pass_reset=1';
        $criteria->params=array(':Hash'=>$hash);
        $user_found=User::model()->find($criteria);
        if(count($user_found) ==0){
            $flag=0;
            Yii::app()->user->setFlash('ErrorMsg','Sorry you have followed a wrong link .');
        }else{
            $flag=1;
        }
        $model= new User('passreset');
        if(isset($_POST['User']) and count($user_found)!=0)
        {
            $model->attributes=$_POST['User'];
            $user_found->pass_reset=0;
            $user_found->pass_code='';
            $user_found->password=$model->newpassword=$_POST['User']['newpassword'];

            $user_found->save(false);
            Yii::app()->user->setFlash('ErrorMsg', ' Please Login with your new credentials');

            $this->redirect(array('index'));
        }
        $this->renderPartial('resetpass' ,array('model'=>$model,'flag'=>$flag));
	}
}
