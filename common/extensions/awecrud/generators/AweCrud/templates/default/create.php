<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/** @var AweCrudCode $this */
?>
<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	\$model->label(2) => array('index'),
	'Create',
);\n";
?>

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List').' '.<?= $this->modelClass ?>::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?= "<?= Yii::t('AweCrud.app', 'Create') ?> {$this->modelClass}" ?></legend>
    <?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
</fieldset>