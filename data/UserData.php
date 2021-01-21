<?php
session_start();
require "../controller/UserController.php";


$user = new UserController();
$action = $_GET["action"];


if ($action == "login") {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $user = $user->login($username, $password)[0];
    $_SESSION["fullname"] = $user["first_name"] . " " . $user["middle_name"] . " " . $user["last_name"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["user_type"] = $user["user_level"];

    echo json_encode("Login Successful");
} else if ($action == "checkSession") {
    $datastorage = [];
    if (isset($_SESSION["username"])) {
        foreach ($_SESSION as $key => $value) {
            $datastorage[$key] = $value;
        }
    }

    echo json_encode($datastorage);
} else if ($action == "logout") {
    session_destroy();

    echo json_encode("Successful Logout");
}
