<!DOCTYPE html>
<html>
    <head>
        
        <title>  Atina Hotels</title>
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

                                            /******************************************************
                                            **************SLIDESHOW********************************
                                            ******************************************************/

            .mySlides {display: none}
            img {vertical-align: middle;}


            /* Slideshow container */
            .slideshow-container {
              background-color: rgba(250, 235, 215, 0.288);
            width: 1200px;
            height: 700px;
            position: relative;
            margin: auto;
            }

            /* Next & previous buttons */
            .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -28px;
            color: white;
            font-weight: bold;
            font-size: 28px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            }

            .next {                                             /* Position next to right */
            right: 0;
            border-radius: 3px 0 0 3px;
            }
            .prev{                                              /*position of prev*/
              left: 0;
            }
            .prev:hover, .next:hover {                          /*hover cell(transparent black)*/
            background-color: rgba(185,144,45,0.8);
            }

            .text {                                                         /* Caption text */
            color:  rgb(185, 144, 45);
            transition: 0.7s;
            font-size: 35px;
            padding: 8px 12px;
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            }
            .slideshow-container:hover .text{
              color: white;
            }    
            .pic{                                                                  /*pic*/
              border: 13px solid rgba(185, 144, 4,0.74);
              transition: 0.7s;
              border-radius: 10px;
             }  
             .slideshow-container:hover .pic{
              border: 13px solid rgba(255, 255, 255, 0.34);
             }

                                            /******************************************************
                                            *********FADING ANIMATION(taken from internet)********
                                            ******************************************************/

            /* Fading animation */
            .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
            }

            @-webkit-keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
            }

            @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
            }

                                            /******************************************************
                                            *********LOGIN BUTTON**********************************
                                            ******************************************************/
            
            .button {
            padding: 10px 15px;
            font-family: 'Parisienne', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 30px;
            text-align: center;
            cursor: pointer;
            outline: none;
            color: #fff;
            background: linear-gradient(to right, rgb(224, 174, 56), rgb(155, 110, 7));
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
             }

          .button:hover {
            background: linear-gradient(to right, rgb(187, 144, 45), rgb(124, 89, 5));
            }

          .button:active {
            background: linear-gradient(to right, rgb(158, 122, 38), rgb(95, 68, 4));
            box-shadow: 0 5px #666;
            transform: translateY(4px);
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


   <br><Br><br>
   

    
<div class="content">
    <h2>
    Delhi Location    <br>
    </h2>
    Atina Hotels , Police Station, Near, Barakhamba Rd,<br> Fire Brigade Lane, Connaught Place,<br> New Delhi, Delhi 110001•011 4444 7777
    <br><br>
    Contact for more details:
     <br>97643357086,<br>98765445678<br>
  </div>  
  
  </body>
  </html>