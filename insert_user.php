<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username']);
    $fullname = trim($_POST['fullname']);
    $userrole = trim($_POST['userrole']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirmPassword'];
    $bdate    = $_POST['dob'];
    $gender   = $_POST['gender'];

    if ($password !== $confirm) {
        die("Passwords do not match!");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // ✅ FIXED COLUMN NAME
    $stmt = $conn->prepare(
        "INSERT INTO userinfo 
        (username, fullname, userrole, password_hash, BDate, gender)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssss",
        $username,
        $fullname,
        $userrole,
        $hashedPassword,
        $bdate,
        $gender
    );

    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Execute error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
