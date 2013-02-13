
<?php $this->pageTitle = Yii::app()->name; ?>

<h1>Dashboard</h1>
<hr>
<div class="row-fluid">
    <div class="span12">
        <?php
        $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
            'heading' => 'Welcome to ' . CHtml::encode(Yii::app()->name),
        ));
        ?>
        <p>Here we can put quick links and states about listing</p>
        <p>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'size' => 'large',
                'label' => 'Good Day',
            ));
            ?>
        </p>

<?php $this->endWidget(); 
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Basic Box',
    'headerIcon' => 'icon-home',
    'content' => 'My Basic Content (you can use renderPartial here too :))' // $this->renderPartial('_view')
    ));
?>
    </div>

</div>