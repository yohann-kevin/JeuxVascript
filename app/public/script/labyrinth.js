const labyrinth = document.querySelector("#labyrinthe");
const labyrinthWin = document.querySelector("#alertLabyrinth");

var nbLine = 4;
var nbColumn = 4;

var positionPlayer = [0,0];
var level = 0;

var tabGames = null;
nextLevel();

// créer une case
function createBox(image){
    var box = {
        image : image,
        left : getLeft(image),
        top : getTop(image),
        right : getRight(image),
        bot : getBot(image)
    }
    return box;
}

// vérifie si on peut aller a gauche
function getLeft(image){
    if(image === 0 || image === 1 || image === 2 || image === 3 || image === 6 || image === 7 || image === 8 || image === 12) return true;
    return false;
}

// vérifie si on peut aller en haut
function getTop(image){
    if(image === 0 || image === 2 || image === 3 || image === 4 || image === 5 || image === 8 || image === 9 || image === 14) return true;
    return false;
}

// vérifie si on peut aller a droite
function getRight(image){
    if(image === 0 || image === 1 || image === 3 || image === 4 || image === 6 || image === 9 || image === 10 || image === 13) return true;
    return false;
}

// vérifie si on peut aller en bas
function getBot(image){
    if(image === 0 || image === 1 || image === 2 || image === 4 || image === 5 || image === 7 || image === 10 || image === 11) return true;
    return false;
}

// affiche le labytinthe
function displayLabyrinth(tabGames){
    labyrinth.innerHTML = "";
    var content ="<table id='labTab'>";
    for (var i = 0 ; i < tabGames.length;i++){
        content += "<tr>";
        for (var j = 0 ; j < tabGames[i].length;j++){
            content += "<td>";
                content += "<img class='imgLab' src='app/public/images/labyrinth/"+tabGames[i][j].image+".png' />";
                if(i === nbLine -1 && j === nbColumn -1){
                    var pandaLine = 25 + 100 * i;
                    var pandaColumn = 25 + 100 * j;
                    content += "<img class='imgPlayerLab' src='app/public/images/labyrinth/panda.png' style='width:50px;height:50px;position:absolute;left:"+pandaColumn+"px;top:"+pandaLine+"px;margin-top:155px;'/>";
                }
                if(i === positionPlayer[0] && j === positionPlayer[1]){
                    var bearLine = 25 + 100 * positionPlayer[0];
                    var bearColumn = 25 + 100 * positionPlayer[1];
                    content += "<img class='imgPlayerLab' src='app/public/images/labyrinth/bear.png' style='width:50px;height:50px;position:absolute;left:"+bearColumn+"px;top:"+bearLine+"px;margin-top:155px;'/>";
                }
            content += "</td>";
        }
        content += "</tr>";
    }
    content +="</table>";
    labyrinth.innerHTML = content;
}

// récupere une case
function getBox(i,j){
    return tabGames[i][j];
}

// permet a l'utilisateur de pouvoir se déplacer
addEventListener("keyup",function(event){
    var linePlayer = positionPlayer[0];
    var columnPlayer = positionPlayer[1];
    if(event.keyCode === 81 && columnPlayer>0){//déplacement vers la gauche
        if(getBox(positionPlayer[0],positionPlayer[1]).left){
            columnPlayer--;
        }
    }
    if(event.keyCode === 90 && linePlayer > 0){ // déplacement vers le haut
        if(getBox(positionPlayer[0],positionPlayer[1]).top){
            linePlayer--;
        }
    }
    if(event.keyCode === 68 && columnPlayer < nbColumn - 1){ //déplacement vers la droite
        if(getBox(positionPlayer[0],positionPlayer[1]).right){
            columnPlayer++;
        }
    }
    if(event.keyCode === 83 && linePlayer < nbLine - 1){ //déplacement vers le bas
        if(getBox(positionPlayer[0],positionPlayer[1]).bot){
            linePlayer++;
        }
    }
    positionPlayer = [linePlayer,columnPlayer];
    displayLabyrinth(tabGames);
    verifyWin();
});

// vérifie si on a gagné
function verifyWin(){
    if(positionPlayer[0] === nbLine-1 && positionPlayer[1] === nbColumn-1){
        var content = "";
        if(level < levels.nbLevel) {
            content += "<p>Bien joué ! Passer au niveau : " + (level+1) + "? </p>";
            content += "<button onClick='nextLevel()'> Suivant </button>";  
        } else {
            content += "<p>Vous avez gagné !</p>";
        }
        labyrinthWin.innerHTML = content;
        labyrinthWin.style.display = "block";
    }
}

// permet de passer au niveau suivant
function nextLevel() {
    level++;
    labyrinthWin.style.display = "none";
    nbLine = levels["level"+level].nbLine;
    nbColumn = levels["level"+level].nbColumn;
    positionPlayer[0,0];
    tabGames = loadLevel();
    displayLabyrinth(tabGames);
}

// permet de charger un niveau
function loadLevel() {
    var tab = [];
    for(var i = 1 ; i <= levels["level"+level].nbLine; i++) {
        var line = [];
        for(var j = 1 ; j <= levels["level"+level].nbColumn; j++) {
            var values = levels["level"+level]["line"+i]["case"+j];
            line.push(createBox(values));
        }
        tab.push(line);
    }
    return tab;
}