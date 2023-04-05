<?php

require('./config.php');

header('Content-Type: application/json');

// Connect to database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

switch ($_POST['action']) {
    case 'new':
        $obj = new stdClass();
        $obj->fname = $_POST['first_name'];
        $obj->lname = $_POST['last_name'];
        $obj->email = $_POST['email'];
        $obj->mobile = $_POST['mobile'];
        $obj->password = $_POST['password'];
        $obj->address = $_POST['address'];
        $obj->city = $_POST['city'];
        $obj->state = $_POST['state'];
        $obj->zipcode = $_POST['zipcode'];
        $obj->country = $_POST['country'];
        $query = "INSERT INTO users VALUES(NULL, '$obj->fname', '$obj->lname', '$obj->email', '$obj->mobile', '$obj->password', '$obj->address', '$obj->city', '$obj->state', '$obj->zipcode', '$obj->country')";
        if (mysqli_query($conn, $query)) {
            $data = json_encode([
                "status" => 200,
                "message" => "User added",
                "data" => null
            ]);
            http_response_code(200);
        } else {
            $data = json_encode([
                "status" => 500,
                "message" => "Internal server error",
                "data" => null
            ]);
            http_response_code(500);
        }
        echo ($data);
        break;
    case 'login':
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $obj = array(
                    "fname" => $row["first_name"],
                    "lname" => $row["last_name"],
                    "email" => $row["email"],
                    "mobile" => $row["mobile"]
                );
            }
            $data = json_encode([
                "status" => 200,
                "message" => "Login Successfull",
                "data" => json_encode($obj)
            ]);
            http_response_code(200);
        } else {
            $data = json_encode([
                "status" => 404,
                "message" => "Username/Password not correct!",
                "data" => null
            ]);
            http_response_code(404);
        }
        echo ($data);
        break;
    default:
        $data = json_encode([
            "status" => 405,
            "message" => "Not Allowed",
            "data" => null
        ]);
        http_response_code(405);
        echo ($data);
        break;
}

$conn->close();

?>