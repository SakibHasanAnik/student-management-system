<?php
require_once "../app/controllers/AuthController.php";

$auth = new AuthController();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";

    $error = $auth->login($username, $password);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Admin Login</h2>

    <?php if (!empty($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>