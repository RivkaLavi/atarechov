function bizInfoScroller(){
    var element = document.getElementById("business_info_wrapper");
    var desiredPosition = 420;
    if(window.pageYOffset >= desiredPosition){
       element.style.cssText += "position: fixed; top: 0px; bottom: auto; right: 0px; left: auto;"; 
      }
    else {
       element.style.cssText += "position: relative; top: 0px; bottom: auto; right: auto; left: 10px;";  
     } 
}
