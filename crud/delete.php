<?php

session_start();
require_once "../core/functions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $contact = deleteContact($id);
    $_SESSION['status'] = [
        "message" => "List deleted"
    ];

    header("Location: ../index.php");
    exit();
}