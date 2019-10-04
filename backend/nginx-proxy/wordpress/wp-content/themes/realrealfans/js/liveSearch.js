/*--------------------------- Live Search Request ------------------------*/

function showResult(str) {


  if (str.length == 0) {
    document.getElementById("livesearch").innerHTML = "";
    document.getElementById("livesearch").style.border = "0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange = function () {
    // xmlhttp.onload=function() {
    if (this.readyState == 4 && this.status == 200) {

      if (this.responseText.trim() != 'null') {

        var response = this.responseText.substr(0, this.responseText.length - 4);
        document.getElementById("livesearch").innerHTML = response;
        document.getElementById("livesearch").style.border = "0px solid #A5ACB2";
      }
    }
  }
  xmlhttp.open("GET", "/wp-json/rrf/v1/search?q=" + str, true);
  xmlhttp.send();
}


/*--------------- Disable the Enter Key on Search Menu----------------*/
$(document).ready(function () {
  $("#livesearch").keypress(
    function (event) {
      var keyID = (event.charCode) ? event.charCode : ((event.which) ? event.which : event.keyCode);
      //alert(keyID);
      if (keyID == 13) {
        event.preventDefault();
        return false;
      }
    });
});




/*------------------- Browse and Select from Search Menu results ------------------------*/


document.getElementById("navbar-search").addEventListener("keyup", function (event) {
   this.livesearchelem = document.getElementById("livesearch");
   this.childrens = this.livesearchelem.getElementsByTagName("a"); //Get only hyperlinks

  key = (event.charCode) ? event.charCode : ((event.which) ? event.which : event.keyCode);
  var selected = this.selectedResultNumber;

  $(document).on('input', '#navbar-search', function () { // On change of input search Term, reset selected.

    this.selectedResultNumber = null;
    selected = null;    
  });

  if (key == 38) { //Arrow up
    if (this.childrens.length === 0) {
      return;
    } 

    if (this.selectedResultNumber === 1){ // Return To Search Input Field

            //Restore the previous selected element's style
            this.childrens[0].classList.remove("searhMenuColor");
            this.selectedResultNumber = null;
    }
    else
    if (!selected) { //If 'selectedResultNumber' is undefined

      //return;
      this.childrens[this.childrens.length - 1].className += " searhMenuColor ";

      //Store the selected number into this element
      this.selectedResultNumber = this.childrens.length - 0;

    } else if (selected > 1) {

      //Restore the previous selected element's style
      this.childrens[selected - 1].classList.remove("searhMenuColor");

      //Set the new selected element's style
      this.childrens[selected - 2].className += " searhMenuColor ";

      //Decrease the selected number by 1
      this.selectedResultNumber--;
    }
  } else if (key == 40) { //Arrow down
    if (this.childrens.length === 0) {
      return;
    }
    if (!selected) { //If 'selectedResultNumber' is undefined

    this.childrens[0].className += " searhMenuColor ";

      //Store the selected number into this element
      this.selectedResultNumber = 1;
    } else if (selected < this.childrens.length) {

      //Restore the previous selected element's style
      this.childrens[selected - 1].classList.remove("searhMenuColor");

      //Set the new selected element's style
      this.childrens[selected].className += " searhMenuColor ";

      //Increase the selected number by 1
      this.selectedResultNumber++;
    }
  } else

    var searchTerm = document.getElementById("navbar-search");

  if (searchTerm) {
    showResult(searchTerm.value);

    searchTerm.addEventListener("keydown", function (event) {

      var key = (event.charCode) ? event.charCode : ((event.which) ? event.which : event.keyCode);      
  
      if (key == 13 && this.selectedResultNumber) { //Enter key
        
        this.childrens[this.selectedResultNumber-1].focus(); // Focus selected Option for the Click event

        //Trigger click event on the selected element
        this.childrens[this.selectedResultNumber-1].click();
      }

    });
  }


});
/*---------------------------------------------------------------------------------------*/