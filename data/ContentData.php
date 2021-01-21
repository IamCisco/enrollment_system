<?php
require "../controller/ContentController.php";


$content = new ContentController();
$action = $_GET["action"];


if ($action == "getContents") {
    $content_list = $content->load_all_contents();

    $datastorage = [];
    foreach($content_list as $content) {
        $datastorage[$content["name"]] = $content["details"];
    }
    echo json_encode($datastorage);
} else if ($action == "removeContent") {
    $id = $_POST["id"];
    $content->delete_content($id);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertContent") {
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

    $content->insert_content($columns, $values,$prepare);
    echo json_encode("Successfully Inserted");
} else if($action == "getSpecificContent"){
    $id = $_POST["id"];
    $content_list = $content->load_all_contents("where id=$id");

    foreach ($content_list as $content) {
        $datastorage = [
            "id"                   => $content["id"],
            "title"                => $content["title"],
            "content"         => $content["content"],
            "validity_date"        => $content["validity_date"]
        ];
    }
    echo json_encode($datastorage);
} else if($action == "updateContent"){
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
    $content->update_content($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}