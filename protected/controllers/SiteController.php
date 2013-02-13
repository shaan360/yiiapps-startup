<?php

class SiteController extends Controller {

    public $layout = 'column1';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CaptchaExtendedAction',
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
            'search'=>array(
                            'class'=>'common.extensions.esearch.SearchAction',
                            'model'=>'Domains',
                            'attributes'=>array('title', 'tags', 'content'),
                        ),
        
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
                array('allow',  // allow all users to perform 'index' and 'view' actions
                        'actions'=>array('index','view', 'captcha'),
                        'users'=>array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('create','update','changepassword','email_for_reset','password_reset'),
                        'users'=>array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions'=>array('admin','delete'),
                        'users'=>array('admin'),
                ),
                array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {

        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionThanks() {
        $this->layout = 'register';
        $this->render('thanks');
    }

    public function actionIndex() {
             $this->layout = 'column1';
//        $dataProvider = new CActiveDataProvider('Websites',
//                        array('pagination' => array('pageSize' => 3)));
        $this->render('index', array(
            //'dataProvider' => $dataProvider,
        ));
//        $model = new Members;
//        //  $model->scenario='register';
//        // Uncomment the following line if AJAX validation is needed
//        // $this->performAjaxValidation($model);
//
//        if (isset($_POST['Members'])) {
//            $model->attributes = $_POST['Members'];
//
//
//            if ($model->save())
//                $this->redirect(array('view', 'id' => $model->id));
//        }
//        $this->render('register', array(
//            'model' => $model,
//        ));
    }

    /**
     * Displays the contact page
     */
      public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                /** example code */
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
            }
            }
        
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = 'no-header1';
        $model = new LoginForm();

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model, array('username', 'password', 'verifyCode'));
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate(array('username', 'password', 'verifyCode')) && $model->login()) {
                $this->setlastLogin();
                $this->redirect(user()->returnUrl);
            }
        }

        $sent = r()->getParam('sent', 0);
        $this->render('login', array(
            'model' => $model,
            'sent' => $sent,
        ));
    }

    private function setlastLogin() {
        $lastVisit = Members::model()->findByPk(Yii::app()->user->id);
        $lastVisit->last_login = date("Y-m-d H:i:s");
        $lastVisit->save();
    }
    

    public function actionEmail_for_reset() {

        if (isset($_POST['Members'])) {
            $email = $_POST['Members']['email'];
            $criteria = new CDbCriteria;
            $criteria->condition = 'email=:email';
            $criteria->params = array(':email' => $email);
            $user = Members::model()->find($criteria);
            if (!$user) {
                $errormsg = Yii::t('passwordreset', 'No user with this email in our records');
                Yii::app()->user->setFlash('error', $errormsg);
                $this->refresh();
            }
            $key = md5(mt_rand() . mt_rand() . mt_rand());
            $user->active_key = $key;
            $reset_url = $this->createAbsoluteUrl('site/password_reset', array('key' => $key, 'email' => $email));
            $user->save();

            if (XHtml::sendHtmlEmail(
                            $user->email, Yii::app()->name . ' Administrator', null, Yii::t('reset', 'Password reset.'), array('username' => $user->user_name, 'reset_url' => $reset_url), 'pwd_reset', 'main'
                    )
            ) {
                $infomsg = Yii::t('passwordreset', 'We have sent you a reset link,please check your email inbox.');
                Yii::app()->user->setFlash('info', $infomsg);
                $this->refresh();
            } else {
                $errormsg = Yii::t('passwordreset', 'We could not email you the password reset link');
                Yii::app()->user->setFlash('info', $errormsg);
                $this->refresh();
            }
        }

        $model = new Members;
        $this->render('email_for_reset', array('model' => $model));
    }

    public function actionPassword_reset($key, $email) {

        if (isset($_POST['Members'])) {
            $new_password = $_POST['Members']['password'];
            $key = $_POST['Members']['key'];
            $email = $_POST['Members']['email'];
              

            $criteria = new CDbCriteria;
            //$criteria->condition = 'active_key=:active_key AND email=:email';
            //$criteria->params = array(':active_key' => $key, ':email' => $email);
            $criteria->condition = 'email=:email';
            $criteria->params = array(':email' => $email);
            $user = Members::model()->find($criteria);

            if (!$user) {
                $errormsg = Yii::t('passwordreset', 'Error,your account information was not found.
                Your reset token has probably been used or  expired.Please repeat the password reset process.');
                Yii::app()->user->setFlash('error', $errormsg);
                $this->refresh();
            }
            $user->password = $new_password;
            $user->active_key = NULL;

            if ($user->save()) {
                $msg = Yii::t('passwordreset', 'Your password has been reset.Log in with your new password.');
                Yii::app()->user->setFlash('success', $msg);
                $this->redirect(bu() . 'site/login');
            } else {
                $error = Yii::t('passwordreset', 'Error,could not reset your password.');
                Yii::app()->user->setFlash('error', $error);
                $this->refresh();
            }
        }

        $model = new Members;
        $this->render('password_reset', array('model' => $model, 'key' => $key, 'email' => $email));
    }

    public function actionActivate($key, $email) {
        $criteria = new CDbCriteria;
        $criteria->condition = 'active_key=:active_key AND email=:email';
        $criteria->params = array(':active_key' => $key, ':email' => $email);
        $user = Members::model()->find($criteria);
        if ($user) {
            $user->active_key = NULL;
            $user->is_confirmed = Members::STATUS_ACTIVE;
            $user->save(false); //user has already  been validated when saved for the forst time.
            $successmsg = Yii::t('registration', ',welcome! Your account has been activated.Now you can log in.');
            Yii::app()->user->setFlash('success', $user->user_name . $successmsg);
            $this->redirect(bu().'site/login');
        } else {
            $errormsg = Yii::t('registration', ' Error.Your account could not be activated,please repeat the registration process.');
            $criteria = new CDbCriteria;
            $criteria->condition = ' email=:email';
            $criteria->params = array(':email' => $email);
            $user = Members::model()->find($criteria);
            $user->delete();
            Yii::app()->user->setFlash('error', $errormsg);
            $this->redirect(bu().'members/register');
        }
    }

    public function actionChangepassword() {
                $this->layout = 'column1';

        $model = new ChangePassword;
        if (Yii::app()->user->id) {

            // ajax validator
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'changepassword-form') {
                echo UActiveForm::validate($model);
                Yii::app()->end();
            }

            if (isset($_POST['ChangePassword'])) {
                $model->attributes = $_POST['ChangePassword'];
                if ($model->validate()) {
                    if (Members::changepassword(Yii::app()->user->id, $model->password))
                        Yii::app()->user->setFlash('success', "New password is saved.");
                    else
                        Yii::app()->user->setFlash('error', "Something Went Wrong Please try later");
                    $this->refresh();
                }
            }
            $this->render('changepassword', array('model' => $model));
        }
        else if (Yii::app()->user->isGuest) {
            // ajax validator
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'changepassword-form') {
                echo UActiveForm::validate($model);
                Yii::app()->end();
            }

            if (isset($_POST['ChangePassword'])) {
                $model->attributes = $_POST['ChangePassword'];
                if ($model->validate()) {
                    $find = Members::model()->findByAttributes(array('email' => $_GET['email']));
                    if (Members::changepassword($find->id, $model->password))
                        Yii::app()->user->setFlash('success', "Password has chnaged , Now You Can login with new One.!");
                    else
                        Yii::app()->user->setFlash('error', "Something Went Wrong Please try later");
                    $this->refresh();
                }
            }
            $this->render('changepassword', array('model' => $model));
        }
    }
    
     public function actionPricing() {
        $this->render('pricing');
    }
    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
