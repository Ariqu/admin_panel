function library_change() {
  let mainContent = document.getElementById("main-content");
  mainContent.classList.add("card-transition"); // Dodaj klasę z animacją
  fetch("subpages/library.php")
    .then(response => response.text())
    .then(data => {
      mainContent.innerHTML = data;
      mainContent.classList.remove("card-transition"); // Usuń klasę z animacją po zakończeniu animacji
    });
}

function category_change() {
  let mainContent = document.getElementById("main-content");
  mainContent.classList.add("card-transition"); // Dodaj klasę z animacją
  fetch("subpages/category.php")
    .then(response => response.text())
    .then(data => {
      mainContent.innerHTML = data;
      mainContent.classList.remove("card-transition"); // Usuń klasę z animacją po zakończeniu animacji
    });
}

function home() {
  let mainContent = document.getElementById("main-content");
  mainContent.classList.add("card-transition"); // Dodaj klasę z animacją
  fetch("subpages/main.php")
    .then(response => response.text())
    .then(data => {
      mainContent.innerHTML = data;
      mainContent.classList.remove("card-transition"); // Usuń klasę z animacją po zakończeniu animacji
    });
}
