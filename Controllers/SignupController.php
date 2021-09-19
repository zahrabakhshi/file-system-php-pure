<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

class SignupController
{
    public $email;
    public $phone_number;
    public $password;
    public $repassword;

    public function __construct(
        $email,
        $phone_number,
        $password,
        $repassword
    )
    {
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password = $password;
        $this->repassword = $repassword;
    }

    public function doSignup()
    {
        $signup_validation = new SignUpValidation(
            $this->email,
            $this->phone_number,
            $this->password,
            $this->repassword
        );

        if($signup_validation->checkValidation()){

            $new_user = new User();
            $new_user->setEmail($this->email);
            $new_user->setPhoneNumber($this->phone_number);
            $new_user->setPassword($this->password);
            if($new_user->insertNewUser()){
                echo 'successfully added user';
            }else
                echo 'no';

        }else{
            var_export($signup_validation->getErrors());
            echo 'signup validation failed';
        }

    }

    public function doLogin(){
        $login = new LoginController();
        if (!$login->doLogin($this->email, $this->password)) {
            echo $login->getLogginErrors();
        }
    }

}
