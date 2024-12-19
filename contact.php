<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT title, descriptions AS description, caption FROM contact");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['contact' => $data]);
}
?>
