<?php

require "../connection/Connection.php";


class UserModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function login($username,$password)
    {
        try {
            $sql = "Select  username,first_name, middle_name, last_name from users username='$username' and password='$password'";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
