<?php

class m160106_220935_guid_restaurant extends CDbMigration
{
	public function up()
	{
		$this->addColumn('restaurant','guid','varchar(45) DEFAULT NULL');
	}

	public function down()
	{
		echo "m160106_220935_guid_restaurant does not support migration down.\n";
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