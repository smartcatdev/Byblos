<?php
/*
 * Template Name: No Sidebar
 */
get_header();
?>

<div id="content" class="site-content site-content-wrapper">
    <?php while (have_posts()) : the_post(); ?>
        <?php // get_template_part('content', 'page'); ?>
        <div class="page-content">
            <article class="col-md-12 item-page">
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

        </div>

    <?php endwhile; // end of the loop.   ?>
    <?php get_footer(); ?>
</div>


