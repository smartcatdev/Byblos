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
    
    wp_enqueue_style('byblos-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css', array(), SC_AVENUE_VERSION);
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), SC_AVENUE_VERSION);
    wp_enqueue_style('byblos-main-style', get_template_directory_uri() . '/inc/css/style.css', array(), SC_AVENUE_VERSION);
    
    $fonts = byblos_fonts();
    
    if( array_key_exists ( get_option('byblos_main_font', 'Raleway, sans-serif' ), $fonts ) ) :
        wp_enqueue_style('byblos-general-font', '//fonts.googleapis.com/css?family=' . $fonts[get_option('byblos_main_font', 'Raleway, sans-serif' )], array(), SC_AVENUE_VERSION);
    endif;

    if( array_key_exists ( get_option('byblos_menu_font', 'Raleway, sans-serif' ), $fonts ) ) :
        wp_enqueue_style('byblos-menu-font', '//fonts.googleapis.com/css?family=' . $fonts[get_option('byblos_menu_font', 'Raleway, sans-serif' )], array(), SC_AVENUE_VERSION);
    endif;

    
    wp_enqueue_style('byblos-template', get_template_directory_uri() . '/inc/css/temps/' . $byblos_options['sc_theme_color'] . '.css', array(), SC_AVENUE_VERSION);
    wp_enqueue_style('byblos-slider-style', get_template_directory_uri() . '/inc/css/camera.css', array(), SC_AVENUE_VERSION);
    


    wp_enqueue_script('byblos-navigation', get_template_directory_uri() . '/js/navigation.js', array(), SC_AVENUE_VERSION, true);
    wp_enqueue_script('byblos-bootstrapjs', get_template_directory_uri() . '/inc/js/bootstrap.js', array(), SC_AVENUE_VERSION, true);
    wp_enqueue_script('byblos-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), SC_AVENUE_VERSION, true);

    wp_enqueue_script('byblos-easing', get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array(), SC_AVENUE_VERSION, true);
    wp_enqueue_script('byblos-uslider', get_template_directory_uri() . '/inc/js/camera.js', array(), SC_AVENUE_VERSION, true);
    wp_enqueue_script('byblos-masonry', get_template_directory_uri() . '/inc/js/masonry.min.js', array(), SC_AVENUE_VERSION, true);
    

    wp_enqueue_script('byblos-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery', 'jquery-ui-core'), SC_AVENUE_VERSION);


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
        'name' => __('Sidebar', 'byblos'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="byblos-underline"></div>',
    ));
    
    register_sidebar(array(
        'name' => __('Left Panel Widget', 'byblos'),
        'id' => 'sidebar-header-right',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="col-sm-4 widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="hidden">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Fullwidth Banner', 'byblos'),
        'id' => 'sidebar-banner',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));


    
    register_sidebar(array(
        'name' => __('Footer', 'byblos'),
        'id' => 'sidebar-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="col-sm-4 widget %2$s"><div class="inner">',
        'after_widget' => '</div></aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="byblos-underline"></div>',
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
    ?>
    <style type="text/css">
        body{
            font-size: <?php echo esc_attr( get_option('byblos_main_font_size', '16px' ) ); ?>;
            font-family: <?php echo esc_attr( get_option('byblos_main_font', 'Lato, sans-serif') ); ?>;
        }
        
        .main-navigation{
            font-family: <?php echo esc_attr( get_option( 'byblos_menu_font', 'Josefin Sans, sans-serif' ) ); ?>;
        }
        
        #site-navigation.main-navigation .menu  > li a{
            font-size: <?php echo esc_attr( get_option('byblos_menu_font_size', '18px' ) ); ?>
        }
        
        .sc-slider ul li{
            background-size: <?php echo get_option('sc_slider_style'); ?>;
            -webkit-background-size: <?php echo get_option('sc_slider_style'); ?>;
            -moz-background-size: <?php echo get_option('sc_slider_style'); ?>;
        }
    </style>
    <?php
}

class sc_recent_posts_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'sc_recent_posts_widget', __('Avenue Recent Articles', 'sc_recent_posts_widget_domain'), array('description' => __('Use this widget to display the Avenue Recent Posts.', 'sc_recent_posts_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
//        include 'inc/widget.php';
        echo byblos_recent_posts();

    }

    // Widget Backend
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Recent Articles', 'sc_recent_posts_widget_domain');
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />             
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

}


function byblos_load_widget() {
    register_widget('sc_recent_posts_widget');
}

add_action('widgets_init', 'byblos_load_widget');

