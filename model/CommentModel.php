<?php

require "../connection/Connection.php";


class CommentModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_comments($where = null)
    {
        try {
            $sql = "Select a.id, a.comment, a.comment_date, b.first_name, b.last_name, b.user_level, b.image, a.user_id
            from comments a left join users b on a.user_id = b.id $where order by a.id desc";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_comment($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO comments ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_comment($id, $columns, $values)
    {
        try {
            $sql = "UPDATE comments  SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_comment($id)
    {
        try {
            $sql = "Delete from comments WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
