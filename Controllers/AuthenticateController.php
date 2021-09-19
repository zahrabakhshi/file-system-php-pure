<?php
include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

class AuthenticateController
{
    private $username;
    private $password;
    private array $errors;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate(): bool
    {
        $user = new User();
        $user->setEmail($this->username);
        if ($user->setUserData()) {
            $password = $user->getPassword();
            if (!password_verify($this->password ,$password)) {
                $this->errors[] = 'نام کاربری یا رمز عبور اشتباه است';
                return false;
            } else {
                return true;
            }
        } else {
            $this->errors[] = 'نام کاربری یا رمز عبور اشتباه است';
            return false;
        }
    }

    public function get_errors()
    {
        return $this->errors;
    }


}