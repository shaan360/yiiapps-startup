<?php

$this->pageTitle = 'Login';
$this->breadcrumbs = array(
    'Login',
);
?>
<div class="container">
    
    <?php
    $this->widget('bootstrap.widgets.TbAlert');
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'login-form',
        'type' => 'inline',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('class' => 'form-signin')
            ));
    ?>
    <div class="inner-form">
           <?php echo $form->errorSummary($model); ?>
        <h1 class="form-signin-heading">Sign in</h1>
        <hr>
        <p>Sign in with your Username and Password for easy access to your profile. (We never post without your permission.)</p>
        <hr>
        <?php echo $form->textFieldRow($model, 'username', array('class' => 'input-block-level', 'placeholder' => "Email address")); ?>
        <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'input-block-level', 'placeholder' => "Password")); ?>
         <?php echo $form->checkBoxRow($model, 'rememberMe'); ?>

        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Login',
        ));
        ?>
        
             
        <hr>
     <?php echo CHtml::link('Forget Password', array('forgot/'))?>  | Don't have account? <?php echo CHtml::link('Sign Up', array('register/'))?>  

    </div>
    <?php $this->endWidget(); ?>

</div> <!-- /container -->
