<?php
session_start();
require 'connection.php';

$username = $_SESSION['username'] ?? 'guest';
$feedback = trim($_POST['feedback']);

if ($feedback === '') {
    header("Location: feedback.php");
    exit;
}

$sql = "INSERT INTO feedback (username, comment, created_at)
        VALUES (?, ?, NOW())";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $feedback);
mysqli_stmt_execute($stmt);

header("Location: feedback.php");
exit;
