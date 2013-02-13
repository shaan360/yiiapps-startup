<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$this->pagetitle=Yii::app()->name.' | Featured Members';
?>


	<p>First 500 registered members will have life time featured  & privileged members status. </p>
 <p><a href="#" class="btn btn-warning btn-large" ><?php echo 500-$model->count(); ?> Memberships Left</a></p>
 
 <p><a href="http://yiiapps.com/register" class="btn btn-success btn-large" >Register Now</a></p>
	

