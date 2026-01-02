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

        .error {
            color: red;
            font-size: 0.9em;
            min-height: 20px;
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
                <a href="register_form.html">Registeration </a>
                <a href="book_list.html">Books</a>
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
                <div class="form-container">
                    <h2>User Registration</h2>
                    <!-- The novalidate attribute prevents the browser's built-in form validation -->
                   <form id="userForm" action="insert_user.php" method="POST">

                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username">
                        <div class="error" id="usernameError"></div>


                        <label for="fullname">Full Name:</label>
                        <input type="text" id="fullname" name="fullname">
                        <div class="error" id="fullnameError"></div>

                        <label for="userrole">User Role:</label>
                        <input type="text" id="userrole"name="userrole">
                        <div class="error" id="userroleError"></div>

                         <label for="password">Password:</label>
                        <input type="password" id="password" name="password">
                        <div class="error" id="passwordError" ></div>

                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" id="confirmPassword" name="confirmPassword">
                        <div class="error" id="confirmPasswordError"></div>

                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob">
                        <div class="error" id="dobError"></div>

                        <label>Gender:</label>
                        <select id="gender" name="gender">
                            <option value="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <div class="error" id="genderError"></div>

                        <div class="button-container">
                            <input type="reset" value="Clear">
                            <input type="submit"  value="Register">
                        </div>
                        <div class="success-message" id="successMessage">
                            Registration successful!
                        </div>
                    </form>
                 </div>
              </div>
           </section>

    <script>
        // This is a helper function to calculate age from date of birth
        function calculateAge(dob) {
            const today = new Date();
            const birthDate = new Date(dob);
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();

            // Adjust age if birthday hasn't occurred this year yet
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            return age;
        }

        // Event listener for date of birth field
        document.getElementById('dob').addEventListener('change', function () {
            const dob = this.value;
            const ageField = document.getElementById('age');

            if (dob) {
                const age = calculateAge(dob);
                ageField.value = age;

                // Validate if student is at least 16 years old
                if (age < 16) {
                    document.getElementById('dobError').textContent = "Student must be at least 16 years old!";
                } else {
                    document.getElementById('dobError').textContent = "";
                }
            } else {
                ageField.value = "";
            }
        });

        document.getElementById("userForm").addEventListener("submit", function (e) {
            e.preventDefault(); 
            // Handle each form field values in constants
            const fullname = document.getElementById("fullname").value.trim();
            const username = document.getElementById("username").value.trim();
            const userrole = document.getElementById("userrole").value.trim();
            const dob = document.getElementById("dob").value.trim();
            const gender = document.getElementById("gender").value.trim();
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            // Clear previous error messages
            document.querySelectorAll(".error").forEach(el => el.textContent = "");

            // Declare flag controller as error tracker
            let valid = true;


             if (username === "") {
                document.getElementById("usernameError").textContent = "username  is required!";
                valid = false;
            }
            // Validate full name
            if (fullname === "") {
                document.getElementById("fullnameError").textContent = "Full name is required!";
                valid = false;
            } else if (fullname.length < 3) {
                document.getElementById("fullnameError").textContent = "Name must be at least 3 characters long!";
                valid = false;
            } else if (fullname.length > 30) {
                document.getElementById("fullnameError").textContent = "Name must be at most 30 characters long!";
                valid = false;
            }

                
            // Validate date of birth
            if (dob === "") {
                document.getElementById("dobError").textContent = "Date of birth is required!";
                valid = false;
            } else {
                const age = calculateAge(dob);
                if (age < 16) {
                    document.getElementById("dobError").textContent = "Student must be at least 16 years old!";
                    valid = false;
                }
            }

   

            // Validate password
            if (password === "") {
                document.getElementById("passwordError").textContent = "Password is required!";
                valid = false;
            } else if (password.length < 8) {
                document.getElementById("passwordError").textContent = "Password must be at least 8 characters long!";
                valid = false;
            }

            // Validate confirm password
            if (confirmPassword === "") {
                document.getElementById("confirmPasswordError").textContent = "Please confirm your password!";
                valid = false;
            } else if (password !== confirmPassword) {
                document.getElementById("confirmPasswordError").textContent = "Passwords do not match!";
                valid = false;
            }

            // If all validations pass
            if (valid) {
                document.getElementById("successMessage").style.display = "block";
                setTimeout(() => {
                    document.getElementById("successMessage").style.display = "none";
                    e.target.reset();
                }, 3000);
            }
        });

        // Reset form handler
        document.getElementById("userForm").addEventListener("reset", function () {
            document.querySelectorAll(".error").forEach(el => el.textContent = "");
            document.getElementById("successMessage").style.display = "none";
        });
    </script>

        </body>
    </html>