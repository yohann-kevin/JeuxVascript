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