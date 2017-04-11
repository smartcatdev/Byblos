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
            
            <i class="fa fa-exclamation-triangle icon404"></i>

            <h2>
                <?php echo esc_html( get_theme_mod( 'byblos_error_page_heading', __( 'Oops!', 'byblos' ) ) ); ?>
            </h2>

            <h3 class="page-subtitle">
                <?php echo esc_html( get_theme_mod( 'byblos_error_page_subheading', __( 'It looks like nothing was found at this location, please check the address and try again!', 'byblos' ) ) ); ?>
            </h3>

            <div class="byblos-underline"></div>
            
            <div class="center mt20">
                <?php get_search_form(); ?>
            </div>
            
        </article>
        <div class="col-md-3 byblos-sidebar">
            <?php get_sidebar(); ?>
        </div>
        <div class="clear"></div>
    </div>
    
    <?php get_footer(); ?>
    