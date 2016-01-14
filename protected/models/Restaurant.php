<?php

/**
 * This is the model class for table "restaurant".
 *
 * The followings are the available columns in table 'restaurant':
 * @property integer $id
 * @property string $guid
 * @property string $name
 * @property string $key
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property integer $owner_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * The followings are the available model relations:
 * @property Cart[] $carts
 * @property Meal[] $meals
 * @property Users $owner
 */
class Restaurant extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'restaurant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, key, email, phone', 'required'),
			array('owner_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('name, email, phone', 'length', 'max'=>100),
			array('key', 'length', 'max'=>255),
			array('address, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, key, address, email, phone, owner_id, created_at, created_by, updated_at, updated_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'carts' => array(self::HAS_MANY, 'Cart', 'restaurant_id'),
			'meals' => array(self::HAS_MANY, 'Meal', 'restaurant_id'),
			'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'guid' => 'GUID',
			'name' => 'Name',
			'key' => 'Key',
			'address' => 'Address',
			'email' => 'Email',
			'phone' => 'Phone',
			'owner_id' => 'Owner',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
		);
	}
	
	public function getProfileImage()
    {

        return new PassportImage($this->guid);
    }


	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	//generates key for an entry
	private function generateKey($length = 8){
		//start with a blank passcode
		$key="";
		//define possible characters 
		$possible = "23456789bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXY";
		$maxlength = strlen($possible);
		if ($length > $maxlength){
			$length = $maxlength;
		}
		$i=0;
		while ($i < $length){
			$char=substr($possible,mt_rand(0,$maxlength-1),1);
			if(!strstr($key,$char)){
				$key .= $char;
				$i++;
			}
		}
		return $key;
	}
	
	protected function  beforeValidate(){
	   if ($this->isNewRecord){
		   	$this->key = $this->generateKey();
	   		$this->created_at = new CDbExpression('NOW()');
		   	$this->updated_at = new CDbExpression('NOW()');
		   
	   } else {
			$this->updated_at = new CDbExpression('NOW()');
		   	$this->updated_by = Yii::app()->user->id;
		   
		}
		
			
	    
		return parent::beforeValidate();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Restaurant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
