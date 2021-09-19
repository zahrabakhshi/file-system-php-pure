<?php


class PasswordCription
{
    private $entered_pass;

    public function __construct($password){
        $this->entered_pass = $password;
    }

    public function getCryptPassword(){

        return crypt($this->entered_pass , password_hash($this->entered_pass , PASSWORD_DEFAULT));

    }


}