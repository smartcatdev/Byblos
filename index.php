<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package byblos
 */
get_header();
?>

<div class="site-content-wrapper">
    
    <div id="content" class="blog-content">
    
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
        
        <?php if ( get_theme_mod( 'byblos_sidebar_location_blog', 'right' ) == 'left' && is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div class="byblos-sidebar col-md-3">
                <?php get_sidebar( 'sidebar-1' ); ?>
            </div>
        <?php endif; ?>
        
        <div class="col-md-<?php echo get_theme_mod( 'byblos_sidebar_location_blog', 'right' ) == 'none' || !is_active_sidebar('sidebar-1')? '12' : '9'; ?> site-content item-home">
            
            <div class="inner">
                
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>

                <?php if (have_posts()) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="item-post">
                            <a href="<?php the_permalink(); ?>">
                                <?php if(has_post_thumbnail() ) : the_post_thumbnail('large'); ?>
                                <?php else :  ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/post_image.jpg" class="wp-post-image" />
                                <?php endif; ?>
                                <h2 class="post-title"><?php the_title(); ?></h2>
                            </a>

                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php get_template_part('content', 'none'); ?>
                <?php endif; ?>
            
            </div>
                
        </div>
        
         <?php if ( get_theme_mod( 'byblos_sidebar_location_blog', 'right' ) == 'right' && is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div class="byblos-sidebar col-md-3">
                <?php get_sidebar( 'sidebar-1' ); ?>
            </div>
        <?php endif; ?>  
        
        <?php byblos_paging_nav(); ?>
    </div>

    <div class="clear"></div>
<?php get_footer(); ?>
</div>
