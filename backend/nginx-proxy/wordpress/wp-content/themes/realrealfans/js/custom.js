{// Nav DropDown Animation
jQuery('ul.navbar-nav li.dropdown').hover(function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
  }, function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
  });
}

{// LightBox 
  $(document).on("click", '[data-toggle="lightbox"]', function(event) {

    event.preventDefault();
    
    $(this).ekkoLightbox();

    // Add closing X symbol to Image Gallery LightBox
     $(".modal-content").before("<h2 style='margin-top:-30px;margin-right:-15;float:right;position-fixed;color:white;'>X</h2>");
  });
}
  
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


{// Iframe Cross-Browser Communication

 window.addEventListener('message', event => {
  // IMPORTANT: check the origin of the data!    
      
   if (event.data == 'daneanderson16realrealfans') { 
      // The data was sent from your site.
      // Data sent with postMessage is stored in event.data: 
      window.document.getElementById("NavHeader").style.display = "none";

      var hidebarP = window.document.getElementById("parent").style;
      hidebarP.overflow='hidden';
      hidebarP.width = '100%';
      hidebarP.height ='100%';
      hidebarP.marginLeft = '10px'

      var hidebarC = window.document.getElementById("child").style;
      hidebarC.overflowY ='scroll';
      hidebarC.width = '100%';
      hidebarC.height ='100%';
      hidebarC.paddingRight = '15px';
      hidebarC.boxSizing = 'content-box';
      hidebarC.marginTop = '-15px'
      


      window.document.body.style.overflow = 'hidden';


      // alert(event.data);
  } else {
      // The data was NOT sent from your site! 
      // Be careful! Do not use it. This else branch is
      // here just for clarity, you usually shouldn't needed.
      return; 
  } 
});  

}