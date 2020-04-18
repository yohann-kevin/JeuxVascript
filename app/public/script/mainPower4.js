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