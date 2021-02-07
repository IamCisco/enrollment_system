<?php
require "../controller/CommentController.php";


$comment = new CommentController();
$action = $_GET["action"];


if ($action == "getComments") {
    $announcement_id = $_POST["announcement_id"];
    $comment_list = $comment->load_all_comments("where a.announcement_id=$announcement_id");
    
    $datastorage = [];
    foreach($comment_list as $comment) {
        $datastorage[] = [
            "id"               => $comment["id"],
            "name"             => $comment["first_name"] . " " . $comment["last_name"],
            "user_level"       => $comment["user_level"],
            "comment"          => $comment["comment"],
            "comment_date"     => $comment["comment_date"],
            "image"            => $comment["image"],
            "user_id"          => $comment["user_id"]
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "removeComment") {
    $id = $_POST["id"];
    $comment->delete_comment($id);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertComment") {
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

    $comment->insert_comment($columns, $values,$prepare);
    echo json_encode("Successfully inserted");
} else if($action == "getSpecificComment"){
    $id = $_POST["id"];
    $comment_list = $comment->load_all_comments("where a.id=$id");

    foreach ($comment_list as $comment) {
        $datastorage = [
            "id"                   => $comment["id"],
            "comment"              => $comment["comment"]
        ];
    }
    echo json_encode($datastorage);
} else if($action == "updateComment"){
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
    $comment->update_comment($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}