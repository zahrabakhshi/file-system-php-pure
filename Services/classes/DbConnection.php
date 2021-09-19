<?php


class DbConnection
{
    const SERVER_NAME = "localhost";
    const USER_NAME = "root";
    const PASSWORD = "";
    const DATABASE_NAME = "filesystem";

    private mysqli $db_connection;

    public function __construct()
    {
        if(!isset($this->db_connection)){
            $this->db_connection = new mysqli(
                DbConnection::SERVER_NAME,
                DbConnection::USER_NAME,
                DbConnection::PASSWORD,
                DbConnection::DATABASE_NAME
            )or die('data base connection error:' . $conn->connect_error);
        }
    }

    public function getMysqliObj(){

        return $this->db_connection;

    }

    public function close(){
        $this->db_connection->close();
    }

}