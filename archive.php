<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package byblos
 */
get_header();
?>

<div id="content" class="site-content site-content-wrapper">

    <?php if ( have_posts() ) : ?>
        <div class="page-content">
            
            <?php if ( get_theme_mod( 'byblos_sidebar_location_archive', 'right' ) == 'left' && is_active_sidebar( 'sidebar-1' ) ) : ?>
                <div class="byblos-sidebar col-md-3">
                    <?php get_sidebar( 'sidebar-1' ); ?>
                </div>
            <?php endif; ?>
            
            <article class="col-md-<?php echo get_theme_mod( 'byblos_sidebar_location_archive', 'right' ) == 'none' || !is_active_sidebar('sidebar-1')? '12' : '9'; ?>  item-page">

                <h2 class="post-title">

                    <?php
                    if ( is_category() ) :
                        single_cat_title();

                    elseif ( is_tag() ) :
                        single_tag_title();

                    elseif ( is_author() ) :
                        printf( __( 'Author: %s', 'byblos' ), '<span class="vcard">' . get_the_author() . '</span>' );

                    elseif ( is_day() ) :
                        printf( __( 'Day: %s', 'byblos' ), '<span>' . get_the_date() . '</span>' );

                    elseif ( is_month() ) :
                        printf( __( 'Month: %s', 'byblos' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'byblos' ) ) . '</span>' );

                    elseif ( is_year() ) :
                        printf( __( 'Year: %s', 'byblos' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'byblos' ) ) . '</span>' );

                    elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                        _e( 'Asides', 'byblos' );

                    elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                        _e( 'Galleries', 'byblos' );

                    elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                        _e( 'Images', 'byblos' );

                    elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                        _e( 'Videos', 'byblos' );

                    elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                        _e( 'Quotes', 'byblos' );

                    elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                        _e( 'Links', 'byblos' );

                    elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                        _e( 'Statuses', 'byblos' );

                    elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                        _e( 'Audios', 'byblos' );

                    elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                        _e( 'Chats', 'byblos' );

                    else :
                        _e( 'Archives', 'byblos' );

                    endif;
                    ?>
                </h2>
                <div class="byblos-underline"></div>

                <?php
                // Show an optional term description.
                $term_description = term_description();
                if ( !empty( $term_description ) ) :
                    printf( '<div class="taxonomy-description">%s</div>', $term_description );
                endif;
                ?>
                </header><!-- .page-header -->

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );
                    ?>

                <?php endwhile; ?>

                <?php byblos_paging_nav(); ?>

            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>   

        </article>
            
        <?php if ( get_theme_mod( 'byblos_sidebar_location_archive', 'right' ) == 'right' && is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div class="byblos-sidebar col-md-3">
                <?php get_sidebar( 'sidebar-1' ); ?>
            </div>
        <?php endif; ?>    
            
    </div>
</div>
<?php get_footer(); ?>
