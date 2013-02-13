<?php
$this->pageTitle=Yii::app()->name . ' - Create account';
$this->breadcrumbs=array(
    'Create Account',0
);
?>


<div class="form">
    <legend><?php echo Yii::t('app','To complete the authentication, please select a username and an email address');?></legend>

	<?php
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'create-user-form',
			'enableAjaxValidation'=>false,
            'htmlOptions' => array(
                'class'=>'well form-vertical'
            ),
            'focus'=>array($user,'username'),
		)); 
	?>

    <?php if ($form->errorSummary($user)) {
        Yii::app()->user->setFlash('error', $form->errorSummary($user));
        $this->widget('bootstrap.widgets.TbAlert');
    } ?>

	<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.');?></p>




	<div class="row-fluid">
		<?php echo $form->labelEx($user,Yii::t('app','username')); ?>
		<?php echo $form->textField($user,'username'); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($user,Yii::t('app','email')); ?>

		<?php echo $form->textField($user,'email', array('readonly'=>($bEmailReadOnly)?'readonly':'')); ?>
		<?php echo $form->error($user,'email'); ?>
	</div>

    <div class="row-fluid">
        <?php echo $form->labelEx($user,Yii::t('app','password')); ?>
        <?php echo $form->passwordField($user,'password'); ?>
        <?php echo $form->error($user,'password'); ?>
    </div>

    <div class="row-fluid">
        <?php echo $form->labelEx($user,Yii::t('app','passwordConfirm')); ?>
        <?php echo $form->passwordField($user,'passwordConfirm'); ?>
        <?php echo $form->error($user,'passwordConfirm'); ?>
    </div>


	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->