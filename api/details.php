<?php
include_once  './dbConnexion.php';

$id = $_GET['id'];
$statement = $db->prepare("SELECT * FROM `infos` WHERE id = :id");
$statement->bindParam(':id', $id);
$statement->execute();
$data = $statement->fetch(PDO::FETCH_ASSOC);
echo json_encode($data);