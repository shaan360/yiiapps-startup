<li class="">
    <i><b><?php echo CHtml::encode($data->title); ?></b></i>
    <hr>
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/media/listings/optimized/' . $data->image),$data->url); ?>
    <span>
        <p>   <?php echo substr($data->description, 0, 350) . '...'; ?></p>
    </span>
      <i class="icon-eye-open"></i> <?php echo $data->hits; ?>
</li>
