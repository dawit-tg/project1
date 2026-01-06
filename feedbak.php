<?php
session_start();
require 'connection.php';

$username = $_SESSION['username'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = trim($_POST['comment']);

    if (!empty($comment)) {
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO feedback (username, comment, created_at) VALUES (?, ?, NOW())"
        );
        mysqli_stmt_bind_param($stmt, "ss", $username, $comment);
        mysqli_stmt_execute($stmt);

        $_SESSION['success_message'] = "✅ Thank you for your feedback!";

        header("Location: index.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>

    <style>
        /* ONLY feedback center content */

        .center_content {
            width: 60%;
            margin: 120px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .center_content h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .feedback-success {
            background: #e6ffec;
            color: #0f7a2d;
            border: 1px solid #9ae6b4;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            min-height: 120px;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            resize: vertical;
            font-size: 14px;
        }

        textarea:focus {
            outline: none;
            border-color: #d46a1f;
            box-shadow: 0 0 0 2px rgba(212,106,31,0.2);
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 12px;
            background: #d46a1f;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #b45718;
        }
    </style>
</head>
<body>

<div class="center_content">
    <?php if (isset($_SESSION['success_message'])): ?>
    <div class="feedback-success">
        <?php
        echo $_SESSION['success_message'];
        unset($_SESSION['success_message']); // show once
        ?>
    </div>
<?php endif; ?>

    <div class="center_content">
    <h2>Feedback</h2>

    <form method="post">
        <textarea name="comment" placeholder="Write your feedback here..." required></textarea>
        <button type="submit">Submit Feedback</button>
    </form>
</div>

</div>

</body>
</html>
