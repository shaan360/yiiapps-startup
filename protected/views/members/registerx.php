<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>
    Yii Apps Registration <small> Featured Membership Count:<b> <?php echo 500-$model->count(); ?> </b> left</small>
</h1>
<hr>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'members-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype' => 'multipart/form-data','class'=>'')
)); ?>


	<?php //echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'user_name',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>256,'hint'=>'We will notify you when we are ready to launch next week!')); ?>


	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>256)); ?>
        	<?php echo $form->passwordFieldRow($model,'passwordConfirm',array('class'=>'span5','maxlength'=>256)); ?>


	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Submit' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>