<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Aclonica" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>
<?php 
session_start();


if(isset($_SESSION["user_id"])){
	
			include ("../../connection.php");
		$user_id = $_SESSION["user_id"];
		
		$get_record = mysqli_query ($connections,"SELECT * FROM user where user_id='$user_id' ");
		$row = mysqli_fetch_assoc($get_record);
		echo $db_first_name = $row["first_name"];



   $roomcode = $_GET['roomcode'];

  //  $total = $_POST['total'];

if(isset($_POST["btnResult"])){

  header("Location: result.php?roomcode=$roomcode");

}
}
     ?>
<div id="load-container" class="load-container">
  <div class="sk-cube-grid">
    <div class="sk-cube sk-cube1"></div>
    <div class="sk-cube sk-cube2"></div>
    <div class="sk-cube sk-cube3"></div>
    <div class="sk-cube sk-cube4"></div>
    <div class="sk-cube sk-cube5"></div>
    <div class="sk-cube sk-cube6"></div>
    <div class="sk-cube sk-cube7"></div>
    <div class="sk-cube sk-cube8"></div>
    <div class="sk-cube sk-cube9"></div>
  </div>
</div>


<div class="container full-block">
  <div class="proj-title">Lucky 9 Game</div>
  <div id="card-container" class="card-container">
    <!--     <div class="cards">?</div>
    <div class="cards">?</div> -->
    <div class="cards">
      <div id="flip-card-inner1" class="flip-card-inner">
        <div class="flip-card-front">
          <div></div>
        </div>
        <div class="flip-card-back">
          <div id="card1">2</div>
        </div>
      </div>
    </div>

    <div class="cards">
      <div id="flip-card-inner2" class="flip-card-inner">
        <div class="flip-card-front">
          <div></div>
        </div>
        <div class="flip-card-back">
          <div id="card2">5</div>
        </div>
      </div>
    </div>

  </div>
  <div class="btn-container">
    <input id="play" class="play initial-btn" type="button" value="DRAW CARDS" />
    <div id="chance-container" class="chance-container">
      <div class="another-card">Wanna take another card?</div>
      <div class="chance-block">
        <input class="chance initial-btn" type="button" id="yes" value="Draw another" />
        <input class="chance initial-btn" type="button" id="no"  value="CALL" />
      
      </div><br>
       <form method="POST"> 
        
     <center>  <input class="chance initial-btn" type="submit" name="btnResult" value="result" hidden></center>

        </form>
    </div>
  </div>
</div>
<div id="total" style="display:none;"></div>

<div id="result-block" class="result-block">
  <div id="result" class="result">YOU WON!</div>
  <div class="title-opp-cards">Opponent's Cards</div>
  <div id="opponent-cards" class="cards">
    <!--     <div class="opp-cards-front">
      <div>3</div>
    </div>
    <div class="opp-cards-front">
      <div>3</div>
    </div>
    <div class="opp-cards-front">
      <div>3</div>
    </div> -->
  </div>
  <input type="button" id="restart" value="RESTART" />
</div>
</body>
<script src="script.js"></script>
</html>