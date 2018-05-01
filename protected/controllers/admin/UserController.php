<?php

class UserController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
       
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
		//	'accessControl', // perform access control for CRUD operations
		);
	}
        
        public function actions() {
        return array(
            'order' => array(
            'class' => 'ext.yiisortablemodel.actions.AjaxSortingAction',
            ),
        );
    	}
        
       	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','upload'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
                        array('allow', 'actions' => array('order'), 'users' => array('@')),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            $this->render('view',array(
                'model'=>$this->loadModel($id),
            ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $model=new User;

            $rnd = rand(0,9999);  // generate random number between 0-9999
            $uploadedFile=CUploadedFile::getInstance($model,'image');

            if(! empty ($uploadedFile)){
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = $fileName;
                $uploadedFile->saveAs(Yii::app()->basePath.'/../media/members/'.$fileName);
            }

         
            // Uncomment the following line if AJAX validation is needed
             $this->performAjaxValidation($model);
            if(isset($_POST['User']))
            {
                $model->attributes=$_POST['User'];
                $model->active=1;
                if($model->save()){
                    $this->redirect(array('view','id'=>$model->id));
                }
            }

            $this->render('create',array(
                            'model'=>$model
            ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $model=$this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);

            if(isset($_POST['User']))
            {
              
              if( $model->image != ''){
                    $_POST['User']['image'] = $model->image;
                } 
                
                $model->attributes=$_POST['User'];
                $savedpass=$validatepass=0;
                if( $_POST['User']['oldpassword'] != ''){
                    
                   $savedpass=$model->password;
                   $validatepass= $model->hash($_POST['User']['oldpassword']) ;
                    if($savedpass == $validatepass)
                    {
                        $model->password= User::simple_encrypt($_POST['User']['newpassword']);		
	
                     }else{
                      Yii::app()->user->setFlash('Passchange','The old password is wrong!');   
                         
                     }
                   
                }
                
                $uploadedFile=CUploadedFile::getInstance($model,'image');

               if(! empty ($uploadedFile)){
                   if($model->image =='')
                    {
                        $rnd = rand(0,9999);
                        $fileName = "{$rnd}-{$uploadedFile}";
                        $model->image = $fileName;
                        //echo $fileName; die;
                    }
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../media/members/'.$model->image);
                }
                if($model->save())
                {
                    if($savedpass == $validatepass){
                       $this->redirect(array('view','id'=>$model->id));
                    }
                       
                }
            }

            $this->render('update',array(
                    'model'=>$model
            ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            if(Yii::app()->request->isPostRequest)
            {

                if($id==1){
                    throw new CHttpException(400,'Sorry you can not delete the super admin user.');
                }
                // we only allow deletion via POST request
                $this->loadModel($id)->delete();

                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
            else
                throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            
        $model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
        
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
            $model=User::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
            return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
            if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
	}

	
	public function actionUpload()
	{
            $output_dir= Yii::app()->basePath.'/../media/members/';// folder for uploaded files
            if(isset($_FILES["image"]))
            {
                $ret = array();
                $error =$_FILES["image"]["error"];
                if(!is_array($_FILES["image"]["name"])) //single file
                {
                    $fileName = $_FILES["image"]["name"];
                    move_uploaded_file($_FILES["image"]["tmp_name"],$output_dir. $_FILES["image"]["name"]);
                    chmod($output_dir.$_FILES["image"]["name"], 0777);
                    $ret[$fileName]= $output_dir.$fileName;
                }
                echo json_encode($ret);
                //echo $fileName;
            }
	}
}
