<?php
require "../controller/StudentController.php";


$student = new StudentController();
$action = $_GET["action"];


if ($action == "getStudents") {
    $student_list = $student->load_all_students();

    $datastorage = [];
    foreach ($student_list as $student) {
        $datastorage[] = [
            "id"            => $student["id"],
            "name"          => $student["first_name"] . " " . $student["middle_name"] . " " . $student["last_name"],
            "address"       => $student["address"],
            "email"         => $student["email"],
            "birthdate"     => $student["birthdate"],
            "phone_number"  => $student["phone_number"],
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
        $values[] = $value;
        $columns .= $key . ",";
        $prepare .= "?,";
    }

    $columns = substr_replace($columns, "", -1);
    $prepare = substr_replace($prepare, "", -1);
    $student->insert_student($columns, $values,$prepare);
    echo json_encode("Successfully Inserted");
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
        ];
    }
    echo json_encode($datastorage);
} else if($action == "updateStudent"){
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



// $a = new StudentsModel;
// //============================================================================
// //Insert Students
// //============================================================================
// $student_details = [
//     "first_name"   => "Rocky",
//     "middle_name"  => "Alviola",
//     "last_name"    => "Lachica",
//     "address"      => "Shineland Village Sala Cabuyao Laguna",
//     "birthdate"    => "1993-09-30"
// ];

// $columns = "";
// $values =[];
// foreach ($student_details as $key => $value) {
//     $values[] = $value;
//     $columns .= $key.",";
// }

// $columns = substr_replace($columns, "", -1);
// // $a->insert_student($columns,$values);
// //============================================================================

// //============================================================================
// //Update Students
// //============================================================================
// $student_details = [
//     "first_name"   => "Raquelita"
// ];

// $columns = "";
// $values =[];
// $value_string = "";
// foreach ($student_details as $key => $value) {
//     $values[] = $value;
//     $columns .= $key."=?,";
// }

// $columns = substr_replace($columns, "", -1);
// $id = 4;

// // $a->update_student($id, $columns, $values);

// //============================================================================
// //============================================================================
// //Load Students
// //============================================================================
// $students = $a->get_student_masterlist();
// echo "BEFORE : <br>";
// foreach ($students as $student) {
//     echo $student["id"] . "<br>";
//     echo $student["first_name"] ." ". $student["middle_name"] ." ". $student["last_name"] . "<br>";
//     echo $student["address"] . "<br>";
//     echo $student["birthdate"] ."<br><br><br>";
//     # code...
// }
// //============================================================================

// //============================================================================
// //Load Students After Delete Some
// //============================================================================

// // $a->delete_student(4); 
// $students = $a->get_student_masterlist();
// echo "AFTER : <br>";
// foreach ($students as $student) {
//     echo $student["id"] . "<br>";
//     echo $student["first_name"] ." ". $student["middle_name"] ." ". $student["last_name"] . "<br>";
//     echo $student["address"] . "<br>";
//     echo $student["birthdate"] ."<br><br>";
//     # code...
// }
// //============================================================================
