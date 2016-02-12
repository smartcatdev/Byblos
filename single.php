<?php
/**
 * The Template for displaying all single posts.
 *
 * @package byblos
 */
get_header(); ?>

<div id="content" class="site-content site-content-wrapper">
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-content">
            <article class="col-md-9 item-page <?php echo of_get_option('sc_single_layout'); ?>">
                <h2 class="post-title"><?php the_title(); ?></h2>
                <div class="byblos-underline"></div>
                <?php
                'on' == of_get_option('sc_single_featured', 'on') ? the_post_thumbnail('large') : '';
                the_content();
                echo 'on' == of_get_option('sc_single_date', 'on') ? 'Posted on: ' .  esc_html( get_the_date() ) : '';
                echo 'on' == of_get_option('sc_single_author', 'on') ? ', by : ' . esc_attr(get_the_author() ) : '';
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . __('Pages:', 'byblos'),
                    'after' => '</div>',
                ));
                if (comments_open() || '0' != get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </article>
            <?php if( 'col2r' == of_get_option('sc_single_layout', 'col2r')) : ?>
            <div class="col-md-3 byblos-sidebar">
                <?php get_sidebar(); ?>
            </div>
            <?php endif; ?>
        </div>
    <?php endwhile; // end of the loop. ?>

</div><!-- #primary -->

<?php get_footer(); ?>