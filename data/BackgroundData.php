<?php
require "../controller/BackgroundController.php";


$background = new BackgroundController();
$action = $_GET["action"];


if ($action == "getBackgroundMain") {
    $background_list = $background->load_all_backgrounds("where name='background1'");

    $datastorage = [];
    foreach($background_list as $background) {
        $datastorage[$background["name"]] = $background["background"];
    }
    echo json_encode($datastorage);
}else if ($action == "getBackgroundContact") {
    $background_list = $background->load_all_backgrounds("where name in('Address', 'Email', 'Contact Number')");

    $datastorage = [];
    foreach($background_list as $background) {
        $datastorage[$background["name"]] = $background["details"];
    }
    echo json_encode($datastorage);
}else if ($action == "getBackgrounds") {
    $background_list = $background->load_all_backgrounds();

    $datastorage = [];
    foreach($background_list as $background) {
        $datastorage[] = [
            "id"      => $background["id"],
            "name"    => $background["name"],
            "details" => $background["details"]
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "removeBackground") {
    $id = $_POST["id"];
    $background->delete_background($id);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertBackground") {
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

    $background->insert_background($columns, $values,$prepare);
    echo json_encode("Successfully Inserted");
} else if($action == "getSpecificBackground"){
    $id = $_POST["id"];
    $background_list = $background->load_all_backgrounds("where id=$id");

    foreach ($background_list as $background) {
        $datastorage = [
            "id"           => $background["id"],
            "name"         => $background["name"],
            "details"      => $background["details"]
        ];
    }
    echo json_encode($datastorage);
} else if($action == "updateBackground"){
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
    $background->update_background($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}