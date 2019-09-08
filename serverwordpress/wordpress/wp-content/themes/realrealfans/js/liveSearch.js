
/*--------------------------- Live Search Request ------------------------*/

function showResult(str) {

 
    if ( str.length==0 ) { 
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
   
    xmlhttp.onreadystatechange=function() {
    // xmlhttp.onload=function() {
      if (this.readyState==4 && this.status==200 ) {
        
        if(this.responseText.trim() !='null') {
        
        var response = this.responseText.substr(0, this.responseText.length-4);
        document.getElementById("livesearch").innerHTML= response;
        document.getElementById("livesearch").style.border="0px solid #A5ACB2";
    }
      }
    }
    xmlhttp.open("GET","/wp-json/rrf/v1/search?q="+str,true);
    xmlhttp.send();
  }


/*--------------- Disable the Enter Key on Search Menu----------------*/
$(document).ready(function() {
  $("#livesearch").keypress(
    function(event){  
      var keyID = (event.charCode) ? event.charCode : ((event.which) ? event.which : event.keyCode);
      //alert(keyID);
      if (keyID == 13) {
        event.preventDefault();
        return false;
      }
  });
});




/*------------------- Browse and Select from Search Menu results ------------------------*/

  
  var select;

   document.getElementById("navbar-search").addEventListener("keyup",function(event){
    var livesearchelem = document.getElementById("livesearch");
    var childrens = livesearchelem.getElementsByTagName("a"); //Get only hyperlinks
    
    var key = (event.charCode) ? event.charCode : ((event.which) ? event.which : event.keyCode);
    var selected = this.selectedResultNumber;
 
    $(document).on('input','#navbar-search',function () { 
      
      this.selectedResultNumber = null;
      selected = null;
      //console.log($('#navbar-search').val());
     });

     this.select = selected;

     
     //var val = event.target.value.onch;
     //console.log(event);

    if (key == 38){ //Arrow up
        if (childrens.length === 0){ return; }
        if (!selected){ //If 'selectedResultNumber' is undefined

            childrens[childrens.length - 1].className += " searhMenuColor ";
            
          
            //Store the selected number into this element
            this.selectedResultNumber = childrens.length - 1;
            
        }
        else if (selected > 1){
            //Restore the previous selected element's style
      
            childrens[selected - 1].classList.remove("searhMenuColor");
            
            //Set the new selected element's style

            childrens[selected - 2].className += " searhMenuColor ";

            //Decrease the selected number by 1
            this.selectedResultNumber--;
        }
    }
    else if (key == 40){ //Arrow down
        if (childrens.length === 0){ return; }
        if (!selected){ //If 'selectedResultNumber' is undefined

            childrens[0].className += " searhMenuColor ";
          
            //Store the selected number into this element
            this.selectedResultNumber = 1;
        }
        else if (selected < childrens.length){
            //Restore the previous selected element's style
         
            childrens[selected - 1].classList.remove("searhMenuColor");
          
            //Set the new selected element's style
            childrens[selected].className += " searhMenuColor ";

            //Increase the selected number by 1
            this.selectedResultNumber++;
        }
    }
   
    else 
    
    var searchTerm = document.getElementById("navbar-search");
    
    if(searchTerm){ showResult(searchTerm.value);
    
        
  searchTerm.addEventListener("keydown",function(event){  
  var livesearchelem = document.getElementById("livesearch");
  var childrens = livesearchelem.getElementsByTagName("a"); //Get only hyperlinks

 if (event.which == 13){ //Enter key
    
  if (!this.select) this.select =0; 

      if (childrens.length === 0){ return; }
      
      //Trigger click event on the selected element
      childrens[this.select ].focus(); 
      childrens[this.select ].click();
    }         

  });
   }

   
});  
/*---------------------------------------------------------------------------------------*/