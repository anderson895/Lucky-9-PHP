<title>Lucky 9</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

<?php 
//joshua pogi
session_start();
include ("connection.php");

if(isset($_SESSION["user_id"])){
		$user_id = $_SESSION["user_id"];
		
		$get_record = mysqli_query ($connections,"SELECT * FROM user where user_id='$user_id' ");
		$row = mysqli_fetch_assoc($get_record);
		$account_type = $row ["account_type"];
		
		
		if($account_type ==1){
					//redirect admin
						echo "<script>window.location.href='Admin/';</script>";	
					
				}else{
					//redirect user
					echo "<script>window.location.href='User/'</script>";	
				}
}
include("connection.php");

$username = $pass="";
$usernameErr = $passErr="";

if(isset($_POST["btnLogin"])){
	
	
	//Login
if(empty($_POST["username"])){
	
	$usernameErr ="username is Required !";
}else{
	
	$username = $_POST["username"];
	
	
	//PAssword
}if(empty($_POST["pass"])){
	
	$passErr ="Password is Required !";
}else{
	
	$pass = $_POST["pass"];
}
	if($username AND $pass){
		
		$check_username = mysqli_query($connections,"SELECT * from user WHERE username='$username'");
		$check_username_row = mysqli_num_rows ($check_username);
		
		if($check_username_row  > 0){
			
			$row = mysqli_fetch_assoc($check_username);
			$user_id  = $row["user_id"];
			$db_password = $row["passwords"];
			$accountype= $row["account_type"];
			
			if($pass==$db_password){
				
			$_SESSION["user_id"]=$user_id; 
			
			
				if($accountype==1){
					//redirect admin
					echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
  
					<script>
					swal('Success!', 'User Login Successfully.', 'success');
					</script>";
						echo "<script>window.location.href='Admin/';</script>";	
					
				}else{
					echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
  
					<script>
					  swal('Success!', 'User Login Successfully.', 'success');
					</script>";
					//redirect user
					echo "<script>window.location.href='User/'</script>";	
				}
				
			}else{
				echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
  
					<script>
					  swal('Error!', 'Password incorrect.', 'error');
					</script>";
				$passErr="Password incorrect !";
				
			}
		}else{
			echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
  
					<script>
					  swal('Error!', 'Username is Not Registered !.', 'error');
					</script>";


			$usernameErr = "username is Not Registered !";
		}
		
		
		
	}

}
?>

<br>
<br>
<br>
<br>
<br>
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
</head>
<body>
  <div class="result-block">
    <img src="assets/joker.png" height="30%" style="border-radius: 50%; position: absolute; top: 0; left: 50%; transform: translateX(-50%);">
    <br><br><br><br><br><br>
    <div class="container">
      <div class="proj-title" style="color: #502749;">
        <center>
          <div class="result">Welcome to<br> Lucky 9 Game</div>
          <br>
          <div id="card-container" class="card-container">
            <form method="POST">
              <table border="0" width="100%">
                <tr>
                  <td>
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
                  </td>
                </tr>
                <tr>
                  <td><span class="Error"><?php echo $usernameErr; ?></span></td>
                </tr>
                <tr>
                  <td><hr></td>
                </tr>
                <tr>
                  <td>
                    <label>Password</label>
                    <input type="password" name="pass" value="" placeholder="Password" style="width:100%;">
                  </td>
                </tr>
                <tr>
                  <td><span class="error"><?php echo $passErr; ?></span></td>
                </tr>
                <tr>
                  <td><hr></td>
                </tr>
                <tr>
                  <td>
                    <center><input class="btn-design" type="submit" name="btnLogin" value="Login"></center>
                  </td>
                </tr>
                <tr>
                  <td><hr></td>
                </tr>
                <tr>
									<td>
					<center><a class="register-link" href="register.php">Register</a></center>
					</td>

                </tr>
              </table>
            </form>
          </div>
        </center>
      </div>
    </div>
  </div>
</body>
</html>