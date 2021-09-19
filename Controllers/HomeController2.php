<?php


class HomeController2
{

    public $panel_list;

    public function setPanelList($email){
        $user = new User();
        $user->setEmail($email);
        $user->setUserData();

        $user_access = new UserAceess();
        $user_accesses = $user_access->getAcceessIdsByUserID($user->getId());
        $user_accesses_friendly = array_column($user_accesses,'access_id');

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