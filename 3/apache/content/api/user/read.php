<?php

header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/user.php";

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$query_result = $user->read();

$result = array("results" => array());
foreach ($query_result as $user) {
    $students_obj = array(
        "id" => $user["id"],
        "name" => $user["name"],
        "surname" => $user["surname"]
    );
    $result["results"][] = $students_obj;
}

http_response_code(200);
echo json_encode($result);