<?php

require_once "../app/helpers/auth.php";
require_once "../app/controllers/StudentController.php";

checkLogin();

$studentController = new StudentController();

$id = $_GET['id'] ?? null;

if ($id) {
    $studentController->destroy($id);
}

header("Location: index.php");
exit();