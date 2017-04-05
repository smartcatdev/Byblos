<?php
/*
 * Theme homepage
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
$byblos_options = byblos_get_options();
get_header(); ?>

<div class="site-content-wrapper">
    <div id="content">

        <?php echo byblos_slider(); ?>
        
        <?php do_action( 'byblos_homepage_banner_below' ); ?>
        
        <?php if ( $byblos_options['sc_cta_bool'] == 'yes' ) : ?>
        
            <?php do_action( 'byblos_call_out_boxes' ); ?>
            
        <?php endif; ?>
        
        <?php do_action( 'byblos_homepage_widget_areas_a_b' ); ?>
        
        <?php if ('posts' == get_option('show_on_front')) : ?>
        
            <script>

                jQuery(document).ready(function($){
                    
                    /*
                    * Handle Blog Roll Masonry
                    */
                    function doMasonry() {

                        var $grid = $( ".item-home .inner" ).imagesLoaded(function () {
                            $grid.masonry({
                                itemSelector: '.item-post',
                                columnWidth: '.grid-sizer',
                                percentPosition: true,
                                gutter: '.gutter-sizer',
                                transitionDuration : '.75s',
                            });
                        });

                        if ( $( window ).width() >= 992 ) {  

                            $('.item-home .inner .gutter-sizer').css('width', '2%');
                            $('.item-home .inner .grid-sizer').css('width', '32%');
                            $('.item-home .inner .item-post').css('width', '32%');

                        } else if ( $( window ).width() < 992 && $( window ).width() >= 768 ) {

                            $('.item-home .inner .gutter-sizer').css('width', '2%');
                            $('.item-home .inner .grid-sizer').css('width', '48%');
                            $('.item-home .inner .item-post').css('width', '48%');

                        } else {

                            $('.item-home .inner .gutter-sizer').css('width', '0%');
                            $('.item-home .inner .grid-sizer').css('width', '100%');
                            $('.item-home .inner .item-post').css('width', '100%');

                        }

                    }

                    /**
                    * Call Masonry on window resize and load
                    */
                    $( window ).resize( function() {
                        doMasonry();
                    });
                    doMasonry();

                }); 

            </script>
            
        <?php endif; ?>
        
        <div class="col-md-<?php echo bylbos_get_width(); ?> item-home">
            
            <?php if ('posts' == get_option('show_on_front')) : ?>
                
                <div class="inner">
                    <div class="grid-sizer"></div>
                    <div class="gutter-sizer"></div>
                    
            <?php endif; ?>
            
            <?php while (have_posts()) : the_post(); ?>
                <?php
                if ('posts' == get_option('show_on_front')) :
                    get_template_part('content', 'posts');
                else :
                    get_template_part('content', 'home');
                endif;
                // If comments are open or we have at least one comment, load up the comment template
                if (comments_open() || '0' != get_comments_number()) :
                    comments_template();
                endif;
                ?>
            <?php endwhile; // end of the loop.   ?>
            
            <?php if ('posts' == get_option('show_on_front')) : ?>
                
                </div>
                
            <?php endif; ?>
                    
        </div>

        <?php if( is_active_sidebar('sidebar-1') ) : ?>
            <div class="col-md-3 byblos-sidebar">
                <?php get_sidebar(); ?>
            </div>
        <?php endif; ?>
            
        <div class="clear"></div>
            
        <?php do_action( 'byblos_homepage_widget_area_c' ); ?>

    </div>
    <?php get_footer(); ?>
</div>

