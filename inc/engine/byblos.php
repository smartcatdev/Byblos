<?php
/**
 * 
 * Byblos GO!
 * In this file, you'll find the main functionality of the theme
 * Feel free to hack away at it and make something nice with it!
 * 
 * 
 */



function byblos_scripts() {
    
    $byblos_options = byblos_get_options();
    $fonts = function_exists('byblos_more_fonts') ? byblos_more_fonts() : byblos_fonts();
    
    
    wp_enqueue_style('byblos-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css', array(), BYBLOS_VERSION);
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), BYBLOS_VERSION);
    wp_enqueue_style('byblos-main-style', get_template_directory_uri() . '/inc/css/style.css', array(), BYBLOS_VERSION);
    
    if( array_key_exists ( $byblos_options['sc_font_family'], $fonts ) ) :
        wp_enqueue_style('byblos-general-font', '//fonts.googleapis.com/css?family=' . $fonts[$byblos_options['sc_font_family']], array(), BYBLOS_VERSION);
    endif;

    
    wp_enqueue_style('byblos-template', get_template_directory_uri() . '/inc/css/temps/' . $byblos_options['sc_theme_color'] . '.css', array(), BYBLOS_VERSION);
    wp_enqueue_style('byblos-slider-style', get_template_directory_uri() . '/inc/css/camera.css', array(), BYBLOS_VERSION);
    


    wp_enqueue_script('byblos-navigation', get_template_directory_uri() . '/js/navigation.js', array(), BYBLOS_VERSION, true);
    wp_enqueue_script('byblos-bootstrapjs', get_template_directory_uri() . '/inc/js/bootstrap.js', array(), BYBLOS_VERSION, true);
    wp_enqueue_script('byblos-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), BYBLOS_VERSION, true);

    wp_enqueue_script('byblos-easing', get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array(), BYBLOS_VERSION, true);
    wp_enqueue_script('byblos-slider', get_template_directory_uri() . '/inc/js/camera.js', array(), BYBLOS_VERSION, true);
    wp_enqueue_script('byblos-masonry', get_template_directory_uri() . '/inc/js/masonry.min.js', array(), BYBLOS_VERSION, true);
    wp_enqueue_script('byblos-parallax', get_template_directory_uri() . '/inc/js/parallax.min.js', array(), BYBLOS_VERSION, true);
    
    wp_enqueue_script('byblos-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery', 'jquery-ui-core'), BYBLOS_VERSION );

    // Define custom JS objects to be passed to the custom script
    $slider_array = array(
        'slide_timer'       => get_theme_mod( 'slide_timer', 5000 ),
        'animation'         => get_theme_mod( 'slide_transition', 'simpleFade' ),
        'pagination'        => get_theme_mod( 'slide_pagination', true ),
        'animation_speed'   => get_theme_mod( 'slide_transition_timer', 1500 ),
        'desktop_height'    => get_theme_mod( 'byblos_slider_height', 100 ), 
        'tablet_height'     => get_theme_mod( 'byblos_jumbotron_tablet_height', 100 ),
        'mobile_height'     => get_theme_mod( 'byblos_jumbotron_mobile_height', 100 ),
        'hover'             => get_theme_mod( 'slide_hover', true ),
    );
    
    // Pass each JS object to the custom script using wp_localize_script
    wp_localize_script( 'byblos-script', 'byblosSlider', $slider_array );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'byblos_scripts');


