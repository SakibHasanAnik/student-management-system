<?php

require_once "../app/helpers/auth.php";
require_once "../app/controllers/StudentController.php";

checkLogin();

$studentController = new StudentController();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $studentController->store($_POST);
}