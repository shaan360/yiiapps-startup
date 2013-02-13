<?php

class WebUser extends CWebUser {

// Store model to not repeat query.
    private $_model;
    private $_userType;
    private $_isSupplier;
    private $_isEndUser;
    private $_isBuyer;

// Return first name.
// access it by Yii::app()->user->first_name
    function getFirstName() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->first_name;
    }

    function getCount() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->itemsCount;
    }
    function getApproved() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->approved;
    }
     function getPending() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->pending;
    }
    function getWanted() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->wanteds;
    }

// This is a function that checks the field 'role'
// in the User model to be equal to 1, that means it's admin
// access it by Yii::app()->user->isAdmin()
    function isAdmin() {
        $user = $this->loadUser(Yii::app()->user->id);
        if ($user === null)
            return 0;
        else
            return intval($user->user_type) == 1;
    }

    public function getLastLoginTime() {
        $user = $this->loadUser(Yii::app()->user->id);
        if ($user === null)
            return 0;
        else
            return $user->last_login;
    }

// Load user model.
    protected function loadUser($id = null) {
        if ($this->_model === null) {
            if ($id !== null)
                $this->_model = Members::model()->findByPk($id);
        }
        return $this->_model;
    }

    public function getIsEndUser() {
        if (!Yii::app()->user->isGuest) {
            $user = $this->loadUser(Yii::app()->user->id);
            if ($user->user_type == 1)
                return true;
            else
                return false;
        }
        else {
            return false;
        }
    }

    public function getIsBuyer() {
        if (!Yii::app()->user->isGuest) {
            $user = $this->loadUser(Yii::app()->user->id);
            if ($user->user_type == 2)
                return true;
            else
                return false;
        }
        else {
            return false;
        }
    }

    public function getIsSupplier() {
        if (!Yii::app()->user->isGuest) {
            $user = $this->loadUser(Yii::app()->user->id);
            if ($user->user_type == 3)
                return true;
            else
                return false;
        } else {
            return false;
        }
    }

    public function getSupplierId() {
        if (!Yii::app()->user->isGuest) {
            $user = $this->loadUser(Yii::app()->user->id);
            if ($user->user_type == 3)
                return $user->supplier->id;
            else
                return false;
        } else {
            return false;
        }
    }

}

?>
