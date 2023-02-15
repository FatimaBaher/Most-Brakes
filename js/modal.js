// Get the modal
const modal = document.getElementById("modal-container");

// Get the <span> element that closes the modal
var closeButton = document.getElementById("close-button");

// When the user clicks on <span> (x), close the modal
closeButton.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}