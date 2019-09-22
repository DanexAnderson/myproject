// Nav DropDown Animation
jQuery('ul.navbar-nav li.dropdown').hover(function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
  }, function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
  });

  // LightBox 

  $(document).on("click", '[data-toggle="lightbox"]', function(event) {

    // 

    event.preventDefault();

   // var close = document.createElement("p"); 
    
    $(this).ekkoLightbox();
     $(".modal-content").before("<h1 style='margin-top:-30px;margin-right:-15;float:right;position-fixed;color:white;'>X</h1>");
  });
  
  
  
  