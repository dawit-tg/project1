<?php
session_start();
require'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['userrole'];

$sql = "SELECT * FROM userinfo 
        WHERE username='$username' 
        AND password='$password' 
        AND role='$userrole'";

$result = mysqli_query($conn, $sql);

// If user exists
if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    // Save data in session
    $_SESSION['username'] = $user['username'];
    $_SESSION['role']     = $user['role'];

    // Redirect based on role
    if ($user['role'] === 'admin') {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: books.php");
    }
    exit;
} else {
    echo "Invalid login details";
}
?>
