/************************* slider releases ******************************/

var slideIndex = 1;

showDivs(slideIndex);

slider();

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function currentDiv(n) {
    showDivs(slideIndex = n); 
    
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");

    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
    }
    
    for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" selected", "");
    }
    x[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " selected";
}

function slider(){
    if (slideIndex == 3){
        slideIndex = 1;
    } else {
        slideIndex += 1;
    }

    showDivs(slideIndex); 

    setTimeout(slider, 3000); 
}


/************************* slider bestsellers ******************************/

var slideCards = 1;
showCards(slideCards);

function plusCards(n) {
  showCards(slideCards += n);
  console.log(n);
}

function showCards(n) {
  var i;
  var x = document.getElementsByClassName("myCards");
  if (n > x.length) {slideCards = 1}
  if (n < 1) {slideCards = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }

  x[slideCards-1].style.display = "flex";
}
