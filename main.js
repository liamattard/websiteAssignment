
upperObj = document.getElementById('upper');
middleObj = document.getElementById('middle');
bottomObj = document.getElementById('bottom');

upperObj.style.width = 800 + "px";
upperObj.style.top = 48 + "%";

middleObj.style.width = 800 + "px";
middleObj.style.top = 50 + "%";

bottomObj.style.width = 800 + "px";
bottomObj.style.top = 51 + "%";




text = document.getElementById('titleText');

text.style.opacity = 0;

function spread() {
        if(parseInt(upperObj.style.top) >= 30){
            upperObj.style.width = parseInt(upperObj.style.width) - 20 + "px";
            upperObj.style.top = parseInt(upperObj.style.top) - 3 + '%';
            middleObj.style.width = parseInt(middleObj.style.width) - 15 + "px";
            bottomObj.style.width = parseInt(bottomObj.style.width) - 20 + "px";
            bottomObj.style.top = parseInt(bottomObj.style.top) + 3 + '%';
        }
}

function middleSmall(){
    if(parseInt(middleObj.style.width) >= 770){
        middleObj.style.width = parseInt(middleObj.style.width) - 10 + 'px';
    }
}

function getSmaller(){
    if(parseInt(middleObj.style.width) >= 750){
        upperObj.style.width = parseInt(middleObj.style.width) - 10 + 'px';
        middleObj.style.width = parseInt(middleObj.style.width) - 10 + 'px';
        bottomObj.style.width = parseInt(middleObj.style.width) - 10 + 'px';
    }
}

function animation(){
    window.setInterval(middleSmall, 10);
    middleObj.style.top =  parseFloat(middleObj.style.top) + 0.5 + '%';
    upperObj.style.top =  parseFloat(middleObj.style.top) + 0.3 + '%';
    bottomObj.style.top =  parseFloat(middleObj.style.top) + 0.3 + '%';
    window.setInterval(getSmaller, 2);
    window.setInterval(spread, 20);
    text.style.display = "block";
    window.setInterval(showText, 250);
    
}

function showText(){
    console.log(parseFloat(text.style.opacity));
    if(parseFloat(text.style.opacity) <= 1){
        text.style.opacity = parseFloat(text.style.opacity) + 0.1;
    }
}

function init(){
    
    setTimeout(animation,5000);
   
}

window.onload = init;
