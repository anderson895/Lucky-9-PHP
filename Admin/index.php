<?php 
//admins
session_start();

if(isset($_SESSION["user_id"])){
	
			include ("../connection.php");
		$user_id = $_SESSION["user_id"];
		
		$get_record = mysqli_query ($connections,"SELECT * FROM user where user_id='$user_id' ");
		$row = mysqli_fetch_assoc($get_record);
		 $db_first_name = $row["first_name"];
		
	
}else{
	
	echo "<script>window.location.href='../';</script>";
	
}

include ("nav.php");
include("../connection.php");

?>
<table border="1" width="50%">	

<tr>
		
	<td colspan="4"><hr></td>
	</tr>

<form method="POST">
		
	
	
	
	<tr>
	<td>
			<b>ID</b>
		</td>
		<td>
			<b>Name</b>
		</td>
		
		<td>
			<b>Gender</b>
		</td>
		
		<td>
			<b>Email</b>
		</td>
		<td>
			<center><b>Option</b></center>
		</td>
		
	</tr>
		
	<tr>
		
	<td colspan="4"><hr></td>
	</tr>
	<?php
	
	// start code for count for user
	$count_query_user = mysqli_query($connections,"select COUNT(*)as total FROM user where account_type='0' ");
	$row_count_user = mysqli_fetch_assoc($count_query_user);
	 $count_user = $row_count_user["total"];
	// end code for count for user
	
	// start code for count for admin
	$count_query_admin = mysqli_query($connections,"select COUNT(*)as total FROM user where account_type='1' ");
	$row_count_admin = mysqli_fetch_assoc($count_query_admin);
	 $count_admin = $row_count_admin["total"];
	// end code for count for admin
	
	
	
		$full_name="";
		$view_query = mysqli_query($connections,"SELECT * from user "); 
		// where account_type='0'
		
		while($row = mysqli_fetch_assoc($view_query)){ //<-- ginagamit tuwing kukuha ng database
			
			$user_id = $row["user_id"];
			$db_first_name = $row["first_name"];
			$db_middle_name = $row["middle_name"];
			$db_gender = $row["gender"];
			$db_email = $row["email"];
			
			$db_last_name = $row["last_name"];
			
			
			
			$full_name = ucfirst($db_first_name)." ".ucfirst($db_middle_name) .". ".ucfirst($db_last_name);
					
			
			echo "<tr> 
					<td>$user_id </td>
					<td>$full_name</td>
					<td>$db_gender</td>
					<td>$db_email</td>
					<td><center>
				<a href='edit.php?user_id=$user_id'>UPDATE</a> || 
				<a href='delete.php?user_id=$user_id'>DELETE</a>
					
					
					</center></td>
				  </tr>
				  
				  
				  
				  
				  
				  
";

		}
	
	?>


 </table>
<h1>USER : <?php echo $count = $row_count_user["total"]; ?></h1>
<h1>ADMIN : <?php echo $count = $row_count_admin["total"]; ?></h1>
 