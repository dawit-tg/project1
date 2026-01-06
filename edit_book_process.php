<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['userrole']) || $_SESSION['userrole'] !== 'admin') {
    header("Location: login_form.php");
    exit;
}


if (!isset($_POST['book_id'], $_POST['title'], $_POST['author'])) {
    die("Invalid request.");
}

$book_id = intval($_POST['book_id']);
$title   = mysqli_real_escape_string($conn, $_POST['title']);
$author  = mysqli_real_escape_string($conn, $_POST['author']);


$sql = "UPDATE books 
        SET title = '$title', author = '$author' 
        WHERE book_id = $book_id";

if (mysqli_query($conn, $sql)) {
    header("Location: book_list.php");
    exit;
} else {
    echo "Update failed: " . mysqli_error($conn);
}
