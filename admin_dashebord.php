<?php

require'connection.php';
$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="heraricy.css">
    <script src="script.js" defer></script>
    <title>Admin Dashboard - Digital Library</title>

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
                      margin-left:20px;
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
            background: #575757;
        }

       .left-side a.active {
            background-color: #1e90ff;
            font-weight: bold;
            border-left: 5px solid #00bcd4;
        }

       .left-side ul ul li a {
            font-size: 0.95em;
            background: whitesmoke;
           box-shadow: 5px 0px 8px black;
           border-radius: 10px 0 0 0px;
           padding: 20px;
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
        margin-left: 20vw;
        border-radius: 15px 0px  0px 15px;
        background-position-x: right;
        margin-top: 8vw;
       
       }
       .book-table {
    width: 100%;
    max-width: 600px;
    margin: 20px auto;
    border-collapse: collapse;
    background: #ffffff;
    font-family: "Segoe UI", Arial, sans-serif;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}
 h1{
        color:tomato;
        font-size:40px;
        margin-left:20vw;
      }

.book-table thead {
    background-color: #1e90ff;
    color: #ffffff;
}

.book-table th {
    padding: 12px 15px;
    text-align: left;
    font-size: 15px;
    font-weight: 600;
}


.book-table td {
    padding: 10px 15px;
    border-bottom: 1px solid #e6e6e6;
    font-size: 14px;
    color: #333;
}


.book-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}


.book-table tbody tr:hover {
    background-color: #eef6ff;
    cursor: pointer;
}

.book-table td:first-child {
    text-align: center;
    font-weight: 600;
}

.book-table tbody tr:last-child td {
    border-bottom: none;
}

  </style>
</head>
<body>
     <header class="header_content">
             <div class="dropdown">
               <button class="dropbtn ">menu</button>
                <div class="dropdown-content">
                    <a href="#">Logout</a>
                    <a href="#">Profile</a>
                    <a href="#">Setting</a>
                </div>
             </div>
               <h1>Digital Library Mangnment System</h1>
             <div class="logo">
                 <a class ="imga" href="index1.html"><img src="devo8.png" alt="the image doesen't set"> </a>
                 
             </div>
             
            
        </header>
        <section>
          <div class="left-side">
               <div class="home">
                <a href="index1.html">Home</a>
                <a href="register_form.php">Registeration </a>
                <a href="book_list.html">Books</a>
                <a href="#">Edite</a>
                <a href="#">Delete</a>
                <a href="add_books.php">Add New Book</a>
             </div>
                <ul>
                  <input type="checkbox" id="dashbord">
                  <label for="dashbord">Dashbord</label>
                  <ul>
                    <li><a href="#">Show Borrowed books</a></li>
                    <li><a href="#">Reading history</a></li>
                    <li><a href="#">Admin Dashbord</a></li>
                  </ul>
               </ul>
       </div>
       <div class="center_content">
        <h1>Admin Dashboard</h1>
        <table class="book-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($book = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $book['book_id']; ?></td>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
