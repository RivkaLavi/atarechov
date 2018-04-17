function bizInfoScroller(){
    var element = document.getElementById("business_info_wrapper");
    var desiredPosition = 315;
    if(window.pageYOffset >= desiredPosition){
       element.style.cssText += "position: fixed; top: 10px; bottom: auto; right: 10px; left: auto;"; 
      }
    else {
       element.style.cssText += "position: relative; top: 10px; bottom: auto; right: auto; left: 0px;";  
     } 
   }
