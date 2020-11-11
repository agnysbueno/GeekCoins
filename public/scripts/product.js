/********************* image zoom ************************ */

var imageSelected = 1;

image(imageSelected);

function image(n) {
    zoomImage(imageSelected = n);     
}

function zoomImage(n) {
    let i;
    let zoom = document.getElementById("max-images");
    var selected = document.getElementsByClassName("image");

    var image;

    if (imageSelected == 1){
        image = document.querySelector('.img1');
    } else if (imageSelected == 2) {
        image = document.querySelector('.img2');
    } else{
        image = document.querySelector('.img3');
    }
    
    zoom.innerHTML = `<img src="${image.children[0].src}" alt="${image.children[0].alt}">`;

    for (i = 0; i < selected.length; i++) {
        selected[i].className = selected[i].className.replace(" selected", "");
    }
    selected[imageSelected-1].className += " selected";
}

/********************* more infos dropdown ************************ */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}