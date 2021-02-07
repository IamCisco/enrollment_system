<?php

require "../connection/Connection.php";


class UserModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function getUsers($where)
    {
        try {
            $sql = "Select  * from users $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    public function insert_user($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO users ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getStudents($where)
    {
        try {
            $sql = "Select  * from students $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getTeachers($where)
    {
        try {
            $sql = "Select  * from teachers $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
