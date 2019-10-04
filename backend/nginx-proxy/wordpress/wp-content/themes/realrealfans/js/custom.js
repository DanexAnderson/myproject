// Nav DropDown Animation
jQuery('ul.navbar-nav li.dropdown').hover(function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
  }, function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
  });

  // LightBox 
  $(document).on("click", '[data-toggle="lightbox"]', function(event) {

    event.preventDefault();
    
    $(this).ekkoLightbox();

    // Add closing X symbol to Image Gallery LightBox
     $(".modal-content").before("<h2 style='margin-top:-30px;margin-right:-15;float:right;position-fixed;color:white;'>X</h2>");
  });
  
{ // Change Background-Color of Scroll Nav Header 

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    // document.getElementById("header").style.fontSize = "30px";

    document.getElementsByClassName("NavbgColor")[0].style.backgroundColor = "rgba(219, 250, 255, 0.9)";
  } else {
    // document.getElementById("header").style.fontSize = "90px";

    document.getElementsByClassName("NavbgColor")[0].style.backgroundColor = "rgba(219, 250, 255, 0.8)";
  }
}

}