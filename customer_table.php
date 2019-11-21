<?php
// include_once('config.php');
require_once "config.php";

$query="select * from reservations ";
$stmt=mysqli_prepare($conn, $query);
$result=$conn->query($query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="shortcut icon" href="logo.ico" />
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="/assets/css/custom.css">-->
    <title>Customer information </title>
</head>
<style>
    table{
        color: white;
    }
    .table-wrapper {
        margin-top: 50px;
    }

    .customer-img {
        width: 40px;
        height: 40px;
    }

    .add-customer-form {
        margin-top: 50px;
    }
    h3{
        color: white;
    }
    body{                                                               /*body*/
                background-image: url("bg5.jpg");
                background-attachment: fixed;
                background-size: cover;
            
                font-family: 'Parisienne', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
      h1{
          color: rgb(185, 144, 45);
      }
      label{
          color: white;
      }
      .text-center{
          color: white;
      }
            .content{                                                              
              background: linear-gradient(to right, rgba(238, 187, 69, 0.514), rgba(153, 108, 3, 0.514));
              text-align: center;
              color: wheat;
              font-size: 25px;
              border-radius: 9px;
              margin:3%;
            }
            h2{                                                                     /*headings*/
              text-shadow: 2px 2px rgb(39, 38, 38);
              color: rgb(235, 226, 205);
            }



             .logo{    
              font-family: 'Tangerine', cursive;
              font-size: 320px;
            text-align: center;                                                             /*logo formatting*/
            color:  rgb(185, 144, 45);
            text-shadow: 4px 4px 4px #aaa;
            position: relative;
            margin: auto;
  
             }
             
                                            /******************************************************
                                            **************NAVBAR AND DROPDOWN**********************
                                            ******************************************************/
                            
            .navbar {                                                   /*navbar*/

            position:  sticky;
            top: 0;
            z-index: 2;
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
            z-index: 2;
            }

            .dropdown {                                     /* The dropdown container */                                     
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
            font-size: 27px;
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
            font-size: 24px;
            text-align: left;
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



            
       
</style>
<body >
    
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

<div class="table-wrapper">
            <div class="container">
               <center><h3>Customer Details</h3></center>
               <form action="delete.php" method="POST">
            <table class="table table-hovered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Room type</th>
                        <th scope="col">Username</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Check In Date</th>
                        <th scope="col">Check Out Date</th>
                        <th scope="col">PhoneNumber</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Room No.</th>
						<th scope="col"> </th>
                     
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($rows=$result->fetch_assoc()){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $rows["room_no"];?></th>
                            <td><?php echo $rows["username"];?></td>                           
                            <td><?php echo $rows["name"];?></td>
                            <td><?php echo $rows["checkin"];?></td>
                            <td><?php echo $rows["checkout"];?></td>
                            <td><?php echo $rows["number"];?></td>
                            <td><?php echo $rows["paid"];?></td>
                            <td><?php echo $rows["room_no1"];?></td>
                            <td><a link="red" href="delete.php?room_no1=<?php echo $rows['room_no1'];?>"><i class="material-icons w3-large w3-text-red">delete</i></a></td> 
                        </tr>
                   <?php
                   
                    }
                    ?>
                </tbody>
            </table>
            </form>
            </div>
      
    </div>
</div>
</body>
</html>
