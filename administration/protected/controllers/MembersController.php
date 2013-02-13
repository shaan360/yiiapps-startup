<?php

class MembersController extends Controller
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
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('create','update','suggesttags'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
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
            $model=$this->loadModel($id);
             $model->saveCounters(array('views' => 1));
		$this->render('view',array(
			'model'=>$model,
                    
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Members;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Members']))
		{
			$model->attributes=$_POST['Members'];
			if ($model->image = CUploadedFile::getInstance($model, 'image')) {
                    $ext = $model->image->getExtensionName();

                    $imagename = date('dmy') . time() . rand() . '-tolodo';

                    $newName = $model->image;
                    $model->image = $imagename . '.' . $ext;


                    $newName->saveAs(Yii::getPathOfAlias('media').'/members/original/' . $imagename . '.' . $ext);

                    Yii::import('common.extensions.image.Image');
                    $thumbnail = new Image(Yii::getPathOfAlias('media').'/members/original/' . $imagename . '.' . $ext);
                    $thumbnail->resize(180, 180, Image::AUTO); //

                    $optimized = new Image(Yii::getPathOfAlias('media').'/members/original/' . $imagename . '.' . $ext);
                    $optimized->resize(600, 400, Image::AUTO);

                    $thumbnail->save(Yii::getPathOfAlias('media').'/members/thumbnails/' . $imagename . '.' . $ext);
                    $optimized->save(Yii::getPathOfAlias('media').'/members/optimized/' . $imagename . '.' . $ext);
                } else {
                    $model->image = 'no-images.png';
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
                 $model_old_data = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Members']))
		{
			$model->attributes=$_POST['Members'];
                       if ($model->image = CUploadedFile::getInstance($model, 'image')) {
                    $ext = $model->image->getExtensionName();

                    $imagename = date('dmy') . time() . rand() . '-tolodo';

                    $newName = $model->image;
                    $model->image = $imagename . '.' . $ext;


                    $newName->saveAs(Yii::getPathOfAlias('media').'/members/original/' . $imagename . '.' . $ext);

                    Yii::import('common.extensions.image.Image');
                    $thumbnail = new Image(Yii::getPathOfAlias('media').'/members/original/' . $imagename . '.' . $ext);
                    $thumbnail->resize(180, 180, Image::AUTO); //

                    $optimized = new Image(Yii::getPathOfAlias('media').'/members/original/' . $imagename . '.' . $ext);
                    $optimized->resize(600, 400, Image::AUTO);

                    $thumbnail->save(Yii::getPathOfAlias('media').'/members/thumbnails/' . $imagename . '.' . $ext);
                    $optimized->save(Yii::getPathOfAlias('media').'/members/optimized/' . $imagename . '.' . $ext);
                } else {
                    $model->image = $model_old_data->image;
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Members');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Members('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Members']))
			$model->attributes=$_GET['Members'];

		$this->render('admin',array(
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
		$model=Members::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='members-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionSuggestTags() {
        if (isset($_GET['q']) && ($keyword = trim($_GET['q'])) !== '') {
            $tags = Tag::model()->suggestTags($keyword);
            if ($tags !== array())
                echo implode("\n", $tags);
        }
    }
}
