<?php
/* @var $this UserBackendController */
/* @var $model User */


$this->breadcrumbs = array(
	'Пользователи' => array('index'),
	'Управление',
);
?>

<legend>
	Пользователи
	<small>управление</small>
</legend>

<?php 
	echo TbHtml::linkButton('Добавить пользователя', array(
		'color' => TbHtml::BUTTON_COLOR_SUCCESS,
		'url' => $this->createUrl('/backend/user/create/'),
		'icon' => 'plus white',
		'style' => 'margin-bottom: 15px;'
	)); 
?>


<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'user-grid',
	'type' => 'bordered hover',
	'dataProvider' => $model->search(),
	'filter' => null,
	'columns' => array(
		array(
			'name' => 'id',
			'headerHtmlOptions' => array(
				'width' => '50'
			)
		),
		array(
			'name' => 'login',
			'headerHtmlOptions' => array(
				'width' => '200'
			)
		),
		array(
			'name' => 'fio',
		),
		array(
			'name' => 'role',
			'value' => '$data->getRoleDescription()',
			'headerHtmlOptions' => array(
				'width' => '200'
			)
		),
		array(
			'class' => 'bootstrap.widgets.TbButtonColumn',
			'template' => '{update}&nbsp;&nbsp;{delete}',
			'headerHtmlOptions' => array(
				'width' => '50'
			)
		),
	),
));
?>