<?php

class FileController
{

    public static function renderConfirmationPage(){
        include_once '/home/zahra/PhpstormProjects/filesale/Views/confirmation.php';
    }

    public function getFilesTable(){
        $file = new File();
        return $file->getAllFileOwner();
    }

    public function confirmFiles($file_list_posted){

        $file = new File();
        $file->confirmFiles($file_list_posted);

    }

}