<?php
include_once  './dbConnexion.php';

$id = (int) $_POST['id'];

if(isset($id) && !empty($id)) {
    try {
        $statement = $db->prepare("DELETE FROM `infos` WHERE id = :id");
        $statement->bindParam(':id', $id);
        $data = $statement->execute();
        if($data)  {
            echo json_encode("DELETED");
        }
    }catch (PDOException $e) {
        echo "Failed to delete: " . $e->getMessage() . "<br>";
    }
}
