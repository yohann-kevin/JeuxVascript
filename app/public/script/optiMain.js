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

function burger() {
    var menu = document.getElementById("nav");
    if(menu.style.display==""){menu.style.display="block"};
    if (menu.style.display=="none") {menu.style.display="block" ; }
    else {menu.style.display="none" ;}
}

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