<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Aclonica" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    
    <link rel="stylesheet" href="style.css">

<?php

$roomcode=$_GET["roomcode"];
include ("../../connection.php");
session_start();

if(isset($_SESSION["user_id"])){
    include ("../../connection.php");
    $user_id = $_SESSION["user_id"];

    $get_result = mysqli_query ($connections,"SELECT * FROM rooms where player_id='$user_id' ");
    $row = mysqli_fetch_assoc($get_result);
    $db_player_id = $row["player_id"];
?>
<center>
<table border="0" cellspacing="0">
    <tr>
        <th width="150">ROOM CODE</th>
        <th width="200">FULL NAME</th>
        <th width="70">SCORE</th>
        <th width="200">RESULT</th>
    </tr>
    <?php
    $roomcode = $_GET["roomcode"];
    $view_query = mysqli_query($connections, "SELECT * FROM rooms WHERE room_code='$roomcode'");

    while ($row = mysqli_fetch_assoc($view_query)) {
        $room_id = $row["room_id"];
        $db_room_code = $row["room_code"];
        $db_player_id = $row["player_id"];
        $db_score = $row["score"];
        
        $db_game_status = $row["game_status"];

        // Determine the winner or draw
        $result = "<h3 style='color:red;'>loser</h3>";
        $max_score_query = mysqli_query($connections, "SELECT MAX(score) AS max_score FROM rooms WHERE room_code='$db_room_code'");
        $max_score_row = mysqli_fetch_assoc($max_score_query);
        $max_score = $max_score_row['max_score'];

        $equal_scores_query = mysqli_query($connections, "SELECT COUNT(*) AS equal_scores FROM rooms WHERE room_code='$db_room_code' AND score='$db_score'");
        $equal_scores_row = mysqli_fetch_assoc($equal_scores_query);
        $equal_scores = $equal_scores_row['equal_scores'];

        if ($db_score == $max_score) {
            if ($max_score > 0 && $equal_scores == 1) {
                $result = "<h3 style='color:green;'>winner</h3>";
            } else {
                $result = "<h3 style='color:blue;'>draw</h3>";
            }
        }

      

        ?>
        <br><br>
        <tr>
            <td><center><?php echo $db_room_code ?></center></td>
            <td><center><?php
                $get_result = mysqli_query($connections, "SELECT * FROM user where user_id ='$db_player_id' ");
                $row = mysqli_fetch_assoc($get_result);
                $db_player_id = $row["user_id"];
                $db_first_name = $row["first_name"];
                $db_middle_name = $row["middle_name"];
                $db_gender = $row["age"];
                $db_last_name = $row["last_name"];
                $full_name = ucfirst($db_first_name)." ".ucfirst($db_middle_name) .". ".ucfirst($db_last_name);
                echo $full_name;
                ?></td>
            <td>
                <center>
                    <?php
                    if (empty($db_score)) {
                        echo "Playing";
                    } else {
                        echo $db_score;
                    }
                    ?>
                </center>
            </td>
            <td>
                <center>
                    <?php
                    if (empty($db_score)) {
                        echo "Waiting";
                        $result = "Waiting";
                    } else {
                        echo $result;
                        $result = "<h3 style='color:red;'>loser</h3>";
                    }
                    ?>
                </center>
            </td>
        </tr>
        <?php
    }
    ?>
</table>


    <?php 
    
 
    
    if (isset($_POST["btnMainMenu"])){

        header("Location: ../index.php");

    }
    ?>
    <form method="post">
<input class="chance initial-btn" type="submit" name="btnMainMenu" value="Main Menu">
</form>
</center>
<?php
} 
?>