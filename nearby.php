<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Parisienne|Tangerine:700&effect=neon" rel="stylesheet">
            
    <link rel="shortcut icon" href="logo.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="/assets/css/custom.css">-->
    <title>Nearby</title>
</head>
<style>
  
    h3{
        color: white;
    }
    body{                                                               /*body*/
                background-image: url("bg2.jpg");
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

            .facilities-container {
                background-color:rgb(185, 144, 45);
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                position: relative;
                width: 100%;
                }

                .image {
                opacity: 1;
                display: block;
                width: 100%;
                height: auto;
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
        <!-- <div class="navbar"> -->
                <!-- <a href="main.php">Home</a>
                <a href="hotelrooms.php">Hotel Rooms</a>
                <a href="bookroom.php">Book a Room</a>
                <a href="facilities.php">Facilities</a>
                <a href="nearby.php">Nearby</a> -->
                <!-- <div class="dropdown">
                  <button class="dropbtn">Our Locations
                  </button>
                  <div class="dropdown-content">            
                    <a href="delhi.html">Delhi</a>
                    <a href="lucknow.html">Lucknow</a>
                    <a href="jaipur.html">Jaipyr</a>
                  </div>
                </div> -->
        </div> <br><br>
        
<div class="facilities-container container">
        <iframe class ="image" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.9503709847872!2d77.22521631455955!3d28.631249490890962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd32312dee27%3A0xc40680170b85d192!2sThe%20LaLiT%20New%20Delhi!5e0!3m2!1sen!2sin!4v1573117533401!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                <div class="middle">
                  <div class="text">Delhi location</div>
                </div>
                
</div><br><br><br>

<div class="facilities-container container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.6042598468857!2d80.97091101451933!3d26.852536569143577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd3baa747573%3A0x4663cfb717e88824!2sRenaissance%20Lucknow%20Hotel!5e0!3m2!1sen!2sin!4v1573117958787!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="image"></iframe>
                <div class="middle">
                  <div class="text">Lucknow Location</div>
                </div>
    </div><br<><br><br><br>
    
<div class="facilities-container container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.919334076682!2d75.79193651451911!3d26.842517869571502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db5ef44023573%3A0x34b5d0746cb09ea5!2sRadisson%20Blu%20Jaipur!5e0!3m2!1sen!2sin!4v1573129767594!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" class="image" allowfullscreen=""></iframe>
    <div class="middle">
      <div class="text">Jaipur Location</div>
    </div>
</div>
<br><br>
    

</div>
</div>
</center>
<br><Br><br>

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