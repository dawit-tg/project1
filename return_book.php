<?php
session_start();
require 'connection.php';

$success = false;
$error = "";

// Check if book_id is sent
if (!isset($_GET['book_id'])) {
    $error = "Invalid request.";
} else {
    $book_id = intval($_GET['book_id']);
    $username = $_SESSION['username'] ?? '';

    if ($username === '') {
        $error = "You must be logged in.";
    } else {
        // Return the book (only if not already returned)
        $sql = "
            UPDATE borrowed_books
            SET return_date = CURDATE()
            WHERE book_id = ?
            AND username = ?
            AND return_date IS NULL
        ";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "is", $book_id, $username);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $success = true;
        } else {
            $error = "This book is already returned or not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Return Book</title>

    <style>
        /* Only center content styling */
        .center_content {
            width: 50%;
            margin: 150px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            font-family: Arial, sans-serif;
        }

        .success {
            color: #0f7a2d;
            background: #e6ffec;
            padding: 15px;
            border-radius: 8px;
            font-weight: bold;
        }

        .error {
            color: #a80000;
            background: #ffe6e6;
            padding: 15px;
            border-radius: 8px;
            font-weight: bold;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background: #d46a1f;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
        }

        a:hover {
            background: #b45718;
        }
    </style>
</head>
<body>

<div class="center_content">

    <?php if ($success): ?>
        <div class="success">
            ✅ Book returned successfully!
        </div>

        <script>
            // Auto redirect after 2 seconds
            setTimeout(function () {
                window.location.href = "borrow_history.php";
            }, 2000);
        </script>

    <?php else: ?>
        <div class="error">
            ❌ <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <a href="borrow_history.php">Back to Borrow History</a>

</div>

</body>
</html>
