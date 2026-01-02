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
      .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin-top:8vw;
        }
     .login-container {
            width: 400px;
            padding: 40px;
            border-radius: 14px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            background-color:#eef4f4;;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 8px;
            color: #333;
        }

        .login-container p {
            text-align: center;
            margin-bottom: 30px;
            color: #777;
            font-size: 14px;
        }

    
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            color: #555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #eef4f4;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.2);
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: #658eea;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #5a67d8;
        }

        .extra-links {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .extra-links a {
            color: #667eea;
            text-decoration: none;
        }

        .extra-links a:hover {
            text-decoration: underline;
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
       <div class="center-content">
        <div class="login-container">
            <h2>Login</h2>
            <p>Digital Library Management System</p>

            <form action="login.php" method="POST">

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Enter username" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter password" required>
                </div>

                <div class="form-group">
                    <label>User Role</label>
                    <select name="userrole" required>
                        <option value="">-- Select Role --</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <button type="submit" class="login-btn">Login</button>
            </form>

            <div class="extra-links">
                <a href="#">Forgot Password?</a>
            </div>
       </div>
</body>
</html>
