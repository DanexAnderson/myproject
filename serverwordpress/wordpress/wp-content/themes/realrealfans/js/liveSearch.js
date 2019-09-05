function showResult(str) {
    if (str.length==0) { 
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

