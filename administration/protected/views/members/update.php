<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Members','url'=>array('index')),
	array('label'=>'Create Members','url'=>array('create')),
	array('label'=>'View Members','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Members','url'=>array('admin')),
);
?>

<h1>Update Members <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>