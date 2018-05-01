<?php

class FeaturesController extends AdminController
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
			/*'accessControl', // perform access control for CRUD operations*/
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
				'actions'=>array('index','view'),
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
		$model=new Features;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Features']))
		{
                    $model->attributes=$_POST['Features'];
                    $rnd = time();  // generate random number between 0-9999
                    $uploadedFile=CUploadedFile::getInstance($model,'home_image');
                    $uploadedFile2=CUploadedFile::getInstance($model,'inner_image');

                    if(! empty ($uploadedFile)){
                        $fileName1 = "{$rnd}-{$uploadedFile}";  // random number + file name
                        $model->home_image = $fileName1;
                        $uploadedFile->saveAs(Yii::app()->basePath.'/../media/features/'.$fileName1);
                    } 
                    if(! empty ($uploadedFile2)){
                        $fileName2 = "{$rnd}-{$uploadedFile2}";  // random number + file name
                        $model->inner_image = $fileName2;
                        $uploadedFile2->saveAs(Yii::app()->basePath.'/../media/features/'.$fileName2);
                    } 
                    if($model->save())
                        $this->redirect(array('view','id'=>$model->id));
		}
		$this->render('create',array(
			'model'=>$model,
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['Features']))
		{
                    if( $model->home_image != ''){
                        $_POST['Features']['home_image'] = $model->home_image;
                    }
                    if( $model->inner_image != ''){
                        $_POST['Features']['inner_image'] = $model->inner_image;
                    }
			$model->attributes=$_POST['Features'];
                        $uploadedFile=CUploadedFile::getInstance($model,'home_image');
                        $uploadedFile2=CUploadedFile::getInstance($model,'inner_image');
                    if(! empty ($uploadedFile)){
                        if($model->home_image == ''){
                            $rnd = time();
                            $fileName = "{$rnd}-{$uploadedFile}";
                            $model->home_image = $fileName;
                        }
                        $uploadedFile->saveAs(Yii::app()->basePath.'/../media/features/'.$model->home_image);
                    }
                    if(! empty ($uploadedFile2)){
                        if($model->inner_image == ''){
                            $rnd = time();
                            $fileName2 = "{$rnd}-{$uploadedFile2}";
                            $model->inner_image = $fileName2;
                        }
                        $uploadedFile2->saveAs(Yii::app()->basePath.'/../media/features/'.$model->inner_image);
                    }
                    if($model->save())
                        $this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$model=new Features('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Features']))
			$model->attributes=$_GET['Features'];

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
		$model=Features::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='features-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
