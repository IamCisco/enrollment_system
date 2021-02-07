<?php
session_start();
require_once "../controller/UserController.php";


$user = new UserController();
$action = $_GET["action"];


if ($action == "login") {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $user = $user->getUsers(" where username='$username' and password='$password'");
    

    if(count($user) != 0)
    {
        $user = $user[0];
        $_SESSION["id"] = $user["id"];
        $_SESSION["fullname"] = $user["first_name"] . " " . $user["middle_name"] . " " . $user["last_name"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["user_type"] = $user["user_level"];
        echo json_encode("success");
    }
    else
    {
        echo json_encode("error");
    }
} else if ($action == "login") {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $user = $user->getUsers(" where id=$id")[0];
    $datastorage =[
        "image"      => $user["image"],
        "user_level" => $user["user_level"],
        "name"       => $user["first_name"] . " " .$user["last_name"],
    ];
    echo json_encode($user);
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
} else if ($action == "register") {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $users = $user->getUsers(" where username='$username'");
    if(count($users) != 0)
    {
        $return = [
            "type"    => "error",
            "message" => "User already exists!",
        ];
    }
    else
    {
        if($user_level == "student")
        {
            $students = $user->getStudents(" where student_number='$username'");

            if(count($students) != 0)
            {
                $students = $students [0];
                $post_data =
                [
                    "username"    => $username,
                    "password"    => $password,
                    "first_name"  => $students["first_name"],
                    "middle_name" => $students["middle_name"],
                    "last_name"   => $students["last_name"],
                    "email"       => $students["email"],
                    "user_level"  => $user_level,
                    "image"       => $students["image"]
                ];

                
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

                $user->insert_user($columns, $values,$prepare);
                $return = [
                    "type"    => "success",
                    "message" => "User Successfully Registered",
                ];
            }
            else
            {
                $return = [
                    "type"    => "error",
                    "message" => "No student registered with student number $username",
                ];
            }
        }
        else
        {
            
            $teachers = $user->getTeachers(" where id_number='$username'");
            if(count($teachers) != 0)
            {
                $teachers = $teachers [0];
                $post_data =
                [
                    "username"    => $username,
                    "password"    => $password,
                    "first_name"  => $teachers["first_name"],
                    "middle_name" => $teachers["middle_name"],
                    "last_name"   => $teachers["last_name"],
                    "email"       => $teachers["email"],
                    "user_level"  => $user_level,
                    "image"       => $teachers["image"]
                ];

                
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

                $user->insert_user($columns, $values,$prepare);
                $return = [
                    "type"    => "success",
                    "message" => "User Successfully Registered",
                ];
            }
            else
            {
                $return = [
                    "type"    => "error",
                    "message" => "No teacher registered with id number $username",
                ];
            }
        }
    }
    echo json_encode($return);
}
