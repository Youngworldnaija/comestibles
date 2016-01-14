<?php

class RestaurantForm extends CFormModel {
	public $name;
	public $email;
	public $phone;
	public $address;
	public $guid;
	public $choice;
	public $linkUsername;
	public $linkPassword;
	public $firstname;
	public $lastname;
	public $userEmail;
	public $username;
	public $password;
	public $verifyPassword;
	public $isNewRecord = true;
	private $_identity;
	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('firstname, lastname, userEmail, username, password', 'required','on'=>'createuser'),
			array('choice','required', 'on'=>'choice'),
			array('name, address, email, phone', 'required','on'=>'details'),
			array('choice', 'numerical', 'integerOnly'=>true),
			array('name, email, phone', 'length', 'max'=>100),
			array('address', 'length', 'max'=>255),
			// username and password are required
			array('linkUsername, linkPassword', 'required','on'=>'linkuser'),
			
			// password needs to be authenticated
			array('linkPassword', 'authenticate','on'=>'linkuser'),
			// email has to be a valid email address
			array('email, userEmail', 'email'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => 'Incorrect username (length between 3 and 20 characters).'),
			array('linkPassword,password', 'length', 'max'=>128, 'min' => 4,'message'=> 'Incorrect password (minimal length 4 symbols).'),
			//array('username', 'unique', 'message' => "This user's name already exists."),
			//array('userEmail', 'unique', 'message' => "This user's email address already exists."),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => "Retype Password is incorrect."),
			array('username, linkUsername', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => "Incorrect symbols (A-z 0-9)."),
			// verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}
	
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->linkUsername,$this->linkPassword);
			if(!$this->_identity->authenticate())
				$this->addError('linkPassword','This user does not exist or password is incorrect');
		}
	}
	
	public function getProfileImage()
    {

        return new PassportImage($this->guid);
    }
	public function getChoices(){
		return array(
			'0'=>'Create a new user account',
			'1'=>'Link existing user account',
		);
	}
	public function saveForm($guid){
		$restaurant = new Restaurant;
		$restaurant->setAttributes($this->attributes);
		$restaurant->guid = $guid;
		if($this->choice === '0'){
			$admin = new User;
			$admin->username = $this->username;
			$admin->email = $this->userEmail;
			$admin->password = $this->password;
			if($admin->save()){
				$profile = new Profile;
				$profile->setAttributes($this->attributes);
				$profile->save();
				$restaurant->owner_id = $admin->id;
				if($restaurant->save()){
					return $restaurant;
				}
				return null;
			} 
			return null;
		}
		else {
				$restaurant->owner_id = $this->_identity->getId();
				if($restaurant->save()){
					return $restaurant;
				}
				return null;
			}
		
	}
	
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'guid' => 'GUID',
			'name' => 'Name',
			'address' => 'Address',
			'email' => 'Email',
			'phone' => 'Phone',
			'linkUsername'=>'Linked Username',
			'linkPassword'=>'Linked Password',
			'firstname'=>'First Name',
			'lastname'=>'Last Name',
			'userEmail'=>'Email',
			'username'=>'Username',
			'password'=>'Password',
			'verifyPassword'=>'Retype Password',
		);
	}

}