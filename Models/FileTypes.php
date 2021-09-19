<?php

class FileTypes
{

    //TODO: this types must convert to known format for php core to file type validation

    private $type_names = array();

    public function fetchSetting(){
        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "SELECT `file_type_allowed` FROM `generalـsettings`";
        $result = $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

        if(mysqli_num_rows($result) != 0){

            $row = $result->fetch_assoc();
            $this->type_names = json_decode($row['file_type_allowed'] , true);

            return true;

        }else{
            return false;
        }

    }

    /**
     * @return array|mixed
     */
    public function getTypeNames(): mixed
    {
        return $this->type_names;
    }

    public function addType($name){
        $this->type_names[] = $name;
    }

    public function removeType($name){
        unset($this->type_names['name']);
    }

    public function insertNewTypes(){
        $json_types = json_encode($this->type_names);

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "UPDATE `generalـsettings` SET `file_type_allowed`=$json_types";
        $result = $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

    }

}

