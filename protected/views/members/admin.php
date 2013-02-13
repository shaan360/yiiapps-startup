<?php
$this->breadcrumbs = array(
    'Members' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Members', 'url' => array('index')),
    array('label' => 'Create Members', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('members-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><i class="icon-cog"></i> Manage Members</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'members-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'first_name',
        'last_name',
        'user_name',
        array(
            'name' => 'user_type', 'value' => 'Lookup::item("UserType"
                    ,$data->user_type)', 'filter' => Lookup::items('UserType'),),
        'email',
        'skills',
        /*
          'paypal_email',
          'password',
          'image',
          'gender',
          'birth_date',
          'address',
          'city',
          'country',
          'state',
          'zip',
          'phone',
          'mobile',
          'facebook',
          'twitter',
          'website',
          'github',
          'yii_profile',
          'bio',
          'is_subscribed',
          'is_blocked',
          'is_confirmed',
          'active_key',
          'salt',
          'last_login',
          'views',
          'timestamp',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
