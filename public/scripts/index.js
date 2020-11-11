/************************* releases ******************************/
/* slider */
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
    let i;
    let x = document.getElementsByClassName("mySlides");
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


/************************* bestsellers ******************************/
/* slider */
var slideCards = 1;
showCards(slideCards);

function plusCards(n) {
  showCards(slideCards += n);
}

function showCards(n) {
  let i;
  let x = document.getElementsByClassName("myCards");
  if (n > x.length) {slideCards = 1}
  if (n < 1) {slideCards = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }

  x[slideCards-1].style.display = "flex";
}

/* buttons */
function mudaCoracaoParaBranco(){
  document.getElementById("icon-wishlist").src = "../../public/assets/icons/favoritos-branco.svg"
}

function mudaSacolaParaBranco(){
  document.getElementById("icon-shopping").src = "../../public/assets/icons/sacola-branco.svg"
}


/************************* collections ******************************/
/* slider */
var slideCollection = 1;
showCollection(slideCollection);

function plusCollection(n) {
  showCollection(slideCollection += n);
  console.log(n);
}

function showCollection(n) {
  let i;
  let x = document.getElementsByClassName("myCollection");
  if (n > x.length) {slideCollection = 1}
  if (n < 1) {slideCollection = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }

  x[slideCollection-1].style.display = "flex";
}


