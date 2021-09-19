<?php
include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';


class LoginController
{
    private $errors;

    public function renderLoginPage(){
        require_once '/home/zahra/PhpstormProjects/filesale/Views/login.php';
    }

    public static function checkLogin($email){
        if(!isset($_SESSION['email']) && $_SESSION['email'] != $email){
//            header("Location: /Views/login.php");
        }else return true;
    }

    private function renderView($path){

        ob_start();

        include_once $path;

        $view = ob_get_clean();

        return $view;

    }

    public function doLogin($email, $password){

        $login_validation = new LoginValidation($email, $password);
        $validation_success = $login_validation->checkValidation();

        $authentication = new AuthenticateController($email, $password);
        $authentication_success = $authentication->authenticate();

        if($validation_success && $authentication_success){

            $_SESSION['email'] = $email;
//            include '/var/www/filesale/Views/dashboard.php';
            header("Location:?route=dashboard-page");
            return  true;

        }elseif($authentication_success && !$validation_success){

            $this->errors = $login_validation->getErroers();
            return false;

        }elseif (!$authentication_success && $validation_success){

            $this->errors = $authentication->get_errors();
            return false;

        }else{
            $this->errors = $login_validation->getErroers();
            $this->errors = array_merge($this->errors, $authentication->get_errors());
            return false;
        }

    }

    public function getLogginErrors(){
        return implode('<br>',$this->errors);
    }

}
//$log = new LoginController();
//$log->doLogin('2','2');