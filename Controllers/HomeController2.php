<?php


class HomeController2
{


    public static function getRoleList($email){
        $user = new User();
        $user->setEmail($email);
        $user->setUserData();

        $role = new Role();
        $roles = array_column($role->getRoleListByUserId($user->getId()), 'role_id');

        return $roles;
    }

    public static function getOrders($email){
        $user = new User();
        $user->setEmail($email);
        $user->setUserData();

        $orders_data = Sale::getUserOrders($user->getId());

        return $orders_data;

    }


    public function renderHomePage(){
        require_once '/home/zahra/PhpstormProjects/filesale/Views/dashboard.php';
//        return $this->renderView('/var/www/filesale/Views/dashboard.php');
    }

    private function renderView($path){

        ob_start();

        include_once $path;

        $view = ob_get_clean();

        return $view;

    }

}