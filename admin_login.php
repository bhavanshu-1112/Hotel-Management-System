<?php
// Initialize the session
session_start();
// Include config file
require_once "config.php";

$query="select username,password from admin_login ";
$stmt=mysqli_prepare($conn, $query);
$result=$conn->query($query);
$flag=0;
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    
// if($_SESSION['username']==)
while($rows=$result->fetch_assoc()){

if(($rows['username']==$_SESSION['username']) && ($rows['password']==$_SESSION['password'])){
    $flag=1;
    header("location: customer_table.php");
    exit;
//   header('location:billing.php');
 }

}
if($flag==0)
{
    echo '<script type="text/javascript">';
            echo 'alert("Admin not logged in");';
            echo 'window.location.href="main.php";';
            echo '</script>';
}

    

 
else{
    header("location: main.php");
}
}

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM admin_login WHERE username = ? AND password= ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
			$param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $password);
                  //  if(mysqli_stmt_fetch($stmt)){
                    //    if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location:customer_table.php");
                        //} else{
                            // Display an error message if password is not valid
                          //  $password_err = "The password you entered was not valid.";
                       // }
                    //}
                } else{
                    // Display an error message if username doesn't exist
                    echo '<script language="javascript">';
                echo 'alert("No account found with that username.")';
                echo '</script>';
                    $username_err = "No account found with that username.";
                }
            } else{
                echo '<script language="javascript">';
                echo 'alert("Oops! Something went wrong. Please try again later.")';
                echo '</script>';
                
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
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
            height: 400px;
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
                    <a href="bookroom.php">Book A Room</a>
                    <a href="facilities.php">Facilities</a>
                    <a href="nearby.php">Nearby</a>
                    <div class="dropdown">
                      <button class="dropbtn">
                      <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){ ?>            
                        My Account
                      <?php }
                      else { ?>
                      <?php echo "Welcome ". $_SESSION['username']?>
                      <?php } ?>
                      
                      </button>
					  <div class="dropdown-content">

                        <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){ ?>            
                                    <a href="login.php">Login</a>
                                    <a href="register.php">Sign Up</a>
                        <?php }
                        else { ?>
                        <a href="Booking.php">My Bookings</a>
                        <a href="logout.php">Logout</a>
                        <?php } ?>
                        
                      </div>
                    </div>
                    <div class="dropdown">
                      <button class="dropbtn">Our Locations
                      </button>
                      <div class="dropdown-content">            
                        <a href="delhi.php">Delhi</a>
                        <a href="lucknow.php">Lucknow</a>
                        <a href="jaipur.php">Jaipur</a>
                      </div>
                    </div>
            </div> 
            <br><br>


    <!- /*************************************LOGIN CONTAINER*********************************************************************************/ ->
            <div class="main">
                    <p class="login" align="center">Admin Login</p>
                    <form class="form1" action="" method="POST">
                      <input class="un " name="username" type="text" align="center" placeholder="Admin Username">
                      <input class="pass" name="password" type="password" align="center" placeholder="Password">
                      <button type="submit" class="submit" align="center">Login</button>
                      <!-- <p class="forgot" align="center"><a href="#">Forgot Password?</a></p> -->
                        </form>   
                    </div>
            
    </body>
</html>