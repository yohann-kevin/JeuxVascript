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