
<!-- Main content -->
<div class="domain-view span3">
           
            <div class="well inline  domains-box">
                                    <h2><?php echo CHtml::link('<i class="icon-globe"></i>'.CHtml::encode($data->title),$data->seourl); ?></h2>
                <p class="muted"><i class="icon-tasks"></i> Content: <?php echo XHtml::truncate($data->content, 50, '...'); ?>
                                        <?php echo CHtml::link(CHtml::encode('Details'),$data->seourl); ?></p>
               <h4><?php echo '<i class="icon-money"></i>'.CHtml::encode(' Price: $ ' . $data->price); ?></h4>
                <div class="btn-group domain-buttons">
                   <span class="btn"><?php if (Yii::app()->user->id != $data->member->id ) echo CHtml::link('<i class="  icon-shopping-cart"></i>'.CHtml::encode('Buy Domain'), array('mailbox/message/new/', 'id' => $data->member->id)); 
                   elseif(Yii::app()->user->id == $data->member->id && !Yii::app()->user->isGuest){
                       echo CHtml::link('<i class="  icon-edit"></i>'.CHtml::encode('Update Domain'), array('domains/update', 'id' => $data->id));}
                   ?>
                   </span>       
                   <span class="btn  btn-primary"><?php
                            echo CHtml::link('<i class=" icon-eye-open"></i>'.CHtml::encode('View Domain'), $data->seourl,array('style'=>'color:#fff;'));

                        ?></span> 
               </div>
            </div>
          
    </div>


