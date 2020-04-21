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

$('.imgAbout1').hideElement('.imgAbout1','.paraAbout1','.imgAbout2');
$('.imgAbout3').hideElement('.imgAbout3','.paraAbout2','.imgAbout4');
$('.imgAbout5').hideElement('.imgAbout5','.paraAbout3','.imgAbout6');

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

$('.imgAbout2').displayElement('.imgAbout2','.paraAbout1','.imgAbout1');
$('.imgAbout4').displayElement('.imgAbout4','.paraAbout2','.imgAbout3');
$('.imgAbout6').displayElement('.imgAbout6','.paraAbout3','.imgAbout5');