<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Авторизация';
$this->breadcrumbs = array();
?>

<style>
    body {
        background: #a2a2a2;
    }
</style>

<div class="login-form">

	<?php
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id' => 'login-form',
			'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
			'htmlOptions' => array(
				'class' => 'well'
			)
		));
	?>
	<fieldset>
		<legend>Пожалуйста, авторизуйтесь</legend>
		<div class="row-fluid">
			<?php 
				echo $form->textFieldControlGroup($model, 'username', array(
					'span' => 12, 'maxlength' => 20
				)); 
			?>
			<?php 
				echo $form->passwordFieldControlGroup($model, 'password', array(
					'span' => 12, 'maxlength' => 64
				)); 
			?>
		</div>
	</fieldset>


	<div class="form-actions">
		<?php
			echo TbHtml::submitButton('Войти', array(
				'id'		=> 'login-form-submit',
				'color'		=> TbHtml::BUTTON_COLOR_PRIMARY,
				'block'		=> true,
			));
		?>
    </div>

	<?php $this->endWidget(); ?>	
</div>
