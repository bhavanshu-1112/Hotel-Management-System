<?php

session_start();

require_once "config.php";

$query="select * from reservations ";
$stmt=mysqli_prepare($conn, $query);
$result=$conn->query($query);
// if($_SESSION['username']==)
while($rows=$result->fetch_assoc()){

if(($rows['username']==$_SESSION['username']) && $rows['paid']==0){
    echo '<script type="text/javascript">';
            echo 'alert("Room successfully Booked!Proceed to payment.");';
            echo 'window.location.href="billing.php";';
            echo '</script>';
//   header('location:billing.php');
 }
 
//  if()

}

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
    header('Location: login.php');
    exit;
} else{
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$cin=$_POST['checkin'];
$cout=$_POST['checkout'];
$usr=$_SESSION["username"];
$sql="INSERT INTO reservations (username, name, room_no, checkin, checkout, number, paid) VALUES ('$usr',?, ?, '$cin', '$cout', ?, 0)";

$stmt=mysqli_prepare($conn, $sql);
// if($_POST['paid']==0 && ){}
if($stmt)
{
    echo '<script language="javascript">';
echo 'alert("Room successfully Booked!Proceed to payment.")';
echo '</script>';
	mysqli_stmt_bind_param($stmt,"sis",$para_name,$para_room,$para_number);
	$para_number=$_POST['number'];
	$para_room=$_POST['room_no'];
    $para_name=$_POST['name'];
    // $para_paid = $_POST['paid'];
	if (mysqli_stmt_execute($stmt))
        {
            echo '<script type="text/javascript">';
            echo 'alert("Room is successfully Booked!Redirecting you to payment.");';
            echo 'window.location.href="billing.php";';
            echo '</script>';
            // header("location: billing.php");
           
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Something went wrong!")';
            echo '</script>';
        }
}
mysqli_close($conn);
}}
$date=date("d/m/y");
if($cin<$date && $cout<$date){
    echo '<script type="text/javascript">';
            echo 'alert("Please enter valid date");';
            echo '</script>';
}

?>




<!doctype html>
<html lang="en">
<head>
	<script type="text/javascript">
		function GetDays(){
			var dropdt=new Date(document.getElementById("checkout"));
            var n=dropdt.getSeconds();
			var pickdt=new Date(document.getElementById("checkin"));
            // document.getElementById("checkin").addEventListener("change", function() {
            //  let input1 = this.value;
            //  let pickdt = new Date(input1);});
            //  document.getElementById("checkout").addEventListener("change", function() {
            //  let input2 = this.value;
            //  let dropdt = new Date(input2);});
            document.getElementById('cost').innerHTML=n;
			return parseInt((dropdt.getTime()-pickdt.getTime())/(24*3600*1000));
            
		}
			function cal(){
				if(document.getElementById("checkout")){
					document.getElementById("numdays2").value=GetDays();
				}
			}	
			function price(){
				document.getElementById("price").value=2000*GetDays();
                // document.getElementById('cost').innerHTML=document.getElementById("price").value;

                }
			</script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Parisienne|Tangerine:700&effect=neon" rel="stylesheet">

    <link rel="shortcut icon" href="logo.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="/assets/css/custom.css">-->
    <title>Book a room</title>
</head>
<style>
  
    h3{
        color: white;
    }
    body{                                                               /*body*/
                background-image: url("bg1.jpg");
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
            width: 14%;
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
#one{
  font-size: 25px;
  color: white;
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
        <!-- <div class="navbar">
                <a href="main.php">Home</a>
                <a href="bookroom.php">Book A Room</a>
                <a href="facilities.php">Facilities</a>
                <a href="#">Nearby</a>
                <div class="dropdown">
                  <button class="dropbtn">My Account
                      </button>
					  <div class="dropdown-content">
					             
                        <a href="login.php">Login</a>
                        <a href="register.php">Sign Up</a>
						
						<a href="logout.php">Logout</a>
                      </div>
                </div>
        </div>  -->

    <div class="container">
     <center> <h1 >
            BOOK &nbsp;&nbsp;  A &nbsp;&nbsp; ROOM 
        </h1></center>
    <form class="add-customer-form" action="" method="POST">
        <div class="form-row">
                <div class="form-group col-md-6">
                <label for="last-name">Full Name</label>

                        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required>
                    </div>
            <div class="form-group col-md-6">
                    <label for="last-name">Room type</label>
                    <select class="form-control" name = "room_no">
                        <option value="1">Luxury(Rs.2000/night)</option>
                        <option value="2">Deluxe(Rs.3500/night)</option>
                        <option value="3">Supreme(Rs.6000/night)</option>  
                        <option value="4">Suite(Rs.8000/night)</option>
                    </select>
            </div>
        </div>
     
        <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="last-name">Check In</label>

                <input type="date" class="form-control" name="checkin" id="checkin" placeholder="Check in Date" required>
            </div>
            <div class="form-group col-md-6">
                    <label for="last-name">Check out</label>

                <input type="date" class="form-control" name="checkout" id="checkout" placeholder="Check out Date" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="last-name">Phone No.</label>
                    <input type="text" name="number" class="form-control" pattern="[1-9]{1}[0-9]{9}" id="number" placeholder="10 digit Phone Number" required> 

                <!-- <input type="text" class="form-control" name="number" id="number" placeholder="Phone Number" required> -->
            </div>
        </div>
	  <!-- <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="last-name">Days of Stay:</label>

                <label for="days" name="numdays2" id="numdays2" />
            </div>
			<div class="form-group col-md-6">
                    <label for="last-name">Total Amount:</label>

                <label for="price" name="price" id="price" />
            </div>
        </div> -->
        <center>
		<br><div>
        <button type="submit" class="btn btn-primary" >Book</button>
        </div></center>
        <br><br>
    </form>
<br>
</div>
<br><br><br><br><br><br><br><br><br><br><br>
    <div class="content">
            <h2>
            Atina Group Of Hotels <br>
            </h2>
            Quintessentially a traditional Indian brand in its DNA, The Atina Group of Hotels is one of the Leading Hotel Groups in India,
            recognized throughout the nation for its unique flavor of hospitality and finesse. The Atina Group boasts of being one of the first 5 star hotels in India.
            Atina firmly believe in sustainable luxury, adopting eco-friendly ways and sustainable energy that can be adopted by the hospitality industry.  
            With 5-star business and leisure hotels in the city of Jaipur, Lucknow and Delhi, Atina offers its guests sustainable luxury, 
            efficient services and amenities and a touch of heritage with an assurance of high levels of quality. <br>
          </div>
</body>
</html>