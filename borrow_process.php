<?php
session_start();
require 'connection.php';

$username = $_POST['username'];
$book_id  = $_POST['book_id'];
$days     = $_POST['days'];


$check = mysqli_query($conn, "
    SELECT * FROM borrowed_books 
    WHERE book_id = $book_id AND return_date IS NULL
");

if (mysqli_num_rows($check) > 0) {
   
    $_SESSION['error'] = "Book already borrowed.";
    header("Location: book_borrow.php");
    exit;
}


$borrow_date = date("Y-m-d");
$due_date = date("Y-m-d", strtotime("+$days days"));

mysqli_query($conn, "
    INSERT INTO borrowed_books (username, book_id, borrow_date, due_date)
    VALUES ('$username', $book_id, '$borrow_date', '$due_date')
");


mysqli_query($conn, "
    UPDATE books SET status='borrowed' WHERE book_id=$book_id
");


$_SESSION['success'] = "Book borrowed successfully.";
header("Location: book_borrow.php");
exit;
