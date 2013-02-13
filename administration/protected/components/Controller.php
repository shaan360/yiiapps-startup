<?php

/**
 * Controller.php
 *
 * @author: Shaan <shaan@uexel.com>
 * Date: 7/23/12
 * Time: 12:55 AM
 */
class Controller extends CController {

    public $pageTitle = 'Yii framework developers ,Jobs,Tutorials,Projects | yiiapps.com';
    public $pageDesc = 'yiiapps.com is all about interesting and big yii apps,yii developers,yii tips,yii coumunity ,yii jobs on internet';
    public $pageRobotsIndex = true;
    public $pageOgTitle = '';
    public $pageOgDesc = '';
    public $pageOgImage = '';

    /**
     * @var string the default layout for the controller view. Defaults to 'column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function display_seo() {
        // STANDARD TAGS
        // -------------------------
        // Title/Desc
        echo "\t" . '' . PHP_EOL;
        echo "\t" . '<meta name="description" content="', CHtml::encode($this->pageDesc), '">' . PHP_EOL;

        // Option for NoIndex
        if ($this->pageRobotsIndex == false) {
            echo '<meta name="robots" content="noindex">' . PHP_EOL;
        }

        // OPEN GRAPH(FACEBOOK) META
        // -------------------------
        if (!empty($this->pageOgTitle)) {
            echo "\t" . '<meta property="og:title" content="', CHtml::encode($this->pageOgTitle), '">' . PHP_EOL;
        }
        if (!empty($this->pageOgDesc)) {
            echo "\t" . '<meta property="og:description" content="', CHtml::encode($this->pageOgDesc), '">' . PHP_EOL;
        }
        if (!empty($this->pageOgImage)) {
            echo "\t" . '<meta property="og:image" content="', $this->pageOgImage, '">' . PHP_EOL;
        }
    }

// // Basic
//    $this->pageTitle = 'Your Custom Title Tag';
//    $this->pageDesc = 'Your custom description here';
//
//    // Example For a Model View. Appends app name set in config 
//    $this->pageTitle = 'Your Title Tag | '.$model->name.' | '.Yii::app()->name;
//
//    // For Facebook Sharing
//    $this->pageOgTitle = $this->pageTitle;
//    $this->pageOgDesc = $this->pageDesc;
//    $this->pageOgImage = '/images/example.jpg';
//
//    // If you don't want the page indexed
//    $this->pageTitle = 'Some page to still crawl, but not index';
//    $this->pageRobotsIndex = false;
}