function byblos_recent_posts() {
    $args = array(
        'numberposts' => '4',
        'post_status' => 'publish'
    );
    ?>
    <div id="sc_byblos_recent_posts">
        <?php $recent_posts = wp_get_recent_posts($args);
        foreach ($recent_posts as $post) { ?>
            <div class="col-sm-3">
                <div>
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post['ID'])); ?>
                    <img src="<?php echo $url; ?> " title="<?php echo $post['post_title']; ?>"/>
                    <div class="overlay">
                        <a href="<?php echo get_permalink($post['ID']) ?>" class="title">
                            <?php echo $post['post_title']; ?>
                        </a>
                        <?php // $date = new DateTime($post['post_date']); ?>
                        <div class="date">
                            <i class="fa fa-calendar"></i>
                            <?php echo date('M d', strtotime($post['post_date'])); ?>
                        </div>
                        <div class="author">
                            <i class="fa fa-pencil"></i>
                            <?php echo get_userdata($post['post_author'])->user_login; ?>
                        </div>
                        
                    </div>
                </div>
            </div>
    <?php } ?>
    </div>
<?php
}
function byblos_slider() { ?>
<script>
    jQuery(document).ready(function($){
        var height = (jQuery( window ).height());
        jQuery('#camera_wrap_1').camera({
            height: height + 'px',
            loader: 'pie',
            pagination: true,
            thumbnails: false,
            fx: "<?php echo esc_js( get_option( 'sc_slider_fx','simpleFade' ) );?>",
            time: <?php echo esc_js( get_option( 'sc_slider_time','4000' ) );?>,
            overlayer: true,
            hover: false,
            playPause: false,
            navigation: false,
            transPeriod: 3000,
        });            
    });

</script>
    <div class="sc-slider-wrapper">
	<div class="fluid_container">

        <div class="camera_wrap" id="camera_wrap_1">
                
                <?php if ('' != get_option('sc_slide1_image', get_template_directory_uri() . '/inc/images/bride.jpg')) { ?>
                <div class="camera_inner" data-thumb="<?php echo esc_url( get_option('sc_slide1_image', get_template_directory_uri() . '/inc/images/bride.jpg') ); ?>" data-src="<?php echo esc_url( get_option('sc_slide1_image', get_template_directory_uri() . '/inc/images/bride.jpg') ); ?>">
                        <div class="camera_caption moveFromRight">
                            <span><?php echo esc_attr( get_option('byblos_slide1_text','Clean & Modern Design') );?></span>
                        </div>
                    </div>
                <?php } ?>            
            
                <?php if ('' != get_option('byblos_slide2_image', get_template_directory_uri() . '/inc/images/bride.jpg')) { ?>
                      <div data-thumb="<?php echo esc_url( get_option('byblos_slide2_image', get_template_directory_uri() . '/inc/images/bride.jpg') ); ?>" data-src="<?php echo esc_url( get_option('byblos_slide2_image', get_template_directory_uri() . '/inc/images/bride.jpg') );?>">
                        <div class="camera_caption moveFromRight">
                            <span><?php echo esc_attr( get_option('byblos_slide2_text','Clean & Modern Design') );?></span>
                        </div>
                    </div>
                <?php } ?>   
            
                <?php if ('' != get_option('byblos_slide3_image', get_template_directory_uri() . '/inc/images/bride.jpg')) { ?>     
                    <div data-thumb="<?php echo esc_url( get_option('byblos_slide3_image', get_template_directory_uri() . '/inc/images/bride.jpg') );?>" data-src="<?php echo esc_url( get_option('byblos_slide3_image', get_template_directory_uri() . '/inc/images/bride.jpg') );?>">
                        <div class="camera_caption moveFromRight">
                            <span><?php echo esc_attr( get_option('byblos_slide3_text','Clean & Modern Design') );?></span>
                        </div>
                    </div>
                <?php } ?>      
      
        </div><!-- #camera_wrap_1 -->
        </div>
    </div>
    <div id="sc-slider-banner">
        <div class="sc-slider-banner">
            <?php get_sidebar('banner'); ?>
        </div>
    </div>
    <?php
}

