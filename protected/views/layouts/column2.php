<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
<div class="row">

    <div class="span9">

        <?php echo $content; ?>
    </div>
                                
                <div class="span3">
                    <h2><i class="icon-star-empty"></i> Domains Category</h2>
                    <?php
                    $this->widget('featuredcategory');
                    ?>
                </div>
</div>
</div>
<?php $this->endContent(); ?>