<?php

class File
{
    private $id;
    private $user_id;
    private $name;
    private $status;
    private $download_count;

//TODO: change it to static func
    public function getAllFileOwner()
    {

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "SELECT files.id , files.user_id , files.name as file_name , files.status, users.name as user_name , users.email FROM files,users WHERE files.user_id = users.id ORDER BY status";

        $result = $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

        if (!$result) {
            die('unsuccessfuly get all files');
        }

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function setNewFile()
    {

        if (isset($this->user_id) && isset($this->name) && isset($this->status)) {

            $connection = new DbConnection();
            $db = $connection->getMysqliObj();

            $query = "INSERT INTO files (user_id, name, status) 
                            VALUES ('$this->user_id','$this->name','$this->status')";

            $result = $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

            if (!$result) {
                die('unsuccessful set new user');
            }

        } else {
            die('file data must set before insert');
        }
    }

    public function confirmFiles($file_id_list)
    {
        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        if (is_array($file_id_list)) {
            foreach ($file_id_list as $id => $status) {
                $query = "UPDATE files SET status='$status' WHERE id = $id";
                $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

            }
        } else {
            $query = "UPDATE files SET status='1' WHERE id = '$file_id_list'";
            $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);
        }

    }
    
    public function getFileDataById($file_id){
        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "SELECT * FROM files WHERE id = $file_id";

        $result = $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

        return $result->fetch_assoc();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }


}