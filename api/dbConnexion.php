<?php
$db_name = "crud";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";

/**
 * Connexion to the database with PDO
 */
try{
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    echo "Connected successfully" . "<br>";
}catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage() . "<br>";
}

