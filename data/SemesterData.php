<?php
require "../controller/SemesterController.php";


$semester = new SemesterController();
$action = $_GET["action"];


if ($action == "getSemesters") {
    $semester_list = $semester->load_all_semesters();

    $datastorage = [];
    foreach($semester_list as $semester) {
        $datastorage[] = [
            "id"                   => $semester["id"],
            "semester"              => $semester["semester"],
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "removeSemester") {
    $id = $_POST["id"];
    $semester->delete_semester($id);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertSemester") {
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

    $semester->insert_semester($columns, $values,$prepare);
    echo json_encode("Successfully Inserted");
} else if($action == "getSpecificSemester"){
    $id = $_POST["id"];
    $semester_list = $semester->load_all_semesters("where id=$id");

    foreach ($semester_list as $semester) {
        $datastorage = [
            "id"                   => $semester["id"],
            "semester"              => $semester["semester"],
        ];
    }
    echo json_encode($datastorage);
} else if($action == "updateSemester"){
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
    $semester->update_semester($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}