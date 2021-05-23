<?php

require "../connection/Connection.php";


class RequirementModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_requirements($where = null)
    {
        try {
            $sql = "Select  * from requirements $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_requirement($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO requirements ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return $this->conn->lastInsertId();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_requirement($id, $columns, $values)
    {
        try {
            $sql = "UPDATE requirements SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return $sql;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_requirement($id)
    {
        try {
            $sql = "Delete from requirements WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
