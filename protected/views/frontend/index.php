<legend>Ну что начнем?</legend>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'url-form',
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'method' => 'POST',
	'enableAjaxValidation' => true,
	'enableClientValidation' => false,
	'htmlOptions' => array(
		'class' => 'mgtop20',
	),
	'clientOptions' => array(
		'validateOnSubmit' => true,
		'validateOnChange' => false,
		'hideErrorMessage' => false,
		'beforeValidate' => 'js: function(form) {
			$("#generate-btn").button("loading");
			$("#msg").html("").hide();
			return true;
		}',
		'afterValidate' => 'js: function(form, data, hasError) {
			$("#generate-btn").button("reset");

			if ($.isEmptyObject(data)) {
				return main.createUrl(form, data);
			} else {
				return false;
			}
		}',
		'successCssClass' => null
	),
));	?>

<p id="msg" class="alert alert-info hide"></p>

<?php echo $form->textFieldControlGroup($model, 'original_url', array('span' => 8, 'maxlength' => 255)); ?>

<div class="form-actions">
	<?php
		echo TbHtml::submitButton('Укоротить', array(
			'color' => TbHtml::BUTTON_COLOR_PRIMARY,
			'size' => TbHtml::BUTTON_SIZE_DEFAULT,
			'id' => 'generate-btn',
			'data-loading-text' => 'Подождите...'
		));
	?>

</div>

<?php $this->endWidget(); ?>