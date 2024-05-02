<?php

function url(string $path = null): string
{
    $url = isset($_SERVER["HTTPS"]) ? "https" : "http";
    $url .= "://";
    $url .= $_SERVER["HTTP_HOST"];
    if (isset($path)) {
        $url .= "/";
        $url .= $path;
    }

    return $url;
}

// Function to add new contact.
function addContact($name, $email, $phone)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO contacts (name,email,phone) VALUES (:name, :email, :phone)");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->execute();

    return $conn->lastInsertId();
}

// Function to get all contacts.
function getAllContacts()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM contacts");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get a single contact by ID.
function getContactById($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update a contact.
function updateContact($id, $name, $email, $phone)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE contacts SET name= :name, email= :email, phone= :phone WHERE id=:id");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to delete a contact.
function deleteContact($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM contacts WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}