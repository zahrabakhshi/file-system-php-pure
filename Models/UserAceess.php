<?php


class UserAceess
{
    private $id;
    private $user_id;
    private $access_id;

    public function getUserIdsByAccessID($access_id){

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "SELECT `user_id` FROM `user_access` WHERE `access_id` = $access_id ";

        $result =  $db->query($query)or die("line: ".__LINE__." cause an error: ".$db->error);

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;

    }

    public function getAcceessIdsByUserID($user_id){

        $role_obj = new Role();
        $roles = $role_obj->getRoleListByUserId($user_id);

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $role_query_list="";
        if(is_array($roles)){
            $role_query_list .= "( ";
            foreach ($roles as $role){

                $role_query_list .= $role['role_id'].', ';

            }

            $role_query_list = substr($role_query_list , 0, -2);
            $role_query_list .= ' )';

        }else{

            $role_query_list = "(".$roles.")";
        }

        $query = "SELECT access_id FROM role_access WHERE role_id IN $role_query_list";

        $result =  $db->query($query)or die("line: ".__LINE__." cause an error: ".$db->error);

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;

    }

    public function insertUserAccess($user_id, $access_id){

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "INSERT INTO `user_access`(`user_id`, `access_id`) VALUES ($user_id,$access_id)";

        $$db->query($query)or die("line: ".__LINE__." cause an error: ".$db->error);

    }

    public function updateUserAccess($user_id, $access_id){

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "UPDATE `user_access` SET `access_id`=$access_id WHERE `user_id` = $user_id";

        $$db->query($query)or die("line: ".__LINE__." cause an error: ".$db->error);

    }

    public function deleteUserAccess($user_id , $access_id){

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "DELETE FROM `user_access` WHERE `user_id` = $user_id AND `access_id` = $access_id";

        $db->query($query)or die("line: ".__LINE__." cause an error: ".$db->error);

    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getAccessId()
    {
        return $this->access_id;
    }

    /**
     * @param mixed $access_id
     */
    public function setAccessId($access_id): void
    {
        $this->access_id = $access_id;
    }



}