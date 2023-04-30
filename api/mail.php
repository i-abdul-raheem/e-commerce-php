<?php
header('Content-Type: application/json');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create a new PHPMailer object
$mail = new PHPMailer();

// Set the SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.hostinger.com';
$mail->SMTPAuth = true;
$mail->Username = 'info@zarsawtraders.shop';
$mail->Password = 'hEllo@911';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Set the email details
$mail->setFrom('info@zarsawtraders.shop', $_POST['name']);
$mail->addAddress('abuzarrehan95@gmail.com');
$mail->Subject = $_POST['subject'] . " - " . $_POST['email'];
$mail->Body = $_POST['message'];

// Send the email
if ($mail->send()) {

    $data = json_encode([
        "status" => 200,
        "message" => "Message Sent",
        "data" => null
    ]);
    http_response_code(200);
} else {

    $data = json_encode([
        "status" => 500,
        "message" => 'Email could not be sent. Error: ' . $mail->ErrorInfo,
        "data" => null
    ]);
    http_response_code(500);
}
echo ($data);
?>