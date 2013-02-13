<?php

class WebUser extends CWebUser {

// Store model to not repeat query.
    private $_model;
//    Phopus Role
    private $_email;
    private $_username;
    private $_lastlogin;
    private $_image;

    //public $returnUrl = array("site/dashboard");

    /**
     * Initializes the application component.
     * This changes the order of the redirection so that the user session state 
     * takes precedence.
     */
//    public function init() {
//        parent::init();
//
//        // set redirecting url as highest priority
//        if (!Yii::app()->request->isAjaxRequest)
//            $this->setReturnUrl(Yii::app()->request->getUrl());
//    }

    function getUsername() {
        if (!Yii::app()->user->isGuest) {
            $user = $this->loadUser(Yii::app()->user->id);
            if ($user != null) {
                return $user->username;
            }
        }
        else
            return false;
    }

    function getEmail() {
        if (!Yii::app()->user->isGuest) {
            $user = $this->loadUser(Yii::app()->user->id);
            if ($user != null) {
                return $user->email;
            }
        }
        else
            return false;
    }

    function getImage() {
        if (!Yii::app()->user->isGuest) {
            $user = $this->loadUser(Yii::app()->user->id);
            if ($user != null) {
                return $user->image;
            }
        }
        else
            return false;
    }

    function getLastlogin() {
        if (!Yii::app()->user->isGuest) {
            $user = $this->loadUser(Yii::app()->user->id);
            if ($user != null) {
                return $user->last_login;
            }
        }
        else
            return false;
    }

    // Load user model.
    protected function loadUser($id = null) {
        if ($this->_model === null) {
            if ($id !== null)
                $this->_model = User::model()->findByPk($id);
        }
        return $this->_model;
    }

}

?>
