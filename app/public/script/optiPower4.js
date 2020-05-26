var IA = {
    /**
     * choisi une colonne
     */
    columnChoice() {
        var tabColumn = this.getTabCaseEmpty();
        var bestColumn = 0;
        var tabBestColumn = [0];
        for(var i = 1;i < tabColumn.length; i++) {
            if(tabColumn[i] > tabColumn[bestColumn]) {
                bestColumn = i;
                tabBestColumn = new Array();
                tabBestColumn.push(i);
            } else if(tabColumn[i] === tabColumn[bestColumn]) {
                tabBestColumn.push(i);
            }
        }
        return tabBestColumn[Math.floor(Math.random() * tabBestColumn.length)];
    },

    /**
     * permet de vérifier si une case est vide 
     */
    getTabCaseEmpty : function() {
        var tabColumn = [];
        for( var i = 0; i < power4.nbColumn; i++) {
            tabColumn.push(this.getCaseWeight(power4.returnLineCaseEmpty(i),i));
        }
        return tabColumn;
    },

    /**
     * calcul le poids d'une cellule 
     * @param {number} line 
     * @param {number} column 
     */
    getCaseWeight : function(line,column) {
        if(line === -1)  return 0;
        if(this.verifyWin(line,column,2)) return 100;
        if(this.verifyWin(line,column,1)) return 99;
        if(this.avoidLosingTurn(line,column,2)) return 0;
        var weight = 0;
        if(this.defenseAndAttack(line,column,1)) weight +=20;// defense
        if(this.defenseAndAttack(line,column,2)) weight +=20;// attack
        weight += this.getDefaultWeight(line,column);

        return weight;

        // la colonne est pleine le poids a renvoyer sera de 0
        // verifie si on peut gagner
        // si on peut gagner return poid 100
        // verifier si on peut perdre ou gagner (le joueur 1 peut gagne) return poids 99
        // autres cas
        // eviter de faire un coup perdant 
        // defendre ( 2 jetons adverse a coté = le bloquer)
        // attaquer ( 2 jetons de l'IA a coté )
        // additionner les poids 
    },

    /**
     * utilise les différente fonction qui vérifie si l'on a gagner
     * @param {number} line 
     * @param {number} column 
     * @param {number} players 
     */
    verifyWin : function(line,column,players) {
        if(this.verifyWinLine(line,column,players)) return true;
        if(this.verifyWinColumn(line,column,players)) return true;
        if(this.verifyWinDiagonal(line,column,players)) return true;
    },

    /**
     * retourne true si on peut gagner en ligne
     * @param {number} line 
     * @param {number} column 
     * @param {number} players 
     */
    verifyWinLine : function(line,column,players) {
        var counter = 1;
        if(power4.puissance4[line][column + 1] === players) {
            counter++;
            if(power4.puissance4[line][column + 2] === players) {
                counter++;
                if(power4.puissance4[line][column + 3] === players) {
                    counter++;
                }
            }
        }
        if(power4.puissance4[line][column - 1] === players) {
            counter++;
            if(power4.puissance4[line][column - 2] === players) {
                counter++;
                if(power4.puissance4[line][column - 3] === players) {
                    counter++;
                }
            }
        }
        // if(power4.puissance4[line][column + 1] === players || power4.puissance4[line][column - 1] === players) {
        //     counter++;
        //     if(power4.puissance4[line][column + 2] === players || power4.puissance4[line][column - 2] === players) {
        //         counter++;
        //         if(power4.puissance4[line][column + 3] === players || power4.puissance4[line][column - 3] === players) {
        //             counter++;
        //         }
        //     }
        // }

        if( counter > 3 ) return true;
    },

    /**
     * retourne true si on peut gagner en colonne
     * @param {number} line 
     * @param {number} column 
     * @param {number} players 
     */
    verifyWinColumn : function(line,column,players) {
        var counter = 1;
        if( line < 3 ) {
            if(power4.puissance4[line+1][column] === players) {
                counter++;
                if(power4.puissance4[line+2][column] === players) {
                    counter++;
                    if(power4.puissance4[line+3][column] === players) {
                        counter++;
                    }
                }
            }
        }
        if( counter > 3) return true;
    },

    /**
     * retourne true si on peut gagner en diagonal 
     * @param {number} line 
     * @param {number} column 
     * @param {number} players 
     */
    verifyWinDiagonal : function(line,column,players) {
        var counter = 1;
        if((line-1 >=0) && (column+1 <= power4.nbColumn) && power4.puissance4[line-1][column+1] === players){
            counter++;
            if((line-2 >=0) && (column+2 <= power4.nbColumn) && power4.puissance4[line-2][column+2] === players){
                counter++;
                if((line-3 >=0) && (column+3 <= power4.nbColumn) && power4.puissance4[line-3][column+3] === players){
                    counter++;
                }
            }
        }
        if((line+1 < power4.nbLine) && (column-1 >= 0) && power4.puissance4[line+1][column-1] === players){
            counter++;
            if((line+2 < power4.nbLine) && (column-2 >= 0) && power4.puissance4[line+2][column-2] === players){
                counter++;
                if((line+3 < power4.nbLine) && (column-3 >= 0) && power4.puissance4[line+3][column-3] === players){
                    counter++;
                }
            }
        }
        // if(((line-1 >=0) && (column+1 <= power4.nbColumn) && power4.puissance4[line-1][column+1] === players) || ((line+1 < power4.nbLine) && (column-1 >= 0) && power4.puissance4[line+1][column-1] === players)) {
        //     counter++;
        //     if(((line-2 >=0) && (column+2 <= power4.nbColumn) && power4.puissance4[line-2][column+2] === players) || ((line+2 < power4.nbLine) && (column-2 >= 0) && power4.puissance4[line+2][column-2] === players)) {
        //         counter++;
        //         if(((line-3 >=0) && (column+3 <= power4.nbColumn) && power4.puissance4[line-3][column+3] === players) || ((line+3 < power4.nbLine) && (column-3 >= 0) && power4.puissance4[line+3][column-3] === players)) {
        //             counter++;
        //         }
        //     }
        // }
        if( counter > 3 ) return true;
        counter = 1;
        if((line-1 >=0) && (column-1 >= 0) && power4.puissance4[line-1][column-1] === players){
            counter++;
            if((line-2 >=0) && (column-2 >= 0) && power4.puissance4[line-2][column-2] === players){
                counter++;
                if((line-3 >=0) && (column-3 >= 0) && power4.puissance4[line-3][column-3] === players){
                    counter++;
                }
            }
        }
        if((line+1 < power4.nbLine) && (column+1 <= power4.nbColumn) && power4.puissance4[line+1][column+1] === players){
            counter++;
            if((line+2 < power4.nbLine) && (column+2 <= power4.nbColumn) && power4.puissance4[line+2][column+2] === players){
                counter++;
                if((line+3 < power4.nbLine) && (column+3 <= power4.nbColumn) && power4.puissance4[line+3][column+3] === players){
                    counter++;
                }
            }
        }
        // if(((line-1 >=0) && (column-1 >= 0) && power4.puissance4[line-1][column-1] === players) || ((line+1 < power4.nbLine) && (column+1 <= power4.nbColumn) && power4.puissance4[line+1][column+1] === players)) {
        //     counter++;
        //     if(((line-2 >=0) && (column-2 >= 0) && power4.puissance4[line-2][column-2] === players) || ((line+2 < power4.nbLine) && (column+2 <= power4.nbColumn) && power4.puissance4[line+2][column+2] === players)) {
        //         counter++;
        //         if(((line-3 >=0) && (column-3 >= 0) && power4.puissance4[line-3][column-3] === players) || ((line+3 < power4.nbLine) && (column+3 <= power4.nbColumn) && power4.puissance4[line+3][column+3] === players)) {
        //             counter++;
        //         }
        //     }
        // }

        if( counter > 3 ) return true;
    },

    /**
     * permet de définir un poid de base pour chaque case
     * @param {number} line 
     * @param {number} column 
     */
    getDefaultWeight : function(line,column) {
        var weightLine = 0;
        var weightColumn = 0;
        switch(line) {
            case 0 : weightLine = 1;
            break;
            case 1 : weightLine = 2;
            break;
            case 2 : weightLine = 3;
            break;
            case 3 : weightLine = 4;
            break;
            case 4 : weightLine = 3;
            break;
            case 5 : weightLine = 2;
            break;
        }
        switch(column) {
            case 0 : weightColumn = 1;
            break;
            case 1 : weightColumn = 2;
            break;
            case 2 : weightColumn = 3;
            break;
            case 3 : weightColumn = 3;
            break;
            case 4 : weightColumn = 3;
            break;
            case 5 : weightColumn = 2;
            break;
            case 6 : weightColumn = 1;
            break;
        }
        return weightColumn * weightLine;
    },

    /**
     * permet a l'ia de se défendre et d'attaquer
     * @param {number} line 
     * @param {number} column 
     * @param {number} players 
     */
    defenseAndAttack : function(line,column,players) {
        var counter = 1;
        if(power4.puissance4[line][column+1] === players) {
            counter++;
            if(power4.puissance4[line][column+2] === players && power4.puissance4[line][column+3] === 0) counter++;
        }

        if(power4.puissance4[line][column-1] === players) {
            counter++;
            if(power4.puissance4[line][column-2] === players && power4.puissance4[line][column-3] === 0) counter++;
        }
        // if((power4.puissance4[line][column+1] === players) || (power4.puissance4[line][column-1] === players)) {
        //     counter++;
        //     if((power4.puissance4[line][column+2] === players && power4.puissance4[line][column+3] === 0) || (power4.puissance4[line][column-2] === players && power4.puissance4[line][column-3] === 0)) counter++;
        // }
           
        if(counter > 2) return true;
    },

    /**
     * éviter de faire un coup perdant
     * @param {number} line 
     * @param {number} column 
     * @param {number} players 
     */
    avoidLosingTurn : function(line,column,players) {
        if(line-1 > 0) {
            if(this.verifyWin(line-1,column,1)) return true;  
        }
    }

}
var power4 = {
    puissance4: [],
    nbColumn: 7,
    nbLine: 6,
    playerOneChar: "x",
    playerTwoChar: "o",

    // initialise le jeux
    init: function() {
        this.puissance4 = this.initTab(this.nbLine, this.nbColumn, 0);
    },

    /**
     * permet d'initialiser un tab en fonction des ligne et des colonnes
     * @param {number} nbLine 
     * @param {number} nbColumn
     * @param {*} char 
     */
    initTab: function(nbLine, nbColumn, char = '') {
        var tab = [];
        for (var i = 0; i < nbLine; i++) {
            var line = [];
            for (var j = 0; j < nbColumn; j++) {
                line.push(char);
            }
            tab.push(line);
        }
        return tab;
    },

    //affiche un tableau de puissance 4
    displayTab: function () {
        const gamePower4 = document.querySelector("#power4");
        gamePower4.innerHTML = "";

        var content = "<table id='tabPower4'>";
        for(var i = 0; i < this.nbLine;i++) {
            content += "<tr>";
            for(var j = 0; j < this.nbColumn; j++) {
                content += "<td class='case'>";
                if(this.puissance4[i][j] === 0) {
                    content += "";
                } else if(this.puissance4[i][j] === 1) {
                    content += "<img src='app/public/images/battleship/J1.png' class='imgPlayers1'>";
                } else if(this.puissance4[i][j] === 2) {
                    content += "<img src='app/public/images/battleship/J2.png' class='imgPlayers2'>";
                }
                content += "</td>";
            }
            content += "</tr>";
        }
        content += "<tr id='blockButton'>";
            content += "<td><button class='btnPower4' onClick='playing(0)'>Colonne 1</button></td>";
            content += "<td><button class='btnPower4' onClick='playing(1)'>Colonne 2</button></td>";
            content += "<td><button class='btnPower4' onClick='playing(2)'>Colonne 3</button></td>";
            content += "<td><button class='btnPower4' onClick='playing(3)'>Colonne 4</button></td>";
            content += "<td><button class='btnPower4' onClick='playing(4)'>Colonne 5</button></td>";
            content += "<td><button class='btnPower4' onClick='playing(5)'>Colonne 6</button></td>";
            content += "<td><button class='btnPower4' onClick='playing(6)'>Colonne 7</button></td>";
        content += "</tr>";
        content += "</table>";
        gamePower4.innerHTML = content;
    },

    // permet de jouer une case
    playCase: function(players, line, column) {
        this.puissance4[line][column] = players;
    },

    /**
     * fonction permettant de retourner la premiere ligne vide d'une colonne
     * retourne -1 si la colonne est pleine
     * @param {Number} column 
     */
    returnLineCaseEmpty: function (column) {
        for (var i = this.nbLine - 1; i >= 0; i--) {
            if (this.verifyCaseEmpty(i, column)) return i;
        }
        return -1;
    },

    /**
     * Fonction premettant de retourner si une case est vide
     * @param {number} line 
     * @param {number} column 
     */
    verifyCaseEmpty: function (line, column) {
        return this.puissance4[line][column] === 0;
    },

    /**
     * fonction permettant de vérifier si un joueur a gagné 
     * @param {number} players 
     */
    verifyEndGame: function (players) {
        if (this.verifyLineEndGame(players) || this.verifyColumnEndGame(players) ||
            this.verifyDiagonalEndGame(players)) {
            return true;
        }
        return false;
    },

    /**
     * fonction permettant de vérifier si un joueur a gagné sur une ligne
     * @param {number} players 
     */
    verifyLineEndGame: function (players) {
        for (var i = this.nbLine - 1; i >= 0; i--) {
            for (var j = 0; j < this.nbColumn - 3; j++) {
                if (this.puissance4[i][j] === players &&
                    this.puissance4[i][j + 1] === players &&
                    this.puissance4[i][j + 2] === players &&
                    this.puissance4[i][j + 3] === players
                ) return true;
            }
        }
        return false;
    },

    /**
     * fonction permettant de vérifier si un joueur a gagné sur une colonne
     * @param {number} players 
     */
    verifyColumnEndGame: function (players) {
        for (var i = 0; i < this.nbColumn; i++) {
            for (var j = this.nbLine - 4; j >= 0; j--) {
                if (this.puissance4[j][i] === players &&
                    this.puissance4[j + 1][i] === players &&
                    this.puissance4[j + 2][i] === players &&
                    this.puissance4[j + 3][i] === players
                ) return true;
            }
        }
    },

    
    // verifyDiagonalEndGame: function (players) {
    //     for (var i = this.nbLine - 1; i >= 3; i--) {
    //         for (var j = 0; j < this.nbColumn; j++) {
    //             if (this.puissance4[i][j] === players &&
    //                 this.puissance4[i - 1][j + 1] === players &&
    //                 this.puissance4[i - 2][j + 2] === players &&
    //                 this.puissance4[i - 3][j + 3] === players
    //             ) return true;
    //             if (this.puissance4[i][j] === players &&
    //                 this.puissance4[i - 1][j - 1] === players &&
    //                 this.puissance4[i - 2][j - 2] === players &&
    //                 this.puissance4[i - 3][j - 3] === players
    //             ) return true;
    //         }
    //     }
    //     return false;
    // },


    /**
     * fonction permettant de vérifier si un joueur a gagné sur une diagonale
     * @param {number} players 
     */
    verifyDiagonalEndGame: function (players) {
        for (var i = this.nbLine - 1; i >= 3; i--) {
            for (var j = 0; j < this.nbColumn; j++) {
                if(this.verifyDiag(i, j, players)) { return true };
                if(this.verifyDiag(i, j, players, true)) { return true };
            }
        }
        return false;
    },

    verifyDiag: function (i, j, players, goBack=false) {
        return(this.puissance4[i][j] === players &&
               this.puissance4[i - 1][goBack ? j - 1 : j + 1] === players &&
               this.puissance4[i - 2][goBack ? j - 2 : j + 2] === players &&
               this.puissance4[i - 3][goBack ? j - 3 : j + 3] === players);
    }
}
const turnPower4 = document.getElementById("turnPower4");
const success = document.getElementById("successPower4");
const messagej1Power4 = document.getElementById("j1");
const messagej2Power4 = document.getElementById("j2");
var playerTurn = 1;
var endGame = false;

