<?php
session_start();
require "../controller/UserController.php";


$user = new UserController();
$action = $_GET["action"];


if ($action == "login") {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $user = $user->login($username, $password);

    
    echo json_encode("Login Successful");
} 