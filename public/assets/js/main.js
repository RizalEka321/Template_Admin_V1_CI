var main = document.querySelector(".main");
var sidebar = document.querySelector(".sidebar");
var menutoggle = document.querySelector("#menu-toggle");

menutoggle.addEventListener("click", function (e) {
  main.classList.toggle("active");
  sidebar.classList.toggle("active");
});
