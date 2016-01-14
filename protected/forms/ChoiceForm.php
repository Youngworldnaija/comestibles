<?php

/**
 * ChoiceForm class.
 * ChoiceForm is the data structure for keeping
 * branch form data. It is used by the 'signup' action of 'RestaurantController'.
 */
class ChoiceForm extends CFormModel
{
	public $choice;
	
	public function rules(){
		
		return array(
			array('choice','required'),
			array('choice', 'numerical','integerOnly'=>true,),
		);
	}
	
	public function getChoices(){
		return array(
			'0'=>'Create a new user account',
			'1'=>'Link existing user account',
		);
	}
	
	
}