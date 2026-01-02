<?php
session_start();

// Block non-users
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}
?>

<h1>Book List</h1>
<a href="logout.php">Logout</a>
