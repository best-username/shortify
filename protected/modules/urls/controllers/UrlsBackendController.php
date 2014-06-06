<?php

class UrlsBackendController extends BackendController
{
	public function actionIndex()
	{
		$model = new Url();

		$this->render('index', array(
			'model' => $model,
		));
	}
}