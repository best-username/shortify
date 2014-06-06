<?php
/* @var $this UserBackendController */
/* @var $model User */
?>

<?php
$this->breadcrumbs = array(
	'Пользователи' => array('index'),
	'Добавление',
);
?>

<legend>
	Пользователи
	<small>добавление</small>
</legend>

<?php $this->renderPartial('_form', array('model' => $model)); ?>