<?php

require 'includes/db.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("
    SELECT *
    FROM educational_materials
    WHERE id = ?
    AND is_public = 1
");

$stmt->execute([$id]);

$material = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$material) {
    die("Resource not found.");
}

if (
    empty($material['file_path']) ||
    !file_exists($material['file_path'])
) {
    die("File not found.");
}

/* INCREMENT DOWNLOAD COUNT */
$pdo->prepare("
    UPDATE educational_materials
    SET downloads = downloads + 1
    WHERE id = ?
")->execute([$id]);

$file = $material['file_path'];

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header(
    'Content-Disposition: attachment; filename="' .
    basename($material['file_name']) .
    '"'
);
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));

readfile($file);
exit;