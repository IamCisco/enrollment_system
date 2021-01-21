<?php

require "../connection/Connection.php";


class ContentModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_content($where = null)
    {
        try {
            $sql = "Select  id, name, details from contents $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_content($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO content ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_content($id, $columns, $values)
    {
        try {
            $sql = "UPDATE content  SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_content($id)
    {
        try {
            $sql = "Delete from content WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
