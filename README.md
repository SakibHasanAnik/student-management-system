# 🎓 Student Management System

A secure and simple **Student Management System** built using **PHP, MySQL (PDO), and MVC architecture**.
This project allows an admin to manage student records efficiently with authentication and CRUD operations.

---

## 🚀 Features

* 🔐 Admin Login System (Session-based)
* 🔑 Password Hashing using `password_hash()`
* ✅ Secure Login Verification using `password_verify()`
* 🛡️ Protection against SQL Injection (Prepared Statements)
* ➕ Add Student
* 📋 View All Students
* 🔍 Search Student (by ID or Name)
* ✏️ Edit Student Information
* ❌ Delete Student
* 🔒 Protected Routes (only logged-in users can access)

---

## 🛠️ Technologies Used

* **Frontend:** HTML, CSS
* **Backend:** PHP
* **Database:** MySQL
* **Database Access:** PDO (PHP Data Objects)
* **Server:** XAMPP
* **Version Control:** Git & GitHub

---

## 📂 Project Structure

```
student-management-system/
├── app/
│   ├── config/
│   │   └── Database.php
│   ├── controllers/
│   │   ├── AuthController.php
│   │   └── StudentController.php
│   ├── models/
│   │   ├── User.php
│   │   └── Student.php
│   └── helpers/
│       └── auth.php
│
├── public/
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   ├── add_student.php
│   ├── edit_student.php
│   ├── delete_student.php
│   └── style.css
│
├── .gitignore
└── README.md
```

---

## 🗄️ Database Setup

### 1. Create Database

```sql
CREATE DATABASE student_management;
USE student_management;
```

### 2. Create Tables

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    dept VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);
```

---

## 🔐 Admin Account Setup

### Step 1: Generate Hashed Password

Create a temporary PHP file:

```php
<?php
echo password_hash("12345", PASSWORD_DEFAULT);
?>
```

Run it in browser and copy the generated hash.

---

### Step 2: Insert Admin User

```sql
INSERT INTO users (username, password)
VALUES ('admin', 'PASTE_HASH_HERE');
```

---

### Default Login

```
Username: admin
Password: 12345
```

---

## ▶️ How to Run the Project

1. Install **XAMPP**
2. Start:

   * Apache
   * MySQL
3. Move project to:

```
C:\xampp\htdocs\
```

4. Open **phpMyAdmin** and create database + tables
5. Run project in browser:

```
http://localhost/student-management-system/public/login.php
```

---

## 🔒 Security Features

This project follows basic security best practices:

* 🔐 Password hashing (no plain-text passwords)
* 🛡️ PDO with prepared statements (prevents SQL injection)
* 🔑 Session-based authentication
* 🚫 Unauthorized access blocked using login checks
* ⚠️ Input validation using PHP functions

---

## 📈 Future Improvements

* CSRF Protection
* Role-based authentication (Admin/User)
* AJAX-based UI (no page reload)
* REST API version
* Better UI using Bootstrap or Tailwind CSS

---

## 👨‍💻 Author

**Anik**
Computer Science Student | Aspiring Software Engineer

---

## ⭐ Notes

This project is built as a **DBMS academic project** and demonstrates:

* Database design
* CRUD operations
* Secure backend development
* MVC architecture in PHP

---

💡 *Feel free to fork, modify, and improve this project!*
