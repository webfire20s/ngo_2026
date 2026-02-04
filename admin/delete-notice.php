<?php
include 'includes/auth.php';
include '../includes/db.php';

$id = (int)$_GET['id'];

$img = $conn->query("SELECT photo FROM notices WHERE id=$id")->fetch_assoc();
if (!empty($img['photo'])) {
    @unlink("../uploads/" . $img['photo']);
}

$conn->query("DELETE FROM notices WHERE id=$id");

header("Location: manage-notices.php");
exit;
