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
        <div class="col-md-<?php echo bylbos_get_width(); ?>  site-content item-page bs_nopad">
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
        
        <div class="col-md-3 byblos-sidebar">
            <?php get_sidebar(); ?>
        </div>
        
        <?php byblos_paging_nav(); ?>
    </div>

    <div class="clear"></div>
<?php get_footer(); ?>
</div>


<script>
jQuery(document).ready(function($){
    $('.site-content-wrapper .site-content').imagesLoaded(function () {
        $('.site-content-wrapper .site-content').masonry({
            itemSelector: '.item-post',
            gutter: 0,
            transitionDuration : 0,
        }).masonry('reloadItems').masonry();	
    }); 
});  
    
</script>