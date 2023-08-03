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
  let card1 = document.getElementById("card1").innerHTML;
  let card2 = document.getElementById("card2").innerHTML;
  let card3 = document.getElementById("card3");
  card3 = card3 ? card3.innerHTML : 0;
  document.getElementById("yes").disabled = true;
  document.getElementById("no").disabled = true;

  let total = parseInt(card1) + parseInt(card2) + parseInt(card3);
  total = total > 9 ? total - 10 : total;

  // Create a new XMLHttpRequest object
  let xhr = new XMLHttpRequest();

  // Define the endpoint URL where the server-side script will handle the file recording
  let url = "record_total.php"; // Replace "record_total.php" with the actual server-side script URL

  // Create a FormData object and append the total value to it
  let formData = new FormData();
  formData.append("total", total);

  // Set up the AJAX request
  xhr.open("POST", url, true);

  // Define the event handler for the AJAX response
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Request was successful
      console.log("Total recorded successfully!");

      // Display the btnResult button
      document.querySelector("input[name='btnResult']").style.display = "block";
    }
  };

  // Send the AJAX request with the FormData
  xhr.send(formData);
}



function restart() {
  try {
    window.location.href = window.location.href;
  } catch (e) {
    console.log(e);
  }
}


