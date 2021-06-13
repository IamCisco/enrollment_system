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
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'citech03@gmail.com';
    $mail->Password = 'citechadmin';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setFrom('citech-noreply@gmail.com', 'CITech Website');
    $mail->addAddress($email);
    $mail->Subject = $subject;
    // Set HTML 
    $mail->Body = $body;
    $mail->send();
}