<?php

/**
 * This is the model class for table "url".
 *
 * The followings are the available columns in table 'url':
 * @property integer $id
 * @property string $hash
 * @property string $original_url
 */
class Url extends CActiveRecord
{

	const HASH_LENGTH = 6;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'url';
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Url the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('original_url', 'required', 'message' => 'Необходимо указать адрес'),
			array('original_url', 'url', 'allowEmpty' => false, 'message' => 'Вы указали некорректный адрес'),
			array('original_url', 'validateOriginalUrl'),
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
			'id'            => 'ID',
			'hash'          => 'Hash',
			'original_url'  => 'Адрес',
		);
	}

	/**
	 * Проверка, что адрес существует
	 */
	public function validateOriginalUrl() {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->original_url);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_NOBODY, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if($httpCode != 200) {
			$this->addError('original_url', 'Указан несуществующий адрес');
		};
	}

	public function beforeSave() {
		$this->hash = $this->generateHash();
		return true;
	}

	/**
	 * Генерация хеша
	 * @return string
	 */
	public function generateHash() {
		$characters = "abcdefghjkmnpqrstuvwxyz23456789ABCDEFGHJKMNPQRSTUVWXYZ";
		$max_number = strlen($characters);

		$is_unique = false;
		while(!$is_unique) {
			$i = 0;
			$hash = '';
			while($i < self::HASH_LENGTH) {
				$key = rand(0, $max_number);
				$hash .= $characters[$key];
				$i++;
			}

			$is_unique = $this->isUniqueHash($hash);
		}

		return $hash;
	}

	/**
	 * Проверка хеша на уникальность
	 * @param $hash
	 * @return bool
	 */
	public function isUniqueHash($hash) {
		$model = $this->findByAttributes(array('hash' => $hash));
		return empty($model) ? true : false;
	}

	/**
	 * Поиск хеша по оригинальному адресу
	 * @param $original_url
	 * @return array|bool|mixed|null
	 */
	public function findHashByOriginalUrl($original_url) {
		$model = $this->findByAttributes(array('original_url' => $original_url));
		return empty($model) ? false : $model->hash;
	}

	/**
	 * Поиск адреса по хешу
	 * @param $hash
	 * @return array|bool|mixed|null
	 */
	public function findOriginalUrlByHash($hash) {
		$model = $this->findByAttributes(array('hash' => $hash));
		return empty($model) ? false : $model->original_url;
	}

	/**
	 * Поиск всех урлов
	 * Используетс\ в админке
	 * @return CActiveDataProvider
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
