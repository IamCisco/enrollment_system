<?php

require "../connection/Connection.php";


class EnrolleeModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect_database();
    }


    public function get_enrollee($where = null)
    {
        try {
            $sql = "Select  * from enrollees $where order by id";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function get_enrollee_stats($where = null)
    {
        try {
            $sql = "
                SELECT
                a.year,
                a.total_count,
                b.total_accepted,
                c.total_rejected,
                d.total_passed,
                e.total_failed
                
                FROM
                (
                    Select 
                    count(first_name) as total_count, 
                    substr(cast(date_registered as char), 1,4) as year
                    from enrollees
                    group by substr(cast(date_registered as char), 1,4)
                )a
                
                left join
                (
                    Select 
                    count(first_name) as total_accepted, 
                    substr(cast(date_registered as char), 1,4) as year
                    from enrollees
                    where accepted=1
                    group by substr(cast(date_registered as char), 1,4)
                )b
                on a.year=b.year
                
                left join
                (
                    Select 
                    count(first_name) as total_rejected, 
                    substr(cast(date_registered as char), 1,4) as year 
                    from enrollees
                    where accepted=0
                    group by substr(cast(date_registered as char), 1,4)
                )c
                on a.year=c.year
                
                left join
                (
                    Select 
                    count(first_name) as total_passed, 
                    substr(cast(date_registered as char), 1,4) as year 
                    from enrollees
                    where passed=1
                    group by substr(cast(date_registered as char), 1,4)
                )d
                on a.year=d.year
                
                left join
                (
                    Select 
                    count(first_name) as total_failed, 
                    substr(cast(date_registered as char), 1,4) as year 
                    from enrollees
                    where passed=0
                    group by substr(cast(date_registered as char), 1,4)
                )e
                on a.year=e.year
                $where
            ";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_enrollee($columns, $values, $prepare)
    {
        try {

            $sql = "INSERT INTO enrollees ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            return   $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update_enrollee($id, $columns, $values)
    {
        try {
            $sql = "UPDATE enrollees  SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete_enrollee($id)
    {
        try {
            $sql = "Delete from enrollees WHERE id=$id";
            $this->conn->exec($sql);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
