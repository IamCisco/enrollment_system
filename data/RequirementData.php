<?php
require "../controller/RequirementController.php";


$requirement = new RequirementController();
$action = $_GET["action"];


if ($action == "getRequirements") {
    $requirement_list = $requirement->load_all_requirements();
    $datastorage = [];
    foreach ($requirement_list as $requirement) {
        $valueArray = [];
        foreach ($requirement as $key => $column) {
            if(!is_numeric($key)){ 
                $valueArray[$key] = $column;
            }
        }
        $datastorage[] = $valueArray;
    }
    echo json_encode($datastorage);
} else if ($action == "getActiveRequirements") {
    $requirement_list = $requirement->load_all_requirements("where is_active =1");

    $datastorage = [];
    foreach ($requirement_list as $requirement) {
        $valueArray = [];
        foreach ($requirement as $key => $column) {
            if(!is_numeric($key)){ 
                $valueArray[$key] = $column;
            }
        }
        $datastorage[] = $valueArray;
    }
    echo json_encode($datastorage);
} else if ($action == "searchRequirements") {
    $date = date("Y-m-d");
    $search_text = $_POST["search_text"];
    $requirement_list = $requirement->load_all_requirements("where (title like '%$search_text%' or requirement like '%$search_text%')");

    $datastorage = [];
    foreach($requirement_list as $requirement) {
        $datastorage[] = [
            "id"                   => $requirement["id"],
            "title"                => $requirement["title"],
            "requirement"         => $requirement["requirement"],
            "validity_date"        => $requirement["validity_date"],
            "image"                => $requirement["image"],
            "type"                 => $requirement["type"]
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "removeRequirement") {
    $id = $_POST["id"];
    $requirement->delete_requirement($id);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertRequirement") {
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

    $requirement->insert_requirement($columns, $values,$prepare);
    echo json_encode("Successfully Inserted");
} else if($action == "getSpecificRequirement"){
    $id = $_POST["id"];
    $requirement_list = $requirement->load_all_requirements("where id=$id");

    foreach ($requirement_list as $requirement) {
        $datastorage = [
            "id"                   => $requirement["id"],
            "title"                => $requirement["title"],
            "requirement"         => $requirement["requirement"],
            "validity_date"        => $requirement["validity_date"],
            "type"                 => $requirement["type"]
        ];
    }
    echo json_encode($datastorage);
} else if($action == "updateRequirement"){
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

    
    $name = $_FILES['input_file']['name'];
    $tmp_name = $_FILES['input_file']['tmp_name'];
    if (isset($name)) {

        $path = '../assets/img/requirements/';

        if (!empty($name)) {
            $requirement_list = $requirement->load_all_requirements("where id=$id");
            foreach ($requirement_list as $requirement_value) {
                $image = $requirement_value["image"];
                unlink("../assets/img/requirements/$image");
            }
            $values[] = $name;
            $columns .= "image= ?,";
            if (move_uploaded_file($tmp_name, $path . $name)) {
            }
        }
    }
    

    $columns = substr_replace($columns, "", -1);
    $requirement->update_requirement($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}else if($action == "updateStatus"){
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
    $requirement->update_requirement($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}