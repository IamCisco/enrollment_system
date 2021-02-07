<?php

require "../connection/Connection.php";


class BackgroundModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_background($where = null)
    {
        try {
            $sql = "Select  * from backgrounds $where order by id";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_background($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO backgrounds ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_background($id, $columns, $values)
    {
        try {
            $sql = "UPDATE backgrounds  SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_background($id)
    {
        try {
            $sql = "Delete from backgrounds WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
