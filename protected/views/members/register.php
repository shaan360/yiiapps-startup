<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="container">
    <div class="row">
        <div class="span6">
            <div id="register-wraper">

                <?php
                    $this->widget('bootstrap.widgets.TbAlert');
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id' => 'members-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'form')
                        ));
                ?>


                <?php //echo $form->errorSummary($model);
                $this->widget('bootstrap.widgets.TbAlert');
                ?>

                <legend>Register For <span class="blue"> Free</span></legend>
                <div class="body">


                    <?php echo $form->textFieldRow($model, 'user_name', array('class' => 'input-huge', 'maxlength' => 256)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'input-huge', 'maxlength' => 256, 'hint' => 'We will notify you when we are ready to launch!')); ?>


                    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'input-huge', 'maxlength' => 256)); ?>
<?php echo $form->passwordFieldRow($model, 'passwordConfirm', array('class' => 'input-huge', 'maxlength' => 256)); ?>

                </div>
                <?php echo $form->checkBoxRow($model,'terms');?>
                <div class="footer">
                    

                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'type' => 'primary',
                        'label' => $model->isNewRecord ? 'Submit' : 'Save',
                        'htmlOptions' => array('class' => 'btn-primary')
                    ));
                    ?>

                </div>


<?php $this->endWidget(); ?>
            </div>
        </div>
        <div class="span6">

            <div class="register-info-wraper">
                <div id="register-info">

                    <h1>Uexel Basic TemplateUexel Basic TemplateUexel Basic TemplateUexel Basic TemplateUexel Basic TemplateUexel Basic Template. </h1>

                    <ul dir="rtl">
                        <li>Uexel Basic Template</li>
                        <li>Uexel Basic Template</li>
                        <li>Uexel Basic Template</li>

                    </ul>

                </div>
            </div>

        </div>

    </div>
</div>