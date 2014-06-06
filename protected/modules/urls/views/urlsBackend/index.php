<?php

$this->breadcrumbs = array(
	'Короткие урлы' => array('index'),
	'Управление',
);
?>

<legend>
	Короткие урлы
	<small>управление</small>
</legend>


<?php

$this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'user-grid',
	'type' => 'bordered hover condensed',
	'dataProvider' => $model->search(),
	'filter' => null,
	'columns' => array(
		array(
			'name' => 'id',
			'headerHtmlOptions' => array(
				'width' => '40'
			)
		),
		array(
			'name' => 'hash',
			'headerHtmlOptions' => array(
				'width' => '200'
			)
		),
		array(
			'name' => 'original_url',
		)
	),
));
?>