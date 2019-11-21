<?php
session_start();

require_once "config.php";

include_once('config.php');
$query="select * from reservations ";
$stmt=mysqli_prepare($conn, $query);
$result=$conn->query($query);
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
    header('location: login.php');
    exit;
} 
else{
if ($_SERVER['REQUEST_METHOD'] == "POST"){

$sql="UPDATE reservations SET paid=1 WHERE username= ? AND paid=0";
$stmt=mysqli_prepare($conn, $sql);
if($stmt)
{
	mysqli_stmt_bind_param($stmt,"s",$para_username);
	$para_username=$_SESSION["username"];
	if (mysqli_stmt_execute($stmt))
        {
          while($rows=$result->fetch_assoc())
          if($rows['username']==$_SESSION['username']){
            if($rows['paid']==1){
              echo '<script language="javascript">';
              echo 'alert("Room successfully booked with payment.")';
              echo '</script>';
            
            }
          }
          echo '<script language="javascript">';
              echo 'alert("Room successfully booked with payment.")';
              echo '</script>';
			header("location: main.php");
        }
        else{
           
          echo '<script language="javascript">';
          echo 'alert("Oops! Something went wrong. Please try again later.")';
          echo '</script>';
        }
}
mysqli_close($conn);
   }
}



?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="logo.ico" />

        <link href="https://fonts.googleapis.com/css?family=Parisienne|Tangerine:700&effect=neon" rel="stylesheet">
        <style>
            body{                                                               /*body*/
                background-image: url("bg5.jpg");
                background-attachment: fixed;
                background-size: cover;
                font-family: 'Parisienne', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .content{                                                              
              background: linear-gradient(to right, rgba(238, 187, 69, 0.514), rgba(153, 108, 3, 0.514));
              text-align: center;
              color: rgb(22, 22, 22);
              font-size: 34px;
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
<style>
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



body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}
.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 30%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}
.btn:hover {
  background-color: #45a049;
}

a{
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}



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
                
</style>
</head>
<body>
  

        <center> <h1 >
                Payment for Room No.
                <?php
                 while($rows=$result->fetch_assoc()){
                 if($_SESSION['username']==$rows['username'])
                {
                  echo $rows['room_no1'];
                } 
                }
                ?>
            </h1></center>    

    <div class="container">
      <form action="" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i>User Name</label>
            <input type="text" id="fname" name="username" value=<?php echo $_SESSION['username'];?> readonly>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY" required>
              </div>
            <div class="col-50">
              
            </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" pattern = "[1-9]{1}[0-9]{15}"required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018"  min="2019" max="2022" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
              </div>
            </div>
          </div>
          
        </div>
        <center><input type="submit" value="Pay" onclick=" func()"class="btn"></center>
    </form>
   
  <!-- <div class="content">
        <h2>
        Atina Group Of Hotels <br>
        </h2>
        Quintessentially a traditional Indian brand in its DNA, The Atina Group of Hotels is one of the Leading Hotel Groups in India,
        recognized throughout the nation for its unique flavor of hospitality and finesse. The Atina Group boasts of being one of the first 5 star hotels in India.
        Atina firmly believe in sustainable luxury, adopting eco-friendly ways and sustainable energy that can be adopted by the hospitality industry.  
        With 5-star business and leisure hotels in the city of Jaipur, Lucknow and Delhi, Atina offers its guests sustainable luxury, 
        efficient services and amenities and a touch of heritage with an assurance of high levels of quality. <br>
      </div> -->
     
  </div>
</div>
<!-- <script>
  function func() {
  alert(
    "hello " +
   
    
  )
}
  </script> -->
</body>
</html>