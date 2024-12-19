<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT title, descriptions AS description, caption, image FROM conseil");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['conseil' => $data]);
}
?>
