<?php

Yii::import('application.modules.users.models.User');

class UserIdentity extends CUserIdentity
{

	// Будем хранить id.
	protected $id;

	public function authenticate()
	{
		$user = User::model()->findUserByLogin($this->username);

		if ($this->isValidUser($user)) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		} elseif (CPasswordHelper::verifyPassword($this->password, $user->password) === false) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			$this->id = $user->id;

			$this->setState('username', empty($user->fio) ? $user->login : $user->fio);

			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
	}

	private function isValidUser($user) {
		return empty($user) || $user->status == User::STATUS_INACTIVE || !in_array($user->role, array(User::ROLE_ADMIN, User::ROLE_MODER));
	}
	
	public function getId()
	{
		return $this->id;
	}

}