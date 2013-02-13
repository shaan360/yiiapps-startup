<?php

/**
 * main.php
 *
 * This file holds frontend configuration settings.
 *
 * @author: Shaan <shaan@uexel.com>
 * Date: 7/22/12
 * Time: 5:48 PM
 */
$frontendConfigDir = dirname(__FILE__);

$root = $frontendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($frontendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('media', $root . DIRECTORY_SEPARATOR . 'media');

//Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend');
//Yii::setPathOfAlias('www', $root. DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'www');

$mainLocalFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile) ? require($mainLocalFile) : array();

$mainEnvFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
                array(
            // @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
            // set parameters
            'params' => $params,
            //name of site
            'name' => 'YiiApps.com Startup',
            // preload components required before running applications
            // @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
            'preload' => array('log', 'bootstrap'),
            // @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail
            'language' => 'en',
            // uncomment if a theme is used
            'theme' => 'appsfront',
            // setup import paths aliases
            // @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
            'import' => array(
                'common.components.*',
                'common.extensions.*',
                'common.models.*',
                'common.extensions.helpers.XHtml',
                'common.extensions.esearch.*',
                //'common.extensions.captchaExtended.*',
                // uncomment if behaviors are required
                // you can also import a specific one
                /* 'common.extensions.behaviors.*', */
                // uncomment if validators on common folder are required
                /* 'common.extensions.validators.*', */
                'application.components.*',
                'application.controllers.*',
                'application.models.*'
            ),
            'modules' => array(
                'mailbox' =>
                array(
                    'userClass' => 'Members',
                    'userIdColumn' => 'id',
                    'usernameColumn' => 'user_name',
                    //'cssFile' => '',
                    //'menuPosition' => '',
                    //'alternateRows  ' => '',
                    //'juiButtons' => '',
                    //'defaultSubject' => 'this is default subject',
                    
                ),

            ),
            /* uncomment and set if required */
            // @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
            /* 'modules' => array(), */
            'components' => array(
                'user' => array(
                    // enable cookie-based authentication
                    'allowAutoLogin' => true,
                //    'class' => 'WebUser',
                ),
                'mailer' => array(
                    'class' => 'common.extensions.mailer.EMailer',
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
                    'caseSensitive' => false,
                    'rules' => array(
                        '' => array('site/index', 'urlSuffix' => ''),
                        'register' => array('members/register', 'urlSuffix' => ''),
                        'thanks' => array('site/thanks', 'urlSuffix' => ''),
                        'cn' => array('site/cn', 'urlSuffix' => ''),
                        'forgot' => array('site/email_for_reset', 'urlSuffix' => ''),
                        'login' => array('site/login', 'urlSuffix' => ''),
                        'contact' => array('site/contact', 'urlSuffix' => ''),
                        'everything' => array('site/all', 'urlSuffix' => ''),
                        'popular' => array('site/popular', 'urlSuffix' => ''),
                        'developers' => array('members/index', 'urlSuffix' => ''),
                        'opportunities/<id:\d+>/<title:.*?>' => array('jobs/view', 'urlSuffix' => ''),
                        'category/<name:.*?>_<id:\d+>' => array('categories/view', 'urlSuffix' => ''),
                        'member/<id:\d+>/<title:.*?>' => array('members/view', 'urlSuffix' => ''),
                        'domain/<id:\d+>_<title:.*?>' => array('domains/view', 'urlSuffix' => ''),
                        '<controller:\w+>_<id:\d+>' => '<controller>/view',
                        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                    ),
                ),
                'bootstrap' => array(
                    'class' => 'common.extensions.bootstrap.components.Bootstrap',
                    'responsiveCss' => true,
                ),
                'errorHandler' => array(
                    // @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
                    'errorAction' => 'site/error'
                ),
            ),
                /* make sure you have your cache set correctly before uncommenting */
                /* 'cache' => $params['cache.core'], */
                /* 'contentCache' => $params['cache.content'] */
                ), CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);