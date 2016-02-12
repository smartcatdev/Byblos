/**
 * Avenue Script
 * Author Bilal
 * 
 */
jQuery(document).ready(function($) {
    //--Match CTA Boxes height
    
    $(window).scroll(function(){
        if( $('.site-cta').scrollTop() <= $(window).height() ){
            $('.site-cta').css({
                opacity: '1', 
            }).addClass('full-size');
        }
    });
    
    $('.item-post').css({
        opacity : '1',
    }).addClass('full-size');
    
    
    
    matchColHeights('.site-cta');
    if( $(window).width() > 991 ) {
        $('.item-post').hover(function(){
            $('.post-title', this).show().stop(true,false).animate({'bottom':'5px'}, 400);
        },function(){
            $('.post-title', this).stop(true,false).animate({'bottom':'-50px'}, 400, function(){
                $(this).hide();
            });
        });        
    }
    
    

//    matchColHeights('#top-banner #sc_byblos_recent_posts .col-sm-3');

    $('#tasty-mobile-toggle .fa').click(function(){
        var clicker = $(this);
        
        clicker.toggleClass('active');
        $('.menu', '#tasty-mobile-toggle').slideToggle(400);
        
    });


    //------------------- Match Height Function
    function matchColHeights(selector) {
        var maxHeight = 0;
        $(selector).each(function() {
            var height = $(this).height();
            if (height > maxHeight) {
                maxHeight = height;
            }
        });
        $(selector).height(maxHeight);
    }
    
    function resize_slider() {
        var w = $('#main-slider').width();
        $('#slider_container,#slider_container > div').width(w);
    }

    $('.scroll-top').click(function() {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });

    $('.menu-toggle').html('<i class="fa fa-bars fa-lg"></i>');
});