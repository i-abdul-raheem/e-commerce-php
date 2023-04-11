<?php

require('./config.php');

header('Content-Type: application/json');

// Connect to database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
$initial_data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($initial_data, $row);
    }
} else {
    $initial_data = null;
}

$json = json_encode($initial_data);
$conn->close();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
            $temp = json_decode($json, true);
            $found = false;
            for ($i = 0; $i < count($temp); $i++) {
                if ($temp[$i]["product_id"] == $_GET['product_id']) {
                    $myData = $temp[$i];
                    $data = json_encode([
                        "status" => 200,
                        "message" => "OK",
                        "data" => $myData
                    ]);
                    $found = true;
                }
            }
            if (!$found) {
                $data = json_encode([
                    "status" => 404,
                    "message" => "Not Found!",
                    "data" => null
                ]);
                http_response_code(404);
            } else {
                http_response_code(200);
            }
        } else if (isset($_GET['category']) && !empty($_GET['category'])) {
            $temp = json_decode($json, true);
            $myData = array();
            for ($i = 0; $i < count($temp); $i++) {
                if ($temp[$i]["category"] == $_GET['category']) {
                    array_push($myData, $temp[$i]);
                }
            }
            $data = json_encode([
                "status" => 200,
                "message" => "OK",
                "data" => $myData
            ]);
            if (count($myData) == 0) {
                $data = json_encode([
                    "status" => 404,
                    "message" => "Not Found!",
                    "data" => []
                ]);
                http_response_code(404);
            } else {
                http_response_code(200);
            }
        } else if (isset($_GET['featured']) && !empty($_GET['featured'])) {
            $temp = json_decode($json, true);
            $myData = array();
            for ($i = 0; $i < count($temp); $i++) {
                if ($temp[$i]["featured"] == 1) {
                    array_push($myData, $temp[$i]);
                }
            }
            $data = json_encode([
                "status" => 200,
                "message" => "OK",
                "data" => $myData
            ]);
            if (count($myData) == 0) {
                $data = json_encode([
                    "status" => 404,
                    "message" => "Not Found!",
                    "data" => []
                ]);
                http_response_code(404);
            } else {
                http_response_code(200);
            }
        } else {
            $temp = json_decode($json);
            $data = json_encode([
                "status" => 200,
                "message" => "OK",
                "data" => $temp
            ]);
            http_response_code(200);
        }
        echo ($data);
        break;

    case 'POST':
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($_POST['action'] == 'new') {
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $obj = new stdClass();
            $obj->title = $_POST['title'];
            $obj->price = $_POST['price'];
            $obj->category = $_POST['category'];
            $obj->brand = $_POST['brand'];
            $obj->description = $_POST['description'];
            $obj->specification = $_POST['specification'];
            $obj->image = $file_name;
            if (move_uploaded_file($file_tmp, "../assets/img/" . $file_name)) {
                $insertQuery = "INSERT INTO products VALUES(NULL, '$obj->title', '$obj->price', '$obj->brand', '$obj->description', '$obj->specification', '$obj->category', 0, '$obj->image')";
                if ($conn->query($insertQuery)) {
                    $data = json_encode([
                        "status" => 201,
                        "message" => "Created",
                        "data" => $obj
                    ]);
                    http_response_code(200);
                } else {
                    $data = json_encode([
                        "status" => 500,
                        "message" => "Error",
                        "data" => $obj
                    ]);
                    http_response_code(500);
                }
            } else {
                $data = json_encode([
                    "status" => 500,
                    "message" => "Error",
                    "data" => $obj
                ]);
                http_response_code(500);
            }
        } else if ($_POST['action'] == 'delete') {
            $id = (int) $_POST['id'];
            $sqlDelete = "DELETE from products WHERE product_id=$id";
            if ($conn->query($sqlDelete)) {
                $data = json_encode([
                    "status" => 200,
                    "message" => "Deleted",
                    "data" => $id
                ]);
                http_response_code(200);
            } else {
                $data = json_encode([
                    "status" => 500,
                    "message" => "Error",
                    "data" => $conn
                ]);
                http_response_code(500);
            }
        } else if ($_POST['action'] == 'update-featured') {
            $id = (int) $_POST['id'];
            $featured = (int) $_POST['featured'];
            $sqlUpdate = "UPDATE products SET featured=$featured WHERE product_id=$id";
            if ($conn->query($sqlUpdate)) {
                $data = json_encode([
                    "status" => 200,
                    "message" => "Updated",
                    "data" => $id
                ]);
                http_response_code(200);
            } else {
                $data = json_encode([
                    "status" => 500,
                    "message" => "Error",
                    "data" => $conn
                ]);
                http_response_code(500);
            }
        }
        echo ($data);
        $conn->close();
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