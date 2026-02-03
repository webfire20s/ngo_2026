<?php
$conn = new mysqli("localhost", "root", "", "neel_foundation");

if ($conn->connect_error) {
    die("Database Connection Failed");
}
?>
