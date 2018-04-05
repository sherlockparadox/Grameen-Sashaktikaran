$(document).ready(function(){$(".toggleMenu").click(function(){$(".dropdowns").toggleClass("shows");});});
$(document).ready(function(){$(".darkshadow").click(function(){$(".dropdowns").removeClass("shows");});});
$(document).ready(function(){$(".darkshadow").click(function(){$(".darkshadow").removeClass("shows");});});
$(document).ready(function(){$(".toggleMenu").click(function(){$(".darkshadow").toggleClass("shows");});});
$(document).ready(function(){$("#info2").click(function(){$("#nav-menu1").toggleClass("shows");});});
var Script=function(){jQuery('.nav-menu2 .sub-menu > a').click(function(){var last=jQuery('.sub-menu.open',$('.nav-menu2'));last.removeClass("open");jQuery('.dropdown').addClass("open");jQuery('.dropdown',last).removeClass("open");jQuery('.sub',last).slideUp(300);var sub=jQuery(this).next();if(sub.is(":visible")){jQuery('.dropdown',jQuery(this)).removeClass("open");jQuery(this).parent().removeClass("open");sub.slideUp(300)}else{jQuery('.dropdown',jQuery(this)).addClass("open");jQuery(this).parent().addClass("open");sub.slideDown(300)}var o=($(this).offset());diff=300-o.top;if(diff>0)$(".nav-menu2").scrollTo("-="+Math.abs(diff),500);else $(".nav-menu2").scrollTo("+="+Math.abs(diff),500)})}();
$(function() {
    var ink, d, x, y;
    $(".ripple").click(function(e) {
        if ($(this).find(".ink").length === 0) {
            $(this).prepend("<span class='ink'></span>");
        }
        ink = $(this).find(".ink");
        ink.removeClass("animate");
        if (!ink.height() && !ink.width()) {
            d = Math.max($(this).outerWidth(), $(this).outerHeight());
            ink.css({
                height: d,
                width: d
            });
        }
        x = e.pageX - $(this).offset().left - ink.width() / 2;
        y = e.pageY - $(this).offset().top - ink.height() / 2;
        ink.css({
            top: y + 'px',
            left: x + 'px'
        }).addClass("animate");
    });
});