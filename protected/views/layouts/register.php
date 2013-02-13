<?php
/**
 * main.php
 *
 * @author: Shaan <shaan@uexel.com>
 * Date: 7/23/12
 * Time: 12:31 AM
 */
///Yii::app()->clientScript->registerScriptFile(XHtml::cssUrl('login.css'), CClientScript::POS_HEAD);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php $this->display_seo(); ?>
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- Google Web Font -->
        <link href='http://fonts.googleapis.com/css?family=Dosis:200,400,600' rel='stylesheet' type='text/css'>

        <script src="<?php echo Yii::app()->theme->baseUrl ?>/js/modernizr-2.6.2.js"></script>
        <!--        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico">-->




    </head>

    <body>
        <!-- Navigation Starts Here -->
        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => null, // null or 'inverse'
            'brand' => '<i class="icon-globe"></i>' . Yii::app()->name,
            'brandUrl' => array('/site/index'),
            'collapse' => true, // requires bootstrap-responsive.css
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array('label' => 'Contact Us', 'url' => array('site/contact')),
                        array('label' => 'SignIn', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
                    ),
                ),
            ),
        ));
        ?>   <!-- Main navigation -->
        <div class="container-fluid">

            <?php echo $content; ?>
        </div>
        <footer class="white navbar-fixed-bottom">
            <div id="defaultCountdown"></div>
        </footer>

        <script src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.backstretch.min.js">
        </script>
        <script>
            jQuery(document).ready(function($) {
                $.backstretch([
                    
                   
                    '<?php echo Yii::app()->theme->baseUrl . "/images/dps.jpg"; ?>',
                    '<?php echo Yii::app()->theme->baseUrl . "/images/dps2.jpg"; ?>',

                   
                ], {duration: 3000, fade: 750});
		
            });
            
        </script>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css"/>
   <!--[if IE 7]>
            <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome-ie7.css">
            <![endif]-->		
        <!-- Favicon -->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/custom.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/register.css"/>



    </body>
</html>