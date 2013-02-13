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

<h1>Manage Members</h1>


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
        'user_name',
        'email',
        'skills',
        array(
            'name' => 'user_type', 'value' => 'Lookup::item("UserType"
                    ,$data->user_type)', 'filter' => Lookup::items('UserType'),),
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
