<?php
require "../controller/TeacherController.php";


$teacher = new TeacherController();
$action = $_GET["action"];


if ($action == "getTeachers") {
    $teacher_list = $teacher->load_all_teachers();

    $datastorage = [];
    foreach ($teacher_list as $teacher) {
        $datastorage[] = [
            "id_number"      => $teacher["id_number"],
            "name"           => $teacher["first_name"] . " " . $teacher["middle_name"] . " " . $teacher["last_name"],
            "address"        => $teacher["address"],
            "email"          => $teacher["email"],
            "birthdate"      => $teacher["birthdate"],
            "contact_number" => $teacher["contact_number"],
            "image"          => $teacher["image"],
            "teacher_level"  => $teacher["teacher_level"],
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "removeTeacher") {
    $id_number = $_POST["id_number"];
    $teacher->delete_teacher($id_number);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertTeacher") {
    $post_data = $_POST;

    $columns = "";
    $prepare = "";
    $values = [];
    foreach ($post_data as $key => $value) {
        $values[] = $value;
        $columns .= $key . ",";
        $prepare .= "?,";

        $$key = $value;
    }

    if (count($teacher->load_all_teachers("where id_number=$id_number"))  ==0) 
    {
        $tmp_name = $_FILES['input_file']['tmp_name'];

    
        $name = $_FILES['input_file']['name'];
        $values[] = $name;
        $columns .= " image";
        $prepare .= " ?";
        if (isset($name)) {

            $path = '../assets/img/teachers/';

            if (!empty($name)) {
                if (move_uploaded_file($tmp_name, $path . $name)) {
                }
            }
        }
        // $columns = substr_replace($columns ,"", -1);
        // $prepare = substr_replace($prepare ,"", -1);

        $teacher->insert_teacher($columns, $values,$prepare);
        echo json_encode("Successfully Inserted");
    }
    else
    {
        echo json_encode("duplicate");
    }
    ////////////////////////////////////
    
} else if($action == "getSpecificTeacher"){
    $id_number = $_POST["id_number"];
    $teacher_list = $teacher->load_all_teachers("where id_number=$id_number");

    foreach ($teacher_list as $teacher) {
        $datastorage = [
            "id_number"     => $teacher["id_number"],
            "first_name"    => $teacher["first_name"],
            "middle_name"   => $teacher["middle_name"],
            "last_name"     => $teacher["last_name"],
            "address"       => $teacher["address"],
            "email"         => $teacher["email"],
            "birthdate"     => $teacher["birthdate"],
            "contact_number"=> $teacher["contact_number"],
            "teacher_level" => $teacher["teacher_level"],
        ];
    }
    echo json_encode($datastorage);
} else if($action == "updateTeacher"){
    $id_number = $_POST["id_number"];
    $columns = "";
    $values =[];
    $value_string = "";
    foreach ($_POST as $key => $value) {
        if($key != "id_number"){
            $values[] = $value;
            $columns .= $key."=?,";
        }
    }

    $columns = substr_replace($columns, "", -1);
    $teacher->update_teacher($id_number, $columns, $values);
    echo json_encode("Data Successfully Updated");
}