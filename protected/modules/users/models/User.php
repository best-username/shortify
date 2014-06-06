<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'yii_user':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $fio
 * @property integer $status
 * @property string $role
 */

class User extends CActiveRecord
{

	const ROLE_ADMIN = 'administrator';
    const ROLE_MODER = 'moderator';
    const ROLE_USER = 'user';

	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('status', 'numerical', 'integerOnly' => true),
			array('login', 'length', 'max' => 20),
			array('password', 'length', 'max' => 64),
			array('fio', 'length', 'max' => 100),
			array('role', 'length', 'max' => 16)
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'		=> 'ID',
			'login'		=> 'Логин',
			'password'	=> 'Пароль',
			'fio'		=> 'ФИО',
			'status'	=> 'Статус',
			'role'		=> 'Роль',
		);
	}

	public function beforeSave() {
		$this->password = CPasswordHelper::hashPassword($this->password);
		return true;
	}

	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('login', $this->login, true);
		$criteria->compare('fio', $this->fio, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('role', $this->role, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	public function findUserByLogin($login)
	{
		$data = $this->findByAttributes(array('login' => $login));
		return empty($data) ? array() : $data;
	}

	public function getUsernameById($id)
	{
		$user = $this->findByPk($id);
		return empty($user) ? null : $user->login;
	}

	public function getRoleDescription() {
		$role = Yii::app()->authManager->getAuthItem($this->role);
		return empty($role) ? 'Беда...' : $role->description;
	}

	public function getRoles() {
		$roles = Yii::app()->authManager->getRoles();
		return CHtml::listData($roles, 'name', 'description');
	}

	public function getStatuses() {
		return array(
			self::STATUS_ACTIVE => 'Активен',
			self::STATUS_INACTIVE => 'Неактивен'
		);
	}

}
