function toggleNav() {
    var sidenav = document.getElementById("mySidenav");
    if (sidenav.style.width === "0px" || sidenav.style.width === "") {
      sidenav.style.width = "650px";
    } else {
      sidenav.style.width = "0";
    }
}