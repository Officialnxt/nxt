//Scroll to the top

var timeOut;
function scrollToTop() {
  if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
    window.scrollBy(0,-50);
    timeOut=setTimeout('scrollToTop()',10);
    document.getElementById("search").focus();
  }
  else clearTimeout(timeOut);
}

// Toggle(Index.php)

$(document).ready(function() {
  $('#link1').click(function(){ 
       $('#world').slideToggle('fast'); 
        return false; 
      });

  $('#link2').click(function(){ 
       $('#sports').slideToggle('fast'); 
        return false; 
      });

  $('#link3').click(function(){ 
       $('#tech').slideToggle('fast'); 
        return false; 
      });

  $('#link4').click(function(){ 
       $('#gamming').slideToggle('fast'); 
        return false; 
      });

  $('#link5').click(function(){ 
       $('#other').slideToggle('fast'); 
        return false; 
      });


}); 
