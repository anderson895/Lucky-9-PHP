<title>Lucky 9</title>

<?php 
session_start();


if(isset($_SESSION["user_id"])){
	
			include ("../connection.php");
		$user_id = $_SESSION["user_id"];
		
		$get_record = mysqli_query ($connections,"SELECT * FROM user where user_id='$user_id' ");
		$row = mysqli_fetch_assoc($get_record);
		 $db_first_name = $row["first_name"];
												
											$roomcode="";

											if(isset($_POST["btnCreateLobby"])){
											//$testing="success";
												$roomcode=$_POST["roomcode"];
												mysqli_query($connections,"INSERT INTO rooms(player_id,room_code,game_status) 
												VALUES('$user_id','$roomcode','0')");
												header("Location: Createlobby.php?roomcode=$roomcode");
											}

											if(isset($_POST["btnJoinLobby"])){
												
													header("Location: JoinLobby.php");
												}


											if(isset($_POST["btnSinglePlayer"])){
												
													header("Location: ../singlePlayer/single.php");
												}

											if(isset($_POST["btnLogout"])){
												
													header("Location: logout.php");
												}

	
}else{
	
	echo "<script>window.location.href='../';</script>";
	
}

//include ("nav.php");
echo "<div  class='result-block'><img src='../assets/joker.png' height='30%' style='border-radius:50%;'>";





	
?><div class="container full-block">
<div class="proj-title" style="color: #502749;">
  <center>
    <div class='proj-title' style='background-color: white; border-radius: 20px; width: 80%;'>
      <div class='result'>Welcome <font color='red'><?php echo Ucfirst($db_first_name)?></font> to Lucky 9 Game</div>
      <br>
      <div id="card-container" class="card-container">
        <form method="POST">
          <input type="hidden" value="<?php echo rand(10000, 99999)?>" name="roomcode">
          <button type="submit" name="btnSinglePlayer" class="btn-design">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SINGLE PLAYER</span>
            <img src="../assets/hover.gif" alt="Image" class="hover-image">
          </button><br><br>
          <button type="submit" name="btnCreateLobby" class="btn-design">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CREATE LOBBY</span>
            <img src="../assets/hover.gif" alt="Image" class="hover-image">
          </button><br><br>
          <button type="submit" name="btnJoinLobby" class="btn-design">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JOIN LOBBY</span>
            <img src="../assets/hover.gif" alt="Image" class="hover-image">
          </button><br><br>
          <button type="submit" name="btnLogout" class="btn-design">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT</span>
            <img src="../assets/hover.gif" alt="Image" class="hover-image">
          </button><br><br>
        </form>
      </div>
    </div>
  </center>
</div>
</div>
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
