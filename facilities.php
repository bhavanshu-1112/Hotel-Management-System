
<?php

session_start();
?>

<!DOCTYPE html>
<html>
    <head>
            <title>Facilities</title>
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
                width: 14%;
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
                                                *********************FAILITIES*************************
                                                ******************************************************/
                   
                .facilities-container {
                background-color:rgb(185, 144, 45);
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                position: relative;
                width: 50%;
                }

                .image {
                opacity: 1;
                display: block;
                width: 100%;
                height: auto;
				border: 8px;
				border-color:rgba(202, 175, 112, 0.356);
                transition: .5s ease;
                backface-visibility: hidden;
                }

                .middle {
                transition: .5s ease;
                opacity: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%)
                }

                .facilities-container:hover .image {
                opacity: 0.3;
                }

                .facilities-container:hover .middle {
                opacity: 1;
                }

                .text {
                color: white;
                font-size: 36px;
                padding: 16px 32px;
                }

                </style>

    </head>

    <body>
                   
        

            <!- /*************************************NAVBAR AND DROPDOWN*********************************************************************************/ ->
                <div class="navbar">
                    <a href="main.php">Home</a>
                    <a href="bookroom.php">Book A Room</a>
                    <a href="facilities.php">Facilities</a>
                    <a href="hotelrooms.php">Hotel Rooms</a>
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
            </div> 
            <br><br>

            <!- /*************************************FACILITIES*********************************************************************************/ ->
           
		   
			<center>
            <div class="facilities-container">
                    <img src="images/laundry.jpg" alt="Laundry" class="image" style="width:100%">
                    <div class="middle">
                      <div class="text">Laundry</div>
                    </div>
                  </div>
                <br>
				<br><br>
            <div class="facilities-container">
                <img src="images/room-service-equipment.jpg" alt="Room Service" class="image" style="width:100%">
                <div class="middle">
                    <div class="text">Room Service</div>
                </div>
                </div>
 <br>
				<br><br>
            <div class="facilities-container">
                    <img src="images/345327.jpg" alt="In House Bar" class="image" style="width:100%">
                    <div class="middle">
                        <div class="text">In House Bar</div>
                    </div>
                    </div> 
			</center>					
    </body>
</html>