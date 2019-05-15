  

document.addEventListener("mousemove",function(event){
    var elem = document.getElementById('price');
    
    var x = event.clientX;
    var y = event.clientY;


        elem.style.left =  x/10 + "px";
        elem.style.top =  y/10 + "px";
        elem.style.fontSize = x/40 +"px";

});