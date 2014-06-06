<?php

Yii::import('ext.bootstrap.widgets.TbNavbar');

class Navigation extends TbNavbar
{
	public function init()
	{
		$this->brandLabel = 'Shortify';
		$this->brandUrl = !$this->isBackend() ? '/' : '/backend/';

		$this->collapse = false;
		$this->fluid = false;
		$this->display = TbHtml::NAVBAR_DISPLAY_STATICTOP;

		$this->color = TbHtml::NAVBAR_COLOR_INVERSE;

		$this->items = !$this->isBackend() ? array() : array(
			array(
				'class' => 'bootstrap.widgets.TbNav',
				'items' => array(
					array(
						'label' => 'Короткие урлы',
						'url' => '/backend/urls/'
					),
					array(
						'label' => 'Пользователи',
						'url'	=> '/backend/users/'
					)
				)
			),
			array(
				'class' => 'bootstrap.widgets.TbNav',
				'htmlOptions' => array('class' => 'pull-right'),
				'encodeLabel' => false,
				'items' => array(
					array(
						'label' => 'Сайт',
						'icon' => 'home white',
						'url' => '/',
						'linkOptions' => array(
							'target' => '_blank'
						)
					),
					array(
						'label' => TbHtml::labelTb(Yii::app()->user->username),
						'url' => '#',
						'items' => array(
							array(
								'label' => 'Выйти',
								'icon' => 'off',
								'url' => '/backend/logout/'
							),
						)),
				),
			)
		);

		parent::init();
	}

	private function isBackend() {
		return strpos($_SERVER['REQUEST_URI'], 'backend') !== false && Yii::app()->controller->action->id !== 'login' ? true : false;
	}
}

?>
