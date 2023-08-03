<?php
//joshua pogi
include("../connection.php");

$user_id = $_GET["user_id"];

$get_record = mysqli_query($connections,"SELECT * FROM user WHERE user_id='$user_id'");

$check_get_record = mysqli_num_rows($get_record);


if($check_get_record > 0){
	
	$row =mysqli_fetch_assoc($get_record);
	 $db_first_name = $row["first_name"];
	 $db_middle_name = $row["middle_name"];
	 $db_last_name = $row["last_name"];
	 $db_gender = $row["gender"];
	 $db_email = $row["email"];
	 
	 
	 $full_name = ucfirst($db_first_name)." ".ucfirst($db_middle_name) .". ".ucfirst($db_last_name);
	 
	 
	if(isset($_POST["btnDelete"])){
		mysqli_query($connections,"DELETE FROM user WHERE user_id='$user_id'");
		header("Location: index.php");
	}
	
}else{
	
	echo"Walang Record";
}


 ?>
 <form method="POST">
	
	<h1>You Are About to Delete ?<font color="red"><?php echo $full_name;?></font></h1>
	<br>
	<h3>Are you Sure ?</h3>
	<br>
	
	<input type="submit" name="btnDelete" value="DELETE">
	&nbsp;
	<a href="index.php">Cancel</a>


 </form>