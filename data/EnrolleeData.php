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
            "program"         => $enrollee["program"],
            "place_of_birth"  => $enrollee["place_of_birth"],
            "citizenship"     => $enrollee["citizenship"],
            "religion"        => $enrollee["religion"],
            "sex"             => $enrollee["sex"],
            "requirements"    => $enrollee["requirements"]
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "getEnrolleeStats") {
    $year = $_POST["year"];
    $program = $_POST["program"];
    if($program == "0") {
        $enrollee_list = $enrollee->load_enrollee_stats("where a.year=$year");
    } 
    else{
        $enrollee_list = $enrollee->load_enrollee_stats("where a.year=$year", "where program='$program'", "and program='$program'"); 
    }  
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
            "program"         => $enrollee["program"],
            "place_of_birth"  => $enrollee["place_of_birth"],
            "citizenship"     => $enrollee["citizenship"],
            "religion"        => $enrollee["religion"],
            "sex"             => $enrollee["sex"],
            "requirements"    => $enrollee["requirements"]
        ];
    }
    echo json_encode($datastorage);
} else if ($action == "getEnrolleeScores") {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $enrollee_list = $enrollee->load_all_enrollees("where accepted=1 and substr(date_registered,1,4) = '$year' and program ='$program'");

    $datastorage = [];
    foreach ($enrollee_list as $enrollee) {
        $remarks = "";
        if($enrollee["passed"] == 1)
        {
            $remarks = "PASSED";
        }
        else if($enrollee["passed"] == 0)
        {
            $remarks = "FAILED";
        }
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
            "program"         => $enrollee["program"],
            "exam_result"     => $enrollee["exam_result"],
            "remarks"         => $remarks
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
    $otherValues = [];
    foreach ($post_data as $key => $value) {
        if( !is_numeric($key)) {
            $values[] = $value;
            $columns .= $key . ",";
            $prepare .= "?,";
        } else { 
            
            $otherValues[$key] = $value;

        }
        

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
    $requirement = $_FILES['input_file_requirement']['name'];
    $values[] = $name;
    $values[] = $requirement;
    $values[] = date('Y-m-d');
    $values[] = -1;
    $values[] = -1;
    $columns .= " image, requirements, date_registered,accepted, passed";
    $prepare .= " ?, ?, ?, ?, ?";

    $count_enrollee = count($enrollee->load_all_enrollees("where email='$email'"));
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
        $tmp_requirements = $_FILES['input_file_requirement']['tmp_name'];
        if (isset($name)) {

            $path_requirements = '../assets/img/requirements/';

            if (!empty($name)) {
                if (move_uploaded_file($tmp_requirements, $path_requirements . $requirement)) {
                }
            }
        }
        $enrollee_id = $enrollee->insert_enrollee($columns, $values, $prepare);
        foreach ($otherValues as $key => $value) {
            $columns = "enrollee_id, requirement_id, value";
            $values = [$enrollee_id, $key, $value];
            $prepare = "?, ?, ?";
            $enrollee->insert_enrollee_details($columns, $values, $prepare);
        }
        $title = "Successfully Registered";
        $status = "success";
        $message = "We sent an email to you. Please check your inbox or spam folder. We will keep you informed through Emails";
        sendMail($email,$subject,$body);
    }
    else
    {
        $count_enrollee1 = count($enrollee->load_all_enrollees("where email='$email' and first_name='$first_name' and middle_name = '$middle_name' and last_name='$last_name'"));
        if($count_enrollee1 == 0)
        {
            $title = "Warning!";
            $status = "info";
            $message = "Email already used by other applicants";
        }
        else
        {
            $title = "Warning!";
            $status = "info";
            $message = "You have a pending application. Please wait for the response of the school admin.";
        }
        
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
    $datastorage = [];
    foreach ($enrollee_list as $enrolleeDetails) {
        foreach ($enrolleeDetails as $enrollee_key => $enrollee_value) {
            if(!is_numeric($enrollee_key)){
                $datastorage[$enrollee_key] = $enrollee_value;
            }
            
        }
    }
    $enrollee_details = $enrollee->load_enrollee_details($id);
    echo json_encode([$datastorage, $enrollee_details]);
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
    $exam_date = $_POST["exam_date"];
    
    $enrollee_list = $enrollee->load_all_enrollees("where id=$id");
    $first_name = $enrollee_list[0]["first_name"];
    $email = $enrollee_list[0]["email"];
    $subject = 'Congratulations!';
    $body = "
        <html>
        Hi there $first_name,
        
        We would like to inform that your apllication to CITech website has been verified and accepted.
        Please take note that your exam will be on $exam_date.
        
        Thank you,
        CITech
        </html>";

    $columns = "accepted=?, exam_date= ?";
    $values = [1,$exam_date];

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
    $exam_result = $_POST["exam_result"];
    

    $enrollee_list = $enrollee->load_all_enrollees("where id=$id");
    $first_name = $enrollee_list[0]["first_name"];
    $email = $enrollee_list[0]["email"];
    $exam_date = $enrollee_list[0]["exam_date"];

    $passed = 1;
    $subject = 'Congratulations!';
    $body = "
        <html>
        Hi there $first_name,
        
        Congratulations, you passed our entrance exam held last $exam_date.
        You may now come to our school and proceed to enrollment process
        
        Thank you,
        CITech
        </html>";
    if ($exam_result < 60) {
        $passed = 0;
        $subject = 'Inquiry Denied!';
        $body = "
            <html>
            Hi there $first_name,
            
            We are very sorry to inform that you failed on our entrance exam.
            Don't lose hope. Try and try until you succeed
            
            Thank you,
            CITech
            </html>";
    }
    
    

    $columns = "passed=?, exam_result=?";
    $values = [$passed,$exam_result];
    

    $enrollee->update_enrollee($id, $columns, $values);
    
    sendMail($email,$subject,$body);
    echo json_encode("Enrollee Passed");
} else if ($action == "failEnrollee"){
    $id = $_POST["id"];
    $exam_result = $_POST["exam_result"];
    
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

    $columns = "passed=?, exam_result=?";
    $values = [0, $exam_result];

    $enrollee->update_enrollee($id, $columns, $values);
    echo json_encode("Enrollee Failed");
}
