
<?php
         session_start();
        ?>
<!DOCTYPE html>
<html>
    <head>
        <title> DLS</title>
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
        margin-left: 23vw;
        border-radius: 15px 0px  0px 15px;
        background-position-x: right;
        margin-top: 8vw;
       }
       .center_content p{
       
        font-size: 20px;
        font-family:cursive;
        color:darkslategrey;
       }

       .center_content img{
        width: 28vw;
        height: 20vw;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        margin:10px 30px 50px 0px;
        padding: 40px 30px 30px 0px;
        border-radius: 15px 0 0 15px;
        border: none;
        transition: tranform .3s ease-in-out;
        
       }
        .center_content h1{
          color: hotpink;
          margin: 5vw 0  3vw 0;
          font-size: 40px;
        }
      .search-container {
    display: flex;
    justify-content: center;
    margin: 40px 0;
}

#search {
    margin-top:2vw; 
    margin-left:8vw;
    width: 500px;
    padding: 14px 20px;
    font-size: 16px;
    border-radius: 30px;
    border: 1px solid #ddd;
    outline: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

#search:focus {
    border-color: #2563eb;
}

/* result table */
table {
    width: 90%;
    margin: auto;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

th {
    background: #2563eb;
    color: white;
}

       .discreption{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        text-shadow: 10px 0 10px 10px  black;
        border-radius: 15px 0 0 15px;
       }
    
       
      </style>
    </head>
    <body>
        <header class="header_content">
             <div class="dropdown">
               <button class="dropbtn ">menu</button>
                <div class="dropdown-content">
                    <a href="#">Login</a>
                    <a href="#">Profile</a>
                    <a href="#">Setting</a>
                    <a href="#">about Us</a>
                    <a href="#">Countact Us</a>
                    <a href="#">help</a>
                    <a href="feedbak.php">feedback</a>
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
                <a href="login_form.php">Login</a>

             </div>
               
       </div>
       
       <div class="center_content">
        

      <input  type="text"  id="search" placeholder="Search by Book ID or Title..."><br><br>
      <div id="resultBox" style="display:none;">
        <table border="1" width="100%">
          <thead>
            <tr>
              <th>Book ID</th>
              <th>Title</th>
              <th>Author</th>
            </tr>
          </thead>
          <tbody id="result"></tbody>
        </table>
      </div>



        <div class="discreption">
        <h1><h1>Woldia University Digital Library Management System</h1>
        <p>This system allows any student to read various books online,  and if a user wants to borrow any book,<br>
           it also facilitates that.The service is available 24 hours a day, providing students with easy access to educational resources.  <br><br>
        <b>When students borrow books, they must be aware of the following rules and regulations:</b> <br>
        1 Users must register to create an account. <br>
        2 Users have to make a payment according to the duration of the loan, which is determined at the time of borrowing.  <br>
        3 Users must return books on time; otherwise, there will be penalties, which may include fines or restrictions on future borrowing. <br>
        4  Users are encouraged to provide feedback on the books they read to help improve the library's collection. <br>
        5 In case of damaged or lost books, users are responsible for replacement costs. <br>
      
        </div>
        <img src="devo_s.jpg" alt="group1">
        <img src="devo_b.jpg" alt="">

        <h2>Our University Library</h2>
<p>It has a lot of studying space and books. We hope any person enjoys and refreshes themselves while using our facilities.
 Our library is committed to creating a welcoming environment for all students, ensuring that everyone can find a quiet space to study and access the resources they need for academic success.</h2> <br>
        <img src="devo3.jpg" alt="">
        <img src="devo4.jpg" alt="">
 <p>Look, we designed our library like the image below, and it is designed for all people. This means there are no age restrictions; it is designed for children, for youth, and for elders.
   Our library features spacious reading areas, comfortable seating, and accessible facilities that cater to everyone's needs. We believe in fostering a love for reading at every stage of life. Children can explore their imagination, young adults can focus on their studies, and elders can enjoy a peaceful environment to read and reflect. The design promotes inclusivity and encourages community engagement through various programs and events tailored for all age groups.</p>
        <img src="devo1.jpg" alt="">
        <img src="devo5.jpg" alt="">

       </div>
    </section>

   <script>
    document.getElementById("search").addEventListener("keyup", function () {
    let query = this.value.trim();
    let resultBox = document.getElementById("resultBox");

    if (query === "") {
        resultBox.style.display = "none";
        document.getElementById("result").innerHTML = "";
        return;
    }

    resultBox.style.display = "block";

    fetch("search_books.php?query=" + query)
        .then(response => response.text())
        .then(data => {
            document.getElementById("result").innerHTML = data;
        });
});
</script>


  </body>
</html>