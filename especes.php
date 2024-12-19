<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT id, category FROM especes");
    $especes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($especes as &$espece) {
        $detailsStmt = $pdo->prepare("SELECT type_especes AS type, titleFr, titleAr, titleSt, descriptions AS description, caption, image FROM especes_details WHERE especes_id = ?");
        $detailsStmt->execute([$espece['id']]);
        $espece['details'] = $detailsStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode(['especes' => $especes]);
}
?>
