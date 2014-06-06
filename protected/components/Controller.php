<?php

class Controller extends CController {

	public $layout = '//layouts/main';

	public $pageTitle = 'Shortify - сервис коротких урлов';

	public $breadcrumbs = array();

	public $menu = array();

	public function beforeRender($view) {
		if(parent::beforeRender($view)) {
			$clientScript = Yii::app()->getClientScript();
			$clientScript->registerScript('main-init','main.init()', CClientScript::POS_READY);
			return true;
		}
		return false;
	}

	protected function performAjaxValidation($model, $form)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === $form) {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

} 