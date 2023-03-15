<?php
header('Content-Type: application/json');
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $data = json_encode([
            "status" => 200,
            "message" => "OK",
            "data" => null
        ]);
        http_response_code(200);
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