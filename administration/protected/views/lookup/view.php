<?php
$this->breadcrumbs=array(
	'Lookups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Lookup','url'=>array('index')),
	array('label'=>'Create Lookup','url'=>array('create')),
	array('label'=>'Update Lookup','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Lookup','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lookup','url'=>array('admin')),
);
?>

<h1><?php echo $model->type; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'type',
		'position',
	),
)); ?>
