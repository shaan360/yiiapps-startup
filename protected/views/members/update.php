<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>
<div class="container">
<h1><i class="icon-user"></i><?php echo $model->user_name; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>