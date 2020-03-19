//fonction de construction d'objet
function Sprite(filename, left, top) {
    this._node = document.createElement("img");
    this._node.setAttribute("id", "spaceImg");
    this._node.src = filename;
    this._node.style.position = "absolute";
    // document.body.appendChild( this._node );
    document.getElementById("spaceInvaders").appendChild(this._node);

    //définie ma propriété left qui place mon élément par rapport au left
    Object.defineProperty(this, "left", {
        get: function () {
            return this._left;
        },
        set: function (value) {
            this._left = value;
            this._node.style.left = value + "px";
        }
    });

    //définie ma propriété top qui place mon élément par rapport au top
    Object.defineProperty(this, "top", {
        get: function () {
            return this._top;
        },
        set: function (value) {
            this._top = value;
            this._node.style.top = value + "px";
        }
    });

    //définie ma propriété display pour caché mon élément  
    Object.defineProperty(this, "display", {
        get: function () {
            return this._node.style.display;
        },
        set: function (value) {
            this._node.style.display = value;
        }
    });

    this.left = left;
    this.top = top;

}


//méthode startAnimation
Sprite.prototype.startAnimation = function (fct, interval) {
    if (this._clock) window.clearInterval(this._clock);
    let _this = this;
    this._clock = window.setInterval(function () {
        fct(_this);
    }, interval);
};

//stopAnimation
Sprite.prototype.stopAnimation = function () {
    window.clearInterval(this._clock);
};

//checkCollision je test si il n'y a pas de collision
Sprite.prototype.checkCollision = function (other) {

    return !((this.top + this._node.height < other.top) ||
        this.top > (other.top + other._node.height) ||
        (this.left + this._node.width < other.left) ||
        this.left > (other.left + other._node.width));
};