<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from responsivewebinc.com/premium/outlooker/outlooker-b/full-width.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 13 Dec 2012 09:05:53 GMT -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <!-- Change title, description and keywords -->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php $this->display_seo(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Google Web Font -->
        <link href='http://fonts.googleapis.com/css?family=Dosis:200,400,600' rel='stylesheet' type='text/css'>
        <!-- Stylesheets -->


        <link rel="shortcut icon" href="themes/appsfront/img/favicon/favicon.png">
    </head>

    <body>
        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => null, // null or 'inverse'
            'brand' => '<i class="icon-globe"></i>' . Yii::app()->name,
            'brandUrl' => array('site/index'),
            'collapse' => true, // requires bootstrap-responsive.css
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/site/index')),
                        array('label' => 'Contact Us', 'url' => array('site/contact')),
                    ),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array('label' => 'SignIn', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'SignUp', 'url' => array('members/register'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Dashboard', 'url' => array('/member/' . yii::app()->user->id . '/' . Yii::app()->user->name), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Account', 'url' => '#', 'items' => array(
                                array('label' => 'Inbox', 'url' => array('/mailbox/'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Inquiry messages', 'url' => array('/inquiry/admin/'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Profile Settings', 'url' => array('/members/update/' . yii::app()->user->id)),
                                array('label' => 'Change Password', 'url' => array('/site/changepassword')),
                                //array('label' => 'Change Password', 'url' => array('/site/password_reset')),
                                array('label' => 'Logout', 'url' => array('/site/logout')),
                            ), 'visible' => !Yii::app()->user->isGuest),
                        '---',
                        array('label' => Yii::app()->user->name, 'url' => array('/members/' . yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                    ),
                ),
            ),
        ));
        ?>   <!-- Main navigation -->


        <div class="wrap">
            <?php echo $content; ?>
            <!-- Three columns of text below the carousel -->
        </div>

        <!-- Foot -->

        <!-- Three column footer -->

        <div class="foot">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <div class="padd">
                            <!-- Add class "widget" -->
                            <div class="widget">
                                <!-- Title -->
                                <h3>Morbi dictum nibh gravida</h3>
                                <!-- Content -->
                                <!-- Below is the blockquote -->
                                <blockquote>
                                    <p>Fusce imperdiet, risus eget viverra faucibus, diam mi vestibulum libero, ut vestibulum tellus magna nec enim. Nunc dapibus varius interdum. Phasellus at lorem ut lectus fermentum convallis. Sed diam nisi, pulvinar vitae molestie hendrerit, venenatis eget mauris. Integer porta erat ac eros porta ultrices. </p>
                                    <!-- Author information -->
                                    <small>Ashok</small>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="padd">
                            <div class="widget">
                                <h3>Sed a interdum mauris</h3>
                                <ul>
                                    <li><a href="#">Sed eu leo orci, condimentum gravida metus</a></li>
                                    <li><a href="#">Etiam at nulla ipsum, in rhoncus purus</a></li>
                                    <li><a href="#">Fusce vel magna faucibus felis dapibus facilisis</a></li>
                                    <li><a href="#">Vivamus scelerisque dui in massa</a></li>
                                    <li><a href="#">Pellentesque eget adipiscing dui semper</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="padd">
                            <div class="widget">
                                <!-- Twitter widget. Goto "js" folder and open "custom.js" file. Search this document for the word "ashobiz" (without quotes). "ashobiz" is my twitter username. Just replace it with your username. Done. -->
                                <h3>Twitter</h3>
                                <!-- Below div is important to display twitter feeds -->
                                <div class="tweet"><ul class="tweet_list"><li class="tweet_first tweet_odd"><span class="tweet_text">40 Creative Examples of Pictogram Movie Posters <a href="http://speckyboy.com/2012/10/10/40-creative-examples-of-pictogram-movie-posters/">speckyboy.com/2012/10/10/40-…</a></span></li><li class="tweet_even"><span class="tweet_text">20 More World Map Source Files <a href="http://speckyboy.com/2012/10/08/20-more-world-map-source-files-psd-eps-ai-svg-png/">speckyboy.com/2012/10/08/20-…</a></span></li><li class="tweet_odd"><span class="tweet_text">50 Free Web-Based Apps and Tools for Web Developers  <a href="http://speckyboy.com/2012/10/01/50-free-web-services-apps-and-tools-for-web-developers/">speckyboy.com/2012/10/01/50-…</a></span></li></ul></div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="footer container">
                <div class="row">
                    <div class="span12">
                        <!-- Copyright information -->
                        <div class="fpadd">Copyright &copy; 2012 - <a href="#">Your Site</a> / <a href="#">Disclaimer</a> / <a href="#">Privacy Policy</a></div>
                    </div>
                </div>
         
            </div>
        </footer>		

        <!-- JS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css"/>
        <!--[if IE 7]>
            <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome-ie7.css">
            <![endif]-->		
        <!-- Favicon -->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/custom.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css"/>
    </body>
</html>