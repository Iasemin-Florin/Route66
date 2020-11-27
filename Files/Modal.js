var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var closeBtn = document.getElementById("closeBtn");

btn.onclick = function() {
    modal.style.display = "block";
}
closeBtn.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function() {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}