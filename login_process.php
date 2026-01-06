<?php
session_start();
require 'connection.php';

$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $userrole = $_POST['userrole'];

    $sql = "SELECT * FROM users WHERE username = ? AND userrole = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $userrole);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {

        if (password_verify($password, $user['password'])) {

            $_SESSION['username'] = $user['username'];
            $_SESSION['userrole'] = $user['userrole'];

            if ($user['userrole'] === 'admin') {
                header("Location: admin_dashebord.php");
            } else {
                header("Location: book_list.php");
            }
            exit;

        } else {
            $error = "Password is wrong";
        }

    } else {
        $error = "User not found";
    }
}
?>
