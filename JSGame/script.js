function drawShape(){
    document.getElementById("shape").style.backgroundColor = colors[(Math.floor(Math.random()*10))];
    document.getElementById("shape").style.height = (Math.floor(Math.random()*300)+150) + "px";
    document.getElementById("shape").style.width = document.getElementById("shape").style.height;
    if ((Math.floor(Math.random()*2)) > 0){
        document.getElementById("shape").style.borderRadius = '50%';
    }
    else {
        document.getElementById("shape").style.borderRadius = '0%';
    }
    document.getElementById("shape").style.marginTop = (Math.floor(Math.random()*400)) + "px";
    document.getElementById("shape").style.marginLeft =  (Math.floor(Math.random()*500)) + "px";
}

function writeTimer(){
    var reactionTime = new Date().getTime();
    document.getElementById("timer").innerHTML = " " + (reactionTime - gameTimer)/1000 + "s";
}
function game(){
    document.getElementById("shape").style.display = "block";
    drawShape();
    gameTimer = new Date().getTime();
    document.getElementById("shape").onclick = function(){
        writeTimer();
        document.getElementById("shape").style.display = "none";
        setTimeout(game,Math.random()*2000);
    }
    
}
var gameTimer = 0;
var colors = ["Red", "Yellow", "Blue", "Green", "Black", "Pink", "Purple", "Teal", "Grey", "Orange"];

document.getElementById("start").onclick = function(){
    document.getElementById("shape").style.display = "block";
    game();
}
document.getElementById("stop").onclick = function(){
    document.getElementById("shape").style.display = "none";
} 
