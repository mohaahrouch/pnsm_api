<?php
$host = 'localhost';
$db = 'pnsm';
$user = 'root'; 
$pass = '';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("failed moy drog lol : " . $e->getMessage());
}

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;
?>
