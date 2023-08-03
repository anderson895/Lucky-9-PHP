<?php
// Include the connection file and other necessary code
include("../connection.php");

// Retrieve the game status from the database based on the room code
$roomcode = $_GET["roomcode"];
$get_game_status_query = mysqli_query($connections, "SELECT game_status FROM rooms WHERE room_code = '$roomcode'");
$row = mysqli_fetch_assoc($get_game_status_query);
$game_status = $row["game_status"];

// Return the game status as the response
echo $game_status;
?>
