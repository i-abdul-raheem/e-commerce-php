<?php

require('./config.php');

// Connect to database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: application/json');

$sql = "SELECT * FROM categories";
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
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $temp = json_decode($json, true);
            $found = false;
            for ($i = 0; $i < count($temp); $i++) {
                if ($temp[$i]["category_id"] == $_GET['id']) {
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