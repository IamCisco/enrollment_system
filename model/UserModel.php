<?php

require "../connection/Connection.php";


class UserModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function getUsers($where)
    {
        try {
            $sql = "Select  * from users $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    public function insert_user($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO users ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPersons($where, $tablename)
    {
        try {
            $sql = "Select  * from $tablename $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_user($id, $columns, $values)
    {
        try {
            
            $sql = "UPDATE users  SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_person($id_number, $columns, $values, $table, $column)
    {
        try {
            if($table != null)
            {
                $sql = "UPDATE $table  SET $columns WHERE $column='$id_number'";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($values);
                
                return "success";
            } 
        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_user($id)
    {
        try {
            $sql = "Delete from users WHERE username=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

}
