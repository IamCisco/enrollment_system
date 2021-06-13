<?php

require "../connection/Connection.php";


class SemesterModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_semesters($where = null)
    {
        try {
            $sql = "Select  * from semesters $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_semester($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO semesters ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) { 
            return $th->getMessage();
        }
    }
    public function update_semester($id, $columns, $values)
    {
        try {
            $sql = "UPDATE semesters  SET $columns WHERE id=$id"; 
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_semester($id)
    {
        try {
            $sql = "Delete from semesters WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
