<?php

class m140606_124439_create_user_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('user', array(
			'id' => 'int AUTO_INCREMENT PRIMARY KEY',
			'login' => 'varchar(20)',
			'password' => 'varchar(64)',
			'fio' => 'varchar(100)',
			'status' => 'tinyint(1)',
			'role' => 'varchar(16)'
		));

		$this->execute("
			INSERT INTO user(login, password,fio, status, role)
			VALUES('admin','$2a$13$Q0jEWi8x/bc/W/u2sMKh0On7HUEIr29ek8vThu8fOMA17tC1hCKT.','Test admin', 1, 'administrator')
		");
	}

	public function down()
	{
		$this->dropTable('user');
	}

}
