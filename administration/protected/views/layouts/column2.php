<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="span2">
        <div class="sidebar">
            <?php
            $this->widget('bootstrap.widgets.TbMenu', array(
                'type' => 'list',
                'items' => array(
                    array('label' => 'Dashboard', 'icon' => 'home', 'url' => array('/')),
                    array('label' => 'User'),
                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/user/admin')),
                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/user/create')),
//                    array('label' => 'Posts'),
//                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/post/admin')),
//                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/post/create')),
                    array('label' => 'Members'),
                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/members/admin')),
                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/members/create')),
                    array('label' => 'Domains'),
                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/domains/admin')),
                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/domains/create')),
                    array('label' => 'Orders'),
                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/orders/admin')),
                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/orders/create')),                   
                    array('label' => 'Categories'),
                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/categories/admin')),
                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/categories/create')),
                    array('label' => 'Inquiry'),
                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/inquiry/admin')),
                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/inquiry/create')),
                    array('label' => 'Lookup'),
                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/lookup/admin')),
                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/lookup/create')),
                    array('label' => 'Tags'),
                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/tag/admin')),
                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/tag/create')),
                    array('label' => 'Websites'),
                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/websites/admin')),
                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/websites/create')),
                    array('label' => 'Pending', 'icon' => 'plus', 'url' => array('/websites/pending')),
//                    array('label' => 'Resource'),
//                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/resource/admin')),
//                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/resource/create')),
//                    array('label' => 'Jobs'),
//                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/jobs/admin')),
//                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/jobs/create')),
//                    array('label' => 'Job Replies'),
//                    array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/jobReplies/admin')),
//                    array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/jobReplies/create')),
//        array('label' => 'Listings'),
//        array('label' => 'Manage', 'icon' => 'cog', 'url' => array('/listings/admin')),
//        array('label' => 'Translations', 'icon' => 'globe', 'url' => array('/translations/admin')),
//        array('label' => 'Add New', 'icon' => 'plus', 'url' => array('/listings/create')),
//        array('label' => 'Listing Galleries', 'icon' => 'picture', 'url' => array('/listingimages/')),
                    
                    array('label' => 'Account'),
                    array('label' => 'Change Password', 'icon' => 'lock', 'url' => array('/site/changepassword'), 'visible' => !Yii::app()->user->isGuest),
                    array('label' => 'Logout', 'icon' => 'off', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                ),
            ));
            ?>
        </div><!-- sidebar -->
    </div>
    <div class="span10">
        <div class="row-fluid">
            <div class="span12">
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => $this->menu,
));
?>
            </div>
        </div>
                <?php echo $content; ?>
    </div>


</div>
        <?php $this->endContent(); ?>
