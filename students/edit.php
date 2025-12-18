<?php
require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../auth/auth_check.php";

// Validate ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../index.php");
    exit();
}

$id = (int) $_GET['id'];

// Fetch student data
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result  = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->close();

if (!$student) {
    header("Location: ../index.php");
    exit();
}

// Handle update
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name   = trim($_POST['name']);
    $email  = trim($_POST['email']);
    $course = trim($_POST['course']);

    if ($name === '' || $email === '' || $course === '') {
        $error = "All fields are required.";
    } else {
        $stmt = $conn->prepare(
            "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?"
        );
        $stmt->bind_param("sssi", $name, $email, $course, $id);
        $stmt->execute();
        $stmt->close();

        // Redirect after successful update
        header("Location: ../index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
    <h2>Edit Student</h2>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="edit.php?id=<?= $id ?>">
        <input
            type="text"
            name="name"
            value="<?= htmlspecialchars($student['name']) ?>"
            placeholder="Name"
            required
        >

        <input
            type="email"
            name="email"
            value="<?= htmlspecialchars($student['email']) ?>"
            placeholder="Email"
            required
        >

        <input
            type="text"
            name="course"
            value="<?= htmlspecialchars($student['course']) ?>"
            placeholder="Course"
            required
        >

        <button type="submit" name="update">Update Student</button>
    </form>

    <a href="list.php">← Back to Students List</a>
</div>

</body>
</html>
