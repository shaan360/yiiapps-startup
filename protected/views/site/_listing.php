<li class="">
    <i><b><?php echo CHtml::encode($data->name); ?></b></i>
    <hr>
    <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/media/listings/optimized/' . $data->listing->image),$data->listing->url); ?>
    <span>
        <p>   <?php echo substr($data->descriptions, 0, 350) . '...'; ?></p>
    </span>
    <i class="icon-eye-open"></i> <?php echo $data->listing->hits; ?>

</li>
