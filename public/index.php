<?php
require_once "../app/helpers/auth.php";
require_once "../app/controllers/StudentController.php";

checkLogin();

$studentController = new StudentController();

$search = $_GET['search'] ?? "";

$students = $studentController->index($search);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main">
    <h2>Student Management System</h2>

    <p>Welcome, <?php echo $_SESSION['username']; ?></p>

    <a href="logout.php" class="logout">Logout</a>

    <form action="add_student.php" method="POST" class="form-box">
        <h3>Add Student</h3>

        <input type="text" name="student_id" placeholder="Student ID" required>

        <input type="text" name="name" placeholder="Student Name" required>

        <input type="text" name="dept" placeholder="Department" required>

        <input type="email" name="email" placeholder="Email" required>

        <button type="submit">Add Student</button>
    </form>

    <form method="GET" class="search-box">
        <input type="text" name="search" placeholder="Search by ID or Name"
               value="<?php echo htmlspecialchars($search); ?>">

        <button type="submit">Search</button>

        <a href="index.php">Reset</a>
    </form>

    <h3>All Students</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php foreach ($students as $student) { ?>
        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo htmlspecialchars($student['student_id']); ?></td>
            <td><?php echo htmlspecialchars($student['name']); ?></td>
            <td><?php echo htmlspecialchars($student['dept']); ?></td>
            <td><?php echo htmlspecialchars($student['email']); ?></td>
            <td>
                <a href="edit_student.php?id=<?php echo $student['id']; ?>">Edit</a>
                |
                <a href="delete_student.php?id=<?php echo $student['id']; ?>"
                   onclick="return confirm('Are you sure?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>