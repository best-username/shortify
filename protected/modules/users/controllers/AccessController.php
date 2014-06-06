<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccessController
 *
 * @author unclead.nsk
 */
class AccessController extends BackendController{

	/**
	 * Авторизация в админке
	 */
	public function actionLogin() {	
		if(!Yii::app()->user->isGuest) {
			$this->redirect('/backend/');
		}

		$model = new LoginForm;

		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			if ($model->validate() && $model->login()) {
				$this->redirect(Yii::app()->user->returnUrl == '/' ? '/backend/' : Yii::app()->user->returnUrl);
			}
		}
		$this->render('login', array('model' => $model));
	}

	/**
	 * Выход из админки и переход на форму логина
	 */
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect('/backend/login/');
	}		
}

?>
