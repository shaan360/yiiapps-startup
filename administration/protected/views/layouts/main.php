<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="language" content="en"/>

	<link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/favicon.ico" type="image/x-icon"/>
	<!-- blueprint CSS framework -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css"
	      media="print"/>
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css"
	      media="screen, projection"/>
	<![endif]-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<?php $this->widget('bootstrap.widgets.TbNavbar', array(
	'type' => '', // null or 'inverse'
	'brand' => 'uPanel',
	'brandUrl' => '#',
	'collapse' => true, // requires bootstrap-responsive.css
	'items' => array(
		array(
			'class' => 'bootstrap.widgets.TbMenu',
			'items' => array(
			//	array('label' => 'Home', 'url' => array('/site/index')),
			//	array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
			//	array('label' => 'Contact', 'url' => array('/site/contact')),
			//	array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
			//	array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
			),
		),
		//'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
		(!Yii::app()->user->isGuest) ? '<p class="navbar-text pull-right">Logged in as <a href="#">'. Yii::app()->user->name. '</a></p>' : '',
		array(
			'class' => 'bootstrap.widgets.TbMenu',
			'htmlOptions' => array('class' => 'pull-right'),
			'items' => array(
                            				array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
				array('label' => 'Dashboard', 'url' => array('/'), 'visible' => !Yii::app()->user->isGuest),
				'---',
				array('label' => 'Account', 'url' => '#', 'items' => array(
					array('label' => 'Profile Settings', 'url' => array('/user/update/'.yii::app()->user->id)),
					array('label' => 'Change Password', 'url' => array('/site/changepassword')),
					'---',
					array('label' => 'Logout', 'url' => array('/site/logout')),
				), 'visible' => !Yii::app()->user->isGuest),
			),
		),
	),
)); ?>
    <div class="container" id="page">

	<!-- mainmenu -->
		
                <div class="content">
                    <?php if (isset($this->breadcrumbs)): ?>
			<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		<?php endif?>
		<?php echo $content; ?>
                </div> <hr/>
		<div id="footer">
			Copyright &copy; <?php echo date('Y'); ?> by www.uexel.com.<br/>
			All Rights Reserved.<br/>
		</div>
		<!-- footer -->
</div>
<!-- page -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css"/>
</body>
</html>