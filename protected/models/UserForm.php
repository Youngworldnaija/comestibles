<?php

/**
 * UserForm class.
 * UserForm is the data structure for keeping
 * user form data. It is used by the 'signup' action of 'RestaurantController'.
 */
class UserForm extends CFormModel
{
	public $firstname;
	public $lastname;
	public $email;
	public $username;
	public $password;
	public $verifyPassword;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('firstname, lastname, email, username, password', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => 'Incorrect username (length between 3 and 20 characters).'),
			array('password', 'length', 'max'=>128, 'min' => 4,'message'=> 'Incorrect password (minimal length 4 symbols).'),
			array('username', 'unique', 'message' => "This user's name already exists."),
			array('email', 'unique', 'message' => "This user's email address already exists."),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => "Retype Password is incorrect."),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => "Incorrect symbols (A-z 0-9)."),
			// verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'firstname'=>'First Name',
			'lastname'=>'Last Name',
			'email'=>'Email',
			'username'=>'Username',
			'password'=>'Password',
			'verifyPassword'=>'Retype Password',
		);
	}
}