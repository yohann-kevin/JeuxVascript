window.onload = function () {

    var canvasWidth = 900; //taille du canvas
    var canvasHeight = 600; //taille du canvas
    var blockSize = 30; //taille d'un block
    var ctx;
    var delay = 100; //delay de rafraichissement de la page
    var snakee;
    var applee;
    var widthInBlocks = canvasWidth / blockSize;
    var heightInBlocks = canvasHeight / blockSize;
    var score;
    var timeout;

    //appelle de fonction
    init();

    function init() {
        canvas = document.createElement('canvas'); //crée l'element canvas
        canvas.width = canvasWidth;
        canvas.height = canvasHeight;
        canvas.style.border = "25px solid #545454";
        canvas.style.backgroundColor = "#ddd";
        document.getElementById("snake").appendChild(canvas); //fixe le canvas a mon main
        ctx = canvas.getContext('2d'); //indique le contexte
        //creer un serpent avec 3 block placé en fonction de x et y
        snakee = new snake([
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
                do {
                    applee.setNewPosition();
                }
                while (applee.isOnSnake(snakee))
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
        ctx.strokeText("Appuyer sur la touche espace pour rejouer", centerX, centerY - 120)
        ctx.fillText("Appuyer sur la touche espace pour rejouer", centerX, centerY - 120)
        ctx.restore();
    }

    //relance le jeux
    function restart() {
        snakee = new snake([
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
    function snake(body, direction) {
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
            if (!this.ateApple) {
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
        this.isEatingApple = function (appleToEat) {
            var head = this.body[0];
            if (head[0] === appleToEat.position[0] && head[1] === appleToEat.position[1]) {
                return true;
            } else {
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

        this.setNewPosition = function () {
            var newX = Math.round(Math.random() * (widthInBlocks - 1));
            var newY = Math.round(Math.random() * (heightInBlocks - 1));
            this.position = [newX, newY];
        };

        //vérifiee si la pomme ne spawn pas sur le serpent
        this.isOnSnake = function (snakeToCheck) {
            var isOnSnake = false;
            for (var i = 0; i < snakeToCheck.body.length; i++) {
                if (this.position[0] === snakeToCheck.body[i][0] && this.position[1] === snakeToCheck.body[i][1]) {
                    isOnSnake = true;
                }
            }
            return isOnSnake;
        }
    }

    //associe les touches a des directions
    document.onkeydown = function handleKeyDown(e) {
        var key = e.keyCode;
        var newDirection;
        switch (key) {
            case 81:
                newDirection = "left"; //déplacement gauche
                break;
            case 90:
                newDirection = "up"; //déplacement haut
                break;
            case 68:
                newDirection = "right"; //déplacement droite
                break;
            case 83:
                newDirection = "down"; //déplacement bas
                break;
            case 32:
                restart();
                return;
            default:
                return;
        }
        snakee.setDirection(newDirection);
    }
}