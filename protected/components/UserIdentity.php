<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    /*public function authenticate()
    {
        $users=array(
            // username => password
            'demo'=>'demo',
            'admin'=>'admin',
        );
        if(!isset($users[$this->username]))
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        elseif($users[$this->username]!==$this->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
            $this->errorCode=self::ERROR_NONE;
        return !$this->errorCode;
    }*/
    public $userType = 'Front';

    public function authenticate()
    {
        if ($this->userType == 'Front') // This is front login
        {
            // check if login details exists in database
            $member = Members::model()->findByAttributes(array('uname' => $this->username));
            if ($member === null) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            } else if ($member->pwd !== md5($this->password)) // here I compare db password with password field
            {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->setState('userId', $member->id);
                $this->setState('name', $member->uname);
                $this->errorCode = self::ERROR_NONE;
                $this->data = $member;
            }
            return !$this->errorCode;
        }
        if ($this->userType == 'Back') // This is admin login
        {
            // check if login details exists in database
            //$member = Members::model()->findByAttributes(array('email' => $this->username)); // here I use Email as user name which comes from database
            $member = Members::model()->findByAttributes(array(), "`uname`='{$this->username}' OR `email`='{$this->username}'");

            if ($member === null) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            } else if ($member->pwd !== md5($this->password)) // let we have base64_encode password in database
            {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->setState('isAdmin', 1);
                // Yii::app()->user->getState('isAdmin'));
                $this->setState('userId', $member->id);
                $this->setState('name', $member->uname);
                $this->errorCode = self::ERROR_NONE;

                // Add user data to session
                $this->setState('data', $member);
            }
            return !$this->errorCode;
        }
    }
}