            <?php
require 'connection.php';

$result = mysqli_query($conn, "
SELECT 
    bb.username,
    b.title,
    b.author,
    bb.borrow_date,
    bb.due_date,
    bb.return_date
FROM borrowed_books bb
JOIN books b ON bb.book_id = b.book_id
ORDER BY bb.borrow_date DESC
");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Book List</title>
     <link rel="stylesheet" href="heraricy.css">
        <style>
        *{
            box-sizing: border-box;
        }
       html, body {
         height: 100%;
         margin: 0;
        font-family: "Segoe UI", Roboto, Arial, sans-serif;
         background: #fff;
            }
         .header_content {
             position: fixed;
             top: 0;
             left: 0;
             right: 0;
             height: 130px;               
             background: whitesmoke;
             justify-content: center;
             z-index: 1000;
             border-bottom: 1px solid #e6e6e6;
             padding: 0 20px;
            font-weight: 600;
            }
           .header_content  img{
                width: 70px;
                height: 60px;
                border-radius: 50%;
                margin-left: 10px;
                margin-bottom: 100px; 
                background-size: cover; 
              
            }
         .header_content h1{
                font-size: 20px;
                  text-align: center;
                  font-family:cursive;
                  color: darkorange;
                 margin-top: 0px;
            }
         .left-side{
            background-color:white;
            width: 18vw;
            color: white;
            min-height: 80vh;
            padding: 15px;
            overflow-y: auto;
            border-radius: 0 15px 15px 0;
            left: 0px;
            position: fixed;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 30%;
            border: none;
             margin-top:20px;
            
         }
         .left-side ul ul li a:active  {
          background-color: green;
        }
         
            .left-side ul {
                 list-style-type: none;
               }
            .left-side input[type="checkbox"] {
                    display: none;
             }
            .left-side label,
            .left-side a {
                     display: block;
                     padding: 10px;
                     color: black;
                     text-decoration: none;
                     cursor: pointer;
                     transition: background 0.3s;
                     position: relative;
                    }
            .left-side ul ul {
                      margin-left: 20px;
                      max-height: 0;
                      overflow: hidden;
                      background: chocolate
                      transition: max-height 0.3s ease;
                      
                    }
                    
        .left-side label:hover,
        .left-side  a:hover {
            background: #e2dbdbff;
        }

       .left-side a.active {
            background-color: #1e90ff;
            font-weight: bold;
            border-left: 5px solid #00bcd4;
        }

       .left-side ul ul li a {
            font-size: 0.95em;
            
          
        }
        .left-side input[type="checkbox"]:checked+label+ul {
            max-height: 500px;
        }

       .left-side  label::after {
            content: "▸";
            position: absolute;
            right: 20px;
            transition: transform 0.1s;
        }

       .left-side input[type="checkbox"]:checked+label::after {
            transform: rotate(90deg);
        }


       .center_content{
        width: 72vw;
        margin-left: 23vw;
        border-radius: 15px 0px  0px 15px;
        background-position-x: right;
        margin-top: 8vw;
        padding: 40px;
       }
    
/* Page title */
h2 {
    margin: 20px 0;
    font-family: "Segoe UI", Arial, sans-serif;
    color: #333;
    text-align: center;
}

/* Table base */
table {
    width: 100%;
    border-collapse: collapse;
    background: #ffffff;
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    border-radius: 10px;
    overflow: hidden;
    font-family: "Segoe UI", Arial, sans-serif;
}

/* Header */
table th {
    background: #f3f4f6;
    color: #111;
    font-weight: 600;
    padding: 12px;
    text-align: left;
    border-bottom: 2px solid #e5e7eb;
}

/* Cells */
table td {
    padding: 12px;
    border-bottom: 1px solid #e5e7eb;
    color: #333;
}

/* Hover effect */
table tr:hover {
    background: #f9fafb;
}

/* Status badges */
.status-borrowed {
    color: #dc2626;
    font-weight: bold;
}

.status-returned {
    color: #16a34a;
    font-weight: bold;
}

/* Mobile responsive */
@media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }

    table tr {
        margin-bottom: 15px;
        border-bottom: 2px solid #e5e7eb;
    }

    table th {
        display: none;
    }

    table td {
        display: flex;
        justify-content: space-between;
        padding: 10px;
    }
}

    </style>
</head>
<body>
     <header class="header_content">
             <div class="dropdown">
               <button class="dropbtn ">menu</button>
                <div class="dropdown-content">
                    <a href="logout.php">Logout</a>
                    <a href="#">Profile</a>
                    <a href="#">Setting</a>
                </div>
             </div>
               <h1>Digital Library Mangnment System</h1>
             <div class="logo">
                 <a class ="imga" href="index.php"><img src="devo8.png" alt="the image doesen't set"> </a>
                 
             </div>
             
            
        </header>
        <section>
          <div class="left-side">
               <div class="home">
                <a href="index.php">Home</a>
                <a href="register_form.php">Registeration </a>
                <a href="book_list.php">Books</a>
                <li><a href="book_borrow.php">Book Borrow</a></li>
                <li><a href="borrow_history.php"> Borrowed book History</a></li>
                <li><a href="logout.php"> Logout</a></li>
             </div>
       </div>
       <div class="center_content">


<h2>Borrow History</h2>

    <table border="1" cellpadding="8">
            <tr>
                <th>User</th>
                <th>Book</th>
                <th>Borrow Date</th>
                <th>Due Date</th>
                <th>Status</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= htmlspecialchars($row['username']) ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= $row['borrow_date'] ?></td>
                <td><?= $row['due_date'] ?></td>
                <td>
                    <?php
                    if ($row['return_date'] === NULL)
                        echo "<span style='color:red'>Borrowed</span>";
                    else
                        echo "<span style='color:green'>Returned</span>";
                    ?>
                </td>
            </tr>
            <?php } ?>
         </table>
         
         <a href="return_book.php?book_id=<?php echo $row['book_id']; ?>"
         onclick="return confirm('Are you sure you want to return this book?');">
         Return
        </a>


     </div>
</section>
</body>
</html>
