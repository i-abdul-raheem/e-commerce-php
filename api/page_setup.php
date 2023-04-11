<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require('./config.php');
    $conns = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conns->connect_error) {
        die("Connection failed: " . $conns->connect_error);
    }
    header('Content-Type: application/json');

    $site_title = $_POST['site_title'];
    $company_email = $_POST['company_email'];
    $company_phone = $_POST['company_phone'];
    $facebook_page = $_POST['facebook_page'];
    $instagram_page = $_POST['instagram_page'];
    $twitter_page = $_POST['twitter_page'];
    $linkedin = $_POST['linkedin'];
    $company_address = $_POST['company_address'];
    $about_us = $_POST['about_us'];
    if (
        mysqli_query(
            $conns,
            "UPDATE page_setup SET site_title='abc',
                    company_email='abc', 
                    company_phone='abc', 
                    facebook_page='abc',
                    instagram_page='abc',
                    twitter_page='abc',
                    linkedin='abc',
                    company_address='abc',
                    about_us='abc'
                    WHERE page_setup_id=1"
        )
    ) {
        if (
            mysqli_query($conns, "UPDATE page_setup SET site_title='$site_title', company_email='$company_email',  company_phone='$company_phone',  facebook_page='$facebook_page', instagram_page='$instagram_page', twitter_page='$twitter_page', linkedin='$linkedin', company_address='$company_address', about_us='$about_us' WHERE page_setup_id=1")
        ) {
            $data = json_encode([
                "status" => 200,
                "message" => "Updated!",
                "data" => null
            ]);
            http_response_code(200);
        } else {
            $data = json_encode([
                "status" => 500,
                "message" => "Failed to update",
                "data" => null
            ]);
            http_response_code(500);
        }
    } else {
        $data = json_encode([
            "status" => 500,
            "message" => $conns->error,
            "data" => null
        ]);
        http_response_code(500);
    }
    echo $data;
    $conns->close();
} else {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $res = mysqli_query($conn, "SELECT * FROM page_setup");
    $row = mysqli_fetch_assoc($res);

    define("SITE_TITLE", $row['site_title']);
    define("COMPANY_EMAIL", $row['company_email']);
    define("COMPANY_PHONE", $row['company_phone']);
    define("FACEBOOK", $row['facebook_page']);
    define("INSTAGRAM", $row['instagram_page']);
    define("TWITTER", $row['twitter_page']);
    define("LINKEDIN", $row['linkedin']);
    define("COMPANY_ADDRESS", $row['company_address']);
    define("ABOUT_US", $row['about_us']);
}
$conn->close();