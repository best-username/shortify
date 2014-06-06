<?php

class m140606_124140_create_url_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('url', array(
			'id' => 'int AUTO_INCREMENT PRIMARY KEY',
			'hash' => 'varchar(6)',
			'original_url' => 'varchar(255)'
		));
	}

	public function down()
	{
		$this->dropTable('url');
	}

}
