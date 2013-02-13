<?php
$this->breadcrumbs=array(
	'Members',
);

$this->menu=array(
	array('label'=>'Create Members','url'=>array('create')),
	array('label'=>'Manage Members','url'=>array('admin')),
);
?>

<h1>Members</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
