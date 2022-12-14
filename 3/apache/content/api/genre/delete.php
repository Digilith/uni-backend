<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/database.php";
include_once "../objects/genre.php";

$database = new Database();
$db = $database->getConnection();

$genre = new Genre($db);

if (!isset($_GET["id"])) {
    http_response_code(400);
    echo json_encode(array("message" => "Неправильный запрос: не указан ID жанра"));
} else {
    $genre->id = $_GET["id"];
    $stmt = $genre->delete();
    if ($stmt) {
        http_response_code(200);
        echo json_encode(array("message" => "Жанр удалён"));
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Жанр с таким ID не существует"));
    }
}