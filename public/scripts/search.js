var page = 1;

showDivs(page);

function plusDivs(n) {
    showDivs(page += n);
}

function currentDiv(n) {
    showDivs(page = n); 
    
}

function showDivs(n) {
    let i;
    let x = document.getElementsByClassName("myPages");
    var dots = document.getElementsByClassName("demo");

    if (n > x.length) {page = 1}
    if (n < 1) {page = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    
    x[page-1].style.display = "flex";

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" selected", "");
    }

    dots[page-1].className += " selected";
}
