<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'type' => 'horizontal',

)); ?>

<?php echo $form->dropDownListRow($model, 'user_type', Lookup::items('UserType'), array('empty' => 'please select', 'class' => 'span5', 'maxlength' => 1)); ?>

<?php echo $form->textFieldRow($model, 'user_name', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'city', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->dropDownListRow($model, 'country', Lookup::getCountryOption(), array('empty' => 'please select')); ?> 

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
