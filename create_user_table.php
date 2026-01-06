<?php
require 'connection.php';

$sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    userrole VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    dob DATE,
    gender ENUM('Male', 'Female') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);"; 


if (mysqli_query($conn, $sql)) {
    echo "Table created successfully!";
} else {
    die("Table creation failed! " . mysqli_error($conn));
}


mysqli_close($conn);
?>
