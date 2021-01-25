<?php

require "../connection/Connection.php";


class EnrolleeModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_enrollee($where = null)
    {
        try {
            $sql = "Select  * from enrollees $where order by id";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_enrollee($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO enrollees ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            return   $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_enrollee($id, $columns, $values)
    {
        try {
            $sql = "UPDATE enrollees  SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_enrollee($id)
    {
        try {
            $sql = "Delete from enrollees WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
