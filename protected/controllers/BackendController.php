<?php


class BackendController extends Controller {

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array(
				'allow', 
				'actions' => array('login', 'logout'),
				'users' => array('*')
			),
			array(
				'allow',
				'users' => array('@')
			),
			array(
				'deny',
				'users' => array('*')
			)
		);
	}
	
	public function actionIndex() {
		$this->render('index');
	}
}

?>
