<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');


class UserAccessController
{

    public function getUserAceess($user_id){

        $user_access = new UserAceess();
        $user_access->getAceessIdsByUserID($user_id);

    }

}
phpinfo();