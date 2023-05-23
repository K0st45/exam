function opalakia() {
    var element = document.getElementById("opa");
    if (element.style.visibility === "hidden") {
        element.style.visibility = "visible";
    } else {
        element.style.visibility = "hidden";
    }
}
function toggleElements() {
    var element1 = document.getElementById("element1");
    var element2 = document.getElementById("element2");

    if (element1.style.display === "none") {
        element1.style.display = "block";
        element2.style.display = "none";
    } else {
        element1.style.display = "none";
        element2.style.display = "block";
    }
}