<?php
$this->pageTitle = Yii::app()->name . ' - Change Password';
?>
<div class="container">
    <div class="span12">
        <h1> Change Password</h1>
        <hr>
        <?php $this->widget('bootstrap.widgets.TbAlert'); ?>
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'changepassword-form',
            'type' => 'horizontal',
            'enableClientValidation' => true,
            'clientOptions' => array(
             'validateOnSubmit' => true,
            ),
                ));
        ?>
        <span class="label important">Fields with <span class="important">*</span> are required.</span>
            <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span5')); ?>
            <?php echo $form->passwordFieldRow($model, 'verifypassword', array('class' => 'span5')); ?>		
        <div class="form-actions">
        <?php echo CHtml::submitButton('Change Password', array('class' => 'btn btn-info')); ?>
        </div>
<?php $this->endWidget(); ?>
    </div>
</div>