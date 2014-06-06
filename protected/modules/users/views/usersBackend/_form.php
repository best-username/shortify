<div class="form">

	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'user-form',
		'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
		'enableAjaxValidation' => false,
	));
	?>
	
	<?php echo $form->errorSummary($model, ''); ?>
	
    <p class="alert alert-info">Поля помеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php 
		echo $form->textFieldControlGroup($model, 'login', array(
			'span' => 3, 
			'maxlength' => 20,
			'autocomplete' => 'off'
		)); 
	?>

	<?php 
		echo $form->passwordFieldControlGroup($model, 'password', array(
			'span' => 3, 
			'maxlength' => 64,
			'autocomplete' => 'off'
		));
	?>

	<?php echo $form->textFieldControlGroup($model, 'fio', array('span' => 5, 'maxlength' => 100)); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status',User::model()->getStatuses(),array('span' => 3)); ?>
	
	<?php echo $form->dropDownListControlGroup($model, 'role',User::model()->getRoles(),array('span' => 3)); ?>

	<?php echo CHtml::hiddenField('action');?>
	
	<div class="form-actions">
		<?php
			echo TbHtml::submitButton('Сохранить', array(
				'color' => TbHtml::BUTTON_COLOR_PRIMARY,
				'size' => TbHtml::BUTTON_SIZE_DEFAULT,
				'icon' => 'edit white',
				'onclick' => '$("#action").val("apply")'
			));
		?>
		<?php
			echo TbHtml::submitButton('Сохранить и закрыть', array(
				'color' => TbHtml::BUTTON_COLOR_DEFAULT,
				'size' => TbHtml::BUTTON_SIZE_DEFAULT,
				'icon' => 'ok',
				'onclick' => '$("#action").val("save")'			
			));
		?>
		
		<?php
			echo TbHtml::linkButton('Отмена', array(
				'color' => TbHtml::BUTTON_COLOR_DEFAULT,
				'size' => TbHtml::BUTTON_SIZE_DEFAULT,
				'icon' => 'remove',
				'url' => $this->createUrl('/backend/user/')			
			));
		?>		
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->