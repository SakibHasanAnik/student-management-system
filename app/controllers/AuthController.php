<?php

require_once "../app/config/Database.php";
require_once "../app/models/User.php";

class AuthController {
    private $userModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $database = new Database();
        $db = $database->connect();

        $this->userModel = new User($db);
    }

    public function login($username, $password) {
        $username = trim($username);
        $password = trim($password);

        $user = $this->userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: index.php");
            exit();
        }

        return "Invalid username or password.";
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();
        header("Location: login.php");
        exit();
    }
}