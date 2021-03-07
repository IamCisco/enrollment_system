<?php
session_start();
require_once "../controller/UserController.php";
require "MailData.php";


$user = new UserController();
$token = $_GET["token"];
$users = $user->getUsers(" where verify_token='$token'");

if(count($users) !=0)
{
    $columns = "verified=?";
    $values = [1];
    $id = $users[0]["id"];
    $user->update_user($id, $columns, $values);
    echo "Email Verified";
}
else
{
    echo "Invalid verification";
}