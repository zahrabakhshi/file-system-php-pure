<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

class GeneralSetting
{
    public $file_type_allowed;
    public $file_max_size;
    public $max_guest_file_storage_time;

    public function fetchSettings(){

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "SELECT * FROM generalـsettings";
        $result = $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

        if(mysqli_num_rows($result) == 0){
            return false;
        }

        $row = $result->fetch_assoc();

        $this->file_max_size =  $row['file_max_size'];
        $this->file_type_allowed =  json_decode(str_replace("'","",$row['file_type_allowed']),true);
        $this->max_guest_file_storage_time =  $row['max_guest_file_storage_time'];
        return true;

    }

    public function updateSetting(){

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();


        $tmp = array_unique($this->file_type_allowed);

        $file_allowed_str = json_encode($tmp);
        $query = "UPDATE generalـsettings 
            SET  file_type_allowed =  '$file_allowed_str',
                file_max_size= $this->file_max_size,
                max_guest_file_storage_time = $this->max_guest_file_storage_time";

        $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

        return true;
    }

}