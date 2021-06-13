<?php
require "../controller/GradeController.php";


$grade = new GradeController();
$action = $_GET["action"];


if ($action == "getGrades") {
    $grade_list = $grade->load_all_grades();

    $datastorage = [];
    foreach($grade_list as $grade) {
        $datastorage[] = [
            "id"                   => $grade["id"],
            "grade"              => $grade["grade"],
            "grade_roman_numeral"         => $grade["grade_roman_numeral"],
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "removeGrade") {
    $id = $_POST["id"];
    $grade->delete_grade($id);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertGrade") {
    $post_data = $_POST;
 
    $columns = "";
    $prepare = "";
    $values = [];
    foreach ($post_data as $key => $value) {
        $values[] = $value;
        $columns .= $key . ",";
        $prepare .= "?,";
    }
    $columns = substr_replace($columns ,"", -1);
    $prepare = substr_replace($prepare ,"", -1);

    $grade->insert_grade($columns, $values,$prepare);
    echo json_encode("Successfully Inserted");
} else if($action == "getSpecificGrade"){
    $id = $_POST["id"];
    $grade_list = $grade->load_all_grades("where id=$id");

    foreach ($grade_list as $grade) {
        $datastorage = [
            "id"                   => $grade["id"],
            "grade"              => $grade["grade"],
            "grade_roman_numeral"         => $grade["grade_roman_numeral"],
        ];
    }
    echo json_encode($datastorage);
} else if($action == "updateGrade"){
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
    $grade->update_grade($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}