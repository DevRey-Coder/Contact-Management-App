<?php 

$servername = "localhost";
$username = "amt";
$password = "asdffdsa";
$db = "contact_manager_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection Failed ". $e->getMessage();
}