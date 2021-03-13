<?php
session_start();
require_once "../controller/UserController.php";
require "MailData.php";


$user = new UserController();
$action = $_GET["action"];


if ($action == "login") {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $users = $user->getUsers(" where username='$username' and password='$password'");

    $stop = 0;
    if($username != 'admin')
    {
        $user_status = $user->getPersons(" where student_number ='$username'", "students")[0]["status"];
        if($user_status == 0)
        {
            echo json_encode("disabled");
            $stop = 1;
        }
        
    }
    
    if($stop == 0)
    {
        if(count($users) != 0)
        {

            $users = $users[0];
            if($users["verified"] == 0)
            {
                echo json_encode("warning");
            }
            else
            {
                $_SESSION["id"] = $users["id"];
                $_SESSION["fullname"] = $users["first_name"] . " " . $users["middle_name"] . " " . $users["last_name"];
                $_SESSION["username"] = $users["username"];
                $_SESSION["user_type"] = $users["user_level"];
                echo json_encode("success");
            }
        }
        else
        {
            echo json_encode("error");
        }
    }
    
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
    $users = $user->getUsers(" where username='$username' and verified=1");
    if(count($users) != 0)
    {
        $return = [
            "type"    => "error",
            "message" => "User already exists!",
        ];
    }
    else
    {
        $host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
        $users = $user->getUsers(" where username='$username'");
        $token = bin2hex(random_bytes(78));
        $subject = 'Successful!';
        $body = "
            <html>
            Hi there!
            
            You successfully registered to CITech website.

            Here are your credentials :
            Username : $username
            Password : $password
            Click link to verify   : $host/website/data/VerifyToken.php?token=$token
            
            Thank you,
            CITech
            </html>";
        if(count($users) !=0)
        {
            $user->delete_user($users[0]["username"]);
        }
        if($user_level == "student")
        {
            $students = $user->getPersons(" where student_number='$username'", "students");

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
                    "image"       => $students["image"],
                    "verify_token"=> $token
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
                    "message" => "User Successfully Registered. Please check your email to verify user",
                ];
                $email = $students["email"];
                sendMail($email,$subject,$body);
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
            
            $teachers = $user->getPersons(" where id_number='$username'", "teachers");
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
                    "image"       => $teachers["image"],
                    "verify_token"=> $token
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
                
                $email = $teachers["email"];
                sendMail($email,$subject,$body);
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
}else if ($action == "loadUserProfile") {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $users = $user->getUsers(" where id=$id");
    if(count($users) != 0)
    {
        $users = $users[0];
        $user_type = $users["user_level"];
        $id_number = $users["username"];

        if($user_type == "student")
        {
            $students = $user->getPersons(" where id_number='$id_number'", "students")[0];
            $teacher = [
                "first_name" => $students["first_name"] ,
                "middle_name" => $students["middle_name"],
                "last_name" => $students["last_name"],
                "email" => $students["email"],
                "image" => 'students/'.$users["image"],
            ];
            echo json_encode($students);
        }
        else if($user_type == "teacher")
        {
            $teachers = $user->getPersons(" where id_number='$id_number'", "teachers")[0];
            $teacher = [
                "first_name" => $teachers["first_name"] ,
                "middle_name" => $teachers["middle_name"],
                "last_name" => $teachers["last_name"],
                "email" => $teachers["email"],
                "image" =>'teachers/'. $users["image"],
            ];
            
            echo json_encode($teacher);
        }
        else
        {
            $admin = [
                "first_name" => $users["first_name"] ,
                "middle_name" => $users["middle_name"],
                "last_name" => $users["last_name"],
                "email" => $users["email"],
                "image" => 'admins/'.$users["image"],
            ];
            echo json_encode($admin);
        }
    }

    
} elseif ($action == "updateProfile") {
    
    $id = $_SESSION["id"];
    $id_number = $_SESSION["username"];
    $user_type = $_SESSION["user_type"];

    $columns = "";
    $values =[];
    $value_string = "";
    foreach ($_POST as $key => $value) {
        if($key != "id"){
            $$key = $value;
            $values[] = $value;
            $columns .= $key."=?,";
        }
    }

    $table = null;
    $path = '../assets/img/admins/';
    if($user_type == "student")
    {
        $table = "students";
        $column = "student_number";
        $path = '../assets/img/students/';
    }else if($user_type == "teacher")
    {
        $table = "teachers";
        $column = "id_number";
        $path = '../assets/img/teachers/';
    }

    $name = $_FILES['input_file']['name'];
    $tmp_name = $_FILES['input_file']['tmp_name'];
    if (isset($name)) {


        if (!empty($name)) {
            
            $values[] = $name;
            $columns .= "image= ?";
            if (move_uploaded_file($tmp_name, $path . $name)) {
            }
        }
    }
    else
    {
        $columns = substr_replace($columns, "", -1);
    }

    
    
    $user->update_user($id, $columns, $values);
    if($table != null)
    {
        $user->update_person($id_number, $columns, $values,$table, $column);
    }
    echo json_encode("Successfully Updatedd");
    
}
