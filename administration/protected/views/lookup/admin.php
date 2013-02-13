<?php
$this->breadcrumbs=array(
	'Lookups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Lookup','url'=>array('index')),
	array('label'=>'Create Lookup','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('lookup-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Lookups</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGroupGridView', array(
   'type' => 'striped bordered condensed',
    'id' => 'lookup-grid',
    'dataProvider' => $model->search(),
    'mergeColumns' => array('type'),
    'filter' => $model,
    'columns' => array(
        'type',
        'name',
        //'code',
        'position',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>