<?php

class m151227_191112_initial extends CDbMigration
{
	public function up()
	{
		$this->createTable('restaurant',array(
			'id' => 'pk',
            'name' => 'varchar(100) NOT NULL',
            'key' => 'varchar(255) NOT NULL',
            'address' => 'text DEFAULT NULL',
			'email' => 'varchar(100) NOT NULL',
			'phone' => 'varchar(100) NOT NULL',
			'owner_id' => 'int(11) DEFAULT NULL',
			'created_at' => 'datetime NOT NULL',
            'created_by' => 'int(11) NOT NULL',
            'updated_at' => 'datetime NOT NULL',
            'updated_by' => 'int(11) NOT NULL',
				),'');
		$this->createTable('setting', array(
            'id' => 'pk',
            'name' => 'varchar(100) NOT NULL',
            'value' => 'varchar(255) NOT NULL',
            'value_text' => 'text DEFAULT NULL',
			'type' => 'varchar(100) NOT NULL',
            'type_id' => 'varchar(100) DEFAULT NULL',
            'created_at' => 'datetime NOT NULL',
            'created_by' => 'int(11) NOT NULL',
            'updated_at' => 'datetime NOT NULL',
            'updated_by' => 'int(11) NOT NULL',
                ), '');
		$this->addForeignKey('fk_restaurant_admin','restaurant','owner_id',
								'users','id','CASCADE','NO ACTION');
	}

	public function down()
	{
		echo "m151227_191112_initial does not support migration down.\n";
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