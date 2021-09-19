<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');


class UserActivitiesController
{
    public function updateActiveUser($user_id, $active_or_diactive){

        $user = new User();
        $user->setId($user_id);
        $user->setUserData();
        $user->updateAvailable($active_or_diactive);

    }

    public function updateUserAccess($user_id, $access_id){

        $user_access = new UserAceess();
        $user_access->insertUserAccess($user_id , $access_id);

    }

    public function deletUserAcess($user_id, $access_id){

        $user_access = new UserAceess();
        $user_access->deleteUserAccess($user_id , $access_id);

    }

    public function insertUserAcess($user_id, $access_id){

        $user_access = new UserAceess();
        $user_access->insertUserAccess($user_id , $access_id);

    }

}