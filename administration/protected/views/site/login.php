<?php
$this->pageTitle=Yii::app()->name . ' - Login';

?>

<div class="row-fluid">
    <div class="span2">
        </div>
     <div class="span8 well">
         <h3 class="offset4">Admin Login</h3>
         <hr>
<div class="form">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
            'type'=>'horizontal',
	'enableClientValidation'=>true,
	//'htmlOptions'=>array('class'=>'well'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->textFieldRow($model, 'username', array('class'=>'span7'));?>
	<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span7'));?>
	<?php echo $form->checkBoxRow($model, 'rememberMe');?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'default','label'=>'Submit', 'icon'=>'ok'));?>
		<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','label'=>'Reset'));?>
	</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
  <div class="span2">
        </div>
</div>