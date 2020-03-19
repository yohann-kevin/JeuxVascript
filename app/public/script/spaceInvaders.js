var alien1 = new Sprite("app/public/images/spaceInvaders/alien.png", 100, 50);
var alien2 = new Sprite("app/public/images/spaceInvaders/alien2.png", 300, 50);
var alien3 = new Sprite("app/public/images/spaceInvaders/alien.png", 500, 50);
var alien4 = new Sprite("app/public/images/spaceInvaders/alien2.png", 700, 50);
var alien5 = new Sprite("app/public/images/spaceInvaders/alien.png", 900, 50);
var alien6 = new Sprite("app/public/images/spaceInvaders/alien2.png", 1100, 50);
var alien7 = new Sprite("app/public/images/spaceInvaders/alien.png", 1300, 50);
var alien8 = new Sprite("app/public/images/spaceInvaders/alien2.png", 1500, 50);
var alien9 = new Sprite("app/public/images/spaceInvaders/alien.png", 1700, 50);

var alien10 = new Sprite("app/public/images/spaceInvaders/alien2.png", 200, 150);
var alien11 = new Sprite("app/public/images/spaceInvaders/alien.png", 400, 150);
var alien12 = new Sprite("app/public/images/spaceInvaders/alien2.png", 600, 150);
var alien13 = new Sprite("app/public/images/spaceInvaders/alien.png", 800, 150);
var alien14 = new Sprite("app/public/images/spaceInvaders/alien2.png", 1000, 150);
var alien15 = new Sprite("app/public/images/spaceInvaders/alien.png", 1200, 150);
var alien16 = new Sprite("app/public/images/spaceInvaders/alien2.png", 1400, 150);
var alien17 = new Sprite("app/public/images/spaceInvaders/alien.png", 1600, 150);

var laser = new Sprite("app/public/images/spaceInvaders/laser.png", 500, 500);
laser.display = "none";

var vaisseau = new Sprite("app/public/images/spaceInvaders/vaisseau2.png", document.getElementById("spaceInvaders").clientWidth / 2, document.getElementById("spaceInvaders").clientHeight / 1.1);

document.onkeydown = function (event) {
    if (event.keyCode == 65) { //a = 65  Deplacement haut/gauche
        vaisseau.left -= 10;
        vaisseau.top -= 10;
    } else if (event.keyCode == 90) { //z = 90  Deplacement haut
        vaisseau.top -= 10;
    } else if (event.keyCode == 69) { //e = 69  Deplacement haut/droite
        vaisseau.left += 10;
        vaisseau.top -= 10;
    } else if (event.keyCode == 81) { //q = 81  Deplacement gauche
        vaisseau.left -= 10;
    } else if (event.keyCode == 68) { //d = 68  Deplacement droite
        vaisseau.left += 10;
    } else if (event.keyCode == 87) { //w = 87  Deplacement bas/gauche
        vaisseau.left -= 10;
        vaisseau.top += 10;
    } else if (event.keyCode == 83) { //s = 83  Deplacement bas
        vaisseau.top += 10;
    } else if (event.keyCode == 67) { //c = 67  Deplacement bas/droite
        vaisseau.left += 10;
        vaisseau.top += 10;
    }


    if (vaisseau.left < 0) {
        vaisseau.left = 0;
    }
    if (vaisseau.left > document.getElementById("spaceInvaders").clientWidth - vaisseau._node
        .width) {
        vaisseau.left = document.getElementById("spaceInvaders").clientWidth - vaisseau._node.width;
    }

    if (vaisseau.top < 0) {
        vaisseau.top = 0;
    }
    if (vaisseau.top > document.getElementById("spaceInvaders").clientHeight - vaisseau._node
        .height) {
        vaisseau.top = document.getElementById("spaceInvaders").clientHeight - vaisseau._node
            .height;
    }

    if (event.keyCode == 32) { //espace = 32         tirer
        if (laser.display == "none") {
            laser.display = "block";
            //centre mon laser par rapport a l'axe de mon vaisseau
            laser.left = vaisseau.left + (vaisseau._node.width - laser._node.width) / 2;
            laser.top = vaisseau.top;
            laser.startAnimation(moveLaser, 20);
        }
    }

};

function moveLaser(laser) {
    laser.top -= 10;
    if (laser.top < -70) {
        laser.stopAnimation();
        laser.display = "none";
    }

    for (var i = 1; i <= 17; i++) {
        //récupere mes alien un par un
        var alien = window["alien" + i];
        if (alien.display == "none") continue;
        if (laser.checkCollision(alien)) {
            laser.stopAnimation();
            laser.display = "none";
            alien.stopAnimation();
            alien.display = "none";
        }
    }
};

function moveAlienToLeft(alien) {
    alien.left -= 3;
    if (alien.left <= 0) {
        alien.top += 60;
        alien.startAnimation(moveAlienToRight, 20);
    }
};

function moveAlienToRight(alien) {
    alien.left += 3;

    if (alien.left > document.getElementById("spaceInvaders").clientWidth - alien._node.width) {
        alien.top += 60;
        alien.startAnimation(moveAlienToLeft, 20);
    }
};

for (let i = 1; i <= 9; i++) {
    let alien = window["alien" + i];
    alien.startAnimation(moveAlienToRight, 20);
};

for (let i = 10; i <= 17; i++) {
    let alien = window["alien" + i];
    alien.startAnimation(moveAlienToLeft, 20);
};