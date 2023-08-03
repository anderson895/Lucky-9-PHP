

<?php include("../connection.php"); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	
    <title>Lobby</title>
</head>
<body>

<?php 
session_start();


if(isset($_SESSION["user_id"])){
	
			include ("../connection.php");
		$user_id = $_SESSION["user_id"];
		
		$get_record = mysqli_query ($connections,"SELECT * FROM user where user_id='$user_id' ");
		$row = mysqli_fetch_assoc($get_record);
		 $db_first_name = $row["first_name"];
		
$roomcode=rand();

include ("nav.php");
$roomcode=$_GET["roomcode"];

					$view_query = mysqli_query($connections,"SELECT * from rooms where room_code='$roomcode' "); 
					// where account_type='0'

					while($row = mysqli_fetch_assoc($view_query)){ //<-- ginagamit tuwing kukuha ng database
						
						$db_room_id  = $row["room_id"];
						$db_room_code = $row["room_code"];
						$db_player_id = $row["player_id"];
						$db_game_status = $row["game_status"];

						

					}
						if($db_game_status  == 0){
								echo "<div  class='result-block'><img src='../assets/joker.png' height='30%' style='border-radius:50%;'>";
									echo "<center>";
									echo "<div class='container full-block'>
									<div class='proj-title' style='color: #502749;'>
									  <center>
										<div class='proj-title' style='background-color: white; border-radius: 20px; width: 80%;'>
										  <div class='result'><h1>Waiting for <font color='red'> Player 2</font> </h1>";
									echo "<h2>The Room code is <font color='green'>",$roomcode,"</font></h2></div></div></div></center>";
								//	echo "status ",$db_game_status,"<br>";
								//	echo "roomcode",$roomcode;
					
						}else if($db_game_status  == 1){		
									
									echo "<script>window.location.href='game/index.php?roomcode=$db_room_code';</script>";
						}else{
									echo "ELSE ";
								}
								
					
}


?>
   <?php 
if(isset($_POST["btnMenu"])){
							
  header("Location: ../User/index.php");
}
?>
<form method="POST"><br>
<input name="btnMenu" class="btn-design" type="submit" value="Back to Main Menu" />
  </form>
  
</div>
  

</body>

<style>
.container {
text-align: center;
}

.cards {
min-width: 150px;
min-height: 230px;
margin: 20px 0;
border-radius: 7px;
}

.result,
.title-opp-cards {
font-size: 20px;
color: #502749;
font-family: "Aclonica", sans-serif;
}

.result-block {
position: fixed;
width: 100%;
height: 100%;
top: 0;
left: 0;
background-color: transparent;
z-index: 999;
display: flex;
align-items: center;
justify-content: center;
background: #502749;
flex-direction: column;
}

.proj-title {
font-family: "Aclonica", sans-serif;
color: #502749;
font-size: 30px;
font-weight: bolder;
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
top: 0;
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
</style>

<!-- ...Your HTML code... -->

<script>
    // Add this JavaScript code inside the <script> tag in your HTML file

    // Set the reload interval
    var reloadInterval = 2000; // 5 seconds (in milliseconds)

    // Function to reload the page
    function reloadPage() {
        location.reload(); // Reload the current page
    }

    // Call the reloadPage function after the specified interval
    setTimeout(reloadPage, reloadInterval);
</script>

</div>

</html>