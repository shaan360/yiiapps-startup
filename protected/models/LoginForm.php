<?php

/**
 * LoginForm.php
 *
 * @author: Shaan <shaan@uexel.com>
 * Date: 7/22/12
 * Time: 8:37 PM
 */
class LoginForm extends CFormModel {
    // maximum number of login attempts before display captcha

    const MAX_LOGIN_ATTEMPTS = 3;

    public $username;
    public $password;
    public $email;
    public $rememberMe;
    //public $verifyCode;
    private $_identity;
    private $_user = null;

    /**
     * Model rules
     * @return array
     */
    public function rules() {
        return array(
            array('username, password', 'required'),
            array('username', 'length', 'max' => 45),
            array('password', 'length', 'max' => 50, 'min' => 6),
            //	array('verifyCode', 'validateCaptcha'),
            array('password', 'authenticate'),
            array('rememberMe', 'boolean'),
            array('email', 'email'),
            array('email', 'length', 'max' => 125),
            array('email', 'exist', 'className' => 'Customer'),
        );
    }

    /**
     * Returns attribute labels
     * @return array
     */
    public function attributeLabels() {
        return array(
            'username' => Yii::t('labels', 'Username or e-mail'),
            'rememberMe' => Yii::t('labels', 'Remember me next time'),
        );
    }

    /**
     * Authenticates user input against DB
     * @param $attribute
     * @param $params
     */
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {  // we only want to authenticate when no input errors
            $identity = new UserIdentity($this->username, $this->password);
            $identity->authenticate();
            switch ($identity->errorCode) {
                case UserIdentity::ERROR_NONE:
                    $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
                    Yii::app()->user->login($identity, $duration);
                    break;
                case UserIdentity::ERROR_EMAIL_INVALID:
                    $this->addError("username", "Email is incorrect.");
                    break;
                case UserIdentity::ERROR_USERNAME_INVALID:
                    $this->addError("username", "Username is incorrect.");
                    break;
                case UserIdentity::ERROR_STATUS_NOTACTIV:
                    $this->addError("username", "Your account is not activated.");
                    break;
                case UserIdentity::ERROR_STATUS_BAN:
                    $this->addError("username", "Your account is blocked.");
                    break;
                case UserIdentity::ERROR_PASSWORD_INVALID:
                    $this->addError("password", "Password is incorrect.");
                    break;
            }
        }
    }

    /**
     * Validates captcha code
     * @param $attribute
     * @param $params
     */
    public function validateCaptcha($attribute, $params) {
        if ($this->getRequireCaptcha())
            CValidator::createValidator('captcha', $this, $attribute, $params)->validate($this);
    }

    /**
     * Login
     * @return bool
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }
    }

    /**
     * Returns
     * @return null
     */
    public function getUser() {
        if ($this->_user === null) {
            $attribute = strpos($this->username, '@') ? 'email' : 'user_name';
            $this->_user = Members::model()->find(array('condition' => $attribute . '=:loginname', 'params' => array(':loginname' => $this->username)));
        }
        return $this->_user;
    }

    /**
     * Returns whether it requires captcha or not
     * @return bool
     */
    public function getRequireCaptcha() {
        return ($user = $this->user) !== null;
    }

}
