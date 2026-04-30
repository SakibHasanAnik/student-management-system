<?php
require_once "../app/helpers/auth.php";
require_once "../app/controllers/StudentController.php";

checkLogin();

$studentController = new StudentController();

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit();
}

$student = $studentController->edit($id);

if (!$student) {
    header("Location: index.php");
    exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $error = $studentController->update($id, $_POST);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Student</h2>

    <?php if (!empty($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST">
        <input type="text" name="student_id"
               value="<?php echo htmlspecialchars($student['student_id']); ?>" required>

        <input type="text" name="name"
               value="<?php echo htmlspecialchars($student['name']); ?>" required>

        <input type="text" name="dept"
               value="<?php echo htmlspecialchars($student['dept']); ?>" required>

        <input type="email" name="email"
               value="<?php echo htmlspecialchars($student['email']); ?>" required>

        <button type="submit">Update Student</button>
    </form>

    <br>
    <a href="index.php">Back</a>
</div>

</body>
</html>