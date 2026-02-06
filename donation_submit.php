<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name   = trim($_POST['name']);
    $email  = trim($_POST['email']);
    $phone  = trim($_POST['phone']);
    $amount = trim($_POST['amount']);
    $type   = trim($_POST['donation_type']);
    $msg    = trim($_POST['message']);

    $stmt = $conn->prepare(
        "INSERT INTO donations (name, email, phone, amount, donation_type, message)
         VALUES (?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "sssiss",
        $name,
        $email,
        $phone,
        $amount,
        $type,
        $msg
    );

    $stmt->execute();
    $stmt->close();

    header("Location: donation_apply.php?success=1");
    exit;
}
