<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="container">
    <div class="row">
        <div class="span6">
            <div id="resetpassword">

                <?php
                    $this->widget('bootstrap.widgets.TbAlert');
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id' => 'reset-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'form')
                        ));
                ?>


                <?php //echo $form->errorSummary($model);
                $this->widget('bootstrap.widgets.TbAlert');
                ?>

                <legend>Enter your new <span class="blue"> Password</span></legend>
                <div class="body">
<?php echo $form->hiddenField($model,'key',array('class'=>'span5' ,'value'=>$key)); ?>
<?php echo $form->hiddenField($model,'email',array('class'=>'span5' ,'value'=>$email)); ?>

                    <?php echo $form->passwordFieldRow($model,'password', array('class' => 'input-huge', 'maxlength' => 256)); ?>
                </div>
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
        

    </div>
</div>