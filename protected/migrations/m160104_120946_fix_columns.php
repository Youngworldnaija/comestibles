<?php

class m160104_120946_fix_columns extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('restaurant','created_at','datetime null');
		$this->alterColumn('restaurant','updated_at','datetime null');
		$this->alterColumn('meal','created_at','datetime null');
		$this->alterColumn('cart','created_at','datetime null');
		$this->alterColumn('meal','updated_at','datetime null');
		$this->alterColumn('setting','created_at','datetime null');
		$this->alterColumn('setting','updated_at','datetime null');
		$this->alterColumn('meal','updated_by','int(11) null');
		$this->alterColumn('restaurant','updated_by','int(11) null');
		$this->alterColumn('setting','updated_by','int(11) null');
		$this->alterColumn('meal','created_by','int(11) null');
		$this->alterColumn('restaurant','created_by','int(11) null');
		$this->alterColumn('setting','created_by','int(11) null');
		$this->addColumn('meal','type','int(11) null');
	}

	public function down()
	{
		echo "m160104_120946_fix_columns does not support migration down.\n";
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