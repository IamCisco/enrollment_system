<?php

require "../connection/Connection.php";


class StudentModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_student_masterlist($where = null)
    {
        try {
            $sql = "Select  id,first_name, middle_name, last_name, address, birthdate, email, phone_number from students $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_student($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO students ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_student($id, $columns, $values)
    {
        try {
            $sql = "UPDATE students  SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_student($id)
    {
        try {
            $sql = "Delete from students WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
