<?php

class Sale
{
    private $id;
    private $user_id;
    private $file_id;
    private $count;
    private $total_cost;

    public static function getUserOrders($user_id){
        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "SELECT * FROM sales,files WHERE sales.file_id = files.id AND sales.user_id = $user_id";

        $result = $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}