<?php
require 'connection.php';

$sql = "
CREATE TABLE IF NOT EXISTS borrowed_books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    book_id INT NOT NULL,
    borrow_date DATE NOT NULL,
    due_date DATE NOT NULL,
    return_date DATE DEFAULT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "borrowed_books table created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>

