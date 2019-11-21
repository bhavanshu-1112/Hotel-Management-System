<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM login WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO login (First_Name,Last_Name,username, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssss", $param_fname, $param_lname, $param_username, $param_password);

        // Set these parameters
		$param_fname=$_POST['firstname'];
		$param_lname=$_POST['lastname'];
        $param_username = $username;
        $param_password = $password;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>







<<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="shortcut icon" href="logo.ico" />
        <link href="https://fonts.googleapis.com/css?family=Parisienne|Tangerine:700&effect=neon" rel="stylesheet">
        <style>
            body{                                                               /*body*/
                background-image: url("bg2.jpg");
                background-attachment: fixed;
                background-size: cover;
                font-family: 'Parisienne', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
                                            /******************************************************
                                            **************NAVBAR AND DROPDOWN**********************
                                            ******************************************************/
                            
                                            
            .navbar {                                                   /*navbar*/
 
            overflow: hidden;
            background-color: rgba(51, 51, 51, 0.74);
            
            }

            .navbar a {                                         /* Links inside navbar */
            float: left;
            font-size: 30px;
            color: rgb(185, 144, 45);
            width: 18%;
            text-align: center;
            padding: 6px 11px;
            text-decoration: none;
            transition: 0.5s ease;
            }

            .dropdown {                                      /* The dropdown container */                                     
            float: left;
            overflow: hidden;
            width: 18%;
            }

            .dropdown .dropbtn {                                        /* Dropdown button */
            font-size: 30px;
            border: none;
            outline: none;
            color: rgb(185, 144, 45);
            width: 100%;
            padding: 6px 11x;
            transition: 0.5s ease;
            background-color: inherit;
            font-family: inherit;                           /*vertical align on mobile phones */
            margin: 0;                                      /* vertical align on mobile phones */
            }

            .navbar a:hover, .dropdown:hover .dropbtn {                                 /* change colors of links on hover*/
            background-color: rgb(185, 144, 45);
            color: white;
            border-radius: 5px;
            }

            .dropdown-content {                                                         /* Dropdown content (hidden) */
            display: none;
            position: absolute;
            background-color: rgb(185, 144, 45);
            width: 21%;
            border-radius: 5px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 2;
            }

            .dropdown-content a {                                                            /* Links inside dropdown */
            float: none;
            color: rgba(26, 25, 25, 0.822);
            padding: 5px 11px;
            text-decoration: none;
            display: block;
            text-align: left;
            font-size: 24px;
            z-index: 1;
            }

            .dropdown-content a:hover {                                   /* Add a grey background color to dropdown links on hover */
            background-color: rgba(202, 175, 112, 0.356);
            border-radius: 5px;
            width: 91%;
            }

            .dropdown:hover .dropdown-content {                             /* Show the dropdown menu on hover */
            display: block;
            } 

                                            /******************************************************
                                            **************LOGIN CONTAINER**************************
                                            ******************************************************/
            .main {                                                         /*login box container*/
            background-color: rgba(32, 32, 32, 0.603);
            width: 400px;
            height: 650px;
            margin: 7em auto;
            border-radius: 1.5em;
            box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
             }

             .login {                                                        /*login heading*/
            padding-top: 40px;
            color:  rgb(185, 144, 53);
            font-weight: bold;
            font-size: 63px;
            }
            .un {                                                            /*username*/
            width: 76%;
            color: rgb(45, 48, 33);
            font-weight: 700;
            font-size: 18px;
            letter-spacing: 1px;
            background: rgba(185, 143, 45, 0.507);
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            outline: none;
            box-sizing: border-box;
            border: 2px solid rgba(0, 0, 0, 0.02);
            margin-bottom: 50px;
            margin-left: 46px;
            text-align: center;
            margin-bottom: 27px;
            font-family: 'Ubuntu', sans-serif;
            }
            .pass {                                                                         /*password*/
            width: 76%;
            color: rgb(45, 48, 33);
            font-weight: 700;
            font-size: 18px;
            letter-spacing: 1px;
            background: rgba(185, 143, 45, 0.507);
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            outline: none;
            box-sizing: border-box;
            border: 2px solid rgba(0, 0, 0, 0.02);
            margin-bottom: 50px;
            margin-left: 46px;
            text-align: center;
            margin-bottom: 27px;
            font-family: 'Ubuntu', sans-serif;
            }
            .un:focus, .pass:focus {                                                        /*pass and username outline on focus*/
             border: 3px solid rgba(185, 143, 45, 0.750);
            }

             .submit {
            cursor: pointer;
            border-radius: 5em;
            color: #fff;
            background: linear-gradient(to right, rgb(224, 174, 56), rgb(155, 110, 7));
            border: 0;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 10px;
            padding-top: 10px;
            margin-left: 35%;
            font-size: 20px;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
            }
            .forgot{
              cursor: pointer;
              font-size: 20px;
              
            }
    
        </style>
    </head>

    <body>
        
        <!- /*************************************NAVBAR AND DROPDOWN*********************************************************************************/ ->
            <div class="navbar">
                <a href="main.php">Home</a>
                <a href="bookroom.php">Hotel Rooms</a>
                <a href="facilities.php">Facilities</a>
                <a href="#">Nearby</a>
                <div class="dropdown">
                  <button class="dropbtn">My Account
                      </button>
					  <div class="dropdown-content">
					  <?php if(!isset($_SESSION["username"])){ ?>            
                        <a href="login.php">Login</a>
                        <a href="register.php">Sign Up</a>
						<?php }
						else { ?>
						<a href="logout.php">Logout</a>
						<?php } ?>
                      </div>
                </div>
             </div> 
            <br><br>

            <!- /*************************************Sign Up CONTAINER*********************************************************************************/ ->
            <div class="main">
                    <p class="login" align="center">Sign Up</p>
                    <form class="form1" action="" method="post">
					  <input class="un " name="firstname" type="text" align="center" placeholder="First Name">
                      <input class="un " name="lastname" type="text" align="center" placeholder="Last Name">
                      <input class="un " name="username" type="text" align="center" placeholder="Username">
                      <input class="pass" name="password" type="password" align="center" placeholder="Password">
					  <input class="pass" name="confirm_password" type="password" align="center" placeholder="Confirm Password">
                      <button type="submit" class="submit" align="center">Sign Up</button>
                            
                                
                    </div>
    
    </body>
</html>