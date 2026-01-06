<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['userrole']) || $_SESSION['userrole'] !== 'admin') {
    header("Location: login_form.php");
    exit;
}


if (!isset($_GET['id'])) {
    die("No book ID provided.");
}

$book_id = intval($_GET['id']);


$sql = "DELETE FROM books WHERE book_id = $book_id";

if (mysqli_query($conn, $sql)) {
    
    header("Location: delete_books.php");
    exit;
} else {
    echo "Delete error: " . mysqli_error($conn);
}
