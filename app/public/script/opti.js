function Counter(id, index, speed, limit) {
    var counterId = document.getElementById(id);
    var timer;
    this.count = count();

    function count() {
        if (index === limit) {
            clearTimeout(timer);
        } else {
            counterId.innerHTML = index;
            index++;
            setTimeout(count, speed);
        }
    }

}

new Counter('c1', 0, 25, 100);
new Counter('c2', 0, 50, 50);
new Counter('c3', 0, 100, 24);

function burger() {
    var menu = document.getElementById("nav");
    if(menu.style.display==""){menu.style.display="block"};
    if (menu.style.display=="none") {menu.style.display="block" ; }
    else {menu.style.display="none" ;}
}

(function($) {
    $.fn.hideElement = function(event,element,element2) {
        $(event).click(function() {
            $(element).hide("slide", {direction: "right"}, 1000, function() {
                $(event).hide("slide", {direction: "left"}, 1000, function() {
                    $(element2).show(1000)
                }); 
            });
        });
    };
})(jQuery);

$('.imgAbout1').hideElement('.imgAbout1','.contentAbout1','.imgAbout2');
$('.imgAbout3').hideElement('.imgAbout3','.contentAbout2','.imgAbout4');
$('.imgAbout5').hideElement('.imgAbout5','.contentAbout3','.imgAbout6');
$('.imgAbout5').hideElement('.imgAbout7','.contentAbout4','.imgAbout8');

(function($) {
    $.fn.displayElement = function(event,element,element2) {
        $(event).click(function() {
            $(element).show("slide", {direction: "left"}, 1000, function() {
                $(event).hide("slide", {direction: "left"}, 1000, function() {
                    $(element2).show(1000)
                });
            });
        });
    };
})(jQuery);

$('.imgAbout2').displayElement('.imgAbout2','.contentAbout1','.imgAbout1');
$('.imgAbout4').displayElement('.imgAbout4','.contentAbout2','.imgAbout3');
$('.imgAbout6').displayElement('.imgAbout6','.contentAbout3','.imgAbout5');
$('.imgAbout6').displayElement('.imgAbout8','.contentAbout4','.imgAbout7');

// script pout la boite modal connect
$("#btnModalConnect").click(function () {
    $("#modalConnect").show(500, function () {
        $("#modalConnect").css("display", "block")
    });
});

$("#closeConnect").click(function () {
    $("#modalConnect").hide(400, function () {
        $("#modalConnect").css("display", "none")
    });
});

// regex
var regName = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
var regMdp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,10}/;
var regMail = /^[a-zA-Z0-9.-]+@[a-z0-9.-]+.[com|fr]{2,4}$/;

// variable modal connect
var btnConnect = document.getElementById('btnSubConnect');
var pseudoConnect = document.getElementById('pseudoConnect');
var forgetPseudoConnect = document.getElementById('forgetPseudoConnect');
var passwordConnect = document.getElementById('passwordConnect');
var forgetPasswordConnect = document.getElementById('forgetPasswordConnect');

// variable page register
var btnRegister = document.getElementById('btnSubRegister');
var emailRegister = document.getElementById('emailRegister');
var forgetEmailRegister = document.getElementById('forgetEmailRegister');
var pseudoRegister = document.getElementById('firstNameRegister');
var forgetPseudoRegister = document.getElementById('forgetPseudoRegister');

var passwordRegister = document.getElementById('passwordRegister');
var forgetPasswordRegister = document.getElementById('forgetPasswordRegister');
var verifyPasswordRegister = document.getElementById('verifyPasswordRegister');
var forgetPassConfRegister = document.getElementById('forgetPassConfRegister');

// variable page contact
var btnContact = document.getElementById('btnSubContact');
var pseudoContact = document.getElementById('firstNameContact');
var forgetPseudoContact = document.getElementById('forgetPseudoContact');
var emailContact = document.getElementById('emailContact');
var forgetEmailContact = document.getElementById('forgetEmailContact');

// variable page settings section info
var btnModifyInfo = document.getElementById('btnModifyInfo');
var emailModify = document.getElementById('changeEmail');
var forgetNewEmail = document.getElementById('forgetNewEmail');
var newPseudo = document.getElementById('newPseudo');
var forgetNewPseudo = document.getElementById('forgetNewPseudo');

