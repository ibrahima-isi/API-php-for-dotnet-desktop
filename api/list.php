<?php
//global $db;

// header("Content-Type: application/json; charset=UTF-8");
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './dbConnexion.php';

$table = "infos";

try {
    $statement = $db->prepare("SELECT * FROM $table");
    $statement->execute();

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $row) {
        echo (json_encode($row) . '<br>');
    }
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}
