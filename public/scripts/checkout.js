var checkoutIndex = 1;

showDivs(checkoutIndex);

function currentDiv(n) {
    showDivs(checkoutIndex = n);     
}

function showDivs(n) {
    let i;
    let x = document.getElementsByClassName("myCheckout");
    var dots = document.getElementsByClassName("options");

    if (n > x.length) {checkoutIndex = 1}
    if (n < 1) {checkoutIndex = x.length}
    for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
    }
    
    x[checkoutIndex-1].style.display = "flex";

    for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" selected", "");
    }
    dots[checkoutIndex-1].className += " selected";
}
