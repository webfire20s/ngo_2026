<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: branches.php");
    exit;
}

/* Optional: Check if branch exists */
$stmt = $pdo->prepare("
    SELECT id
    FROM branches
    WHERE id = ?
");
$stmt->execute([$id]);

if (!$stmt->fetch()) {
    header("Location: branches.php");
    exit;
}

/* Delete Branch */
$stmt = $pdo->prepare("
    DELETE FROM branches
    WHERE id = ?
");

$stmt->execute([$id]);

header("Location: branches.php?deleted=1");
exit;