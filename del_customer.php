<?php

session_start();

require_once "config.php";

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
if($stmt)
{
	mysqli_stmt_bind_param($stmt,"sis",$para_name,$para_room,$para_number);
	$para_number=$_POST['number'];
	$para_room=$_POST['room_no'];
	$para_name=$_POST['name'];
	if (mysqli_stmt_execute($stmt))
        {
            echo "Room Booked!!  Proceed for Payment";
			header("location: billing.php");
        }
        else{
            echo "Something went wrong...";
        }
}
mysqli_close($conn);
}}
?>
