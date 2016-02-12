<?php
/*
 * Theme homepage
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
get_header(); ?>

<div class="site-content-wrapper">
    <div id="content">

        <?php if (of_get_option('sc_slider_bool', 'yes') == 'yes') echo byblos_slider(); ?>
        <?php if (of_get_option('sc_cta_bool', 'yes') == 'yes') echo byblos_ctas(); ?>
        <?php //if (of_get_option('sc_banner_bool', 'yes') == 'yes') echo sc_banner(); ?>
        
        <div class="col-md-9 item-home <?php echo of_get_option('sc_homepage_sidebar'); ?>">
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

        <?php if( 'sidebar-on' == of_get_option('sc_homepage_sidebar', 'sidebar-off')) : ?>
        <div class="col-md-3 byblos-sidebar">
            <?php get_sidebar(); ?>
        </div>
        <?php endif; ?>        

    </div>
    <?php get_footer(); ?>
</div>

