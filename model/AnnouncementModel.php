<?php

require "../connection/Connection.php";


class AnnouncementModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_announcements($where = null)
    {
        try {
            $sql = "Select  id, title, announcement, validity_date from announcements $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_announcement($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO announcements ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_announcement($id, $columns, $values)
    {
        try {
            $sql = "UPDATE announcements  SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_announcement($id)
    {
        try {
            $sql = "Delete from announcements WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
