
<?php
include '../auth/auth_check.php';
include '../config/db.php';

if ($_POST) {
    $q = $conn->prepare("INSERT INTO students(name,email,course) VALUES (?,?,?)");
    $q->bind_param("sss", $_POST['name'], $_POST['email'], $_POST['course']);
    $q->execute();
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
    <h2>Add Student</h2>

    <form method="POST">
        <input name="name" required placeholder="Name">
        <input name="email" type="email" required placeholder="Email">
        <input name="course" required placeholder="Course">
        <button>Save</button>
    </form>
</div>

</body>
</html>
