<?php
require 'connection.php';

$sql = "CREATE DATABASE DLMS";

if (mysqli_query($conn, $sql)) {
    echo "Database created successfully!";
} else {
    die("Database creation failed: " . mysqli_error($conn));
}
?>
