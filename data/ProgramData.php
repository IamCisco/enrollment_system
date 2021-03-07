<?php
require "../controller/ProgramController.php";


$program = new ProgramController();
$action = $_GET["action"];


if ($action == "getPrograms") {
    $program_list = $program->load_all_programs();

    $datastorage = [];
    foreach($program_list as $program) {
        $datastorage[] = [
            "id"                   => $program["id"],
            "program"              => $program["program"],
            "abbreviation"         => $program["abbreviation"],
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "removeProgram") {
    $id = $_POST["id"];
    $program->delete_program($id);
    echo json_encode("Successfully Deleted");
} else if ($action == "insertProgram") {
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

    $program->insert_program($columns, $values,$prepare);
    echo json_encode("Successfully Inserted");
} else if($action == "getSpecificProgram"){
    $id = $_POST["id"];
    $program_list = $program->load_all_programs("where id=$id");

    foreach ($program_list as $program) {
        $datastorage = [
            "id"                   => $program["id"],
            "program"              => $program["program"],
            "abbreviation"         => $program["abbreviation"],
        ];
    }
    echo json_encode($datastorage);
} else if($action == "updateProgram"){
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
    $program->update_program($id, $columns, $values);
    echo json_encode("Data Successfully Updated");
}