<?php

class UploadController
{
    public $file;
    public $target_file;
    public $error;

    public function __construct($file)
    {
        $this->file = $file;
        $target_dir = "/home/zahra/PhpstormProjects/filesale/Services/uploads/";
//        $target_folder = basename($this->file['name']).rand(1000000,9999999);
        $this->target_file = $target_dir . basename($this->file['name']);
    }

    public static function renderUserUploadPage(){
        include_once '/home/zahra/PhpstormProjects/filesale/Views/user-upload.php';
    }

    public function doUploadFile($user_email){

        if($this->fileNotExists() && $this->fileValidation()){
            //TODO: have to create a ransom string to concat end of file then uploaded and check the file axists based on it

            if (move_uploaded_file($this->file["tmp_name"], $this->target_file)) {
                $file = new File();
                $file->setName($this->file['name']);
                echo $this->file['name'].'<br>';
                $file->setStatus(0);

                $user = new User();
                $user->setEmail($user_email);
                $user->setUserData();
                var_export($user);
                echo $user->getId().'<br>';
                $file->setUserId($user->getId());

                $file->setNewFile();

                echo "The file ". htmlspecialchars( basename( $this->file["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }else{
            echo implode("<br>", $this->error);
        }

    }

    public function fileNotExists(){


        if (file_exists($this->target_file)) {
            $this->error[] = 'file is already exists';
            return false;
        }
        return true;

    }

    public function fileValidation()
    {
        if($this->sizeFileValidation() && $this->typeFileValidation()){
            return true;
        }
        else
            return false;
    }

    public function typeFileValidation()
    {
//        $file_type = strtolower(pathinfo($this->file['name'],PATHINFO_EXTENSION));
//        if ($file_type !== ) {
//            $this->error[]= 'file type is invalid. must be';
//            return false;
//        }
        return true;
    }

    public function sizeFileValidation()
    {
        $general_setting_controller = new GeneralSettingController();
        $max_size_in_megabyte = $general_setting_controller->getGeneralSetting()->file_max_size;
        if ($this->file['size'] > $max_size_in_megabyte * pow(10, 6)) {
            $this->error[] = "file size must bee less than $max_size_in_megabyte MB";
            return false;
        }
        return true;
    }

}