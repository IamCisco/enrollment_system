<?php
require "../controller/EnrolleeController.php";
require "MailData.php";


$enrollee = new EnrolleeController();
$action = $_GET["action"];


if ($action == "getPassedEnrollee") {
    $enrollee_list = $enrollee->load_all_enrollees("where passed = 1");

    $datastorage = [];
    foreach ($enrollee_list as $enrollee) {
        $datastorage[] = [
            "id"              => $enrollee["id"],
            "name"            => $enrollee["last_name"].", ". $enrollee["first_name"] . " " . $enrollee["middle_name"] 
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "getEnrolleesForAccept") {
    $enrollee_list = $enrollee->load_all_enrollees("where accepted= -1");

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
            "grade_level"     => $enrollee["grade_level"],
            "program"         => $enrollee["program"]
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "getEnrolleeStats") {
    $enrollee_list = $enrollee->load_enrollee_stats();

    $datastorage          = [];
    $total_count_array    = [];
    $total_accepted_array = [];
    $total_rejected_array = [];
    $total_passed_array   = [];
    $total_failed_array   = [];
    $year_array           = [];
    foreach ($enrollee_list as $enrollee) {
        $total_count_array[]    = $enrollee["total_count"];
        $total_accepted_array[] = $enrollee["total_accepted"];
        $total_rejected_array[] = $enrollee["total_rejected"];
        $total_passed_array[]   = $enrollee["total_passed"];
        $total_failed_array[]   = $enrollee["total_failed"];
        $year_array[]           = $enrollee["year"];
    }

    $datastorage = [
        "total_count"    => $total_count_array,
        "total_accepted" => $total_accepted_array,
        "total_rejected" => $total_rejected_array,
        "total_passed"   => $total_passed_array,
        "total_failed"   => $total_failed_array,
        "year"           => $year_array,
    ];
    echo json_encode($datastorage);
} else if ($action == "getEnrolleesForExam") {
    $enrollee_list = $enrollee->load_all_enrollees("where accepted= 1 and passed=-1");

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
            "grade_level"     => $enrollee["grade_level"],
            "program"         => $enrollee["program"]
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

        $$key = $value;
    }

    $subject = 'Thanks for choosing Our School!';
    $body = "
        <html>
        Hi there $first_name,
        
        We are happy to know that you inquired through our website. 
        We will inform you through email once we assess your information.
        
        Thank you,
        CITech
        </html>";


    // $columns = substr_replace($columns, "", -1);
    // $prepare = substr_replace($prepare, "", -1);



    $name = $_FILES['input_file']['name'];
    $values[] = $name;
    $values[] = date('Y-m-d');
    $values[] = -1;
    $values[] = -1;
    $columns .= " image, date_registered,accepted, passed";
    $prepare .= " ?, ?, ?, ?";

    $count_enrollee = count($enrollee->load_all_enrollees("where first_name='$first_name' and middle_name='$middle_name' and last_name='$last_name'"));
    if($count_enrollee == 0)
    {
        $tmp_name = $_FILES['input_file']['tmp_name'];
        if (isset($name)) {

            $path = '../assets/img/enrollees/';

            if (!empty($name)) {
                if (move_uploaded_file($tmp_name, $path . $name)) {
                }
            }
        }
        $enrollee->insert_enrollee($columns, $values, $prepare);
        $title = "Successfully Registered";
        $status = "success";
        $message = "We sent an email to you. Please check your inbox or spam folder. We will keep you informed through Emails";
        sendMail($email,$subject,$body);
    }
    else
    {
        $title = "Ooopss!";
        $status = "info";
        $message = "You already have a pending application. Please wait for check your email regularly for any updates";
    }
    $datastorage=[
        "title"   => $title,
        "status"  => $status,
        "message" => $message,
    ];
    echo json_encode($datastorage);
} else if ($action == "getSpecificEnrollee") {
    $id = $_POST["id"];
    $enrollee_list = $enrollee->load_all_enrollees("where id=$id");

    foreach ($enrollee_list as $enrollee) {
        $datastorage = [
            "id"              => $enrollee["id"],
            "first_name"      => $enrollee["first_name"],
            "middle_name"     => $enrollee["middle_name"],
            "last_name"       => $enrollee["last_name"],
            "address"         => $enrollee["address"],
            "email"           => $enrollee["email"],
            "birthdate"       => $enrollee["birthdate"],
            "phone_number"    => $enrollee["contact_number"],
            "image"           => $enrollee["image"],
            "date_registered" => $enrollee["date_registered"],
            "program"         => $enrollee["program"],
            "grade_level"     => $enrollee["grade_level"],
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
} else if ($action == "acceptEnrollee"){
    $id = $_POST["id"];
    
    $enrollee_list = $enrollee->load_all_enrollees("where id=$id");
    $first_name = $enrollee_list[0]["first_name"];
    $email = $enrollee_list[0]["email"];
    $subject = 'Congratulations!';
    $body = "
        <html>
        Hi there $first_name,
        
        We would like to inform that your apllication to CITech website has been verified and accepted.
        Please take note that your exam will be on yyy-mm-dd at 08:00 am.
        
        Thank you,
        CITech
        </html>";

    $columns = "accepted=?";
    $values = [1];

    $enrollee->update_enrollee($id, $columns, $values);

    sendMail($email,$subject,$body);
    echo json_encode("Person successfully accepted");
} else if ($action == "rejectEnrollee"){
    $id = $_POST["id"];
    
    $enrollee_list = $enrollee->load_all_enrollees("where id=$id");
    $first_name = $enrollee_list[0]["first_name"];
    $email = $enrollee_list[0]["email"];
    $subject = 'Inquiry Denied!';
    $body = "
        <html>
        Hi there $first_name,
        
        We are sorry to inform that your apllication to CITech website has been verified and denied.
        Please try to inquire again with a reliable information.
        
        Thank you,
        CITech
        </html>";

    $columns = "accepted=?";
    $values = [0];

    $enrollee->update_enrollee($id, $columns, $values);

    sendMail($email,$subject,$body);
    echo json_encode("Person successfully rejected");
} else if ($action == "passEnrollee"){
    $id = $_POST["id"];
    
    $enrollee_list = $enrollee->load_all_enrollees("where id=$id");
    $first_name = $enrollee_list[0]["first_name"];
    $email = $enrollee_list[0]["email"];
    $subject = 'Congratulations!';
    $body = "
        <html>
        Hi there $first_name,
        
        Congratulations, you passed our entrance exam held last yyyy-mm-dd.
        You may now come to our school and proceed to enrollment process
        
        Thank you,
        CITech
        </html>";

    $columns = "passed=?";
    $values = [1];
    

    $enrollee->update_enrollee($id, $columns, $values);
    
    sendMail($email,$subject,$body);
    echo json_encode("Enrollee Passed");
} else if ($action == "failEnrollee"){
    $id = $_POST["id"];
    
    $enrollee_list = $enrollee->load_all_enrollees("where id=$id");
    $first_name = $enrollee_list[0]["first_name"];
    $email = $enrollee_list[0]["email"];
    $subject = 'Inquiry Denied!';
    $body = "
        <html>
        Hi there $first_name,
        
        We are very sorry to inform that you failed on our entrance exam.
        Don't lose hope. Try and try until you succeed
        
        Thank you,
        CITech
        </html>";

    $columns = "passed=?";
    $values = [0];

    $enrollee->update_enrollee($id, $columns, $values);
    echo json_encode("Enrollee Failed");
}
