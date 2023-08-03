
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Aclonica" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css">

    <title>Lucky 9</title>
</head>
<body>

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

<center>
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
        <input class="chance initial-btn" type="button" id="no" value="CALL" />
      </div>
      
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
  <?php 
if(isset($_POST["btnMenu"])){
							
  header("Location: ../User/index.php");
}
?>
<form method="POST"><br>
<input name="btnMenu" class="play initial-btn" type="submit" value="Back to Main Menu" />
  </form>
  
</div>
</center>
</body>
<script src="single.js"></script>
</html>