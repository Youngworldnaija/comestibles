<?php


class UploadBannerImageForm extends CFormModel {

    /**
     * @var String uploaded image
     */
    public $image;
	public $guid;

    /**
     * Declares the validation rules.
     *
     * @return Array Validation Rules
     */
    public function rules() {
        return array(
            array('image,guid', 'required'),
            array('image', 'file', 'types' => 'jpg, png, jpeg, tiff', 'maxSize' => 3 * 1024 * 1024),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'image' => Yii::t('base', 'New passport image'),
			'guid' =>'Restaurant Guid',
        );
    }

}