// variable page settings section password
var btnSubPass = document.getElementById('btnSubPass');

var forgetOldPassword = document.getElementById('forgetOldPassword');


var forgetNewPassword = document.getElementById('forgetNewPassword');

var forgetNewPassConf = document.getElementById('forgetNewPassConf');


// fonction regex qui gère tout les formulaire
function regex(name, value, span, regex) {
    if (value.valueMissing) {
        event.preventDefault();
        span.textContent = name  + ' manquant'
    } else if (regex.test(value.value) == false) {
        event.preventDefault();
        span.textContent = name + ' incorrect';    
    }
}

// vérifie si le mot de passe et le mot de passe de confirmation sont bien identique
function passwordConf(password,verify,span) {
    if (password !== verify) {
        event.preventDefault();
        span.textContent = 'Les mot de passe ne sont pas identiques';
        
    }
}

// gère la modal connect
btnConnect.addEventListener("click", function(event){
    if (event) {
        regex('Pseudo',pseudoConnect,forgetPseudoConnect,regName);
        // !!!! à décommenter après l'insertion de vrai contenu !!!!!
        // regex('Mot de passe',passwordConnect,forgetPasswordConnect,regMdp);
    }
})

if (btnModifyInfo === null && btnContact === null) {
    // gère la page register
    btnRegister.addEventListener("click", function(event) {
        if (event) {
            regex('Email',emailRegister,forgetEmailRegister,regMail);
            regex('Pseudo',pseudoRegister,forgetPseudoRegister,regName);
    
            var verifyPassRegister = document.getElementById('passwordRegister').value;
            var verifyPassConfRegister = document.getElementById('verifyPasswordRegister').value;
    
            regex('Mot de passe',verifyPassRegister,forgetPasswordRegister,regMdp);
            regex('Mot de passe de confirmation',verifyPassConfRegister,forgetPassConfRegister,regMdp);
            passwordConf(verifyPassRegister,verifyPassConfRegister,forgetPassConfRegister);
        }
    })
}

if (btnRegister === null && btnModifyInfo === null) {
    // gère la page contact
    btnContact.addEventListener("click", function(event) {
        if (event) {
            regex('Pseudo',pseudoContact,forgetPseudoContact,regName);
            regex('Email',emailContact,forgetEmailContact,regMail);
        }
    })
} else if (btnContact === null && btnRegister === null) {
    // gère la page settings (info)
    btnModifyInfo.addEventListener("click", function(event) {
        if (event) {
            regex('Email',emailModify,forgetNewEmail,regMail);
            regex('Pseudo',newPseudo,forgetNewPseudo,regName)
        }
    })
    // gère la page settings (password)
    btnSubPass.addEventListener("click", function(event) {
        if (event) {
            var oldPassword = document.getElementById('oldPassword');
            var newPassword = document.getElementById('newPassword');
            var verifyNewPassword = document.getElementById('verifyNewPassword');

            var verifyPass = document.getElementById('newPassword').value;
            var passVerify = document.getElementById('verifyNewPassword').value;

            regex('Ancien mot de passe',oldPassword,forgetOldPassword,regMdp);
            regex('Nouveau mot de passe',newPassword,forgetNewPassword,regMdp);
            regex('Mot de passe de confirmation',verifyNewPassword,forgetNewPassConf,regMdp);
            passwordConf(verifyPass,passVerify,forgetNewPassConf);
        }
    })
}

window.onload = function () {
    startSnake();    
}

var canvasWidth = 900; //taille du canvas
var canvasHeight = 500; //taille du canvas
var blockSize = 30; //taille d'un block
var ctx;
var delay = 100; //delay de rafraichissement de la page
var snakee;
var applee;
var widthInBlocks = canvasWidth / blockSize;
var heightInBlocks = canvasHeight / blockSize;
var score;
var timeout;

