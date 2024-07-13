<?php
// global $db;
header("Content-Type: application/json; charset=UTF-8");
//header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './dbConnexion.php';

// Vérifier le type de contenu de la requête
$contentType = $_SERVER["CONTENT_TYPE"] ?? '';
echo "Content-Type: $contentType";

// Lire les données en fonction du type de contenu
if (strpos($contentType, 'application/json') !== false) {
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);
} else {
    $data = $_POST;
}
echo json_encode($data);

if(isset($data) && !empty($data)) {
    $name = $data["nom"];
    $last = $data["prenom"];
    $phone = (int) $data["tel"];
    try {
        $statement = $db->prepare("INSERT INTO `infos` (nom, prenom, tel) VALUES (:first, :last, :phone)");
        $statement->bindParam(':first', $name);
        $statement->bindParam(':last', $last);
        $statement->bindParam(':phone', $phone);
        $statement->execute();
        echo json_encode("Created");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
    }
}else {
    echo json_encode("400, ERROR PASSING THE DATA", JSON_PRETTY_PRINT);
}


