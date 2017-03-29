<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package byblos
 */
get_header();
?>

<div id="content" class="site-content site-content-wrapper">
   
    <div class="page-content">
        <article class="col-md-<?php echo bylbos_get_width(); ?> item-page">
            
            <h2 class="post-title"><?php _e('Page Not Found', 'byblos' ); ?></h2>
            
            <div class="byblos-underline"></div>
            
            <?php if (byblos_categorized_blog()) : // Only show the widget if site has multiple categories. ?>
                <div class="error404-content widget widget_categories">
                    <h2 class="widgettitle center">
                        <i class="fa fa-exclamation-triangle icon404"></i>
                        <h3 class="center">Sorry the page you're looking for is not available</h3>
                        <div class="center mt20">
                            <?php get_search_form(); ?>
                        </div>
                    </h2>

                </div><!-- .widget -->
            <?php endif; ?>
            
        </article>
        <div class="col-md-3 byblos-sidebar">
            <?php get_sidebar(); ?>
        </div>
        <div class="clear"></div>
    </div>
    
    <?php get_footer(); ?>
    