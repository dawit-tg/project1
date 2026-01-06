<?php
session_start();
require 'connection.php';

$username = $_SESSION['username'] ?? '';

$books = mysqli_query($conn,
    "SELECT * FROM books WHERE status='available'"
);
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
/* Page background */
body {
    margin: 0;
    padding: 0;
    font-family: "Segoe UI", Arial, sans-serif;
    background: #f4f6fb;
}

/* Page title */
h2 {
    text-align: center;
    margin-top: 40px;
    color: #333;
}

/* Form container */
form {
    width: 420px;
    margin: 30px auto;
    background: #ffffff;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

label {
    font-size: 14px;
    font-weight: 600;
    color: #555;
}
input[type="text"],
select {
    width: 100%;
    padding: 10px 12px;
    margin-top: 6px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}


input:focus,
select:focus {
    outline: none;
    border-color: #d46a1f;
    box-shadow: 0 0 0 2px rgba(212,106,31,0.2);
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    background: #d46a1f;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}


button:hover {
    background: #b45718;
}


@media (max-width: 500px) {
    form {
        width: 90%;
    }
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
        <?php if (isset($_SESSION['error'])) { ?>
            <div style="background:#ffdddd;color:#a94442;padding:12px;border-radius:6px;margin-bottom:15px;">
                <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']);
                ?>
            </div>
       <?php } ?>

        <?php if (isset($_SESSION['success'])) { ?>
            <div style="background:#ddffdd;color:#2e7d32;padding:12px;border-radius:6px;margin-bottom:15px;">
                <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>


        <h2>Borrow a Book</h2>
        <form method="post" action="borrow_process.php">
            <label>Username</label><br>
            <input type="text" name="username"
                value="<?php echo htmlspecialchars($username); ?>"
                required><br><br>

            <label>Select Book</label><br>
            <select name="book_id" required>
            <option value="">-- Select Book --</option>

            <?php while ($row = mysqli_fetch_assoc($books)) { ?>
            <option value="<?php echo $row['book_id']; ?>">
            <?php echo htmlspecialchars($row['title']); ?>
            </option>
            <?php } ?>

            </select><br><br>

            <label>Borrow Days</label><br>
            <select name="days">
            <option value="7">7 Days</option>
            <option value="14" selected>14 Days</option>
            <option value="21">21 Days</option>
            </select><br><br>

            <button type="submit">Borrow Book</button>

        </form>
     </div>
    </section>
  </body>
</html>

  
