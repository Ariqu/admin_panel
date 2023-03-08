function library_change() {
    fetch("subpages/library.php")
      .then(response => response.text())
      .then(data => {
        document.getElementById("main-content").innerHTML = data;
      });
    
}
function category_change() {
    fetch("subpages/category.php")
      .then(response => response.text())
      .then(data => {
        document.getElementById("main-content").innerHTML = data;
      });
    
}