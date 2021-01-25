// NAVIGATION Ensures that nav links work with circletype in use. Help recieved from Katrina Loverick
$( document ).ready(function() {

    $('#nav-list div span').each(function(index) {
        if($(this).text()=="$") { //index (type)
            $(this).after('<a href="../index.html">');
            $(this).remove();
        }
        else if($(this).text()=="~") { //about ()
            $(this).after('</a><a href="pages/about.html">'); //note adding a closing tag from previous open link
            $(this).remove();
        }
        else if($(this).text()=="@") { //contact
            $(this).after('</a><a href="pages/contact.html">'); //note adding a closing tag from previous open link
            $(this).remove();
        }
        else if($(this).text()=="*") { //resume (editorial)
            $(this).after('</a><a href="pages/resume.html">'); //note adding a closing tag from previous open link
            $(this).remove();
        }
        else if($(this).text()=="&") { //pages about
            $(this).after('</a><a href="about.html">'); //note adding a closing tag from previous open link
            $(this).remove();
        }
        else if($(this).text()=="+") { //pages contact (info)
            $(this).after('</a><a href="contact.html">'); //note adding a closing tag from previous open link
            $(this).remove();
        }
        else if($(this).text()=="€") { //pages resume
            $(this).after('</a><a href="resume.html">'); //note adding a closing tag from previous open link
            $(this).remove();
        }
        else if($(this).text()=="≈") { //pages type
            $(this).after('</a><a href="index.html">'); //note adding a closing tag from previous open link
            $(this).remove();
        }
    });

   var tempString = $('#nav-list').html();
   tempString = tempString.replace(/<\/a>/g, "");
   tempString = tempString.replace(/<a href/g, "</a><a href");
   //remove closing tag from first one
   tempString = tempString.replace("</a><a href", "<a href");

   $('#nav-list').html(tempString);

});


// Slideshow Functions
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

// accordion
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
let active = document.querySelectorAll(".accordion .accordion.active");
for(let j = 0; j < active.length; j++){
  active[j].classList.remove("active");
  // active[j].panel.style.display = "none";
}
