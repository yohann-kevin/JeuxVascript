// script du jeux battleship
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