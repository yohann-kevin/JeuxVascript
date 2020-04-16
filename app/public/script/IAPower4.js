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
        // if(power4.puissance4[line][column + 1] === players) {
        //     counter++;
        //     if(power4.puissance4[line][column + 2] === players) {
        //         counter++;
        //         if(power4.puissance4[line][column + 3] === players) {
        //             counter++;
        //         }
        //     }
        // }
        // if(power4.puissance4[line][column - 1] === players) {
        //     counter++;
        //     if(power4.puissance4[line][column - 2] === players) {
        //         counter++;
        //         if(power4.puissance4[line][column - 3] === players) {
        //             counter++;
        //         }
        //     }
        // }
        if(power4.puissance4[line][column + 1] === players || power4.puissance4[line][column - 1] === players) {
            counter++;
            if(power4.puissance4[line][column + 2] === players || power4.puissance4[line][column - 2] === players) {
                counter++;
                if(power4.puissance4[line][column + 3] === players || power4.puissance4[line][column - 3] === players) {
                    counter++;
                }
            }
        }

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
        // if((line-1 >=0) && (column+1 <= power4.nbColumn) && power4.puissance4[line-1][column+1] === players){
        //     counter++;
        //     if((line-2 >=0) && (column+2 <= power4.nbColumn) && power4.puissance4[line-2][column+2] === players){
        //         counter++;
        //         if((line-3 >=0) && (column+3 <= power4.nbColumn) && power4.puissance4[line-3][column+3] === players){
        //             counter++;
        //         }
        //     }
        // }
        // if((line+1 < power4.nbLine) && (column-1 >= 0) && power4.puissance4[line+1][column-1] === players){
        //     counter++;
        //     if((line+2 < power4.nbLine) && (column-2 >= 0) && power4.puissance4[line+2][column-2] === players){
        //         counter++;
        //         if((line+3 < power4.nbLine) && (column-3 >= 0) && power4.puissance4[line+3][column-3] === players){
        //             counter++;
        //         }
        //     }
        // }
        if(((line-1 >=0) && (column+1 <= power4.nbColumn) && power4.puissance4[line-1][column+1] === players) || ((line+1 < power4.nbLine) && (column-1 >= 0) && power4.puissance4[line+1][column-1] === players)) {
            counter++;
            if(((line-2 >=0) && (column+2 <= power4.nbColumn) && power4.puissance4[line-2][column+2] === players) || ((line+2 < power4.nbLine) && (column-2 >= 0) && power4.puissance4[line+2][column-2] === players)) {
                counter++;
                if(((line-3 >=0) && (column+3 <= power4.nbColumn) && power4.puissance4[line-3][column+3] === players) || ((line+3 < power4.nbLine) && (column-3 >= 0) && power4.puissance4[line+3][column-3] === players)) {
                    counter++;
                }
            }
        }
        if( counter > 3 ) return true;
        counter = 1;
        // if((line-1 >=0) && (column-1 >= 0) && power4.puissance4[line-1][column-1] === players){
        //     counter++;
        //     if((line-2 >=0) && (column-2 >= 0) && power4.puissance4[line-2][column-2] === players){
        //         counter++;
        //         if((line-3 >=0) && (column-3 >= 0) && power4.puissance4[line-3][column-3] === players){
        //             counter++;
        //         }
        //     }
        // }
        // if((line+1 < power4.nbLine) && (column+1 <= power4.nbColumn) && power4.puissance4[line+1][column+1] === players){
        //     counter++;
        //     if((line+2 < power4.nbLine) && (column+2 <= power4.nbColumn) && power4.puissance4[line+2][column+2] === players){
        //         counter++;
        //         if((line+3 < power4.nbLine) && (column+3 <= power4.nbColumn) && power4.puissance4[line+3][column+3] === players){
        //             counter++;
        //         }
        //     }
        // }
        if(((line-1 >=0) && (column-1 >= 0) && power4.puissance4[line-1][column-1] === players) || ((line+1 < power4.nbLine) && (column+1 <= power4.nbColumn) && power4.puissance4[line+1][column+1] === players)) {
            counter++;
            if(((line-2 >=0) && (column-2 >= 0) && power4.puissance4[line-2][column-2] === players) || ((line+2 < power4.nbLine) && (column+2 <= power4.nbColumn) && power4.puissance4[line+2][column+2] === players)) {
                counter++;
                if(((line-3 >=0) && (column-3 >= 0) && power4.puissance4[line-3][column-3] === players) || ((line+3 < power4.nbLine) && (column+3 <= power4.nbColumn) && power4.puissance4[line+3][column+3] === players)) {
                    counter++;
                }
            }
        }

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
        // if(power4.puissance4[line][column+1] === players) {
        //     counter++;
        //     if(power4.puissance4[line][column+2] === players && power4.puissance4[line][column+3] === 0) counter++;
        // }

        // if(power4.puissance4[line][column-1] === players) {
        //     counter++;
        //     if(power4.puissance4[line][column-2] === players && power4.puissance4[line][column-3] === 0) counter++;
        // }
        if((power4.puissance4[line][column+1] === players) || (power4.puissance4[line][column-1] === players)) {
            counter++;
            if((power4.puissance4[line][column+2] === players && power4.puissance4[line][column+3] === 0) || (power4.puissance4[line][column-2] === players && power4.puissance4[line][column-3] === 0)) counter++;
        }
           
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