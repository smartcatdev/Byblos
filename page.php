<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package byblos
 */
get_header();
?>

<div id="content" class="site-content site-content-wrapper">
    <?php while (have_posts()) : the_post(); ?>
    
        <?php if (get_post_thumbnail_id($post->ID)) : ?>
            <div id="byblos-page-jumbotron" 
                 class="parallax-window" 
                 data-parallax="scroll"
                 data-image-src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" >

                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header><!-- .entry-header -->

            </div>
        <?php endif; ?>
    
        <div class="page-content">
            <article class="col-md-<?php echo bylbos_get_width(); ?> item-page">
                <h2 class="post-title"><?php the_title(); ?></h2>
                <div class="byblos-underline"></div>
                <?php
                the_content();
                wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'byblos'), 'after' => '</div>'));

                // If comments are open or we have at least one comment, load up the comment template
                if (comments_open() || '0' != get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </article>
            <div class="col-md-3 byblos-sidebar">
                <?php get_sidebar(); ?>
            </div>
            <div class="clear"></div>
        </div>

    <?php endwhile; // end of the loop.   ?>
    <?php get_footer(); ?>
</div>


