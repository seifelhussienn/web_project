<?php
include '../auth/auth_check.php';
include '../config/db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM students WHERE id=$id");
header("Location: ../index.php");
?>
