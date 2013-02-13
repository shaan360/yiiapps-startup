<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Members','url'=>array('index')),
	array('label'=>'Manage Members','url'=>array('admin')),
);
?>

<h1>Create Members</h1>

<?php echo $this->renderPartial('_add', array('model'=>$model)); ?>