//démarre le jeu    
function startSnake() {
    canvas = document.createElement('canvas'); //crée l'element canvas
    canvas.width = canvasWidth;
    canvas.height = canvasHeight;
    canvas.style.border = "25px solid #545454";
    canvas.style.backgroundColor = "#ddd";
    document.getElementById("snake").appendChild(canvas); //fixe le canvas a mon main
    ctx = canvas.getContext('2d'); //indique le contexte
    ctx.font = "bold 70px Verdana";
    ctx.fillStyle = "#000";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.strokeStyle = "white";
    ctx.lineWidth = 5;
    var centerX = canvasWidth / 2;
    var centerY = canvasHeight / 2;
    ctx.strokeText("Game Over", centerX, centerY - 180);
    ctx.fillText("Game Over", centerX, centerY - 180);
    ctx.font = "bold 30px Verdana";
    ctx.strokeText("Appuyer sur la touche entrée pour jouer", centerX, centerY - 120);
    ctx.fillText("Appuyer sur la touche entrée pour jouer", centerX, centerY - 120);
    ctx.restore();
}

// initialise le jeux
function init() {
    canvas = document.createElement('canvas'); //crée l'element canvas
    canvas.width = canvasWidth;
    canvas.height = canvasHeight;
    canvas.style.border = "25px solid #545454";
    canvas.style.backgroundColor = "#ddd";
    document.getElementById("snake").appendChild(canvas); //fixe le canvas a mon main
    ctx = canvas.getContext('2d'); //indique le contexte
    //creer un serpent avec 3 block placé en fonction de x et y
    snakee = new Snake([
        [6, 4],
        [5, 4],
        [4, 4]
    ], 'right');
    applee = new Apple([10, 10]);
    score = 0;
    refreshCanvas(); //appel la fonction refresh
}

function refreshCanvas() {
    //appelle la méthode advance
    snakee.advance();
    if (snakee.checkCollision()) {
        gameOver();
    } else {
        if (snakee.isEatingApple(applee)) {
            score++;
            snakee.ateApple = true;
            do{
                applee.setNewPosition();
            }
            while(applee.isOnSnake(snakee))
        }
        ctx.clearRect(0, 0, canvasWidth, canvasHeight); //efface le contenu
        //appelle la méthode draw
        drawScore();
        snakee.draw();
        applee.draw();
        //refresh le canvas toute les 100 miliseconde
        timeout = setTimeout(refreshCanvas, delay);
    }
}

//game over
function gameOver() {
    ctx.save();
    ctx.font = "bold 70px Verdana";
    ctx.fillStyle = "#000";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.strokeStyle = "white";
    ctx.lineWidth = 5;
    var centerX = canvasWidth / 2;
    var centerY = canvasHeight / 2;
    ctx.strokeText("Game Over", centerX, centerY - 180);
    ctx.fillText("Game Over", centerX, centerY - 180);
    ctx.font = "bold 30px Verdana";
    ctx.strokeText("Appuyer sur la touche entrée pour rejouer", centerX, centerY - 120)
    ctx.fillText("Appuyer sur la touche entrée pour rejouer", centerX, centerY - 120)
    ctx.restore();
}

//relance le jeux
function restart() {
    snakee = new Snake([
        [6, 4],
        [5, 4],
        [4, 4]
    ], 'right');
    applee = new Apple([10, 10]);
    score = 0;
    clearTimeout(timeout);
    refreshCanvas();    
}

//affiche le score
function drawScore() {
    ctx.save();
    ctx.font = "bold 200px Verdana";
    ctx.fillStyle = "#545454";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    var centerX = canvasWidth / 2;
    var centerY = canvasHeight / 2;
    ctx.fillText(score.toString(), centerX, centerY);
    ctx.restore();
} 

//déssine un block
function drawBlock(ctx, position) {
    var x = position[0] * blockSize;
    var y = position[1] * blockSize;
    ctx.fillRect(x, y, blockSize, blockSize);
}

