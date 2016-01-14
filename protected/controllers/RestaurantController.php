<?php

class RestaurantController extends Controller
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
			'postOnly + delete + bannerimageupload', // we only allow deletion via POST request
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
				'actions'=>array('index','view','signup','create','bannerimageupload'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionCreate() {
		if(isset($_POST['details'])){
			$model = new RestaurantForm('details');
			$model->guid = $this->getPageState('guid');
			$this->checkPageStates($model, $_POST['RestaurantForm']);
			$view = 'create';
		}
		elseif(isset($_POST['choice'])){
			$model = new RestaurantForm('details');
			$this->checkPageStates($model, $_POST['RestaurantForm']);
			if($model->validate()){
				$view = 'choice';
				$model->scenario = 'choice';
			}
			else {
				$view = 'create';
			}
		}
		elseif(isset($_POST['backtochoice'])){
			$model = new RestaurantForm('choice');
			$this->checkPageStates($model, $_POST['RestaurantForm']);
		
				$view = 'choice';
				$model->scenario = 'choice';
			
		}
		elseif(isset($_POST['displaychoice'])){
			$model = new RestaurantForm('choice');
			$this->checkPageStates($model, $_POST['RestaurantForm']);
			if($model->validate()){
				if($model->choice === '0'){
					$view = 'createuser';
					$model->scenario = 'createuser';
				}
				else {
					$view = 'linkuser';
					$model->scenario = 'linkuser';
				}
			}
		} 
		elseif(isset($_POST['done'])){
			$model = new RestaurantForm;
			$model->attributes = $this->getPageState('page',array());
			$model->attributes = $_POST['RestaurantForm'];
			if($model->choice === '0'){
				$model->scenario = 'createuser';
				$view = 'createuser';
			} 
			else {
				$model->scenario = 'linkuser';
				$view = 'linkuser';
			}
			if($model->validate()){
				$guid = $this->getPageState('guid',null);
				$restaurant = $model->saveForm($guid);
				if(!is_null($restaurant)){
					$this->clearPageStates();
					$this->render('success',array('restaurant'=>$restaurant));
				} 
				else {
					throw new Exception('Error in fulfilling request, please try again');
				}
			} 
			
			
		}
		else {
			$this->clearPageStates();
			$view = 'create';
			$model = new RestaurantForm;
			$model->guid = UUID::v4();
			$this->setPageState('guid',$model->guid);
			$model->scenario = 'details';
		}
		
		$this->render($view, array('model'=>$model));
	}
	
	private function checkPageStates($model, $data) {
		$model->attributes = $this->getPageState('page',array());
		$model->attributes = $data;
		$this->setPageState('page', $model->attributes);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionSignup()
	{
		//$restaurant=new Restaurant;
		//$restaurant->guid = UUID::v4();
		//$choice = new ChoiceForm;
		//$user = new UserForm;
		//$link = new LinkForm;
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		


        

		if(isset($_POST['Food']))
		{
			$view='create';
			$model= new Restaurant;
			$states = $this->getPageState('restaurant',array());
			$model->attributes = $states['restaurant'];
			//$model->guid = $this->getPageState('guid');
			$extra = $states;
			
			
		} elseif(isset($_POST['Choice'])){
			$restaurant = new Restaurant;
			if(isset($_POST['Restaurant'])){
				$restaurant->attributes=$_POST['Restaurant'];
				$restaurant->guid = $this->getPageState('guid');
				if($restaurant->validate()){
					$this->checkPageState('restaurant',$restaurant->attributes);
					$view='choice';
					$model= new ChoiceForm;
					$extra = $this->getPageState('restaurant',array());
				} else{									//model did not validate
					$view = 'create';
					$model = $restaurant;
				}
			} else {
				$view='choice';
				$model= new ChoiceForm;
				//$restaurant->attributes = $this->getPageState('restaurant');
			}
			/*if($restaurant->validate()){
				$this->checkPageState('restaurant',$restaurant->attributes);
				$this->render('choice',array('model'=>$choice));
			$choice->attributes = $_POST['ChoiceForm'];
			if($choice->validate()){
				$this->checkPageState('choice',$choice->attributes);
				if($choice->choice === '0'){
					$this->render('createuser',array('model'=>$user));
				}else{
					$this->render('linkuser',array('model'=>$link,));
				}
			}*/
		} elseif(isset($_POST['pickadmin'])){
			$user =new UserForm;
			$link = new LinkForm;
			if(isset($_POST['ChoiceForm'])){
				$choice = new ChoiceForm;
				$choice->attributes = $_POST['ChoiceForm'];
				if($choice->validate()){
					$this->checkPageState('choice',$choice->attributes);
					if($choice->choice === '0'){
						$view = 'createuser';
						$model = $user;
					} else {
						$view = 'linkuser';
						$model = $link;
					}
				} else {
					$view = 'choice';
					$model = $choice;
				}
			} else{
				$view = 'choice';
				$model = new ChoiceForm;
				$model->attributes = $this->returnState('choice');
			}
		}
		elseif(isset($_POST['done'])){
			$states = $this->getPageState('restaurant',array());
			
			if($states['choice']=== '0' && isset($_POST['createuser'])){
				$user->attributes = $_POST['UserForm'];
				if($user->validate()){
				$admin = new User;
				$admin->attributes = $user->attributes;
				//$transaction = Yii::app()->db->beginTransaction();
					//try{
						$admin->save();
						$restaurant->attributes = $states['restaurant'];
						$restaurant->owner_id = $admin->id;
						if(!$restaurant->save()){
							throw new Exception('Error in fulfilling request, please try again');
						}
						//$transaction->commit();
						$this->redirect(array('view','id'=>$restaurant->id));
					//}
					//catch(Exception e){
						//$transaction->rollback();
						//$this->render('createuser',array('model'=>$user));
					//}
				}
				
			} else {
				$linked = $_POST['LinkForm']; 
				$admin = new UserIdentity($linked['username'],$linked['password']);
				if($admin->authenticate()){
					$restaurant->attributes = $states['restaurant'];
					$restaurant->owner_id = $admin->getId();
					$guid = UUID::v4();
					$set = $this->getPageState('guid',null);
					if(isset($set)){
					$restaurant->guid =  $this->getPageState('guid');
					}else{
						$restaurant->guid = $guid;
					}
					if($restaurant->save()){
						$this->redirect(array('view','id'=>$restaurant->id));
					}
				}
				
			}
				
		} else {
			$view='create';
			$model= new Restaurant;
				$model->guid = UUID::v4();//'$restaurant';
				$this->setPageState('guid',$model->guid);
		}
		
		//$this->setPageState('guid',$restaurant->guid);
		if(isset($extra)){
			$extra = $extra;
		} else{
			$extra = null;
		}
		$this->render($view,array(
			'model'=>$model,
			'extra'=>$extra,
		));
	}
	
	private function checkPageState($model, $data){
		$saved = $this->getPageState('restaurant',array());
		$saved[$model] = $data;
		$this->setPageState('restaurant',$saved);
	
	}

	private function returnState($index){
		$saved = $this->getPageState('restaurant',array());
		//if(array_key_exists($index,$saved)){
			return $saved[$index];
		//}
		//return array();
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

		if(isset($_POST['Restaurant']))
		{
			$model->attributes=$_POST['Restaurant'];
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$assetPrefix = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../css', true, 0, defined('YII_DEBUG'));
            Yii::app()->clientScript->registerCssFile($assetPrefix . '/set.css');
		$model = Restaurant::model()->findAll();
		$dataProvider=new CActiveDataProvider('Restaurant');
		$this->render('list',array(
			'dataProvider'=>$dataProvider,
			'models'=>$model
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Restaurant('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Restaurant']))
			$model->attributes=$_GET['Restaurant'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Restaurant the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Restaurant::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Restaurant $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='restaurant-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	   /**
     * Handle the passport image upload
     */
    public function actionBannerImageUpload()
    {

        $model = new UploadPassportImageForm();

        $json = array();

        //$model->image = CUploadedFile::getInstance($model, 'image');
        $files = CUploadedFile::getInstancesByName('passportfiles');
        $file = $files[0];
        $model->image = $file;
		//$model->guid = $_POST['guid'];

        if ($model->validate()) {

            $json['error'] = false;

            $passportImage = new PassportImage($_REQUEST['guid']);
            $passportImage->setNew($model->image);

            $json['name'] = "";
            $json['url'] = $passportImage->getUrl();
            $json['size'] = $model->image->getSize();
            $json['deleteUrl'] = "";
            $json['deleteType'] = "";
        } else {
            $json['error'] = true;
            $json['errors'] = $model->getErrors();
        }


        return $this->renderJson(array('files' => $json));
    }

    /**
     * Crops the passport image of the user
     */
    public function actionCropPassportImage()
    {

        $model = new CropPassportImageForm;
        $passportImage = new PassportImage(Yii::app()->user->id);

        if (isset($_POST['CropPassportImageForm'])) {
            $_POST['CropPassportImageForm'] = Yii::app()->input->stripClean($_POST['CropPassportImageForm']);
            $model->attributes = $_POST['CropPassportImageForm'];
            if ($model->validate()) {
                $passportImage->cropOriginal($model->cropX, $model->cropY, $model->cropH, $model->cropW);
                //$this->htmlRedirect(Yii::app()->user->getModel()->getUrl());
				$json = $passportImage->getUrl();
				echo CJSON::encode($json);
            }
        }

        $this->renderPartial('cropProfileImage', array('model' => $model, 'profileImage' => $passportImage, 'user' => Yii::app()->user->getModel()), false, true);
    }

    /**
     * Deletes the passport image or passport banner
     */
    public function actionDeletePassportImage()
    {
        $this->forcePostRequest();

        $type = 'passport';

        $json = array('type' => $type);

        $image = NULL;
        if ($type == 'passport') {
			
            $image = new PassportImage(Yii::app()->user->guid.'passport');
        } 

        if ($image) {
            $image->delete();
            $json['defaultUrl'] = $image->getUrl();
        }

        $this->renderJson($json);
    }
}
