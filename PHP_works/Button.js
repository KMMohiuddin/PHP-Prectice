function functionOutput(){
    document.getElementById("demo").innerHTML = "Worked";
  }
  function formHideUnhide() {
    var x = document.getElementById("form");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function dbHideUnhide() {
    var x = document.getElementById("databaseTable");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
 