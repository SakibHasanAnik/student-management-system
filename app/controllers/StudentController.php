<?php

require_once "../app/config/Database.php";
require_once "../app/models/Student.php";

class StudentController {
    private $studentModel;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();

        $this->studentModel = new Student($db);
    }

    public function index($search = "") {
        return $this->studentModel->getAll($search);
    }

    public function store($data) {
        $student_id = htmlspecialchars(trim($data['student_id']));
        $name = htmlspecialchars(trim($data['name']));
        $dept = htmlspecialchars(trim($data['dept']));
        $email = htmlspecialchars(trim($data['email']));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email address.";
        }

        $this->studentModel->create($student_id, $name, $dept, $email);

        header("Location: index.php");
        exit();
    }

    public function edit($id) {
        return $this->studentModel->findById($id);
    }

    public function update($id, $data) {
        $student_id = htmlspecialchars(trim($data['student_id']));
        $name = htmlspecialchars(trim($data['name']));
        $dept = htmlspecialchars(trim($data['dept']));
        $email = htmlspecialchars(trim($data['email']));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email address.";
        }

        $this->studentModel->update($id, $student_id, $name, $dept, $email);

        header("Location: index.php");
        exit();
    }

    public function destroy($id) {
        $this->studentModel->delete($id);

        header("Location: index.php");
        exit();
    }
}