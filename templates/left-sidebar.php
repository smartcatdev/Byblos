<?php
/*
 * Template Name: Left Sidebar
 */
get_header();
?>
<div class="site-content-wrapper">
    <div id="content" class="site-content">
        <?php while (have_posts()) : the_post(); ?>
            <div class="page-content">
                
                <div class="col-md-3 byblos-sidebar">
                    <?php get_sidebar(); ?>
                </div>
                
                <article class="col-md-9 item-page">
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

                <div class="clear"></div>
                
            </div>
        <?php endwhile; // end of the loop.   ?>
    </div>
    <?php get_footer(); ?>
</div>

