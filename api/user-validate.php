<?php

require('./config.php');

header('Content-Type: application/json');
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$data = "";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_POST['validation'] == 'email') {
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        $data = json_encode([
            "status" => 500,
            "message" => "User already exist with this email!",
            "data" => null
        ]);
        http_response_code(500);
    } else {
        $data = json_encode([
            "status" => 200,
            "message" => "Valid email address",
            "data" => null
        ]);
        http_response_code(200);
    }
}
if ($_POST['validation'] == 'mobile') {
    $mobile = $_POST['mobile'];
    $query = "SELECT * FROM users WHERE mobile='$mobile'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        $data = json_encode([
            "status" => 500,
            "message" => "User already exist with this mobile number!",
            "data" => null
        ]);
        http_response_code(500);
    } else {
        $data = json_encode([
            "status" => 200,
            "message" => "Valid mobile number",
            "data" => null
        ]);
        http_response_code(200);
    }
}

if ($_POST['validation'] == 'password') {
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if ($password1 != $password2) {
        $data = json_encode([
            "status" => 500,
            "message" => "Password not matched",
            "data" => null
        ]);
        http_response_code(500);
    } else {
        $data = json_encode([
            "status" => 200,
            "message" => "Valid password",
            "data" => null
        ]);
        http_response_code(200);
    }
}

echo $data;
$conn->close();