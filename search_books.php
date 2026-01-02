<?php
require'connection.php';
$query = $_GET['query'];

$sql = "SELECT * FROM books 
        WHERE book_id LIKE '%$query%' 
        OR title LIKE '%$query%'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['book_id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['author']}</td>
              </tr>";
    }
} else {
    echo "<tr>
            <td colspan='3' style='text-align:center;'>
              No books found
            </td>
          </tr>";
}
?>