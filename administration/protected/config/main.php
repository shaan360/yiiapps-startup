<?php

/**
 * main.php
 *
 * @author: Shaan <shaan@uexel.com>
 * Date: 7/22/12
 * Time: 5:48 PM
 *
 * This file holds the configuration settings of your backend application.
 * */
$backendConfigDir = dirname(__FILE__);

$root = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($backendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('media', $root . DIRECTORY_SEPARATOR . 'media');
Yii::setPathOfAlias('upanel', $root . DIRECTORY_SEPARATOR . 'upanel');
/* uncomment if you need to use frontend folders */
//Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend'); 


$mainLocalFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile) ? require($mainLocalFile) : array();

$mainEnvFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
                array(
            'name' => 'Buriver',
            // @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
            //     'basePath' => 'adm',
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
            // set parameters
            'params' => $params,
            // preload components required before running applications
            // @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
            'preload' => array('bootstrap', 'log'),
            // @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail
            'language' => 'en',
            // using bootstrap theme ? not needed with extension
            'theme' => 'backend',
            // setup import paths aliases
            // @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
            'import' => array(
                'common.components.*',
                'common.extensions.*',
                'common.extensions.helpers.XHtml',
                /* uncomment if required */
                /* 'common.extensions.behaviors.*', */
                /* 'common.extensions.validators.*', */
                'common.models.*',
                // uncomment if behaviors are required
                // you can also import a specific one
                /* 'common.extensions.behaviors.*', */
                // uncomment if validators on common folder are required
                /* 'common.extensions.validators.*', */
                'application.components.*',
                'application.controllers.*',
                'application.models.*'
            ),
            'aliases' => array(
                'xupload' => 'common.extensions.xupload'
            ),
            /* uncomment and set if required */
            // @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
            'modules' => array(
                'gii' => array(
                    'class' => 'system.gii.GiiModule',
                    'password' => 'uexel',
                    'generatorPaths' => array(
                      'bootstrap.gii'
                    ),
                )
            ),
            'components' => array(
                /* load bootstrap components */
                'bootstrap' => array(
                    'class' => 'common.extensions.bootstrap.components.Bootstrap',
                    'responsiveCss' => true,
                ),
                 'mailer' => array(
                    'class' => 'common.extensions.mailer.EMailer',
                ),
                'errorHandler' => array(
                    // @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
                    'errorAction' => 'site/error'
                ),
                'db' => array(
                    'connectionString' => 'mysql:host=localhost;dbname=yiiapps_startup',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => '',
                    'charset' => 'utf8',
                //'tablePrefix' => 'tbl_',
                ),
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    'urlSuffix' => '/',
                    'rules' => $params['url.rules']
                ),
            ),
            /* make sure you have your cache set correctly before uncommenting */
            /* 'cache' => $params['cache.core'], */
            /* 'contentCache' => $params['cache.content'] */
            'params' => array(
                // this is displayed in the header section
                'title' => 'DPS',
                // this is used in error pages
                'adminEmail' => 'webmaster@example.com',
                // number of posts displayed per page
                'postsPerPage' => 10,
                // maximum number of comments that can be displayed in recent comments portlet
                'recentCommentCount' => 10,
                // maximum number of tags that can be displayed in tag cloud portlet
                'tagCloudCount' => 20,
                // whether post comments need to be approved before published
                'commentNeedApproval' => true,
                // the copyright information displayed in the footer section
                'copyrightInfo' => 'Copyright &copy; 2012 by Yii Apps.',
                'appTitle' => 'DPS',
                'appDescription' => 'Total Local Done',
                'uploadDir' => '../../../media',
            ),
                ), CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);