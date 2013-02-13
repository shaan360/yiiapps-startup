<!-- Main content -->

<?php
$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'Yiiapps, YII Start up template!',
));
?>

<p>Yii Apps Startup template with complete backend admin and front end user dashboard</p>
<p>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'size' => 'large',
        'label' => 'By Yiiapps.com',
    ));
    ?>
</p>

<?php $this->endWidget(); ?>
<div class="row-fluid">
    <div class="span4">
        <i class="icon-user icon-4x pull-left">
        </i>
        <h3>User Registeration</h3>
        <p>
            Standard user registeration and email activation procress
        </p>
    </div>
    <div class="span4 ">
        <i class="icon-lock icon-4x pull-left">
        </i>
        <h3>User Login</h3>
        <p>
            Secure user login with encrypted password features
        </p>
    </div>
    <div class="span3">
        <i class="icon-cogs icon-4x pull-left">
        </i>
        <h3>User Basic Dashboard</h3>
        <p>
            Basic user dashboard with update profile and change password features
        </p>
    </div>
    <div class="shadow"></div>
</div>