//fonction constructeur
function Snake(body, direction) {
    this.body = body;
    this.direction = direction;
    this.ateApple = false;
    this.draw = function () {
        //sauvegarde le contenu du canvas
        ctx.save();
        ctx.fillStyle = "#ff9d00";
        for (var i = 0; i < this.body.length; i++) {
            //appelle la foction drawBlock
            drawBlock(ctx, this.body[i]);
        }
        ctx.restore();
    }

    // permet a notre serpent de se déplacer
    this.advance = function () {
        //copie un élément de mon Array
        var nextPosition = this.body[0].slice();
        switch (this.direction) {
            case "left":
                nextPosition[0] -= 1;
                break;
            case "right":
                nextPosition[0] += 1;
                break;
            case "down":
                nextPosition[1] += 1;
                break
            case "up":
                nextPosition[1] -= 1;
                break;
            default:
                throw ("Invalid Direction");
        }
        this.body.unshift(nextPosition);
        if (!this.ateApple){
            //supprime le derniere element d'un array
            this.body.pop();
        } else {
            this.ateApple = false;
        }
        
    };

    //réstreint les directions possible
    this.setDirection = function (newDirection) {
        var allowedDirections;
        switch (this.direction) {
            case "left":
            case "right":
                allowedDirections = ["up", "down"];
                break;
            case "down":
            case "up":
                allowedDirections = ["left", "right"];
                break;
            default:
                throw ("Invalid Direction");
        }
        if (allowedDirections.indexOf(newDirection) > -1) {
            this.direction = newDirection;
        }
    };

    //vérifie les collisions
    this.checkCollision = function () {
        var wallCollision = false;
        var snakeCollision = false;
        var head = this.body[0];
        var rest = this.body.slice(1);
        var snakeX = head[0];
        var snakeY = head[1];
        var minX = 0;
        var maxX = widthInBlocks - 1;
        var minY = 0;
        var maxY = heightInBlocks - 1;
        var isNotBetweenHorizontalWalls = snakeX < minX || snakeX > maxX;
        var isNotBetweenVerticalWalls = snakeY < minY || snakeY > maxY;

        //vérifie que le serpent ne s'est pas pris un mur
        if (isNotBetweenHorizontalWalls || isNotBetweenVerticalWalls) {
            wallCollision = true;
        }

        //vérifie si le serpent n'est pas passé sur son propre corp
        for (var i = 0; i < rest.length; i++) {
            if (snakeX === rest[i][0] && snakeY === rest[i][1]) {
                snakeCollision = true;
            }
        }
        return wallCollision || snakeCollision;
    };

    //vérifie si le serpent  manger une pomme
    this.isEatingApple = function(appleToEat) {
        var head = this.body[0];
        if (head[0] === appleToEat.position[0] && head[1] === appleToEat.position[1]) {
            return true;
        }
        else {
            return false;
        }
    };
}

function Apple(position) {
    this.position = position;
    //déssine ma pomme
    this.draw = function () {
        ctx.save();
        ctx.fillStyle = "#1aff1a";
        ctx.beginPath();
        var radius = blockSize / 2;
        var x = this.position[0] * blockSize + radius;
        var y = this.position[1] * blockSize + radius;
        ctx.arc(x, y, radius, 0, Math.PI * 2, true);
        ctx.fill();
        ctx.restore();
    };

    this.setNewPosition = function() {
        var newX = Math.round(Math.random() * (widthInBlocks - 1));
        var newY = Math.round(Math.random() * (heightInBlocks - 1));
        this.position = [newX, newY];
    };
    
    //vérifie si la pomme ne spawn pas sur le serpent
    this.isOnSnake = function(snakeToCheck) {
        var isOnSnake = false;
        for (var i = 0; i < snakeToCheck.body.length; i++) {
            if(this.position[0] === snakeToCheck.body[i][0] && this.position[1] === snakeToCheck.body[i][1]) isOnSnake = true;     
        }
        return isOnSnake;
    }
}

//associe les touches a des directions
document.onkeydown = function handleKeyDown(e) {
    var key = e.keyCode;
    console.log(e.keyCode);
    var newDirection;
    switch (key) {
        case 81:
            newDirection = "left";      //déplacement gauche
            break;
        case 90:
            newDirection = "up";        //déplacement haut
            break;
        case 68:
            newDirection = "right";     //déplacement droite
            break;
        case 83:
            newDirection = "down";      //déplacement bas
            break;
        case 13:
            restart();
            return;
        default:
            return;
    }
    snakee.setDirection(newDirection);
}
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