var iaBattleship = {
    // recupere une case
    getCase : function() {
        var casePossibility = this.getAllCasePossibility(); 
        var box = this.getBestCase(casePossibility);
        return box;
    },

    // recupere toute les possibilité de case a jouer
    getAllCasePossibility : function() {
        var caseEmpty = [];
        for(var i = 0; i < battleship.nbLine;i++) {
            for(var j = 0; j < battleship.nbColumn;j++) {
                if(battleship.grid[i][j] === 0 || battleship.grid[i][j] === 1) {
                    var box = {
                        line : i,
                        column : j,
                        weight : this.getCaseWeight(i,j)
                    }
                    caseEmpty.push(box);
                }
            }
        }
        return caseEmpty;
    },
    

    // recupere le poid de chaque case
    getCaseWeight : function(line,column) {
        var caseWeight = 1;
        if((column+1 < battleship.nbColumn) && battleship.grid[line][column+1] === 4) caseWeight++;
        if((column-1 >= 0) && battleship.grid[line][column-1] === 4) caseWeight++;
        if((line+1 < battleship.nbLine) && battleship.grid[line+1][column] === 4) caseWeight++;
        if((line-1 >= 0) && battleship.grid[line-1][column] === 4) caseWeight++;
        return caseWeight;
    },

    // recupere les meilleurs case a jouer
    getBestCase : function(box) {
        var bestCase = 0;
        var bestBox = [0];
        for(var i = 1; i < box.length; i++) {
            if(box[i].weight > box[bestCase].weight) {
                bestCase = i;
                bestBox = new Array();
                bestBox.push(i);
            } else if(box[i].weight === box[bestCase].weight) {
                bestBox.push(i);
            }
        }
        var randomCase = Math.floor(Math.random() * bestBox.length);
        return box[bestBox[randomCase]];
    }
}
var battleship = {
    nbColumn : 5,
    nbLine : 5,
    grid : [],

    nbCaseJ1 : 0,
    nbCaseJ2 : 0,

    //fonction permettant d'initialiser la partie
    init : function(numberBoat){
        this.nbColumn = numberBoat * 2 + 1;
        this.nbLine = numberBoat * 2 + 1;
        this.grid = this.initTabEmpty(this.nbLine,this.nbColumn,0);

        for(var i = 1; i <= numberBoat;i++) {
            this.positionBoat((i+1),1);
            this.nbCaseJ1 += i + 1;
            this.positionBoat((i+1),2);
            this.nbCaseJ2 += i + 1;
        }
    },

    //Permet d'initialiser un tableau de tableau en fonction d'un nombre de ligne et de colonne passé en paramètre
    initTabEmpty : function(nbLine, nbColumn, car = ''){
        var tab = [];
        for(var i=0;i < nbLine;i++){
            var line = [];
            for(var j=0;j < nbColumn; j++){
                line.push(car);
            }
            tab.push(line);
        }
        return tab;
    },

    //fonction permettant de positionner lse bateauxs sur la grille
    positionBoat : function(size,player){
        var boat = {};
        var positionFinish = false;
        while(!positionFinish){
            var isHorizontal = Math.floor(Math.random() * 2);
            var sizeMaxX = 0;
            var sizeMaxY = 0;
            if(isHorizontal) {
                sizeMaxX = this.nbLine -(size-1);
                sizeMaxY = this.nbColumn;
            } else {
                sizeMaxX = this.nbLine;
                sizeMaxY = this.nbColumn -(size-1);
            }
            var xRandom = Math.floor(Math.random() * sizeMaxX);
            var yRandom = Math.floor(Math.random() * sizeMaxY);
            
            var isCaseEmpty = true;
            for(var i =1 ; i <= size && isCaseEmpty; i++){
                boat["case"+i] = this.getCaseCreateBoat(xRandom, yRandom, isHorizontal, i);
                isCaseEmpty = this.verifyCaseEmpty(boat["case"+i]);
            }
            if(isCaseEmpty) positionFinish = true;
        }
        this.registerGrid(boat,player);
    },


    //recupere des case pour creer des bateaux
    getCaseCreateBoat : function(xRandom,yRandom,isHorizontal,numCase){
        var box = {};
        if(isHorizontal){
            box.x = xRandom + (numCase-1);
            box.y = yRandom;
        } else {
            box.x = xRandom;
            box.y = yRandom + (numCase-1);
        }
        return box;
    },

    // vérifié si une case est vide
    verifyCaseEmpty : function(caseBoat){
        if(this.grid[caseBoat.x][caseBoat.y] === 0) return true;
        return false;
    },

    // enregistre la grille
    registerGrid : function (boat,player){
        for(var box in boat){
            this.grid[boat[box].x][boat[box].y] = player;
        }
    },

    // affiche la grille
    displayGrid : function(){
        const gameBattleship = document.querySelector("#battleship");
        gameBattleship.innerHTML = "";

        var content = "<table id='tabBattleship'>";
        for(var i = 0; i < this.nbLine;i++) {
            content += "<tr>";
            for(var j = 0; j < this.nbColumn; j++) {
                content += "<td class='caseBattleship'>";
                var btnFire = "<button class='fire' id='fire' onclick='play("+i+","+j+")'>Fire</button>"
                if(this.grid[i][j] === 0) content += btnFire;    
                if(this.grid[i][j] === 1) content += "<img src='app/public/images/battleship/J1.png' class='imgPlayers1'>";           
                if(this.grid[i][j] === 2) content += btnFire;              
                if(this.grid[i][j] === 3) content += "<img src='app/public/images/battleship/croix.png' class='imgLoose'>";           
                if(this.grid[i][j] === 4) content += "<img src='app/public/images/battleship/croix.png' class='imgPlayers1'>";        
                if(this.grid[i][j] === 5) content += "<img src='app/public/images/battleship/croix.png' class='imgPlayers2'>";
                content += "</td>";
            }
            content += "</tr>";
        }
      
        content += "</table>";
        gameBattleship.innerHTML = content;
    },

    // permet de jouer une case
    playCase : function(line,column){
        if(this.grid[line][column] === 0) {
            this.grid[line][column] = 3;
        }
        if(this.grid[line][column] === 1) {
            this.nbCaseJ1--;
            this.grid[line][column] = 4;
        }
        if(this.grid[line][column] === 2) {
            this.nbCaseJ2--;
            this.grid[line][column] = 5;
        }
    },

    // vérifie la fin du jeux
    verifyEndGame : function() {
        if(this.nbCaseJ1 <= 0 || this.nbCaseJ2 <= 0) return true;
    }
}
const turn = document.getElementById("turn");
const alert = document.getElementById("successBattleship");
const messagej1 = document.getElementById("j1Battleship");
const messagej2 = document.getElementById("j2Battleship");
var writeNumberBoat = 0;

