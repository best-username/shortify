<?php
/* @var $this UserBackendController */
/* @var $model User */
?>

<?php
$this->breadcrumbs = array(
	'Пользователи' => array('index'),
	'Редактирование',
);
?>

<legend>
	Пользователи
	<small>редактирование</small>
</legend>

<?php $this->renderPartial('_form', array('model' => $model)); ?>