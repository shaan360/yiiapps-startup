<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/** @var AweCrudCode $this */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List').' '.<?= $this->modelClass ?>::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create').' <?= $this->modelClass ?>', 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?= "<?= Yii::t('AweCrud.app', 'View') ?> {$this->modelClass} <?= CHtml::encode(\$model) ?>" ?></legend>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
<?php foreach($this->tableSchema->columns as $column):?>
        <?= $this->generateDetailViewAttribute($this->modelClass, $column) . ",\n" ?>
<?php endforeach; ?>
	),
)); ?>
</fieldset>