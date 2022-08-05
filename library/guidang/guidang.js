 jQuery(document).ready(function($) {
    $(".archive-title-title:first").siblings().css({
        "display" : "block"
    });
    $(".archive-title-title").click(function() {
        if($(this).siblings().is(':hidden')) {
        　　$(this).siblings().show({
                "opacity" : 1,
                "filter" : "Alpha(opacity=100)"
            });
        }
        else{
        　　$(this).siblings().hide({
                "opacity" : 0,
                "filter" : "Alpha(opacity=0)"
            });
        }
    })
});  