<?php include("connection.php");?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$first_name = $middle_name = $last_name = $age = $username =$passwords ="";
$first_nameErr = $middle_nameErr = $last_nameErr = $ageErr =$usernameErr =$passwordsErr="";


	if(isset($_POST["btnRegister"])){
	
		if(empty($_POST["first_name"])){
		$first_nameErr = "First Name is Required !";
	
	}else{
		$first_name= $_POST["first_name"];
	}
	//

		$middle_name= $_POST["middle_name"];
	
	//
	if(empty($_POST["last_name"])){
		$last_nameErr = "Last Name is Required !";
	
	}else{
		$last_name= $_POST["last_name"];
	}
	//
	if(empty($_POST["age"])){
		$ageErr = "Age is Required !";
	
	}else{
		$age= $_POST["age"];
	}


    if(empty($_POST["username"])){
		$usernameErr = "username is Required !";
	
	}else{
		$username= $_POST["username"];
	}
	//
    
    if(empty($_POST["passwords"])){
		$passwordsErr = "password is Required !";
	
	}else{
		$passwords= $_POST["passwords"];
	}
	//
	
	//
	if($first_name && $last_name && $age && $username &&$passwords){
		
		//echo"$first_name <br>  $middle_name <br> $last_name <br> $gender <br> $email";
		//
		
		//validation for first_name
		$check_first_name = strlen($first_name);
		
			if($check_first_name < 2){
				$first_nameErr = "Your first name is too short !";
			}else{
		$check_last_name = strlen($last_name);
		
			if($check_last_name < 2 ){
			$last_nameErr = "Your Last name is too short !";		
			
			}else{
				//validation for email
				if($age<18){
						$ageErr="Your Age Not Qualified to Play this Game";
				}else{
					
					mysqli_query($connections,"INSERT INTO user(first_name,middle_name,last_name,age,username,passwords) 
					VALUES('$first_name','$middle_name','$last_name','$age','$username','$passwords')");
					
					header("Location: index.php");
				}
				
				}
			}
		
		
	}
	
}


?>


<style>

	.error{
				color:Red;
				}

</style>
<style>
    body {
      background-color: #502749;
    }

    .result,
    .title-opp-cards {
      font-size: 50px;
      color: #502749;
      font-family: "Aclonica", sans-serif;
    }

    .container {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: white;
      border-radius: 20px;
    }

	input[type="number"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      margin-bottom: 10px;
    }

    input[type="number"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: #502749;
      box-shadow: 0 0 5px #502749;
    }


    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      margin-bottom: 10px;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: #502749;
      box-shadow: 0 0 5px #502749;
    }

    .btn-design {
      position: relative;
      display: inline-block;
      background-color: #502749;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      overflow: hidden;
    }

    .btn-design span {
      transition: transform 0.3s;
      z-index: 1;
    }

    .btn-design:hover span {
      transform: translateX(100%);
    }

    .btn-design .hover-image {
      position: absolute;
      top: 10;
      right: -100%;
      height: 40px;
      width: 50px;
      opacity: 0;
      transition: opacity 0.3s;
    }

    .btn-design:hover .hover-image {
      left: 0px;
      opacity: 1;
    }

    @media only screen and (max-width: 600px) {
      .container {
        border-radius: 0;
        padding: 10px;
      }
    }

	.register-link {
  display: inline-block;
  background-color: #502749;
  color: white;
  text-decoration: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  transition: background-color 0.3s;
}

.register-link:hover {
  background-color: #6d3f6d;
}

  </style>

 <!-- start part is for search-->
 </center>
 
	

 <!--end part is for search-->
 
 <div class="result-block">
    <br><br>
    <div class="container">
      <div class="proj-title" style="color: #502749;">
    
          <div class="result">Registration</div>
          <br>
          <div id="card-container" class="card-container">

	 <?php
	
	if(isset($_POST["btnLogin"]))
	{
		header("location: index.php");

	}
	?>
<form method="POST" value="">
	<label style="color:black;">First name</label><input type="text" name="first_name"  placeholder="First Name" value="<?php echo$first_name;?>">  <span class="error">  <?php echo $first_nameErr;?></span><br><br>
	<label style="color:black;">Middle name</label><input type="text" name="middle_name" placeholder="Middle Name"value="<?php echo$middle_name;?>">  <span class="error">  <?php echo $middle_nameErr;?></span><br><br>
	<label style="color:black;">Last name</label><input type="text" name="last_name"   placeholder="Last Name"  value="<?php echo$last_name;?>"> <span class="error">  <?php echo $last_nameErr;?></span><br><br>
	<label style="color:black;">Age</label><input type="number" name="age" min="1" placeholder="Age" value="<?php echo$age; ?>"><span class="error"> <?php echo $ageErr;?></span><br><br>
	<label style="color:black;">Username</label><input type="text" name="username"  placeholder="username" value="<?php echo$username;?>">  <span class="error">  <?php echo $usernameErr;?></span><br><br>
	<label style="color:black;">Password</label> <input type="password" name="passwords"  placeholder="password" value="<?php echo $passwords; ?>"><span class="error"> <?php echo $passwordsErr;?></span><br><br>
	
    <input type="submit" name="btnRegister" class="btn-design" value="Register">

	<input type="submit" name="btnLogin" class="btn-design" value="Back to Login">


</form>
</div>
</div>
</div>
</div>




</body>
</html>