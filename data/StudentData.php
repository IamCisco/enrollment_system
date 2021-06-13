<?php
require "../controller/StudentController.php";


$student = new StudentController();
$action = $_GET["action"];


if ($action == "getStudents") {
    $student_list = $student->load_all_students();

    $datastorage = [];
    foreach ($student_list as $student) {
        $datastorage[] = [
            "id"             => $student["id"],
            "student_number" => $student["student_number"],
            "name"           => $student["first_name"] . " " . $student["middle_name"] . " " . $student["last_name"],
            "address"        => $student["address"],
            "email"          => $student["email"],
            "birthdate"      => $student["birthdate"],
            "phone_number"   => $student["phone_number"],
            "program"        => $student["program"],
            "image"          => $student["image"],
            "grade_level"    => $student["grade_level"],
            "status"         => $student["status"],
            "enrollee_id"    => $student["enrollee_id"],
            "semester"       => $student["semester"],
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "removeStudent") {
    $id = $_POST["id"];
    $student->delete_student($id);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertStudent") {
    $post_data = $_POST;

    $columns = "";
    $prepare = "";
    $values = [];
    foreach ($post_data as $key => $value) {
        $$key = $value;
        $values[] = $value;
        $columns .= $key . ",";
        $prepare .= "?,";
    }
    if(count($student->load_all_students("where first_name='$first_name' and middle_name='$middle_name' and last_name='$last_name'")) != 0)
    {
        echo json_encode("duplicate");
    }
    else{
        $path_from = '../assets/img/enrollees/';
        $path_to = '../assets/img/students/';
        copy($path_from.$_POST["image"],$path_to.$_POST["image"]);
    
        //generating of uniquestudent number
        $year = date("y");  
        $random_number = mt_rand(10000, 99999);
        $student_number = $year.$random_number;
        
    
        while (count($student->load_all_students("where student_number=$student_number"))  !=0) {
            $student_number = $year.$random_number;
        }
        ////////////////////////////////////
        $values[] = $student_number;
        $values[] = 1;
        $columns .= "student_number,status";
        $prepare .= "?,?";
        $student->insert_student($columns, $values,$prepare);
        echo json_encode("Successfully Inserted");
    }
   
} else if($action == "getSpecificStudent"){
    $id = $_POST["id"];
    $student_list = $student->load_all_students("where id=$id");

    foreach ($student_list as $student) {
        $datastorage = [
            "id"            => $student["id"],
            "first_name"    => $student["first_name"],
            "middle_name"   => $student["middle_name"],
            "last_name"     => $student["last_name"],
            "address"       => $student["address"],
            "email"         => $student["email"],
            "birthdate"     => $student["birthdate"],
            "phone_number"  => $student["phone_number"],
            "program"       => $student["program"],
            "image"         => $student["image"],
            "grade_level"   => $student["grade_level"],
            "enrollee_id"   => $student["enrollee_id"],
            "semester"      => $student["semester"],
        ];
    }
    echo json_encode($datastorage);
}  else if ($action == "getSpecificEnrollee") {
    $enrollee_id = $_POST["enrollee_id"];
    $enrollee_list = $enrollee->load_student_info("where enrollee_id=$enrollee_id");
    $datastorage = [];
    foreach ($enrollee_list as $enrollee) {
        foreach ($enrollee as $enrollee_key => $enrollee_value) {
            if(!is_numeric($enrollee_key)){
                $datastorage[$enrollee_key] = $enrollee_value;
            }
            
        }
    }
    echo json_encode($datastorage);
}  else if($action == "updateStudent"){
    $id = $_POST["id"];
    $columns = "";
    $values =[];
    $value_string = "";
    foreach ($_POST as $key => $value) {
        if($key != "id"){
            $values[] = $value;
            $columns .= $key."=?,";
        }
    }

    $columns = substr_replace($columns, "", -1);
    $student->update_student($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
} else if($action == "updateStudentStatus"){
    $id = $_POST["id"];
    $columns = "";
    $values =[];
    $value_string = "";
    foreach ($_POST as $key => $value) {
        if($key != "id"){
            $values[] = $value;
            $columns .= $key."=?,";
        }
    }

    $columns = substr_replace($columns, "", -1);
    $student->update_student($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}