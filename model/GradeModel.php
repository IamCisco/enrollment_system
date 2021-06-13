<?php

require "../connection/Connection.php";


class GradeModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_grades($where = null)
    {
        try {
            $sql = "Select  * from grades $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_grade($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO grades ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) { 
            return $th->getMessage();
        }
    }
    public function update_grade($id, $columns, $values)
    {
        try {
            $sql = "UPDATE grades  SET $columns WHERE id=$id"; 
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_grade($id)
    {
        try {
            $sql = "Delete from grades WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
