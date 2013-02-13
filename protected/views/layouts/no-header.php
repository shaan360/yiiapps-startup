<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
/**
 * main.php
 *
 * @author: Shaan <shaan@uexel.com>
 * Date: 7/23/12
 * Time: 12:31 AM
 */
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php echo h($this->pageTitle); /* using shortcut for CHtml::encode */ ?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <script src="<?php echo Yii::app()->theme->baseUrl ?>/js/modernizr-2.6.2.js"></script>
<link href="<?php echo Yii::app()->theme->baseUrl ?>/css/login.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl ?>/css/zocial.css" rel="stylesheet">
<!--        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico">-->

    </head>

    <body>
        <div class="container">
        <div class="wrap">
            <?php                    echo $content; ?>
                <!-- Three columns of text below the carousel -->
                <hr>
            </div>

        </div>
      
        
        <?php
        $this->widget('common.extensions.scrolltop.ScrollTop', array(
            //Default values
            'fadeTransitionStart' => 10,
            'fadeTransitionEnd' => 200,
            'speed' => 'slow'
        ));
        ?>
         <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css"/>
                <script src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.wookmark.js"></script>

         <script src="<?php echo Yii::app()->theme->baseUrl ?>/js/application.js"></script>


    </body>
    
</html>