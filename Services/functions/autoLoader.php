<?php
function autoLoader($class){
    if(file_exists("/home/zahra/PhpstormProjects/filesale/Controllers/".$class.".php")){
        include_once "/home/zahra/PhpstormProjects/filesale/Controllers/".$class.".php";
    }elseif (file_exists("/home/zahra/PhpstormProjects/filesale/Models/".$class.".php")){
        include_once "/home/zahra/PhpstormProjects/filesale/Models/".$class.".php";
    }elseif (file_exists("/home/zahra/PhpstormProjects/filesale/Services/classes/".$class.".php")){
        include_once "/home/zahra/PhpstormProjects/filesale/Services/classes/".$class.".php";
    }
}
