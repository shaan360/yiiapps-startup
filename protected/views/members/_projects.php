<li class="">
    <?php echo CHtml::image(Yii::app()->request->baseUrl . '/media/websites/optimized/' . $data->screen_shot); ?>
    <div class="caption">
        <h3><?php echo CHtml::encode($data->title); ?></h3>
        <?php echo XHtml::truncate($data->content, 20, '...'); ?>
    </div>
    <hr>
    <span style="color: #999;padding: 5px;"><i class="icon-eye-open"> </i> 
        <?php echo CHtml::encode($data->views); ?> 
        <?php echo CHtml::link('Detail', array('websites/view', 'id' => $data->id));?></span>
</li>