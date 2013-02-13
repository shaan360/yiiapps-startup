<div class="well" style="margin-top: 20px;">


<?php
$this->pagetitle=Yii::app()->name.' | Thank You';
                Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You have successfully registered and will notify you when we are live.');

$this->widget('bootstrap.widgets.TbAlert');?>
    
Spread the word with your friends 
<div class="pull-right">
<?php 
                    $this->widget('bootstrap.widgets.TbAlert');
  $this->widget('common.widgets.socialsharing.SocialShareWidget', array(
        'url' => 'http://domainparkingstation.com',                  //required
        'services' => array('google', 'twitter','facebook'),       //optional
        'htmlOptions' => array('class' => 'someClass'), //optional
        'popup' => true,                               //optional
    ));
?>
</div></div>