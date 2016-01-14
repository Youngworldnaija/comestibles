<?php

/**
 

/**
 * @package comestibles.widgets
 * @since 2016
 * @author Piro
 */
class PassportHeaderWidget extends HWidget
{

    public $user;
    protected $isProfileOwner = false;


    public function init()
    {
    
        /**
         * Try to autodetect current user by controller
         */
        if ($this->user === null) {
            $this->user = $this->getController()->getUser();
        }
        
        
        $this->isProfileOwner = true;

        // Only include uploading javascripts on own user profiles
       // if ($this->isProfileOwner) {
            $assetPrefix = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../resources', true, 0, defined('YII_DEBUG'));
            Yii::app()->clientScript->registerScriptFile($assetPrefix . '/passportHeaderImageUpload.js');

            Yii::app()->clientScript->setJavascriptVariable('userGuid', 'gyhujjkkgfdss');
		Yii::app()->clientScript->setJavascriptVariable('csrfValue', Yii::app()->request->getCsrfToken());
		Yii::app()->clientScript->setJavascriptVariable('guid', $this->user->guid);
		
            Yii::app()->clientScript->setJavascriptVariable('profileImageUploaderUrl', Yii::app()->createUrl('//restaurant/bannerimageupload'));
           

       // }
    }

    public function run()
    {
        $this->render('passport', array(
            'user' => $this->user,
            'isProfileOwner' => $this->isProfileOwner
        ));
    }

}

?>
