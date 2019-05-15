var elem = document.getElementById('price');    

document.addEventListener("mousemove",function(event){
                
    var x = event.clientX;
    var y = event.clientY;
    
    document.getElementById('position').le = " X = "+ x +"][ Y = "+ y;
    elem.style = "left: " + x + "px";
});