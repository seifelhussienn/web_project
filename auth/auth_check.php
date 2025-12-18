<?php
session_start();

if (!isset($_SESSION['admin'])) {
    // Redirect to login.php relative to current script
    header("Location: login.php"); // simple, works for both
    exit();
}
?>
