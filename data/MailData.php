<?php
// Start with PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';
// create a new object



function sendMail($email, $subject, $body)
{
    $mail = new PHPMailer();
    // configure an SMTP
    $mail->IsSMTP(); // enable SMTP
    // $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->Host = 'smtp.elasticemail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'abctest018@gmail.com';
    $mail->Password = '1B0881FF29B2934CF5231C1F9AFBC8250B44';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 2525;
    $mail->setFrom('abctest018@gmail.com', 'CITech Website');
    $mail->addAddress($email);
    $mail->Subject = $subject;
    // Set HTML 
    $mail->Body = $body;
    $mail->send();

}