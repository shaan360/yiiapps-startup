<li class="span4">
    <div class="thumbnail">
        <?php echo CHtml::image(Yii::app()->request->baseUrl . '/media/websites/optimized/' . $data->screen_shot); ?>
        <div class="caption">

            <h3><?php echo CHtml::encode($data->title); ?></h3>
            <?php echo XHtml::truncate($data->content, 200, '...'); ?>
            <?php echo CHtml::link('Details', array('websites/view', 'id' => $data->id)); ?>

        </div>
    </div>
</li>