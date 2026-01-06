<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['userrole']) || $_SESSION['userrole'] !== 'admin') {
    header("Location: login_form.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM books");
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="heraricy.css">
    <script src="script.js" defer></script>
    <title>Edit book</title>

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
      /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Roboto, Arial, sans-serif;
}


/* Top menu links */
.left-side .home {
    margin-top:7px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 25px;
}

.left-side .home a {
    text-decoration: none;
    color: #333;
    padding: 10px 15px;
    border-radius: 8px;
    transition: background 0.3s, color 0.3s;
}

.left-side .home a:hover {
    background: #f0f0f0;
    color: #d46a1f;
}

/* Dashboard section */
.left-side ul {
    list-style: none;
}

/* Hide checkbox */
#dashbord {
    display: none;
}

/* Dashboard label */
label[for="dashbord"] {
    display: block;
    padding: 12px 15px;
    background: #f7f7f7;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    color: #333;
    transition: background 0.3s;
}

label[for="dashbord"]:hover {
    background: #ececec;
}

/* Sub menu */
.left-side ul ul {
    max-height: 0;
    overflow: hidden;
    margin-left: 10px;
    transition: max-height 0.4s ease;
}

/* Show submenu when checked */
#dashbord:checked ~ ul {
    max-height: 200px;
    margin-top: 10px;
}

/* Sub menu items */
.left-side ul ul li a {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #555;
    border-radius: 8px;
    margin-bottom: 8px;
    background: #fff4ec;
    transition: background 0.3s, transform 0.2s;
}

.left-side ul ul li a:hover {
    background: #d46a1f;
    color: #fff;
    transform: translateX(5px);
}

       .center_content{
        width: 72vw;
        margin-left: 20vw;
        border-radius: 15px 0px  0px 15px;
        background-position-x: right;
        margin-top: 8vw;
        display: block;
        justify-content: center;
        align-items: center;
        height: 100%;
       }
 form-box {
            width: 400px;
            margin: 120px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #d46a1f;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #b45718;
        }

        a {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #333;
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
                    <a href="#">about Us</a>
                    <a href="#">Contact us</a>
                    <a href="#">help</a>
                    <a href="#">feedback</a>
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
                <a href="index1.php">Home</a>
                <a href="register_form.php">Registeration </a>
                <a href="book_list.php">Books</a>
             </div>
                <ul>
                  <input type="checkbox" id="dashbord">
                  <label for="dashbord">Dashbord</label>
                  <ul>
                    <li><a href="#">Show Borrowed books</a></li>
                    <li><a href="#">Reading history</a></li>
                  </ul>
               </ul>
       </div>

       <div class="center_content">
           <div class="form-box">
            <h2>Select a Book to Edit</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Action</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['book_id']; ?></td>
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td><?php echo htmlspecialchars($row['author']); ?></td>
        <td>
            <a href="edit_book.php?id=<?php echo $row['book_id']; ?>">Edit</a>

        </td>
    </tr>
<?php } ?>

</table>

<br>
<a href="admin_dashboard.php">⬅ Back to Dashboard</a>
        </div>
     </div>
  </section>
 </body>
</html>
