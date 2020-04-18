
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

window.onload = function () {
    new Counter('c1', 0, 25, 100);
    new Counter('c2', 0, 50, 50);
    new Counter('c3', 0, 100, 24);
}