<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

class User
{
    private $id;
    private $email;
    private $phone_number;
    private $password;
    private $available;

    public function setUserData()//rename to fetch user data
    {

        $conditions = [];
        if (isset($this->id)) {
            $conditions[] = " id = $this->id";
        }
        if (isset($this->email)) {
            $conditions[] = " email = " . "'" . "$this->email" . "'";
        }
        if (isset($this->phone_number)) {
            $conditions[] = " phone_number = '$this->phone_number' ";
        }
        if (isset($this->password)) {
            $conditions[] = " password = `$this->password`";
        }
        if (isset($this->available)) {
            $conditions[] = " password = $this->available";
        }
        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "SELECT * FROM `users` ";

        for ($i = 0; $i < count($conditions); $i++) {

            if ($i == 0 && $i != count($conditions) - 1) {

                $query .= "WHERE $conditions[$i] AND";

            } elseif ($i == 0 && $i == count($conditions) - 1) {

                $query .= "WHERE $conditions[$i]";

            } elseif ($i != 0 && $i != count($conditions) - 1) {

                $query .= "$conditions[$i] AND";

            }
        }

        $result = $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

        if (mysqli_num_rows($result) > 0) {
            if (mysqli_num_rows($result) == 1) {

                $row = $result->fetch_assoc();

                $this->id = $row['id'];
                $this->email = $row['email'];
                $this->phone_number = $row['phone_number'];
                $this->password = $row['password'];
                $this->available = $row['available'];

            } else {
                while ($row = $result->fetch_assoc()) {

                    $this->id = $row['id'];
                    $this->email[] = $row['email'];
                    $this->phone_number[] = $row['phone_number'];
                    $this->password[] = $row['password'];
                    $this->available[] = $row['available'];

                }
            }

            return true;
        } else {
            echo 'no user with this conditions or query wrong!';
            return false;
        }


    }

    public function insertNewUser()
    {

        if (isset($this->email) && isset($this->phone_number) && isset($this->password)) {

            $connection = new DbConnection();
            $db = $connection->getMysqliObj();

            $query = "INSERT INTO `users` (`email`, `phone_number`, `password`) 
                VALUES ('$this->email', '$this->phone_number', '$this->password')";

            $db->query($query) or die("line: " . __LINE__ . " cause an error: " . $db->error);

            $db->close();

            return true;

        } else {
            die('to insert new user you must set eamil, phone number and password');
        }
    }

    public function updateAvailable($boolean)
    {

        if ($boolean = 0) {
            unset($_SESSION[$this->id]);
        }

        $connection = new DbConnection();
        $db = $connection->getMysqliObj();

        $query = "UPDATE `users` 
                    SET `available`= $boolean 
                    WHERE `user_id` = $this->id ";

        $result = $db->query($query) or die("line: " . __LINE__ . " error: " . $db->error);

        if (!$result) {
            die('unsuccessfuly');
        }


    }

    /**
     * @return mixed
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @param mixed $Available
     */
    public function setAvailable($available): void
    {
        $this->available = $available;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $secure_pass = new PasswordCription($password);
        $this->password = $secure_pass->getCryptPassword();
    }

}


