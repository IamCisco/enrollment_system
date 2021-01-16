<?php
require "../controller/StudentController.php";


$student = new StudentController();
$action = $_GET["action"];


if ($action == "getStudents") {
    $student_list = $student->load_all_students();
    foreach ($student_list as $student) {
        echo $student["id"] . "<br>";
        echo $student["first_name"] . " " . $student["middle_name"] . " " . $student["last_name"] . "<br>";
        echo $student["address"] . "<br>";
        echo $student["email"] . "<br>";
        echo $student["phone_number"] . "<br>";
        echo $student["birthdate"] . "<br><br><br>";
        # code...
    }
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
