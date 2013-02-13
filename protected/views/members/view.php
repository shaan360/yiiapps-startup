<div class="container">
    <div class="row">

        <?php
        $this->breadcrumbs = array(
            'Members' => array('index'),
            $model->id,
        );
        ?>

        <div class="span2 " >
            <div class="profile-contents" style="margin-top: 12px;">
                <img class="thumbnail" src="<?php echo '../../media/members/thumbnails/' . $model->image; ?>">
                <h5><?php echo '<i class="icon-user"></i>' . ' ' . $model->user_name; ?></h5>
                <hr class="soften" style="margin-top: 5px;"/>
                <div class="caption">

    <h5 style = "text-transform:uppercase "><?php 
                        if (Yii::app()->user->id == $model->id && !Yii::app()->user->isGuest) 
    echo CHtml::link('<i class="icon-cog"></i>' . CHtml::encode('Manage Domains'), array('domains/admin'));
    ?> </h5> 

                    </div>
                </div>
            </div>
            <div class="span10" >

                <blockquote>
                    <h3>Note</h3>
                    <?php echo $model->bio; ?>
                </blockquote>

                <!-- Carousel
                ================================================== -->

                <h2><i class="icon-shopping-cart"></i> My Domains</h2>
                <?php
                $this->widget('bootstrap.widgets.TbListView', array(
                    'dataProvider' => new CActiveDataProvider('Domains', array(
                        'criteria' => array(
                            'condition' => 'user_id=' . $model->id,
                            'order' => 'timestamp DESC',
                        ),
                        'pagination' => false,
                    )),
                    'template' => '{items}',
                    'itemView' => '_website',
                ));
                ?>

        </div>
    </div>
</div>