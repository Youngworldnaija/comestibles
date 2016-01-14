<?php

 
class CropBannerImageForm extends CFormModel {

    /**
     * @var Int X Coordinates of the area
     */
    public $cropX;

    /**
     * @var Int Y Coordinates of the area
     */
    public $cropY;

    /**
     * @var Int is the width of the area
     */
    public $cropW;

    /**
     * @var Int is the height of the area
     */
    public $cropH;

    /**
     * Declares the validation rules.
     *
     * @return Array Validation Rules
     */
    public function rules() {
        return array(
            array('cropX, cropY, cropW, cropH', 'numerical', 'integerOnly' => true),
            array('cropX, cropY, cropW, cropH', 'safe'),
        );
    }

}
