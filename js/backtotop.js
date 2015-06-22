$(function(){		//¦^³»ºÝ«ö¶s
    $("#backtotop").click(function(){
        jQuery("html,body").animate({
            scrollTop:0
        },500);
    });
    $(window).scroll(function() {
		//alert($(this).scrollTop());
        if ( $(this).scrollTop() > 300){
			//alert($(this).scrollTop());
            $("#backtotop").fadeIn("fast");
        } else {
            $("#backtotop").stop().fadeOut("fast");
        }
    });
});