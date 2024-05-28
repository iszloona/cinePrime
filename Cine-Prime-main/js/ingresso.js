const container = document.querySelector(".container");
const seats = document.querySelectorAll("row");
const movieSelect = document.getElementById("movie");

populateUI();

function closeForm() {
  document.getElementById('form_up').style.display = 'none';
}

function setMovieData(movieIndex) {
  localStorage.setItem("selectedMovieIndex", movieIndex);
}


function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach((seat, index) => {
      seat.addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('seat_input').value = this.value;
        document.getElementById('form_up').style.display = 'block';
    });
    }
  );
  }

  const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");

  if (selectedMovieIndex !== null) {
    movieSelect.selectedIndex = selectedMovieIndex;
    console.log(selectedMovieIndex)
  }
}
console.log(populateUI())

movieSelect.addEventListener("change", (e) => {
  ticketPrice = +e.target.value;
  setMovieData(e.target.selectedIndex, e.target.value);
  updateSelectedCount();
});


container.addEventListener("click", (e) => {
  if (
    e.target.classList.contains("seat") &&
    !e.target.classList.contains("sold")
  ) {
    e.target.classList.toggle("selected");

    updateSelectedCount();
  }
});


function cadeiraSorteada() {
     
  if (winnerSeat !== null) {
      document.getElementById('ganhador').innerHTML = "O vencedor é o assento " + (cadeiraSorteada + 1) + " reservado por " + ganhador;
  } else {
      document.getElementById('ganhador').innerHTML = "Nenhum assento reservado para sortear.";
  }
}

// Initial count and total set
updateSelectedCount();