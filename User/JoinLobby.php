<?php
include("../connection.php");

session_start();

$roomcode = "";
$joinRoomCode = "";
$joinRoomCodeErr = "";

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    $get_record = mysqli_query($connections, "SELECT * FROM user WHERE user_id='$user_id'");
    $row = mysqli_fetch_assoc($get_record);
    $db_first_name = $row["first_name"];

    if (isset($_POST["btnJoinRoom"])) {
        $joinRoomCode = $_POST["joinRoomCode"];

        $check_joinRoomCode = mysqli_query($connections, "SELECT * FROM rooms WHERE room_code='$joinRoomCode'");
        $check_joinRoomCode_row = mysqli_num_rows($check_joinRoomCode);

        if ($check_joinRoomCode_row > 0) {
            $row = mysqli_fetch_assoc($check_joinRoomCode);
            $game_status = $row["game_status"];
        
            if ($game_status == 1) {
                // Room is full
                $joinRoomCodeErr = "The room is full.";
            } else {
                // Room is available
                mysqli_query($connections,"INSERT INTO rooms(player_id,room_code,game_status) VALUES('$user_id','$joinRoomCode','1')");
                mysqli_query($connections, "UPDATE rooms SET game_status='1' WHERE room_code='$joinRoomCode'");
                header("Location: game/index.php?roomcode=$joinRoomCode");
            }
        } else {
            $joinRoomCodeErr = "Room Not Found!";
        }
        
    }

    include("nav.php");

    echo "<div  class='result-block'><div  class='result-block'><img src='../assets/joker.png' height='30%' style='border-radius:50%;'><div class='container full-block'>
    <div class='proj-title' style='color: #502749;'>
    <div id='card-container' class='card-container'>
        <div class='proj-title' style='background-color: white; border-radius: 20px; width: 100%;'>
          <div class='result'><center>";
    echo "<h1>Join Lobby";
    echo "<h2>Enter The Room Code ";
} else {
    echo "<script>window.location.href='../';</script>";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lobby</title>
</head>

<body>


    <form method="POST"><br>
        <input type="text" name="joinRoomCode" placeholder="Enter Room Code">
        
        <button class="btn-design" type="submit" name="btnJoinRoom">Join</button>
        <br><?php echo $joinRoomCodeErr; ?>
    </form>

</div>

</div>
<center>
<?php 
if(isset($_POST["btnMenu"])){
							
  header("Location: ../User/index.php");
}
?>
<form method="POST"><br>
<input name="btnMenu" class="btn-design" type="submit" value="Back to Main Menu" />
  </form>
  </center>
</div>
</div>

</body>

</html>


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
