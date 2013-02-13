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
echo "\$this->breadcrumbs = array(
	'$label',
);\n";
?>

$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create') . ' <?= $this->modelClass ?>', 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend>
        <?= "<?= Yii::t('AweCrud.app', 'List') ?>" ?> <?= "<?= {$this->modelClass}::label(2) ?>" ?>
    </legend>

<?= "<?php" ?> $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</fieldset>