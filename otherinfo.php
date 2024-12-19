<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT coordPosition FROM otherinfo");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['otherinfo' => $data]);
}
?>
