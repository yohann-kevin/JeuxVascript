
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