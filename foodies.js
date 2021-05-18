function searchBoxShow(){
    var x = document.getElementById("search-box");
    var y = document.getElementById("search");
    if (x.style.display === "none"){
        x.style.display = "flex";
        y.style.backgroundColor = "white";
    }
    else{
        x.style.display = "none";
        y.style.backgroundColor = "transparent";
    }
}