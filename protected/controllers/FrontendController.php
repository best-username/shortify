<?php

Yii::import('application.modules.urls.models.Url');

class FrontendController extends Controller {

	public function actionIndex() {
		$model = new Url;

		$this->performAjaxValidation($model, 'url-form');

		if (isset($_POST['Url'])) {
			$model->attributes = $_POST['Url'];
			$model->original_url = trim($model->original_url);
			$hash = Url::model()->findHashByOriginalUrl($model->original_url);

			if(empty($hash)) {
				$is_success =$model->save();
				$hash = $model->hash;
			} else {
				$is_success = true;
			}

			echo CJSON::encode(array(
				'is_success' => $is_success,
				'hash' => $hash,
				'hostname' => Yii::app()->params['hostname']
			));

			Yii::app()->end();
		}

		$this->render('index', array(
			'model' => $model
		));
	}

	public function actionError() {
		$error = Yii::app()->errorHandler->error;

		if (empty($error) || !isset($error['code']) || !(isset($error['message']) || isset($error['msg']))) {
			$this->redirect(array('index'));
		}

		if (Yii::app()->getRequest()->getIsAjaxRequest()) {
			echo CJSON::encode($error);
			Yii::app()->end();
		} else {
			$this->render('error', array('error' => $error));
		}
	}

	public function actionRedirect($hash) {
		$original_address = Url::model()->findOriginalUrlByHash($hash);
		if(!empty($original_address)) {
			$this->redirect($original_address);
		}

		throw new CHttpException(404, 'Указан несуществующий адрес');

	}
}

?>
