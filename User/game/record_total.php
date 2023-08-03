<?php 
session_start();


if(isset($_SESSION["user_id"])){
	
			include ("../../connection.php");
		$user_id = $_SESSION["user_id"];
		
		$get_record = mysqli_query ($connections,"SELECT * FROM user where user_id='$user_id' ");
		$row = mysqli_fetch_assoc($get_record);
		echo $db_first_name = $row["first_name"];


                
//$userid = $_GET['userid'];  


//userid=8&roomcode=30134
$roomcode = $_GET['roomcode'];

$total = $_POST['total'];



mysqli_query($connections,"UPDATE rooms SET score='$total' WHERE player_id='$user_id' ");
	





}
     ?>
