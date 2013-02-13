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

        <title><?php echo h($this->pageTitle); /* using shortcut for CHtml::encode */ ?></title>
        <meta name="description" content="yiiapps.com is all about interesting and big yii apps,yii developers,yii tips,yii coumunity ,yii jobs on internet">
        <meta name="keywords" content="yii apps,yii developers,yii tips,yii coumunity ,yii jobs on internet">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <script src="<?php echo Yii::app()->theme->baseUrl ?>/js/modernizr-2.6.2.js"></script>
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/css/zocial.css" rel="stylesheet">
        <!--        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico">-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.countdown.css"/>

        <script src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.countdown.min.js"></script>

        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-34373127-1']);
            _gaq.push(['_setDomainName', 'yiiapps.com']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
            $(function () {
                var liftoffTime = new Date();
                liftoffTime.setDate(liftoffTime.getDate() + 3);
                $('#defaultCountdown').countdown({until: liftoffTime, format: 'dHMs'});
	
            });
        </script>
    </head>

    <body>
        <div class="bs-docs-social">
            <div class="container">
                <a class="brand" href="http://yiiapps.com/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/yii-apps-logo.png"/></a>
                <div class="pull-right">
                    <a href="http://facebook.com/yiiapps" class="zocial facebook">Like Yii Apps</a>
                </div>
            </div></div>
        <div class="jumbotron masthead">
            <div class="container">


                <h1>Yii Apps
                </h1><small>Website by Yii Developer for Yii Developers</small>
                <p>

                    All about yii framework apps,developers,tips,community ,jobs and opportunities
                <div id="defaultCountdown"></div>
                </p>
             <div class="clearfix"></div>
             <hr>
                <?php echo $content; ?>

            </div>
        </div>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/landing.css"/>



    </body>
</html>