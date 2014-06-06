<?php

Yii::import('users.models.User');

class UsersBackendController extends BackendController
{

	public function actionCreate()
	{
		$model = new User();

		$this->performAjaxValidation($model, 'user-form');

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->save()) {
				
				$action = Yii::app()->request->getParam('action', 'apply');
				
				Yii::app()->user->setFlash('success', 'Новый пользователь добавлен');

				if ($action == 'apply') {
					$this->redirect(array('update', 'id' => $model->id));
				} else {
					$this->redirect(array('index'));
				}
			}
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		$this->performAjaxValidation($model, 'user-form');

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->save()) {
				
				$action = Yii::app()->request->getParam('action', 'apply');
				
				Yii::app()->user->setFlash('success', 'Изменения сохранены');
				
				if ($action == 'apply') {
					$this->refresh();
				} else {
					$this->redirect(array('index'));
				}
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		} else {
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		}
	}


	public function actionIndex()
	{
		$model = new User('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['User'])) {
			$model->attributes = $_GET['User'];
		}

		$this->render('index', array(
			'model' => $model,
		));
	}

	public function loadModel($id)
	{
		$model = User::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}
		return $model;
	}

}