<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT title, descriptions AS description, caption, image FROM about");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['about' => $data]);
}
?>