var scoreJ1 = 0;
var scoreJ2 = 0;

var iaOn = false;

initTabPower4();

// fonction premettant de jouer 
function playCasePower4(column) { 
    if(!endGame) {
        var lineEmpty = power4.returnLineCaseEmpty(column);
        if(lineEmpty !== -1) {
            power4.playCase(playerTurn, lineEmpty, column);
            power4.displayTab();
            if(power4.verifyEndGame(playerTurn)) {
                manageEndGamePower4();
            }

            if(playerTurn === 1) {
                playerTurn = 2;
                turnPower4.innerHTML = "Tour du joueur 2";
            } else {
                playerTurn = 1;
                turnPower4.innerHTML = "Tour du joueur 1";
            }  
        }  
    }   
}

// initialise le tableau
function initTabPower4() {
    endGame = false;
    playerTurn = 1;
    success.style.display = "none";
    var contentJ1 = "<img src='app/public/images/battleship/J1.png' class='imgPlayers1'><br>";
    contentJ1 += scoreJ1;
    messagej1Power4.innerHTML = contentJ1;

    var contentJ2 = "<img src='app/public/images/battleship/J2.png' class='imgPlayers2'><br>";
    contentJ2 += scoreJ2;
    messagej2Power4.innerHTML = contentJ2;

    power4.init();
    power4.displayTab();
}

// gere la fin du jeux
function manageEndGamePower4() {
    endGame = true;
    success.style.display = "block";
    success.innerHTML = "<p id='msgSuccess'>Partie terminé le gagnant est : J" + playerTurn + "</p>";
    success.innerHTML += "<button type='button' class='btnPower4' onclick='initTabPower4()'>Restart</button> ";
    if(playerTurn===1) {
        scoreJ1++;
    } else {
        scoreJ2++;
    }
}

// demarre l'IA
function startIA() {
    iaOn = !iaOn;
}

// permet a l'ia de jouer
function playing(column) {
    playCasePower4(column);
    if(iaOn) {
       
        columnIA = IA.columnChoice();
        playCasePower4(columnIA);
    }
}