  

document.addEventListener("mousemove",function(event){
    var elem = document.getElementById('primaryImage');
    
    var x = event.clientX;
    var y = event.clientY;


        elem.style.left =  x/100 + "px";
        elem.style.top =  y/100 + "px";
        // elem.style.fontSize = x/40 +"px";

});