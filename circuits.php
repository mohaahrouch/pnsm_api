<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT type, title, description, caption, coordPosition, image FROM circuits");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['circuits' => $data]);
}
?>
