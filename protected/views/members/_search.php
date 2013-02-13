<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'user_name',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'paypal_email',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'birth_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'country',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'zip',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'mobile',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'facebook',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'twitter',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'website',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'github',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'yii_profile',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textAreaRow($model,'bio',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

        <?php echo $form->textAreaRow($model, 'skills', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

	<?php echo $form->textFieldRow($model,'is_subscribed',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'is_blocked',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'is_confirmed',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'active_key',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'salt',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'last_login',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'views',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'timestamp',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
