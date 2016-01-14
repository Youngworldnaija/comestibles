<?php

class m151227_200528_initial_following extends CDbMigration
{
	public function up()
	{
		$this->createTable('meal',array(
			'id' => 'pk',
            'name' => 'varchar(100) NOT NULL',
			'price' => 'varchar(20) NOT NULL',
			'restaurant_id' => 'int(11) DEFAULT NULL',
			'availability' => 'boolean DEFAULT 1',
			'created_at' => 'datetime NOT NULL',
            'created_by' => 'int(11) NOT NULL',
            'updated_at' => 'datetime NOT NULL',
            'updated_by' => 'int(11) NOT NULL',
				),'');
		$this->createTable('cart',array(
			'id' => 'pk',
            'status' => 'varchar(100) NOT NULL',
			'user_id' => 'int(11) DEFAULT NULL',
			'meal_id' => 'int(11) DEFAULT NULL',
			'restaurant_id' => 'int(11) DEFAULT NULL',
			'created_at' => 'datetime NOT NULL',
				),'');
		$this->addForeignKey('fk_meal_restaurant','meal','restaurant_id',
								'restaurant','id','CASCADE','NO ACTION');
		$this->addForeignKey('fk_cart_user','cart','user_id',
								'users','id','CASCADE','NO ACTION');
		$this->addForeignKey('fk_cart_meal','cart','meal_id',
								'meal','id','NO ACTION','NO ACTION');
		$this->addForeignKey('fk_cart_restaurant','cart','restaurant_id',
								'restaurant','id','NO ACTION','NO ACTION');
	}

	public function down()
	{
		echo "m151227_200528_initial_following does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}