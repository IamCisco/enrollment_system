<?php

require "../connection/Connection.php";


class ProgramModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_programs($where = null)
    {
        try {
            $sql = "Select  * from programs $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_program($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO programs ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) { 
            return $th->getMessage();
        }
    }
    public function update_program($id, $columns, $values)
    {
        try {
            $sql = "UPDATE programs  SET $columns WHERE id=$id"; 
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_program($id)
    {
        try {
            $sql = "Delete from programs WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
