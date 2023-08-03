<?php 
include("../connection.php");

$user_id = $_GET["user_id"];

$get_record = mysqli_query($connections,"SELECT * FROM user WHERE user_id='$user_id'");

$get_record_num = mysqli_num_rows($get_record);


if($get_record_num > 0 ){
	while($rows = mysqli_fetch_assoc($get_record)){
	
	 $db_first_name = $rows["first_name"];
	 $db_middle_name = $rows["middle_name"];
	 $db_last_name = $rows["last_name"];
	 $db_gender = $rows["gender"];
	 $db_email = $rows["email"];
	 
	}
	 
	
	$new_first_name = $new_middle_name = $new_last_name =$new_gender=$new_email="";
	$new_first_nameErr = $new_middle_nameErr = $new_last_nameErr =$new_genderErr=$new_emailErr="";
		
	
	if(isset($_POST["btnEdit"])){
		
		
		if(empty($_POST["new_first_name"])){
			
			$new_first_nameErr=" This Field must not be Empty!";
		}else{
			$new_first_name = $_POST["new_first_name"];
			 $db_first_name = $new_first_name;
			
		}
		
		
		
		
		
		if(empty($_POST["new_last_name"])){
			
			$new_last_nameErr=" This Field must not be Empty!";
		}else{
			$new_last_name = $_POST["new_last_name"];
			 $db_last_name = $new_last_name;
			
		}
		
		
		
		
		
			if(empty($_POST["new_email"])){
			
			$new_emailErr=" This Field must not be Empty!";
		}else{
			$new_email = $_POST["new_email"];
			 $db_email = $new_email;
			
		}
		
		
		
		
		
		
		
		
		$new_first_name = $_POST["new_first_name"];
		$new_middle_name= $_POST["new_middle_name"];
		$new_last_name= $_POST["new_last_name"];
		$new_gender= $_POST["new_gender"];
		$new_email= $_POST["new_email"];
		
		
		if($new_first_name AND $new_last_name AND $new_gender AND $new_email ){
mysqli_query($connections,"UPDATE user SET first_name='$new_first_name',middle_name='$new_middle_name',last_name='$new_last_name',gender='$new_gender',email='$new_email' WHERE user_id='$user_id'");
		
		
		header("Location: index.php");
		}
	}
	
	
	
?>


<style>

	.error{
				color:Red;
				}

</style>

<form method="POST">

	<b> Enter New First Name</b> <input type="text" name="new_first_name"  placeholder="First Name" value="<?php echo$db_first_name;?>">        <span class="error"><?php echo $new_first_nameErr; ?> </span><br><br>
	<b> Enter New Middle Name</b> <input type="text" name="new_middle_name" placeholder="Middle Name"value="<?php echo$db_middle_name;?>"><br><br>
	<b> Enter New LastName</b> <input type="text" name="new_last_name"   placeholder="Last Name"  value="<?php echo$db_last_name;?>"><span class="error"><?php echo $new_last_nameErr; ?> </span><br><br>
	
	<b> Enter New Gender</b> <select name="new_gender">
	
		<option name="new_gender" <?php if($db_gender=="Male"){ echo "selected";} ?>  value="Male">Male</option>
		<option name="new_gender" <?php if($db_gender=="Female"){ echo "selected";} ?>  value="Female">Female</option>
		
	
	
	</select><span class="error"> </span>
	<br><br>
	<b> Enter New Email</b> <input type="text" name="new_email" placeholder="Email" value="<?php echo$db_email; ?>"><span class="error"><?php echo $new_emailErr; ?> </span><br><br>
	     <input type="submit" name="btnEdit" value="Change">


</form>

 <a href="index.php">BACK</a>
</form>



<?php	
	
	
	
	
}else{
	
	
	echo "<h1>No Record Found!</h1>";
	
}

?>