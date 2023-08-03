document.getElementById("play").addEventListener("click", getCards);
document.addEventListener("DOMContentLoaded", function(event) {
  setTimeout(function() {
    document.getElementById("load-container").classList.add("hidden");
    setTimeout(function() {
      document.getElementById("load-container").style.display = "none";
    },1800);
  }, 500);
});

function generateRandomNumber() {
  const min = 1,
    max = 9;
  return Math.floor(Math.random() * (max - min) + min);
}

function getCards() {
  for (var i = 1; i < 3; i++) {
    let number = generateRandomNumber();
    document.getElementById("card" + i).innerHTML = number;
  }

  document.getElementById("flip-card-inner1").style.transform =
    "rotateY(180deg)";
  document.getElementById("flip-card-inner2").style.transform =
    "rotateY(180deg)";

  document.getElementById("chance-container").style.display = "block";
  document.getElementById("yes").addEventListener("click", additionalCard);
  document.getElementById("no").addEventListener("click", displayCombination);
}

function additionalCard() {
  let el =
    '<div class="cards">' +
    '<div id="flip-card-inner3" class="flip-card-inner">' +
    '<div class="flip-card-front">' +
    '<div style="line-height:200px;font-size: 140px;">' +
    "</div>" +
    "</div>" +
    '<div class="flip-card-back">' +
    '<div id="card3">8</div>' +
    "</div>" +
    "</div>" +
    "</div>";

  document.getElementById("card-container").innerHTML += el;

  let third = generateRandomNumber();
  document.getElementById("card3").innerHTML = third;

  var thirdCard = document.getElementById("flip-card-inner3");
  thirdCard.classList.add("animated");
  thirdCard.classList.add("slideInRight");

  setTimeout(function() {
    console.log("rotated");
    thirdCard.classList.remove("animated");
    thirdCard.classList.remove("slideInRight");
    setTimeout(function() {
      thirdCard.style.transform = "rotateY(180deg)";
      setTimeout(function() {
        displayCombination();
      }, 1000);
    }, 500);
  }, 1000);
}

function displayCombination() {
  // document.getElementById("output").className = "";
  let card1 = document.getElementById("card1").innerHTML;
  let card2 = document.getElementById("card2").innerHTML;
  let card3 = document.getElementById("card3");
  card3 = card3 ? card3.innerHTML : 0;

  let total = parseInt(card1) + parseInt(card2) + parseInt(card3);
  total = total > 9 ? total - 10 : total;
  document.getElementById("total").innerHTML = total;
  opponent();
}

function opponent() {
  let opp_card1 = generateRandomNumber();
  let opp_card2 = generateRandomNumber();
  let opp_total;

  let gen_card1 =
    '<div class="opp-cards-front"><div>' + opp_card1 + "</div></div>";
  let gen_card2 =
    '<div class="opp-cards-front"><div>' + opp_card2 + "</div></div>";
  let gen_card3 = "";

  let initial_total = opp_card1 + opp_card2;
  if (initial_total > 9 || initial_total <= 6) {
    initial_total = initial_total > 9 ? initial_total - 10 : initial_total;
    let opp_card3 = generateRandomNumber();
    gen_card3 =
      '<div class="opp-cards-front"><div>' + opp_card3 + "</div></div>";
    opp_total = initial_total + opp_card3;
    opp_total = opp_total > 9 ? opp_total - 10 : opp_total;
  } else {
    opp_total = initial_total;
  }

  document.getElementById("opponent-cards").innerHTML +=
    gen_card1 + gen_card2 + gen_card3;
  setTimeout(function() {
    document.getElementById("result-block").style.display = "flex";
    let user_total = document.getElementById("total").innerHTML;
    if (parseInt(user_total) > opp_total) {
      document.getElementById("result").innerHTML = "YOU WON!";
    } else if (parseInt(user_total) == opp_total) {
      document.getElementById("result").innerHTML = "It's a DRAW!";
    } else {
      document.getElementById("result").innerHTML = "YOU LOSE!";
    }

    document.getElementById("restart").addEventListener("click", restart);
  }, 1500);
}

function restart() {
  try {
    window.location.href = window.location.href;
  } catch (e) {
    console.log(e);
  }
}