function byblos_ctas() {
    ?>
    <div id="site-cta" class="<?php echo get_option('sc_slider_bool', 'yes') == 'yes' ? '' : 'no-slider' ?>"><!-- #CTA boxes -->
<!--        
        <h3 class="first-heading">Easy to customize</h3>
        <h2 class="main-heading">Restaurant and food inspired theme</h2>
        -->
        
        <div class="col4 site-cta">
            <div style="background-image: url('<?php echo get_option('sc_box1_image'); ?>');">
                <div class="overlay">
                    <h3><?php echo get_option('sc_cta1_title', 'Box 1 Title') ?></h3>
                    <p>
                        <?php echo get_option('sc_cta1_text', 'Box 1 Text. Input anything you want here'); ?>
                    </p>
                    <p class="mt20">
                        <a href="<?php echo get_option('sc_cta1_url') ?>" class="button button-default button-primary"> 
                            Click Here
                        </a>
                    </p>                    
                </div>
            </div>
        </div>
        <div class="col4 site-cta mid">
            <div style="background-image: url('<?php echo get_option('sc_box2_image'); ?>');">
                <div class="overlay">
                    <h3><?php echo get_option('sc_cta2_title', 'Box 2 Title') ?></h3>
                    <p>
                        <?php echo get_option('sc_cta2_text', 'Box 2 Text. Input anything you want here'); ?>
                    </p>
                    <p class="mt20">
                        <a href="<?php echo get_option('sc_cta2_url') ?>" class="button button-default button-primary"> 
                            Click Here
                        </a>
                    </p>                    
                </div>
            </div>
        </div>
        <div class="col4 site-cta">
            <div style="background-image: url('<?php echo get_option('sc_box3_image'); ?>');">
                <div class="overlay">
                    <h3><?php echo get_option('sc_cta3_title', 'Box 3 Title') ?></h3>
                    <p>
                        <?php echo get_option('sc_cta3_text', 'Box 3 Text. Input anything you want here'); ?>
                    </p>
                    <p class="mt20">
                        <a href="<?php echo get_option('sc_cta3_url') ?>" class="button button-default button-primary"> 
                            Click Here
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
//    if ('no' != get_option('sc_headerbar_bool', 'yes')) : ?>
        <div >                
           <div class="contact-bar">


                <?php if ( '' != get_option('byblos_phone', '888.111.9292') ) : ?>
                    <a href="tel:+<?php echo get_option('byblos_phone', '888.111.9292'); ?>" class="icon-phone">
                        
                        <span><?php echo esc_attr( get_option('byblos_phone', '888.111.9292') ); ?></span>
                        <i class="fa fa-phone"></i>
                    </a>
                <?php endif; ?>

                <?php if ('' != get_option('byblos_email', 'info@email.com' ) ) : ?>
                    <a href="#" class="icon-map">
                        <span><?php echo esc_attr( get_option('byblos_email', 'info@email.com' ) ); ?></span>
                        <i class="fa fa-envelope"></i>
                    </a>
                <?php endif; ?>

            </div>

            <div class="social-bar">
                <h3><?php echo get_option('byblos_social_title', __('Find Us', 'byblos' ) ); ?></h3>
                
                <?php if ('' != get_option('byblos[sc_facebook_url]', '#') ) : ?>
                    <a href="<?php echo esc_url( get_option('byblos[sc_facebook_url]', '#') ); ?>" target="_blank" class="icon-facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                <?php endif; ?>
                
                <?php if ('' != get_option('byblos[sc_pinterest_url]', '#') ) : ?>
                    <a href="<?php echo esc_url( get_option('byblos[sc_pinterest_url]', '#') ); ?>" target="_blank" class="icon-pinterest">
                        <i class="fa fa-pinterest"></i>
                    </a>
                <?php endif; ?>
                
                <?php if ('' != get_option('sc_instagram_url', '#') ) : ?>
                    <a href="<?php echo esc_url( get_option('sc_instagram_url', '#') ); ?>" target="_blank" class="icon-instagram">
                        <i class="fa fa-instagram"></i>
                    </a>
                <?php endif; ?>
                
                <?php if ('' != get_option('byblos[sc_soundcloud_url]', '#') ) : ?>
                    <a href="<?php echo esc_url( get_option('byblos[sc_soundcloud_url]', '#') ); ?>" target="_blank" class="icon-soundcloud">
                        <i class="fa fa-soundcloud"></i>
                    </a>
                <?php endif; ?>

                <?php if ('' != get_option('byblos[sc_twitter_url]', '#')) : ?>
                    <a href="<?php echo esc_url( get_option('byblos[sc_twitter_url]', '#') ); ?>" target="_blank" class="icon-twitter">
                        <i class="fa fa-twitter"></i>                            
                    </a>
                <?php endif; ?>


                <?php if ('' != get_option('byblos[sc_linkedin_url]', '#')) : ?>
                    <a href="<?php echo esc_url( get_option('byblos[sc_linkedin_url]', '#') ); ?>" target="_blank" class="icon-linkedin">
                        <i class="fa fa-linkedin"></i>                            
                    </a>
                <?php endif; ?>


                <?php if ('' != get_option('byblos[sc_gplus_url]') ) : ?>
                    <a href="<?php echo esc_url( get_option('byblos[sc_gplus_url]') ); ?>" target="_blank" class="icon-gplus">
                        <i class="fa fa-google-plus"></i>                            
                    </a>
                <?php endif; ?>

            
                
            </div>
        </div>
        <?php
//    endif;
}

function sc_footer() {
    echo '<p>' . get_option( 'byblos_company', '&copy; 2016 Company Name' ) . '</p>';?>
    <a href="https://smartcatdesign.net/" rel="designer" style="display: block !important">Design by Smartcat</a>

<?php }