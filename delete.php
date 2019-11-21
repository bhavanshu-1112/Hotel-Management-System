<?php
require_once "config.php";

if(!empty($_GET["room_no1"])){
	$sql="DELETE FROM reservations WHERE room_no1=?;";
	$stmt=mysqli_prepare($conn,$sql);
    if($stmt){
		mysqli_stmt_bind_param($stmt,"i",$param_room);
		$param_room=$_GET['room_no1'];
		if(mysqli_stmt_execute($stmt)){
			header("location: customer_table.php");
		}
		else{
				echo "something went wrong....";
		}
	}
}
mysqli_close($conn);
?>