var playerTurn = 1;
var endGame = false;

var scoreJ1 = 0;
var scoreJ2 = 0;

// permet de jouer une case
function playCase(line,column) { 
    if(!endGame) {
        battleship.playCase(line,column);
        battleship.displayGrid();
        if(battleship.verifyEndGame(playerTurn)) {
            manageEndGameBattleship();
            battleshipSaveScore();
        }
        if(playerTurn===1) {
            playerTurn = 2;
            turn.innerHTML = "Tour du joueur 2";
        } else {
            playerTurn = 1;
            turn.innerHTML = "Tour du joueur 1";
        }  
    }   
}

// initialise un tableau
function initTabBattleship(numberBoat) {
    battleship.nbCaseJ1 = 0;
    battleship.nbCaseJ2 = 0;
    endGame = false;
    playerTurn = 1;
    alert.style.display = "none";
    var contentJ1 = "<img src='app/public/images/battleship/J1.png' class='imgPlayers1'><br>";
    contentJ1 += scoreJ1;
    messagej1.innerHTML = contentJ1;
    var contentJ2 = "<img src='app/public/images/battleship/J2.png' class='imgPlayers2'><br>";
    contentJ2 += scoreJ2;
    messagej2.innerHTML = contentJ2;

    battleship.init(numberBoat);
    battleship.displayGrid();
}

// gere la fin du jeux
function manageEndGameBattleship(){
    endGame = true;
    var contentAlert = "<p id='msg'>Partie terminé le gagnant est : J" + playerTurn + "</p>";
    contentAlert += "<button type='button' class='btnBattleship' onclick='initTabBattleship("+writeNumberBoat+")'>Restart</button>";
    displayAlert(contentAlert,1);
    if(playerTurn===1){
        scoreJ1++;
    } else {
        scoreJ2++;
    }
}

// affiche une alerte
function displayAlert(txt, type) {
    if(type === 1) {
        alert.classList.add("success");
        alert.classList.remove("error");
    } else {
        alert.classList.remove("success");
        alert.classList.add("error");
    }
    alert.innerHTML = txt;
    alert.style.display = "block";
}

// permet de jouer
function play(line,column) {
    playCase(line,column);
    var caseIA = iaBattleship.getCase();
    playCase(caseIA.line,caseIA.column);
}

// permet de de selectionner le nombre de bateaux voulu et de démarrer le jeux
function startBattleship() {
    writeNumberBoat = parseInt(document.getElementById('numberBoat').value);
    if(writeNumberBoat < 2) displayAlert("le nombre de bateau doit être supérieur à 1",2);
    if(writeNumberBoat > 4) displayAlert("le nombre de bateau doit être inférieur à 5",2);
    if(writeNumberBoat >= 2 && writeNumberBoat <= 4) initTabBattleship(writeNumberBoat);
}

// lance une animation d'explosion au click sur la target
addEventListener("click", function(event) {
    var target = event.target;
    if(target.id === "fire") {
        var image = "<img src='./images/explo/explosion00.png' id='explo' style='width:100px;height:100px;position:absolute;top:"+(event.clientY-50)+"px;left:"+(event.clientX-50)+"px;'/>";
        var body = document.querySelector("body");
        var element = document.createElement("div");
        element.innerHTML = image;
        body.appendChild(element);

        explosion(8);
        // animation d'xplosion
        function explosion(time) {
            var explo = document.getElementById("explo");
            if(time >= 1) {
                if(time===9) explo.setAttribute("src","app/public/images/battleship/explo/explosion01.png");
                if(time===8) explo.setAttribute("src","app/public/images/battleship/explo/explosion02.png");
                if(time===7) explo.setAttribute("src","app/public/images/battleship/explo/explosion03.png");
                if(time===6) explo.setAttribute("src","app/public/images/battleship/explo/explosion04.png");
                if(time===5) explo.setAttribute("src","app/public/images/battleship/explo/explosion05.png");
                if(time===4) explo.setAttribute("src","app/public/images/battleship/explo/explosion06.png");
                if(time===3) explo.setAttribute("src","app/public/images/battleship/explo/explosion07.png");
                if(time===2) explo.setAttribute("src","app/public/images/battleship/explo/explosion08.png");
                if(time===1) explo.remove(this);
                setTimeout(function() {
                    explosion(time-1);
                },55); 
            }
        }
    }
})

function battleshipSaveScore() {
    var data = {
       score_battleship: 2
    }

    fetch('index.php?action=playingBattleship', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    }
    ).then( res => {

    }).then( json => {

    })
}