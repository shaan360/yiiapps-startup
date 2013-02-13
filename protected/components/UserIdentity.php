<?php

/**
 * UserIdentity.php
 *
 * This class represents a user identity and this is able to authenticate a user.
 *
 * @author: Shaan <shaan@uexel.com>
 * Date: 7/22/12
 * Time: 8:36 PM
 *
 *
 */
class UserIdentity extends CUserIdentity {

    /**
     * @var integer id of logged user
     */
    private $_id;

    const ERROR_STATUS_NOTACTIV = 0;
    const ERROR_STATUS_BAN = 1;
    const ERROR_ARRPOVED = 1;

    // const ERROR_EMAIL_INVALID = 1;

    /**
     * Authenticates username and password
     * @return boolean CUserIdentity::ERROR_NONE if successful authentication
     */
    public function authenticate() {
        $attribute = strpos($this->username, '@') ? 'email' : 'user_name';
        $user = Members::model()->find(array('condition' => $attribute . '=:loginname', 'params' => array(':loginname' => $this->username)));

        if ($user === null) {
            if (strpos($this->username, "@")) {
                $this->errorCode = self::ERROR_EMAIL_INVALID;
            } else {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
        }
        if (!$user->verifyPassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } if ($user->is_confirmed == 0)
            $this->errorCode = self::ERROR_STATUS_NOTACTIV;
        if ($user->is_blocked == 1)
            $this->errorCode = self::ERROR_STATUS_BAN;
        else {
            $user->regenerateValidationKey();
            $this->_id = $user->id;
            $this->username = $user->user_name;
            $this->setState('vkey', $user->active_key);
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode;
    }

    /**
     * Creates an authenticated user with no passwords for registration
     * process (checkout)
     * @param string $username
     * @return self
     */
    public static function createAuthenticatedIdentity($id, $username) {
        $identity = new self($username, '');
        $identity->_id = $id;
        $identity->errorCode = self::ERROR_NONE;
        return $identity;
    }

    /**
     *
     * @return integer id of the logged user, null if not set
     */
    public function getId() {
        return $this->_id;
    }

}