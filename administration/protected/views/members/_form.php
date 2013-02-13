<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'members-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model, 'user_type', Lookup::items('UserType'), array('empty' => 'please select', 'class' => 'span5', 'maxlength' => 1)); ?>

<?php echo $form->textFieldRow($model, 'first_name', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'last_name', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'user_name', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'paypal_email', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php //echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>256));  ?>
<?php echo $form->fileFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->dropDownListRow($model, 'gender', Lookup::items('gender'), array('empty' => 'please select', 'class' => 'span5', 'maxlength' => 1)); ?>

<div class="control-group ">
							<?php echo $form->label($model,'birth_date',array('class'=>'control-label required')); ?>
							<div class="controls"><?php
							$this->widget('zii.widgets.jui.CJuiDatePicker', array(
							'model' => $model,
							'attribute' => 'birth_date',
							'options' => array(
							'showAnim' => 'fold',
							'dateFormat' => 'yy-mm-dd',
							'defaultDate' => $model->birth_date,
							'changeYear' => true,
							'changeMonth' => true,
							'yearRange' => 'c-70:c+10',

							),

							));
							?></div>
             
                   </div>

<?php echo $form->textFieldRow($model, 'address', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'city', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->dropDownListRow($model, 'country', Lookup::getCountryOption(), array('empty' => 'please select')); ?> 

<?php echo $form->textFieldRow($model, 'state', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'zip', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'phone', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'mobile', array('class' => 'span5', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'facebook', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'twitter', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'website', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'github', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'yii_profile', array('class' => 'span5', 'maxlength' => 200)); ?>

    <?php echo $form->textAreaRow($model, 'bio', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<div class="control-group">

        <?php echo $form->label($model, 'skills', array('class' => 'control-label')); ?>
    <div class="controls">

        <?php
        $this->widget('CAutoComplete', array(
            'model' => $model,
            'attribute' => 'skills',
            'url' => array('suggestTags'),
            'multiple' => true,
            'htmlOptions' => array('size' => 50),
        ));
        ?>
        <p class="help-block">Enter tag separated by commas</p>
    </div></div>

<?php echo $form->toggleButtonRow($model, 'is_subscribed', array('class' => 'span5', 'maxlength' => 1)); ?>

<?php echo $form->toggleButtonRow($model, 'is_blocked', array('class' => 'span5', 'maxlength' => 1)); ?>

    <?php echo $form->toggleButtonRow($model, 'is_confirmed', array('class' => 'span5', 'maxlength' => 1)); ?>


<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
