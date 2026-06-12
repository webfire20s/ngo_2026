<?php

require '../includes/middleware_admin.php';
require '../includes/db.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("
    SELECT *
    FROM educational_materials
    WHERE id=?
");

$stmt->execute([$id]);

$material = $stmt->fetch(PDO::FETCH_ASSOC);

if ($material) {

    $file =
        '../uploads/educational_materials/' .
        $material['file_path'];

    if (
        !empty($material['file_path']) &&
        file_exists($file)
    ) {
        unlink($file);
    }

    $pdo->prepare("
        DELETE FROM educational_materials
        WHERE id=?
    ")->execute([$id]);
}

header("Location: materials.php");
exit;