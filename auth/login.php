<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $q = $conn->prepare("SELECT * FROM admins WHERE username=? AND password=?");
    $q->bind_param("ss", $user, $pass);
    $q->execute();
    $res = $q->get_result();

    if ($res->num_rows == 1) {
        $_SESSION['admin'] = $user;
        header("Location: ../index.php");
        exit();
    } else {
        $error = "Wrong login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <!-- Only login page styling -->
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <h2>Welcome Back</h2>

        <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

        <form method="POST">
            <input name="username" required placeholder="Username">
            <input type="password" name="password" required placeholder="Password">
            <button>Login</button>
        </form>
    </div>
</div>

</body>
</html>