<?php


class LoginValidation
{
    private $username;
    private $password;
    private array  $errors;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function checkValidation(){
        if($this->checkSet() &&
        $this->checkEmpty()){
            return  true;
        }else
            return false;
    }

    private function checkSet()
    {
        $return_value = true;
        if (!isset($this->username)){
            $this->errors[] = 'عنصر ورودی نام کاربری باید ارسال شود';
            $return_value = false;
        }
        if(!isset($this->password)){
            $this->errors[] = 'عنصر ورودی رمز عبور باید ارسال شود';
            $return_value = false;
        }
        return $return_value;
    }

    private function checkEmpty()
    {
        $return_value = true;
        if (empty($this->username)){
            $this->errors[] = 'نام کاربری نمیتواند خالی باشد';
            $return_value = false;
        }
        if(empty($this->password)){
            $this->errors[] = 'رمز عبور نمیتواند خالی باشد';
            $return_value = false;
        }
        return $return_value;
    }

    public function getErroers(){
        return $this->errors;
    }
}