function library_change() {
  fetch("subpages/library.php")
    .then(response => response.text())
    .then(data => {
      let mainContent = document.getElementById("main-content");
      mainContent.classList.add("card-transition"); // Add the transition class
      mainContent.innerHTML = data;
    });
}

function category_change() {
  fetch("subpages/category.php")
    .then(response => response.text())
    .then(data => {
      let mainContent = document.getElementById("main-content");
      mainContent.classList.add("card-transition"); // Add the transition class
      mainContent.innerHTML = data;
    });
}

function home() {
fetch("subpages/main.php")
  .then(response => response.text())
  .then(data => {
    let mainContent = document.getElementById("main-content");
    mainContent.classList.add("card-transition"); // Add the transition class
    mainContent.innerHTML = data;
  });
}
