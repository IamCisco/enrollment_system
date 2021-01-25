<?php
require "../controller/EnrolleeController.php";


$enrollee = new EnrolleeController();
$action = $_GET["action"];


if ($action == "getEnrollees") {
    $enrollee_list = $enrollee->load_all_enrollees();

    $datastorage = [];
    foreach ($enrollee_list as $enrollee) {
        $datastorage[] = [
            "id"              => $enrollee["id"],
            "name"            => $enrollee["first_name"] . " " . $enrollee["middle_name"] . " " . $enrollee["last_name"],
            "address"         => $enrollee["address"],
            "email"           => $enrollee["email"],
            "birthdate"       => $enrollee["birthdate"],
            "phone_number"    => $enrollee["contact_number"],
            "image"           => $enrollee["image"],
            "date_registered" => $enrollee["date_registered"],
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "removeEnrollee") {
    $id = $_POST["id"];
    $enrollee->delete_enrollee($id);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertEnrollee") {
    $post_data = $_POST;

    $columns = "";
    $prepare = "";
    $values = [];
    foreach ($post_data as $key => $value) {
        $values[] = $value;
        $columns .= $key . ",";
        $prepare .= "?,";
    }

    // $columns = substr_replace($columns, "", -1);
    // $prepare = substr_replace($prepare, "", -1);



    $name = $_FILES['input_file']['name'];
    $values[] = $name;
    $values[] = date('Y-m-d');
    $values[] = -1;
    $values[] = -1;
    $columns .= " image, date_registered,accepted, passed";
    $prepare .= " ?, ?, ?, ?";

    

    $tmp_name = $_FILES['input_file']['tmp_name'];


    if (isset($name)) {

        $path = '../assets/img/enrollees/';

        if (!empty($name)) {
            if (move_uploaded_file($tmp_name, $path . $name)) {
            }
        }
    }
    $enrollee->insert_enrollee($columns, $values, $prepare);
    echo json_encode("success");
} else if ($action == "getSpecificEnrollee") {
    $id = $_POST["id"];
    $enrollee_list = $enrollee->load_all_enrollees("where id=$id");

    foreach ($enrollee_list as $enrollee) {
        $datastorage = [
            "id"           => $enrollee["id"],
            "name"         => $enrollee["name"],
            "details"      => $enrollee["details"]
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "updateEnrollee") {
    $id = $_POST["id"];
    $columns = "";
    $values = [];
    $value_string = "";
    foreach ($_POST as $key => $value) {
        if ($key != "id") {
            $values[] = $value;
            $columns .= $key . "=?,";
        }
    }

    $columns = substr_replace($columns, "", -1);
    $enrollee->update_enrollee($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}