function byblos_fonts(){
    
    return array(
        
        'Bangers, cursive'              => 'Bangers',
        'Lobster, cursive'              => 'Lobster',
        'Lobster Two, cursive'          => 'Lobster+Two',
        'Josefin Sans, sans-serif'      => 'Josefin+Sans:300,400,600,700',
        'Montserrat, sans-serif'        => 'Montserrat:400,700',
        'Poiret One, cursive'           => 'Poiret+One',
        'Source Sans Pro, sans-serif'   => 'Source+Sans+Pro:200,400,600',
        'Lato, sans-serif'              => 'Lato:100,300,400,700,900,300italic,400italic',
        'Raleway, sans-serif'           => 'Raleway:400,300,500,700',
        'Shadows Into Light, cursive'   => 'Shadows+Into+Light',
        'Orbitron, sans-serif'          => 'Orbitron',
        'PT Sans Narrow, sans-serif'    => 'PT+Sans+Narrow',
        'Lora, serif'                   => 'Lora',
        'Abel, sans-serif'              => 'Abel',
        
    );
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function byblos_widgets_init() {

    register_sidebar(array(
        'name' => __('Footer', 'byblos'),
        'id' => 'sidebar-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="col-sm-4 widget %2$s"><div class="inner">',
        'after_widget' => '</div></aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="byblos-underline"></div>',
    ));
    
    register_sidebar(array(
        'name' => __('Sidebar', 'byblos'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="byblos-underline"></div>',
    ));
    
    register_sidebar(array(
        'name' => __('Vertical Menu Widget', 'byblos'),
        'id' => 'sidebar-header-right',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="hidden">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Homepage Banner', 'byblos'),
        'id' => 'sidebar-banner',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

}
add_action('widgets_init', 'byblos_widgets_init');


add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            jQuery('#example_showhidden').click(function() {
                jQuery('#section-example_text_hidden').fadeToggle(400);
            });

            if (jQuery('#example_showhidden:checked').val() !== undefined) {
                jQuery('#section-example_text_hidden').show();
            }

        });
    </script>
    <?php
}
        
add_action('wp_head', 'byblos_dynamic_css');
function byblos_dynamic_css() {
    $byblos_options = byblos_get_options();
    ?>
    <style type="text/css">
        body{
            font-size: <?php echo esc_attr( $byblos_options['sc_font_size'] ); ?>;
            font-family: <?php echo esc_attr( $byblos_options['sc_font_family'] ); ?>;
        }
        
        input[type="submit"] {
            font-family: <?php echo esc_attr( $byblos_options['sc_font_family'] ); ?>;
        }

    </style>
    <?php
}

function bylbos_get_width(){
    
    $width = 12;
    
    if( is_active_sidebar('sidebar-1') ) :
        $width = 9;
    else :
        $width = 12;
    endif;
    
    
    return $width;
    
}


function byblos_slider() { 
    
    $byblos_options = byblos_get_options();
    
    ?>

    <script>
    
        jQuery(document).ready(function($){

        });

    </script>
    
    <div class="sc-slider-wrapper">
        
	<div class="fluid_container">

            <div class="camera_wrap" id="camera_wrap_1">

                <?php if ('' != $byblos_options['sc_slide1_image'] ) : ?>
                    <div class="camera_inner" data-thumb="<?php echo esc_url( $byblos_options['sc_slide1_image'] ); ?>" data-src="<?php echo esc_url( $byblos_options['sc_slide1_image'] ); ?>">
                        <div class="camera_caption <?php echo get_theme_mod( 'homepage_banner_location', 'over' ) == 'over' ? 'moveFromRight' : 'fadeFromRight'; ?>">
                            <span><?php echo esc_attr( $byblos_options['sc_slide1_text'] );?></span>
                            <?php if ( get_theme_mod( 'homepage_banner_location', 'over' ) == 'below' && get_theme_mod( 'slide_1_button_toggle', 'off' ) == 'on' ) : ?>
                                <a class="slider-button" href="<?php echo get_theme_mod( 'slide_1_button_url', '#' ); ?>">
                                    <?php echo get_theme_mod( 'slide_1_button_label', 'See More' ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ('' != $byblos_options['sc_slide2_image'] ) : ?>
                    <div class="camera_inner" data-thumb="<?php echo esc_url( $byblos_options['sc_slide2_image'] ); ?>" data-src="<?php echo esc_url( $byblos_options['sc_slide2_image'] ); ?>">
                        <div class="camera_caption <?php echo get_theme_mod( 'homepage_banner_location', 'over' ) == 'over' ? 'moveFromRight' : 'fadeFromRight'; ?>">
                            <span><?php echo esc_attr( $byblos_options['sc_slide2_text'] );?></span>
                            <?php if ( get_theme_mod( 'homepage_banner_location', 'over' ) == 'below' && get_theme_mod( 'slide_2_button_toggle', 'off' ) == 'on' ) : ?>
                                <a class="slider-button" href="<?php echo get_theme_mod( 'slide_2_button_url', '#' ); ?>">
                                    <?php echo get_theme_mod( 'slide_2_button_label', 'See More' ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ('' != $byblos_options['sc_slide3_image'] ) : ?>
                    <div class="camera_inner" data-thumb="<?php echo esc_url( $byblos_options['sc_slide3_image'] ); ?>" data-src="<?php echo esc_url( $byblos_options['sc_slide3_image'] ); ?>">
                        <div class="camera_caption <?php echo get_theme_mod( 'homepage_banner_location', 'over' ) == 'over' ? 'moveFromRight' : 'fadeFromRight'; ?>">
                            <span><?php echo esc_attr( $byblos_options['sc_slide3_text'] );?></span>
                            <?php if ( get_theme_mod( 'homepage_banner_location', 'over' ) == 'below' && get_theme_mod( 'slide_3_button_toggle', 'off' ) == 'on' ) : ?>
                                <a class="slider-button" href="<?php echo get_theme_mod( 'slide_3_button_url', '#' ); ?>">
                                    <?php echo get_theme_mod( 'slide_3_button_label', 'See More' ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php do_action( 'byblos_slide_addons' ); ?>

            </div><!-- #camera_wrap_1 -->

        </div>
        
        <?php do_action( 'byblos_homepage_banner_over' ); ?>
        
    </div>

<?php
}

function byblos_ctas() {
    $byblos_options = byblos_get_options();
    
    ?>
    <div id="site-cta"><!-- #CTA boxes -->

        <?php if( isset( $byblos_options['sc_cta_section_title'] ) && $byblos_options['sc_cta_section_title'] ) : ?>
        <div class="col-sm-12 callout-title">
            
            <h2 class="center"><?php echo esc_attr( $byblos_options['sc_cta_section_title'] ); ?></h2>
            <div class="underline"></div>
            
        </div>
        <?php endif; ?>
        
        <div class="col4 site-cta">
            <div style="background-image: url('<?php echo esc_url( $byblos_options['sc_box1_image'] ); ?>');">
                <div class="overlay">
                    <h3><?php echo esc_attr( $byblos_options['sc_cta1_title'] ); ?></h3>
                    <p class="desc">
                        <?php echo esc_attr( $byblos_options['sc_cta1_text'] ); ?>
                    </p>
                    <p class="mt20">
                        <a href="<?php echo esc_url( $byblos_options['sc_cta1_url'] ); ?>" class="button button-default button-primary"> 
                            <?php echo esc_attr( $byblos_options['sc_cta1_button'] ); ?>
                        </a>
                    </p>                    
                </div>
            </div>
        </div>
        
        <div class="col4 site-cta mid">
            <div style="background-image: url('<?php echo esc_url( $byblos_options['sc_box2_image'] ); ?>');">
                <div class="overlay">
                    <h3><?php echo esc_attr( $byblos_options['sc_cta2_title'] ); ?></h3>
                    <p class="desc">
                        <?php echo esc_attr( $byblos_options['sc_cta2_text'] ); ?>
                    </p>
                    <p class="mt20">
                        <a href="<?php echo esc_url( $byblos_options['sc_cta2_url'] ); ?>" class="button button-default button-primary"> 
                            <?php echo esc_attr( $byblos_options['sc_cta2_button'] ); ?>
                        </a>
                    </p>                    
                </div>
            </div>
        </div>
        
        <div class="col4 site-cta">
            <div style="background-image: url('<?php echo esc_url( $byblos_options['sc_box3_image'] ); ?>');">
                <div class="overlay">
                    <h3><?php echo esc_attr( $byblos_options['sc_cta3_title'] ); ?></h3>
                    <p class="desc">
                        <?php echo esc_attr( $byblos_options['sc_cta3_text'] ); ?>
                    </p>
                    <p class="mt20">
                        <a href="<?php echo esc_url( $byblos_options['sc_cta3_url'] ); ?>" class="button button-default button-primary"> 
                            <?php echo esc_attr( $byblos_options['sc_cta3_button'] ); ?>
                        </a>
                    </p>                    
                </div>
            </div>
        </div>

        <div class="clear"></div>
    </div><!-- #CTA boxes -->
    <div class="clear"></div>
    <?php
}

function sc_banner() {
    $byblos_options = byblos_get_options();
    ?>
    <div id="top-banner" class="full-banner col-md-12">
        <div class="row bcg" 
             data-center="background-position: 50% 0px;"
             data-top-bottom="background-position: 50% -100px;"
             data-anchor-target="#slide-1"
             style="background: ">
            <div class="col-md-12 center">
                <div class="top-banner-text">
                    <?php get_sidebar('banner'); ?>
                    <!--<span class="primary-color"><?php echo get_option('sc_banner_text', 'Banner Call Out Text'); ?></span>-->
                </div>
<!--                <p>
                    <a href="<?php echo get_option('sc_banner_url'); ?>" class="button button-default button-primary"><?php echo get_option('sc_banner_button_text', 'Learn More'); ?></a>
                </p>-->
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <?php
}

function sc_toolbar() {
        $byblos_options = byblos_get_options(); ?>
        <div >    
            
            <?php if ( '' != $byblos_options['phone'] || '' != $byblos_options['email'] ) : ?>
            <div class="contact-bar">
               
                <?php if ( '' != $byblos_options['phone'] ) : ?>
                    <a href="tel:+<?php echo esc_attr( $byblos_options['phone'] ); ?>" class="icon-phone">
                        
                        <i class="fa fa-phone"></i>
                        <span><?php echo esc_attr( $byblos_options['phone'] ); ?></span>
                        
                    </a>
                <?php endif; ?>

                <?php if ('' != $byblos_options['email'] ) : ?>
                    <a href="mailto:<?php echo esc_attr( $byblos_options['email'] ); ?>" class="icon-map">
                        
                        <i class="fa fa-envelope"></i>
                        <span><?php echo esc_attr( $byblos_options['email'] ); ?></span>
                        
                    </a>
                <?php endif; ?>
                
                <?php do_action( 'byblos_custom_contact' ); ?>

            </div>
            
            <?php endif; ?>
           
            <div class="social-bar">
                
                <h3><?php echo $byblos_options['social_title']; ?></h3>
                
                <?php if ( '' != $byblos_options['sc_facebook_url'] ) : ?>
                    <a href="<?php echo esc_url( $byblos_options['sc_facebook_url'] ); ?>" target="_blank" class="icon-facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                <?php endif; ?>
                
                <?php if ('' != $byblos_options['sc_pinterest_url'] ) : ?>
                    <a href="<?php echo esc_url( $byblos_options['sc_pinterest_url'] ); ?>" target="_blank" class="icon-pinterest">
                        <i class="fa fa-pinterest"></i>
                    </a>
                <?php endif; ?>
                
                <?php if ('' != $byblos_options['sc_instagram_url'] ) : ?>
                    <a href="<?php echo esc_url( $byblos_options['sc_instagram_url'] ); ?>" target="_blank" class="icon-instagram">
                        <i class="fa fa-instagram"></i>
                    </a>
                <?php endif; ?>
                
                <?php if ('' != $byblos_options['sc_soundcloud_url'] ) : ?>
                    <a href="<?php echo esc_url( $byblos_options['sc_soundcloud_url'] ); ?>" target="_blank" class="icon-soundcloud">
                        <i class="fa fa-soundcloud"></i>
                    </a>
                <?php endif; ?>

                <?php if ('' != $byblos_options['sc_twitter_url'] ) : ?>
                    <a href="<?php echo esc_url( $byblos_options['sc_twitter_url'] ); ?>" target="_blank" class="icon-twitter">
                        <i class="fa fa-twitter"></i>                            
                    </a>
                <?php endif; ?>

                <?php if ('' != $byblos_options['sc_linkedin_url'] ) : ?>
                    <a href="<?php echo esc_url( $byblos_options['sc_linkedin_url'] ); ?>" target="_blank" class="icon-linkedin">
                        <i class="fa fa-linkedin"></i>                            
                    </a>
                <?php endif; ?>

                <?php if ('' != $byblos_options['sc_gplus_url'] ) : ?>
                    <a href="<?php echo esc_url( $byblos_options['sc_gplus_url'] ); ?>" target="_blank" class="icon-gplus">
                        <i class="fa fa-google-plus"></i>                            
                    </a>
                <?php endif; ?>

            </div>
        </div>
        <?php

}

function sc_footer() {
    
    $byblos_options = byblos_get_options();
    
    echo '<p>' . $byblos_options['sc_footer_text'] . '</p>';?>
    
    <?php do_action( 'byblos_designer' ); ?>

<?php }

add_action( 'byblos_designer', 'byblos_add_designer', 10 );
function byblos_add_designer() { ?>
    
    <a href="https://smartcatdesign.net/" rel="designer" style="display: block !important;">Design by Smartcat</a>
    
<?php }

add_action( 'byblos_call_out_boxes', 'byblos_add_call_out_boxes', 10 );
function byblos_add_call_out_boxes() {
    
    echo byblos_ctas();
    
}

add_action( 'byblos_homepage_banner_over', 'byblos_add_homepage_banner_over', 10 );
function byblos_add_homepage_banner_over() { ?>
    
    <?php $byblos_options = byblos_get_options(); ?>
    
    <?php if( $byblos_options['sc_banner_bool'] == 'yes' ) : ?>
        
            <div id="sc-slider-banner">
                <div class="sc-slider-banner">
                    <?php get_sidebar('banner'); ?>
                </div>
            </div>

    <?php endif; ?>
    
<?php }
