<?php


class SignOut
{
    public function __construct(){
        session_unset();
        header("Location: index.php?route=login-page");

    }

}