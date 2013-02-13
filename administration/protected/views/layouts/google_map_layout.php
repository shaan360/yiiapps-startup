<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<?php
Yii::app()->clientScript->registerScriptFile('http://maps.googleapis.com/maps/api/js?sensor=true&language=en', CClientScript::POS_END);  
Yii::app()->clientScript->registerScriptFile(XHtml::jsUrl('google.map.js'), CClientScript::POS_END);
    
?>
<style>
html, body{background-image:none;}
</style>
</head>
<body>
<?php echo $content;?>
</body>
</html>
