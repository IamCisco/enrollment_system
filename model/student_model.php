<?php

require "../connection/connection.php";


class StudentsModel extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn =$this->connect_database();
    }


    public function get_student_masterlist($where =null)
    {
        try {
            $sql = "Select  id,first_name, middle_name, last_name, address, birthdate from students $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }

    public function insert_student($columns, $values)
    {
        try {
            
            $sql = "INSERT INTO students ($columns) VALUES (?,?,?,?,?)";
            $stmt= $this->conn->prepare($sql);
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
            $stmt= $this->conn->prepare($sql);
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


$a = new StudentsModel;
//============================================================================
//Insert Students
//============================================================================
$student_details = [
    "first_name"   => "Rocky",
    "middle_name"  => "Alviola",
    "last_name"    => "Lachica",
    "address"      => "Shineland Village Sala Cabuyao Laguna",
    "birthdate"    => "1993-09-30"
];

$columns = "";
$values =[];
foreach ($student_details as $key => $value) {
    $values[] = $value;
    $columns .= $key.",";
}

$columns = substr_replace($columns, "", -1);
// $a->insert_student($columns,$values);
//============================================================================

//============================================================================
//Update Students
//============================================================================
$student_details = [
    "first_name"   => "Raquelita"
];

$columns = "";
$values =[];
$value_string = "";
foreach ($student_details as $key => $value) {
    $values[] = $value;
    $columns .= $key."=?,";
}

$columns = substr_replace($columns, "", -1);
$id = 4;

// $a->update_student($id, $columns, $values);

//============================================================================
//============================================================================
//Load Students
//============================================================================
$students = $a->get_student_masterlist();
echo "BEFORE : <br>";
foreach ($students as $student) {
    echo $student["id"] . "<br>";
    echo $student["first_name"] ." ". $student["middle_name"] ." ". $student["last_name"] . "<br>";
    echo $student["address"] . "<br>";
    echo $student["birthdate"] ."<br><br><br>";
    # code...
}
//============================================================================

//============================================================================
//Load Students After Delete Some
//============================================================================

// $a->delete_student(4); 
$students = $a->get_student_masterlist();
echo "AFTER : <br>";
foreach ($students as $student) {
    echo $student["id"] . "<br>";
    echo $student["first_name"] ." ". $student["middle_name"] ." ". $student["last_name"] . "<br>";
    echo $student["address"] . "<br>";
    echo $student["birthdate"] ."<br><br>";
    # code...
}
//============================================================================
