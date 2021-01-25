<?php
require "../controller/AnnouncementController.php";


$announcement = new AnnouncementController();
$action = $_GET["action"];


if ($action == "getAnnouncements") {
    $announcement_list = $announcement->load_all_announcements();

    $datastorage = [];
    foreach($announcement_list as $announcement) {
        $datastorage[] = [
            "id"                   => $announcement["id"],
            "title"                => $announcement["title"],
            "announcement"         => $announcement["announcement"],
            "validity_date"        => $announcement["validity_date"]
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "removeAnnouncement") {
    $id = $_POST["id"];
    $announcement->delete_announcement($id);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertAnnouncement") {
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

    $announcement->insert_announcement($columns, $values,$prepare);
    echo json_encode("Successfully Inserted");
} else if($action == "getSpecificAnnouncement"){
    $id = $_POST["id"];
    $announcement_list = $announcement->load_all_announcements("where id=$id");

    foreach ($announcement_list as $announcement) {
        $datastorage = [
            "id"                   => $announcement["id"],
            "title"                => $announcement["title"],
            "announcement"         => $announcement["announcement"],
            "validity_date"        => $announcement["validity_date"]
        ];
    }
    echo json_encode($datastorage);
} else if($action == "updateAnnouncement"){
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
    $announcement->update_announcement($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}