<?php
require 'connection.php';

$sql = "
CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    comment TEXT,
    created_at DATETIME
)";

if (mysqli_query($conn, $sql)) {
    echo "Feedback table created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
