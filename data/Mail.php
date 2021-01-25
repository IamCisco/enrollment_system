<?php
// Start with PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';
// create a new object
$mail = new PHPMailer();
// configure an SMTP
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->Host = 'smtp.elasticemail.com';
$mail->SMTPAuth = true;
$mail->Username = 'jhnfranciscabral@gmail.com';
$mail->Password = '61DC294650CD0D7717B44DDC3CEBE0D85F3C';
$mail->SMTPSecure = 'tls';
$mail->Port = 2525;

$mail->setFrom('test@gmail.com', 'Your Hotel');
$mail->addAddress('jhnfranciscabral@gmail.com');
$mail->Subject = 'Thanks for choosing Our Hotel!';
// Set HTML 
$mail->isHTML(TRUE);
$mail->Body = '<html>Hi there, we are happy to <br>confirm your booking.</br> Please check the document in the attachment.</html>';


// send the message
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}