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
        <?php if ( $byblos_options['sc_cta_bool'] == 'yes' ) echo byblos_ctas(); ?>
        
        <div class="col-md-<?php echo bylbos_get_width(); ?> item-home">
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
        </div>

        <?php if( is_active_sidebar('sidebar-1') ) : ?>
            <div class="col-md-3 byblos-sidebar">
                <?php get_sidebar(); ?>
            </div>
        <?php endif; ?>

    </div>
    <?php get_footer(); ?>
</div>

