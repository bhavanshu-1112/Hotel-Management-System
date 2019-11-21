








<?php

session_start();

require_once "config.php";

$query="select * from reservations ";
$stmt=mysqli_prepare($conn, $query);
$result=$conn->query($query);
// if($_SESSION['username']==)
// if ($_SERVER['REQUEST_METHOD'] == "POST"){
        while($rows=$result->fetch_assoc()){
        if(($rows['username']==$_SESSION['username'])){
            $flag=$rows['paid'];
        }}
            
        $usr=$_SESSION["username"];
            
        // $sql="UPDATE reservations SET paid= -1 where username=$usr";
        
        
        $sql="UPDATE reservations SET paid= -1 where username='". $usr ."'";

        $stmt=mysqli_prepare($conn, $sql);

        if($conn->query($sql)==true)
        {
            
            // mysqli_stmt_bind_param($stmt,"sis",$para_name,$para_room,$para_number);
            // $para_number=$_POST['number'];
            // $para_room=$_POST['room_no'];
            // $para_name=$_POST['name'];
            // $para_paid = $_POST['paid'];
            if (mysqli_stmt_execute($stmt))
                {
                    echo '<script type="text/javascript">';
                    echo 'alert("Successfully cancelled booking");';
                    echo '</script>';
                    if($flag==1){
                        echo '<script type="text/javascript">';
                        echo 'alert("Your amont will be refunded in 5-7 working days");';
                        echo 'window.location.href="booking.php";';
                        echo '</script>';

                    }
                    // header("location: billing.php");
                
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Something went wrong!")';
                    echo '</script>';
                }
        }
        else{
            echo 'xcldjfhf ';
        }
        mysqli_close($conn);
        // header('location:booking.php');

        

    




?>




