<?php

class Student {
    private $conn;
    private $table = "students";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll($search = "") {
        if (!empty($search)) {
            $sql = "SELECT * FROM {$this->table}
                    WHERE name LIKE :search
                    OR student_id LIKE :search
                    ORDER BY id DESC";

            $stmt = $this->conn->prepare($sql);
            $searchValue = "%" . $search . "%";
            $stmt->bindParam(":search", $searchValue);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create($student_id, $name, $dept, $email) {
        $sql = "INSERT INTO {$this->table} 
                (student_id, name, dept, email)
                VALUES 
                (:student_id, :name, :dept, :email)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":student_id", $student_id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":dept", $dept);
        $stmt->bindParam(":email", $email);

        return $stmt->execute();
    }

    public function update($id, $student_id, $name, $dept, $email) {
        $sql = "UPDATE {$this->table}
                SET student_id = :student_id,
                    name = :name,
                    dept = :dept,
                    email = :email
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":student_id", $student_id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":dept", $dept);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}