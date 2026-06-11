<?php

session_start();

if(
    !isset($_SESSION['user_id']) ||
    $_SESSION['role'] != 'branch_manager'
){
    header("Location: ../admin/login.php");
    exit;
}