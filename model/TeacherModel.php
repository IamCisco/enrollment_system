<?php

require "../connection/Connection.php";


class TeacherModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_teacher_masterlist($where = null)
    {
        try {
            $sql = "Select  id_number, first_name, middle_name, last_name, address, birthdate, email, contact_number, image, teacher_level from teachers $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_teacher($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO teachers ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_teacher($id, $columns, $values)
    {
        try {
            $sql = "UPDATE teachers  SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_teacher($id)
    {
        try {
            $sql = "Delete from teachers WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
