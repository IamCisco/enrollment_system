<?php
require "../controller/BackgroundController.php";


$background = new BackgroundController();
$action = $_GET["action"];


if ($action == "getBackgroundMain") {
    $background_list = $background->load_all_backgrounds("where name='homepage'");

    $datastorage = [];
    foreach($background_list as $background) {
        $datastorage[$background["name"]] = $background["background"];
    }
    echo json_encode($datastorage);
} else if($action == "updateBackgroundMain"){
    $id = 1;
    $columns = "background=?";
    $values =[];


    $name = $_FILES['input_file']['name'];
    $values[] = $name;

    $tmp_name = $_FILES['input_file']['tmp_name'];
    if (isset($name)) {

        $path = '../assets/img/background/';

        if (!empty($name)) {
            $main_background = $background->load_all_backgrounds("where id=$id");
            foreach ($main_background as $main_background_pic) {
                $image = $main_background_pic["background"];
                unlink("../assets/img/background/$image");
            }
            if (move_uploaded_file($tmp_name, $path . $name)) {
            }
        }
    }
      
    $background->update_background($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}