<?php
require 'connection.php';

$sql = "CREATE TABLE userinfo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    fullname VARCHAR(50) NOT NULL,
    userrole VARCHAR(50) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    BDate DATE NOT NULL,
    gender VARCHAR(10) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully!";
} else {
    die("Table creation failed! " . mysqli_error($conn));
}
?>
