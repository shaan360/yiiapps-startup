<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/** @var AweCrudCode $this */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);\n";
?>

$this->menu=array(
	array('label' => Yii::t('AweCrud.app', 'List') . ' ' . <?= $this->modelClass ?>::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('AweCrud.app', 'Create') . ' <?= $this->modelClass ?>', 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?= "<?= Yii::t('AweCrud.app', 'Manage') ?>" ?> <?= "<?= {$this->modelClass}::label(2) ?>" ?>
    </legend>

<?= "<?= CHtml::link('<i class=\"icon-search\"></i> ' . Yii::t('AweCrud.app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>" ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
    'type' => 'striped condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7):?>
        /*<?= "\n" ?>
<?php endif; ?>
        <?= $this->generateGridViewColumn($this->modelClass, $column).",\n" ?>
<?php
}
if($count>=7):?>
        */<?= "\n" ?>
<?php endif; ?>
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
</fieldset>