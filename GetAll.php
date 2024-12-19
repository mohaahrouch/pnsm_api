<?php
require 'config.php';

header('Content-Type: application/json');

// Initialize the result array
$response = [];

// Fetch data from the "about" table
$stmt = $pdo->query("SELECT title, descriptions AS description, caption, image FROM about");
$response['about'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch data from the "contact" table
$stmt = $pdo->query("SELECT title, descriptions AS description, caption FROM contact");
$response['contact'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch data from the "conseil" table
$stmt = $pdo->query("SELECT title, descriptions AS description, caption, image FROM conseil");
$response['conseil'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch data from the "especes" table along with its details
$stmt = $pdo->query("SELECT id, category FROM especes");
$especes = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($especes as &$espece) {
    $detailsStmt = $pdo->prepare("
        SELECT 
            type_especes AS type, 
            titleFr, 
            titleAr, 
            titleSt, 
            descriptions AS description, 
            caption, 
            image 
        FROM especes_details 
        WHERE especes_id = ?
    ");
    $detailsStmt->execute([$espece['id']]);
    $espece['details'] = $detailsStmt->fetchAll(PDO::FETCH_ASSOC);
}

$response['especes'] = $especes;

// Fetch data from the "circuits" table
$stmt = $pdo->query("SELECT type, title, description, caption, coordPosition, image FROM circuits");
$response['circuits'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch data from the "otherinfo" table
$stmt = $pdo->query("SELECT coordPosition FROM otherinfo");
$response['otherinfo'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the JSON response
echo json_encode($response, JSON_PRETTY_PRINT);
