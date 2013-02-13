<?php
/**
 * UserChangePassword class.
 * UserChangePassword is the data structure for keeping
 * user change password form data. It is used by the 'changepassword' action of 'UserController'.
 */
class ChangePassword extends CFormModel {
	public $password;
	public $verifypassword;
	
	public function rules() {
		return array(
			array('password, verifypassword', 'required'),
			array('verifypassword', 'compare', 'compareAttribute'=>'password'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'password'=>"Password",
			'verifypassword'=>"Retype Password",
		);
	}
} 