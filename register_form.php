<!DOCTYPE html>
<html>
    <head>
        <title> Registration</title>
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
        margin-left: 15vw;
        border-radius: 15px 0px  0px 15px;
        background-position-x: right;
        margin-top: 8vw;
       }

        .form-container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            max-width: 500px;
            margin: 40px auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #1e90ff;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid black;
            border-radius: 6px;
        }

        input[readonly] {
            background-color: #f0f0f0;
            color: #666;
            cursor: not-allowed;
        }
        input[type="submit"],[type="reset"] {
            margin-top: 15px;
            background: #1e90ff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            width: 45%;
            font-size: 1em;
        }

        button:hover {
            background: #0078d7;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
            display: none;
        }
    </style>
 
    </head>
    <body>
        <header class="header_content">
             <div class="dropdown">
               <button class="dropbtn ">menu</button>
                <div class="dropdown-content">
                    <a href="login_form.php">Login</a>
                    <a href="#">Profile</a>
                    <a href="#">Setting</a>
                    <a href="#">About Us</a>
                    <a href="#">Contact Us</a>
                    <a href="#">help</a>
                    <a href="feebak.php">feedback</a>
                </div>
             </div>
               <h1>Digital Library Mangnment System</h1>
             <div class="logo">
                 <a class ="imga" href="index1.php"><img src="devo8.png" alt="the image doesen't set"> </a>
                 
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
                <div class="form-container">
                    <h2>User Registration</h2>
                   
                   <form action="insert_user.php" method="POST">

                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                       


                        <label for="fullname">Full Name:</label>
                        <input type="text" id="fullname" name="fullname" required>
                       

                        <label for="userrole">User Role:</label>
                        <input type="text" id="userrole"name="userrole"required>
                        

                         <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        

                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" required>
                        

                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" required>
                        

                        <label>Gender:</label>
                        <select id="gender" name="gender" required>
                            <option value="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                       

                        <div class="button-container">
                            <input type="reset" value="Clear">
                            <input type="submit"  value="Register">
                        </div>
                      
                    </form>
                 </div>
              </div>
           </section>

    

        </body>
    </html>