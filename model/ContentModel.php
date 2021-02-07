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
            $sql = "Select  * from contents $where order by id";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_content($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO contents ($columns) VALUES ($prepare)";
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
            $sql = "UPDATE contents  SET $columns WHERE id=$id";
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
            $sql = "Delete from contents WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
