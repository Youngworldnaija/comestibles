<?php


class BannerImageWidget extends HWidget
{

    public $model;
    protected $isProfileOwner = false;


    public function init()
    {
    
        /**
         * Try to autodetect current user by controller
         */
        
        
        
        $this->isProfileOwner = true;

        // Only include uploading javascripts on own user profiles
       // if ($this->isProfileOwner) {
            $assetPrefix = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../resources', true, 0, defined('YII_DEBUG'));
            Yii::app()->clientScript->registerScriptFile($assetPrefix . '/BannerImageUpload.js');

            Yii::app()->clientScript->setJavascriptVariable('userGuid', $this->model->guid);
            Yii::app()->clientScript->setJavascriptVariable('profileImageUploaderUrl', Yii::app()->createUrl('//restaurant/bannerimageupload'));
           

       // }
    }

    public function run()
    {
        $this->render('passport', array(
            'user' => $this->model,
            'isProfileOwner' => $this->isProfileOwner
        ));
    }

}

?>
