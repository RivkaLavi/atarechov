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

   function cellResponsive(desiredXPosition) {
    var element = document.getElementById("business_info_wrapper")
    if (desiredXPosition.matches) { // If media query matches
      element.style.cssText +="position: absolute; top: 0px; right: 0px;"
    } else {
      element.style.cssText += "position: relative; top: 0px; bottom: auto; right: auto; left: 10px;"; 
    }
}
var desiredXPosition = window.matchMedia("(max-width: 768px)")
cellResponsive(desiredXPosition) // Call listener function at run time
desiredXPosition.addListener(cellResponsive) // Attach listener function on state changes