<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

class Role
{
    private $id;
    private $name;

    public function getRoleList(){

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "SELECT `name` FROM `roles`";

        $result = $db->query($query)or die("line: ".__LINE__." cause an error: ".$db->error);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRoleListByUserId($user_id){

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "SELECT role_id FROM user_role WHERE user_id = $user_id ";

        $result =  $db->query($query)or die("line: ".__LINE__." cause an error: ".$db->error);

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

}