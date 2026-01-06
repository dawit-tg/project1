<?php
require'connection.php';
$username = $_POST['username'] ?? '';
$fullname = $_POST['fullname'] ?? '';
$userrole = $_POST['userrole'] ?? '';
$password = $_POST['password'] ?? ''; 
$dob = $_POST['dob'] ?? null;
$gender = $_POST['gender'] ?? '';

if (empty($username) || empty($fullname) || empty($userrole) || empty($password) || empty($gender)) {
    die("Please fill in all required fields.");
}


$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, fullname, userrole, password, dob, gender) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $username, $fullname, $userrole, $hashed_password, $dob, $gender);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
