<?php
// Protect this page (user must be logged in)
require_once __DIR__ . '/auth/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h1>Student Management System</h1>

<nav>
    <a href="students/add.php">Add Student</a> |
    <a href="auth/logout.php">Logout</a>
</nav>

<hr>

<?php
// Show students list
require_once __DIR__ . '/students/list.php';
?>

</body>
</html>
