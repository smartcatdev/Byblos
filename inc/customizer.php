<?php

/**
 * byblos Theme Customizer
 *
 * @package byblos
 */

function byblos_customize_enqueue() {
    
    wp_enqueue_script( 'byblos-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}

if( !function_exists( 'byblos_pro_init' ) ) :
    add_action( 'customize_controls_enqueue_scripts', 'byblos_customize_enqueue' );
endif;

function byblos_get_options() {
    
    return get_option('byblos', array(
        'sc_logo_image'         => '',
        'sc_facebook_url'       => '#',
        'sc_twitter_url'        => '#',
        'sc_linkedin_url'       => '#',
        'sc_gplus_url'          => '#',
        'sc_instagram_url'      => '#',
        'sc_pinterest_url'      => '#',
        'sc_soundcloud_url'     => '#',
        'sc_theme_color'        => 'yellow',
        'sc_font_size'          => '20px',
        'sc_font_family'        => 'Abel, sans-serif',
        'sc_slider_bool'        => 'yes',
        'sc_slide1_image'       => get_template_directory_uri() . '/inc/images/dress.jpg',
        'sc_slide1_text'        => __( 'Welcome to Byblos', 'byblos' ),
        'sc_slide2_image'       => get_template_directory_uri() . '/inc/images/couple.jpg',
        'sc_slide2_text'        => __( 'Responsive WordPress theme', 'byblos' ),
        'sc_slide3_image'       => get_template_directory_uri() . '/inc/images/guitarist.jpg',
        'sc_slide3_text'        => __( 'Featuring a fullscreen responsive slider', 'byblos' ),
        'sc_banner_bool'        => 'yes',
        'sc_cta_bool'           => 'yes',
        'sc_cta1_title'         => __( 'Responsive', 'byblos'),
        'sc_cta1_text'          => __( 'Byblos is a reponsive theme that looks great on desktop, tablet and mobile', 'byblos' ),
        'sc_cta1_url'           => '#',
        'sc_cta1_button'           => __('Learn More', 'byblos' ),
        'sc_box1_image'         => get_template_directory_uri() . '/inc/images/guitarist.jpg',
        'sc_cta2_title'         => __( 'Appealing', 'byblos' ),
        'sc_cta2_text'          => __( 'Byblos is a reponsive theme that looks great on desktop, tablet and mobile', 'byblos' ),
        'sc_cta2_url'           => '#',
        'sc_cta2_button'           => __('Learn More', 'byblos' ),
        'sc_box2_image'         => get_template_directory_uri() . '/inc/images/guitarist.jpg',
        'sc_cta3_title'         => __( 'Customizable', 'byblos' ),
        'sc_cta3_text'          => __( 'Byblos is a reponsive theme that looks great on desktop, tablet and mobile', 'byblos' ),
        'sc_cta3_url'           => '#',
        'sc_cta3_button'           => __('Learn More', 'byblos' ),
        'sc_box3_image'         => get_template_directory_uri() . '/inc/images/guitarist.jpg',
        'sc_footer_text'        => __( 'Company Name', 'byblos' ),
        'sc_cta_section_title'  => __( 'Our Specialities', 'byblos' ),
        'phone'                 => '#',
        'email'                 => 'info@domain.com',
        'social_title'          => __( 'Follow Us', 'byblos' ),
        
        
    ) );
    
}

function byblos_customize_register($wp_customize) {
    
    
    $byblos_options = byblos_get_options();
    
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    // reset some stuff
    $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('colors');
//    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('title_tagline');

    // *********************************************
    // ****************** LOGO  *****************
    // *********************************************
    
    
    class ByblosCustomizerPanel extends WP_Customize_Control {
        public function render_content() { ?>
            
            <div>
                <a class="button-primary" href="<?php echo esc_url( 'https://smartcatdesign.net/downloads/byblos-pro/' ); ?>" title="<?php esc_attr_e( 'View theme demo', 'byblos' ); ?>" target="_blank">
                <?php _e( 'Upgrade to Byblos Pro', 'byblos' ); ?>
                </a>

                <a class="button-secondary" href="<?php echo esc_url( 'http://byblos.smartcatdev.wpengine.com' ); ?>" title="<?php esc_attr_e( 'View theme demo', 'byblos' ); ?>" target="_blank">
                <?php _e( 'Live Demo', 'byblos' ); ?>
                </a>
            </div>       
            <br>

            <h3><?php _e( 'Pro Version Features', 'byblos' ); ?></h3>
            <ol>
                <li><?php _e( 'Jumbotron Slider - Up to 6 slides with customizable settings', 'byblos' ); ?></li>
                <li><?php _e( 'Unlimited skin color options', 'byblos' ); ?></li>
                <li><?php _e( 'More font options', 'byblos' ); ?></li>
                <li><?php _e( 'Additional Call To Action widget areas on the Frontpage', 'byblos' ); ?></li>
                <li><?php _e( 'Alternative designs for CTA boxes', 'byblos' ); ?></li>
                <li><?php _e( 'Page templates', 'byblos' ); ?></li>
                <li><?php _e( 'Events & Image Gallery widgets & page templates', 'byblos' ); ?></li>
                <li><?php _e( 'Contact form & contact info custom widgets', 'byblos' ); ?></li>
                <li><?php _e( 'Call-to-action & Pricing Table widgets', 'byblos' ); ?></li>
            </ol>

            <p>
                <?php _e('Click on the button to view a live demo of the theme, get some inspiration from this demo!','byblos');?>
            </p>
            <p>
                <?php _e( 'Byblos allows you to easily create a frontpage or blog page and it also <b>includes templates</b> allowing you to customize where the sidebars are located', 'byblos' ); ?>
            </p>
            <p>
                <?php _e( 'You can select if you want your homepage to show the Blog or the Frontpage from <b> Frontpage -> Static Front Page</b>', 'byblos' ); ?>
            </p>
            <h4>
                <?php _e( 'Enjoy this free theme! If you have any recommendations, comments or suggestions please leave us a comment on our', 'byblos' ); ?>
                <a href="https://www.facebook.com/SmartcatDesign/" target="_BLANK"><?php _e( 'Facebook page', 'byblos' ); ?></a>
            </h4>
        <?php }
    }
    
    $wp_customize->add_section('byblos_demo', array(
        'title'     => __( 'Theme Demo & Instructions', 'byblos'),
        'priority'  => 0.5,
    ));

//        $wp_customize->add_setting( 'byblos_demo_details', array(
//            'default'           => false,
//            'capability'        => 'edit_theme_options',
//            'sanitize_callback' => 'wp_filter_nohtml_kses',
//        ));
//        $wp_customize->add_control(
//            new ByblosCustomizerPanel(
//            $wp_customize,
//            'byblos_demo',
//                array(
//                    'label'     => __('Byblos Demo','byblos'),
//                    'section'   => 'byblos_demo',
//                    'settings'  => 'byblos_demo_details',
//                )
//            )
//        );
    
    $wp_customize->add_panel('logo', array(
        'title' => __('Logo, Title & Favicon', 'byblos'),
        'description' => __('set the logo image, site title, description and site icon favicon', 'byblos'),
        'priority' => 10
    ));
    
    $wp_customize->add_section( 'title_tagline', array (
        'title' => __( 'Site Title & Icon', 'byblos' ),
        'panel' => 'logo',
    ) );

    $wp_customize->add_section('logo', array(
        'title' => __('Logo', 'byblos'),
        'panel' => 'logo',
    ));
    
    // Logo Image
    $wp_customize->add_setting( 'byblos[sc_logo_image]', array (
        'default'               => get_template_directory_uri() . '/inc/images/logo.png',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_text_sanitize',
        'type'                  => 'option'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control4', array (
        'label' =>              __( 'Logo', 'byblos' ),
        'section'               => 'logo',
        'mime_type'             => 'image',
        'settings'              => 'byblos[sc_logo_image]',
        'description'           => __( 'Image for your site - Leave blank to use the Site Title & Tagline instead.', 'byblos' ),        
    ) ) );

    $wp_customize->add_panel('templates', array(
        'title' => __('Templates', 'byblos'),
        'description' => __('Customize the various templates ( Blog, Archive, Single Post )', 'byblos'),
        'priority' => 10
    ));
    $wp_customize->add_section('template_single_post', array(
        'title' => __('Single Post', 'byblos'),
        'panel' => 'templates',
    ));
    $wp_customize->add_section('template_blog', array(
        'title' => __('Blog', 'byblos'),
        'panel' => 'templates',
    ));
    $wp_customize->add_section('template_archive', array(
        'title' => __('Archive', 'byblos'),
        'panel' => 'templates',
    ));
   
    // Single Post Sidebar Location
    $wp_customize->add_setting( 'byblos_sidebar_location_post', array (
        'default'               => 'right',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_text_sanitize',
        'type'                  => 'theme_mod'
    ) );
    $wp_customize->add_control( 'byblos_sidebar_location_post', array(
        'type'                  => 'radio',
        'section'               => 'template_single_post',
        'label'                 => __( 'Single Post Sidebar Location', 'byblos' ),
        'choices'               => array(
            'right'         => __( 'Right', 'byblos' ),
            'left'          => __( 'Left', 'byblos' ),
            'none'          => __( 'None', 'byblos' ),
    ) ) );
    
    // Blog Sidebar Location
    $wp_customize->add_setting( 'byblos_sidebar_location_blog', array (
        'default'               => 'right',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_text_sanitize',
        'type'                  => 'theme_mod'
    ) );
    $wp_customize->add_control( 'byblos_sidebar_location_blog', array(
        'type'                  => 'radio',
        'section'               => 'template_blog',
        'label'                 => __( 'Blog Template Sidebar Location', 'byblos' ),
        'choices'               => array(
            'right'         => __( 'Right', 'byblos' ),
            'left'          => __( 'Left', 'byblos' ),
            'none'          => __( 'None', 'byblos' ),
    ) ) );
   
    // Archive Sidebar Location
    $wp_customize->add_setting( 'byblos_sidebar_location_archive', array (
        'default'               => 'right',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_text_sanitize',
        'type'                  => 'theme_mod'
    ) );
    $wp_customize->add_control( 'byblos_sidebar_location_archive', array(
        'type'                  => 'radio',
        'section'               => 'template_archive',
        'label'                 => __( 'Archive Template Sidebar Location', 'byblos' ),
        'choices'               => array(
            'right'         => __( 'Right', 'byblos' ),
            'left'          => __( 'Left', 'byblos' ),
            'none'          => __( 'None', 'byblos' ),
    ) ) );
    
    
    // *********************************************
    // ****************** Slider *****************
    // *********************************************

    $wp_customize->add_panel('slider', array(
        'title' => __('Slider', 'byblos'),
        'description' => __('Customize the slider. Byblos includes 3 slides, and the pro version supports up to 6', 'byblos'),
        'priority' => 10
    ));

    $wp_customize->add_section('slide1', array(
        'title' => __('Slide #1', 'byblos'),
        'description' => __('Use the settings below to upload your image, and set the caption text', 'byblos'),
        'panel' => 'slider',
    ));

    $wp_customize->add_section('slide2', array(
        'title' => __('Slide #2', 'byblos'),
        'description' => __('Use the settings below to upload your image, and set the caption text', 'byblos'),
        'panel' => 'slider',
    ));

    $wp_customize->add_section('slide3', array(
        'title' => __('Slide #3', 'byblos'),
        'description' => __('Use the settings below to upload your image, and set the caption text', 'byblos'),
        'panel' => 'slider',
    ));

    // 1st slide
    $wp_customize->add_setting('byblos[sc_slide1_image]', array(
        'default' => get_template_directory_uri() . '/inc/images/guitarist.jpg',
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control1', array(
        'label' => __('Slide Image', 'byblos'),
        'section' => 'slide1',
        'mime_type' => 'image',
        'settings' => 'byblos[sc_slide1_image]',
        'description' => __('Select the image file that you would like to use as the first slide', 'byblos'),
    )));

    $wp_customize->add_setting('byblos[sc_slide1_text]', array(
        'default' => __('Welcome to Byblos', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_slide1_text]', array(
        'type' => 'text',
        'section' => 'slide1',
        'label' => __('Header Text', 'byblos'),
        'description' => __('The main heading text, leave blank to hide', 'byblos'),
    ));


    // 2nd slide
    $wp_customize->add_setting('byblos[sc_slide2_image]', array(
        'default' => get_template_directory_uri() . '/inc/images/guitarist.jpg',
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control2', array(
        'label' => __('Slide Image', 'byblos'),
        'section' => 'slide2',
        'mime_type' => 'image',
        'settings' => 'byblos[sc_slide2_image]',
        'description' => __('Select the image file that you would like to use as the second slide', 'byblos'),
    )));

    $wp_customize->add_setting('byblos[sc_slide2_text]', array(
        'default' => __('Welcome to Byblos', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_slide2_text]', array(
        'type' => 'text',
        'section' => 'slide2',
        'label' => __('Header Text', 'byblos'),
        'description' => __('The main heading text, leave blank to hide', 'byblos'),
    ));

    // 3rd slide
    $wp_customize->add_setting('byblos[sc_slide3_image]', array(
        'default' => get_template_directory_uri() . '/inc/images/guitarist.jpg',
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control3', array(
        'label' => __('Slide Image', 'byblos'),
        'section' => 'slide3',
        'mime_type' => 'image',
        'settings' => 'byblos[sc_slide3_image]',
        'description' => __('Select the image file that you would like to use as the third slide', 'byblos'),
    )));

    $wp_customize->add_setting('byblos[sc_slide3_text]', array(
        'default' => __('Welcome to Byblos', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_slide3_text]', array(
        'type' => 'text',
        'section' => 'slide3',
        'label' => __('Header Text', 'byblos'),
        'description' => __('The main heading text, leave blank to hide', 'byblos'),
    ));


    // *********************************************
    // ****************** Homepage Banner *****************
    // *********************************************
//    $wp_customize->add_panel('homepage_banner', array(
//        'title' => __('Homepage Banner', 'byblos'),
//        'description' => __('Settings for the homepage banner', 'byblos'),
//        'priority' => 10
//    ));

    $wp_customize->add_section('banner_settings', array(
        'title' => __('Homepage Banner', 'byblos'),
        'priority'  => 10
    ));
    
    // Settings
    $wp_customize->add_setting( 'byblos[sc_banner_bool]', array (
        'default'               => 'yes',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_text_sanitize',
        'type'                  => 'option'
    ) );
    
    $wp_customize->add_control( 'byblos[sc_banner_bool]', array(
        'type'                  => 'radio',
        'section'               => 'banner_settings',
        'label'                 => __( 'Enable / disable the Homepage Banner section', 'byblos' ),
        'choices'               => array(
            'yes'              => __( 'Show', 'byblos' ),
            'no'               => __( 'Hide', 'byblos' ),
        )
        
    ) );

    
    // *********************************************
    // ****************** Callouts *****************
    // *********************************************
    $wp_customize->add_panel('callouts', array(
        'title' => __('Callout Boxes', 'byblos'),
        'description' => __('Customize the 3 callouts on the Frontpage', 'byblos'),
        'priority' => 10
    ));
    
    // Sections
    $wp_customize->add_section('callout1', array(
        'title' => __('Callout 1', 'byblos'),
        'description' => __('Set the image, title and content of the callout', 'byblos'),
        'panel' => 'callouts',
    ));

    $wp_customize->add_section('callout2', array(
        'title' => __('Callout 2', 'byblos'),
        'description' => __('Set the image, title and content of the callout', 'byblos'),
        'panel' => 'callouts',
    ));

    $wp_customize->add_section('callout3', array(
        'title' => __('Callout 3', 'byblos'),
        'description' => __('Set the image, title and content of the callout', 'byblos'),
        'panel' => 'callouts',
    ));

    $wp_customize->add_section('callout_setting', array(
        'title' => __('Settings', 'byblos'),
        'description' => __('Enable or disable the callouts', 'byblos'),
        'panel' => 'callouts',
    ));
    
    // Settings
    $wp_customize->add_setting( 'byblos[sc_cta_bool]', array (
        'default'               => 'yes',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_text_sanitize',
        'type'                  => 'option'
    ) );
    
    $wp_customize->add_control( 'byblos[sc_cta_bool]', array(
        'type'                  => 'radio',
        'section'               => 'callout_setting',
        'label'                 => __( 'Enable/disable the callouts', 'byblos' ),
        'choices'               => array(
            'yes'              => __( 'Show', 'byblos' ),
            'no'               => __( 'Hide', 'byblos' ),
        )
        
    ) );
    
    // Section Title
    $wp_customize->add_setting('byblos[sc_cta_section_title]', array(
        'default' => __('Our Specialities', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_cta_section_title]', array(
        'type' => 'text',
        'section' => 'callout_setting',
        'label' => __('Header Text', 'byblos'),
    ));
    
    
    // Callout #1
    // Image
    $wp_customize->add_setting('byblos[sc_box1_image]', array(
        'default' => get_template_directory_uri() . '/inc/images/guitarist.jpg',
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control5', array(
        'label' => __('Background Image', 'byblos'),
        'section' => 'callout1',
        'mime_type' => 'image',
        'settings' => 'byblos[sc_box1_image]',
        'description' => __('Select the image file that you would like to use as the featured image', 'byblos'),
    )));

    // Title
    $wp_customize->add_setting('byblos[sc_cta1_title]', array(
        'default' => __('Welcome to Byblos', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_cta1_title]', array(
        'type' => 'text',
        'section' => 'callout1',
        'label' => __('Header Text', 'byblos'),
        'description' => __('The main heading text, leave blank to hide', 'byblos'),
    ));

    // Details
    $wp_customize->add_setting('byblos[sc_cta1_text]', array(
        'default' => __('This theme can be used for all sorts of things', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_cta1_text]', array(
        'type' => 'textarea',
        'section' => 'callout1',
        'label' => __('Callout Description', 'byblos'),
        'description' => __('The text for the callout', 'byblos'),
    ));
    
    // URL
    $wp_customize->add_setting('byblos[sc_cta1_url]', array(
        'default' => __('#', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('byblos[sc_cta1_url]', array(
        'type' => 'text',
        'section' => 'callout1',
        'label' => __('Button URL', 'byblos'),
        'description' => __('Clicking the button goes to this URL', 'byblos'),
    ));
    
    // Button Text
    $wp_customize->add_setting('byblos[sc_cta1_button]', array(
        'default' => __('Click Here', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_cta1_button]', array(
        'type' => 'text',
        'section' => 'callout1',
        'label' => __('Button Text', 'byblos'),
        'description' => __('The button text', 'byblos'),
    ));
    
    // Callout #2
    // Image
    $wp_customize->add_setting('byblos[sc_box2_image]', array(
        'default' => get_template_directory_uri() . '/inc/images/guitarist.jpg',
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control6', array(
        'label' => __('Background Image', 'byblos'),
        'section' => 'callout2',
        'mime_type' => 'image',
        'settings' => 'byblos[sc_box2_image]',
        'description' => __('Select the image file that you would like to use as the featured image', 'byblos'),
    )));

    // Title
    $wp_customize->add_setting('byblos[sc_cta2_title]', array(
        'default' => __('Welcome to Byblos', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_cta2_title]', array(
        'type' => 'text',
        'section' => 'callout2',
        'label' => __('Header Text', 'byblos'),
        'description' => __('The main heading text, leave blank to hide', 'byblos'),
    ));

    // Details
    $wp_customize->add_setting('byblos[sc_cta2_text]', array(
        'default' => __('This theme can be used for all sorts of things', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_cta2_text]', array(
        'type' => 'textarea',
        'section' => 'callout2',
        'label' => __('Callout Description', 'byblos'),
        'description' => __('The text for the callout', 'byblos'),
    ));
    
    // URL
    $wp_customize->add_setting('byblos[sc_cta2_url]', array(
        'default' => __('#', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('byblos[sc_cta2_url]', array(
        'type' => 'text',
        'section' => 'callout2',
        'label' => __('Button URL', 'byblos'),
        'description' => __('Clicking the button goes to this URL', 'byblos'),
    ));
    
    // Button Text
    $wp_customize->add_setting('byblos[sc_cta2_button]', array(
        'default' => __('Click Here', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_cta2_button]', array(
        'type' => 'text',
        'section' => 'callout2',
        'label' => __('Button Text', 'byblos'),
        'description' => __('The button text', 'byblos'),
    ));
    
    // Callout #3
    // Image
    $wp_customize->add_setting('byblos[sc_box3_image]', array(
        'default' => get_template_directory_uri() . '/inc/images/guitarist.jpg',
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control7', array(
        'label' => __('Background Image', 'byblos'),
        'section' => 'callout3',
        'mime_type' => 'image',
        'settings' => 'byblos[sc_box3_image]',
        'description' => __('Select the image file that you would like to use as the featured image', 'byblos'),
    )));

    // Title
    $wp_customize->add_setting('byblos[sc_cta3_title]', array(
        'default' => __('Welcome to Byblos', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_cta3_title]', array(
        'type' => 'text',
        'section' => 'callout3',
        'label' => __('Header Text', 'byblos'),
        'description' => __('The main heading text, leave blank to hide', 'byblos'),
    ));

    // Details
    $wp_customize->add_setting('byblos[sc_cta3_text]', array(
        'default' => __('This theme can be used for all sorts of things', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_cta3_text]', array(
        'type' => 'textarea',
        'section' => 'callout3',
        'label' => __('Callout Description', 'byblos'),
        'description' => __('The text for the callout', 'byblos'),
    ));
    
    // URL
    $wp_customize->add_setting('byblos[sc_cta3_url]', array(
        'default' => __('#', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('byblos[sc_cta3_url]', array(
        'type' => 'text',
        'section' => 'callout3',
        'label' => __('Button URL', 'byblos'),
        'description' => __('Clicking the button goes to this URL', 'byblos'),
    ));
    
    // Button Text
    $wp_customize->add_setting('byblos[sc_cta3_button]', array(
        'default' => __('Click Here', 'byblos'),
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_text_sanitize'
    ));

    $wp_customize->add_control('byblos[sc_cta3_button]', array(
        'type' => 'text',
        'section' => 'callout3',
        'label' => __('Button Text', 'byblos'),
        'description' => __('The button text', 'byblos'),
    ));
    
    
    // *********************************************
    // ****************** Appearance *****************
    // *********************************************
    
    $wp_customize->add_panel( 'appearance', array (
        'title'                 => __( 'Appearance', 'byblos' ),
        'description'           => __( 'Customize your site colros, fonts and other appearance settings', 'byblos' ),
        'priority'              => 10
    ) );
    
    $wp_customize->add_section( 'color', array (
        'title'                 => __( 'Skin Color', 'byblos' ),
        'panel'                 => 'appearance',
    ) );
    
    $wp_customize->add_section( 'font', array (
        'title'                 => __( 'Fonts', 'byblos' ),
        'panel'                 => 'appearance',
    ) );
    
    $wp_customize->add_setting( 'byblos[sc_theme_color]', array (
        'default'               => 'red',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_text_sanitize',
        'type'                  => 'option'
    ) );
    
    $wp_customize->add_control( 'byblos[sc_theme_color]', array(
        'type'                  => 'radio',
        'section'               => 'color',
        'label'                 => __( 'Theme Skin Color', 'byblos' ),
        'description'           => __( 'Select the theme main color', 'byblos' ),
        'choices'               => array(
            'blue'              => __( 'Blue', 'byblos' ),
            'red'               => __( 'Red', 'byblos' ),
            'green'             => __( 'Green', 'byblos' ),
            'yellow'            => __( 'Yellow', 'byblos' ),
            'orange'            => __( 'Orange', 'byblos' ),
        )
        
    ) );
    
    
    $wp_customize->add_setting( 'byblos[sc_font_family]', array (
        'default'               => 'Abel, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_text_sanitize',
        'type'  => 'option'
    ) );
    $wp_customize->add_control( 'byblos[sc_font_family]', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'Website Font', 'byblos' ),
        'choices'               => function_exists('byblos_more_fonts') ? byblos_more_fonts() : byblos_fonts()
    ) );
    
    $wp_customize->add_setting( 'byblos[sc_font_size]', array (
        'default'               => '20px',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_text_sanitize',
        'type'  => 'option'
    ) );
    
    $wp_customize->add_control( 'byblos[sc_font_size]', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'General Font Size', 'byblos' ),
        'choices'               => byblos_font_sizes()
        
    ) );

    

    // *********************************************
    // ****************** Vertical Bar *****************
    // *********************************************
    $wp_customize->add_panel('social', array(
        'title' => __('Vertical Menu', 'byblos'),
        'description' => __('Social Icons, Links, Credits', 'byblos'),
        'priority' => 10
    ));

    // Social Links Section
    $wp_customize->add_section('social_links', array(
        'title' => __('Social Icons & Links', 'byblos'),
        'panel' => 'social',
    ));

    $wp_customize->add_setting('byblos[social_title]', array(
        'default' => __( 'Follow Us', 'byblos'),
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[social_title]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Social Section Title', 'byblos')
    ));

    $wp_customize->add_setting('byblos[phone]', array(
        'default' => '888.989.1111',
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[phone]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Phone Number', 'byblos')
    ));

    $wp_customize->add_setting('byblos[email]', array(
        'default' => 'info@domain.com',
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[email]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Email Address', 'byblos')
    ));

    $wp_customize->add_setting('byblos[sc_facebook_url]', array(
        'default' => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_facebook_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Facebook URL', 'byblos')
    ));

    $wp_customize->add_setting('byblos[sc_gplus_url]', array(
        'default' => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_gplus_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Google Plus URL', 'byblos')
    ));

    $wp_customize->add_setting('byblos[sc_instagram_url]', array(
        'default' => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_instagram_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Instagram URL', 'byblos')
    ));

    $wp_customize->add_setting('byblos[sc_linkedin_url]', array(
        'default' => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_linkedin_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Linkedin URL', 'byblos')
    ));

    $wp_customize->add_setting('byblos[sc_pinterest_url]', array(
        'default' => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_pinterest_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Pinterest URL', 'byblos')
    ));

    $wp_customize->add_setting('byblos[sc_soundcloud_url]', array(
        'default' => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_soundcloud_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Soundcloud URL', 'byblos')
    ));

    $wp_customize->add_setting('byblos[sc_twitter_url]', array(
        'default' => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_twitter_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Twitter URL', 'byblos')
    ));
    
    // Company Name
    $wp_customize->add_section('credits', array(
        'title' => __('Company Name & Branding', 'byblos'),
        'panel' => 'social',
    ));
    
    
    $wp_customize->add_setting('byblos[sc_footer_text]', array(
        'default' => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_text_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_footer_text]', array(
        'type' => 'text',
        'section' => 'credits',
        'label' => __('Company Name', 'byblos')
    ));
   
    
}

add_action('customize_register', 'byblos_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function byblos_customize_preview_js() {
    wp_enqueue_script('byblos_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', true);
}

add_action('customize_preview_init', 'byblos_customize_preview_js');


function byblos_icons(){
    
    return array( 
        'fa fa-clock' => __( 'Select One', 'byblos'), 
        'fa fa-500px' => __( ' 500px', 'byblos'), 
        'fa fa-amazon' => __( ' amazon', 'byblos'), 
        'fa fa-balance-scale' => __( ' balance-scale', 'byblos'), 'fa fa-battery-0' => __( ' battery-0', 'byblos'), 'fa fa-battery-1' => __( ' battery-1', 'byblos'), 'fa fa-battery-2' => __( ' battery-2', 'byblos'), 'fa fa-battery-3' => __( ' battery-3', 'byblos'), 'fa fa-battery-4' => __( ' battery-4', 'byblos'), 'fa fa-battery-empty' => __( ' battery-empty', 'byblos'), 'fa fa-battery-full' => __( ' battery-full', 'byblos'), 'fa fa-battery-half' => __( ' battery-half', 'byblos'), 'fa fa-battery-quarter' => __( ' battery-quarter', 'byblos'), 'fa fa-battery-three-quarters' => __( ' battery-three-quarters', 'byblos'), 'fa fa-black-tie' => __( ' black-tie', 'byblos'), 'fa fa-calendar-check-o' => __( ' calendar-check-o', 'byblos'), 'fa fa-calendar-minus-o' => __( ' calendar-minus-o', 'byblos'), 'fa fa-calendar-plus-o' => __( ' calendar-plus-o', 'byblos'), 'fa fa-calendar-times-o' => __( ' calendar-times-o', 'byblos'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'byblos'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'byblos'), 'fa fa-chrome' => __( ' chrome', 'byblos'), 'fa fa-clone' => __( ' clone', 'byblos'), 'fa fa-commenting' => __( ' commenting', 'byblos'), 'fa fa-commenting-o' => __( ' commenting-o', 'byblos'), 'fa fa-contao' => __( ' contao', 'byblos'), 'fa fa-creative-commons' => __( ' creative-commons', 'byblos'), 'fa fa-expeditedssl' => __( ' expeditedssl', 'byblos'), 'fa fa-firefox' => __( ' firefox', 'byblos'), 'fa fa-fonticons' => __( ' fonticons', 'byblos'), 'fa fa-genderless' => __( ' genderless', 'byblos'), 'fa fa-get-pocket' => __( ' get-pocket', 'byblos'), 'fa fa-gg' => __( ' gg', 'byblos'), 'fa fa-gg-circle' => __( ' gg-circle', 'byblos'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'byblos'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'byblos'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'byblos'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'byblos'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'byblos'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'byblos'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'byblos'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'byblos'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'byblos'), 'fa fa-hourglass' => __( ' hourglass', 'byblos'), 'fa fa-hourglass-1' => __( ' hourglass-1', 'byblos'), 'fa fa-hourglass-2' => __( ' hourglass-2', 'byblos'), 'fa fa-hourglass-3' => __( ' hourglass-3', 'byblos'), 'fa fa-hourglass-end' => __( ' hourglass-end', 'byblos'), 'fa fa-hourglass-half' => __( ' hourglass-half', 'byblos'), 'fa fa-hourglass-o' => __( ' hourglass-o', 'byblos'), 'fa fa-hourglass-start' => __( ' hourglass-start', 'byblos'), 'fa fa-houzz' => __( ' houzz', 'byblos'), 'fa fa-i-cursor' => __( ' i-cursor', 'byblos'), 'fa fa-industry' => __( ' industry', 'byblos'), 'fa fa-internet-explorer' => __( ' internet-explorer', 'byblos'), 'fa fa-map' => __( ' map', 'byblos'), 'fa fa-map-o' => __( ' map-o', 'byblos'), 'fa fa-map-pin' => __( ' map-pin', 'byblos'), 'fa fa-map-signs' => __( ' map-signs', 'byblos'), 'fa fa-mouse-pointer' => __( ' mouse-pointer', 'byblos'), 'fa fa-object-group' => __( ' object-group', 'byblos'), 'fa fa-object-ungroup' => __( ' object-ungroup', 'byblos'), 'fa fa-odnoklassniki' => __( ' odnoklassniki', 'byblos'), 'fa fa-odnoklassniki-square' => __( ' odnoklassniki-square', 'byblos'), 'fa fa-opencart' => __( ' opencart', 'byblos'), 'fa fa-opera' => __( ' opera', 'byblos'), 'fa fa-optin-monster' => __( ' optin-monster', 'byblos'), 'fa fa-registered' => __( ' registered', 'byblos'), 'fa fa-safari' => __( ' safari', 'byblos'), 'fa fa-sticky-note' => __( ' sticky-note', 'byblos'), 'fa fa-sticky-note-o' => __( ' sticky-note-o', 'byblos'), 'fa fa-television' => __( ' television', 'byblos'), 'fa fa-trademark' => __( ' trademark', 'byblos'), 'fa fa-tripadvisor' => __( ' tripadvisor', 'byblos'), 'fa fa-tv' => __( ' tv', 'byblos'), 'fa fa-vimeo' => __( ' vimeo', 'byblos'), 'fa fa-wikipedia-w' => __( ' wikipedia-w', 'byblos'), 'fa fa-y-combinator' => __( ' y-combinator', 'byblos'), 'fa fa-yc' => __( ' yc', 'byblos'), 'fa fa-adjust' => __( ' adjust', 'byblos'), 'fa fa-anchor' => __( ' anchor', 'byblos'), 'fa fa-archive' => __( ' archive', 'byblos'), 'fa fa-area-chart' => __( ' area-chart', 'byblos'), 'fa fa-arrows' => __( ' arrows', 'byblos'), 'fa fa-arrows-h' => __( ' arrows-h', 'byblos'), 'fa fa-arrows-v' => __( ' arrows-v', 'byblos'), 'fa fa-asterisk' => __( ' asterisk', 'byblos'), 'fa fa-at' => __( ' at', 'byblos'), 'fa fa-automobile' => __( ' automobile', 'byblos'), 'fa fa-balance-scale' => __( ' balance-scale', 'byblos'), 'fa fa-ban' => __( ' ban', 'byblos'), 'fa fa-bank' => __( ' bank', 'byblos'), 'fa fa-bar-chart' => __( ' bar-chart', 'byblos'), 'fa fa-bar-chart-o' => __( ' bar-chart-o', 'byblos'), 'fa fa-barcode' => __( ' barcode', 'byblos'), 'fa fa-bars' => __( ' bars', 'byblos'), 'fa fa-battery-0' => __( ' battery-0', 'byblos'), 'fa fa-battery-1' => __( ' battery-1', 'byblos'), 'fa fa-battery-2' => __( ' battery-2', 'byblos'), 'fa fa-battery-3' => __( ' battery-3', 'byblos'), 'fa fa-battery-4' => __( ' battery-4', 'byblos'), 'fa fa-battery-empty' => __( ' battery-empty', 'byblos'), 'fa fa-battery-full' => __( ' battery-full', 'byblos'), 'fa fa-battery-half' => __( ' battery-half', 'byblos'), 'fa fa-battery-quarter' => __( ' battery-quarter', 'byblos'), 'fa fa-battery-three-quarters' => __( ' battery-three-quarters', 'byblos'), 'fa fa-bed' => __( ' bed', 'byblos'), 'fa fa-beer' => __( ' beer', 'byblos'), 'fa fa-bell' => __( ' bell', 'byblos'), 'fa fa-bell-o' => __( ' bell-o', 'byblos'), 'fa fa-bell-slash' => __( ' bell-slash', 'byblos'), 'fa fa-bell-slash-o' => __( ' bell-slash-o', 'byblos'), 'fa fa-bicycle' => __( ' bicycle', 'byblos'), 'fa fa-binoculars' => __( ' binoculars', 'byblos'), 'fa fa-birthday-cake' => __( ' birthday-cake', 'byblos'), 'fa fa-bolt' => __( ' bolt', 'byblos'), 'fa fa-bomb' => __( ' bomb', 'byblos'), 'fa fa-book' => __( ' book', 'byblos'), 'fa fa-bookmark' => __( ' bookmark', 'byblos'), 'fa fa-bookmark-o' => __( ' bookmark-o', 'byblos'), 'fa fa-briefcase' => __( ' briefcase', 'byblos'), 'fa fa-bug' => __( ' bug', 'byblos'), 'fa fa-building' => __( ' building', 'byblos'), 'fa fa-building-o' => __( ' building-o', 'byblos'), 'fa fa-bullhorn' => __( ' bullhorn', 'byblos'), 'fa fa-bullseye' => __( ' bullseye', 'byblos'), 'fa fa-bus' => __( ' bus', 'byblos'), 'fa fa-cab' => __( ' cab', 'byblos'), 'fa fa-calculator' => __( ' calculator', 'byblos'), 'fa fa-calendar' => __( ' calendar', 'byblos'), 'fa fa-calendar-check-o' => __( ' calendar-check-o', 'byblos'), 'fa fa-calendar-minus-o' => __( ' calendar-minus-o', 'byblos'), 'fa fa-calendar-o' => __( ' calendar-o', 'byblos'), 'fa fa-calendar-plus-o' => __( ' calendar-plus-o', 'byblos'), 'fa fa-calendar-times-o' => __( ' calendar-times-o', 'byblos'), 'fa fa-camera' => __( ' camera', 'byblos'), 'fa fa-camera-retro' => __( ' camera-retro', 'byblos'), 'fa fa-car' => __( ' car', 'byblos'), 'fa fa-caret-square-o-down' => __( ' caret-square-o-down', 'byblos'), 'fa fa-caret-square-o-left' => __( ' caret-square-o-left', 'byblos'), 'fa fa-caret-square-o-right' => __( ' caret-square-o-right', 'byblos'), 'fa fa-caret-square-o-up' => __( ' caret-square-o-up', 'byblos'), 'fa fa-cart-arrow-down' => __( ' cart-arrow-down', 'byblos'), 'fa fa-cart-plus' => __( ' cart-plus', 'byblos'), 'fa fa-cc' => __( ' cc', 'byblos'), 'fa fa-certificate' => __( ' certificate', 'byblos'), 'fa fa-check' => __( ' check', 'byblos'), 'fa fa-check-circle' => __( ' check-circle', 'byblos'), 'fa fa-check-circle-o' => __( ' check-circle-o', 'byblos'), 'fa fa-check-square' => __( ' check-square', 'byblos'), 'fa fa-check-square-o' => __( ' check-square-o', 'byblos'), 'fa fa-child' => __( ' child', 'byblos'), 'fa fa-circle' => __( ' circle', 'byblos'), 'fa fa-circle-o' => __( ' circle-o', 'byblos'), 'fa fa-circle-o-notch' => __( ' circle-o-notch', 'byblos'), 'fa fa-circle-thin' => __( ' circle-thin', 'byblos'), 'fa fa-clock-o' => __( ' clock-o', 'byblos'), 'fa fa-clone' => __( ' clone', 'byblos'), 'fa fa-close' => __( ' close', 'byblos'), 'fa fa-cloud' => __( ' cloud', 'byblos'), 'fa fa-cloud-download' => __( ' cloud-download', 'byblos'), 'fa fa-cloud-upload' => __( ' cloud-upload', 'byblos'), 'fa fa-code' => __( ' code', 'byblos'), 'fa fa-code-fork' => __( ' code-fork', 'byblos'), 'fa fa-coffee' => __( ' coffee', 'byblos'), 'fa fa-cog' => __( ' cog', 'byblos'), 'fa fa-cogs' => __( ' cogs', 'byblos'), 'fa fa-comment' => __( ' comment', 'byblos'), 'fa fa-comment-o' => __( ' comment-o', 'byblos'), 'fa fa-commenting' => __( ' commenting', 'byblos'), 'fa fa-commenting-o' => __( ' commenting-o', 'byblos'), 'fa fa-comments' => __( ' comments', 'byblos'), 'fa fa-comments-o' => __( ' comments-o', 'byblos'), 'fa fa-compass' => __( ' compass', 'byblos'), 'fa fa-copyright' => __( ' copyright', 'byblos'), 'fa fa-creative-commons' => __( ' creative-commons', 'byblos'), 'fa fa-credit-card' => __( ' credit-card', 'byblos'), 'fa fa-crop' => __( ' crop', 'byblos'), 'fa fa-crosshairs' => __( ' crosshairs', 'byblos'), 'fa fa-cube' => __( ' cube', 'byblos'), 'fa fa-cubes' => __( ' cubes', 'byblos'), 'fa fa-cutlery' => __( ' cutlery', 'byblos'), 'fa fa-dashboard' => __( ' dashboard', 'byblos'), 'fa fa-database' => __( ' database', 'byblos'), 'fa fa-desktop' => __( ' desktop', 'byblos'), 'fa fa-diamond' => __( ' diamond', 'byblos'), 'fa fa-dot-circle-o' => __( ' dot-circle-o', 'byblos'), 'fa fa-download' => __( ' download', 'byblos'), 'fa fa-edit' => __( ' edit', 'byblos'), 'fa fa-ellipsis-h' => __( ' ellipsis-h', 'byblos'), 'fa fa-ellipsis-v' => __( ' ellipsis-v', 'byblos'), 'fa fa-envelope' => __( ' envelope', 'byblos'), 'fa fa-envelope-o' => __( ' envelope-o', 'byblos'), 'fa fa-envelope-square' => __( ' envelope-square', 'byblos'), 'fa fa-eraser' => __( ' eraser', 'byblos'), 'fa fa-exchange' => __( ' exchange', 'byblos'), 'fa fa-exclamation' => __( ' exclamation', 'byblos'), 'fa fa-exclamation-circle' => __( ' exclamation-circle', 'byblos'), 'fa fa-exclamation-triangle' => __( ' exclamation-triangle', 'byblos'), 'fa fa-external-link' => __( ' external-link', 'byblos'), 'fa fa-external-link-square' => __( ' external-link-square', 'byblos'), 'fa fa-eye' => __( ' eye', 'byblos'), 'fa fa-eye-slash' => __( ' eye-slash', 'byblos'), 'fa fa-eyedropper' => __( ' eyedropper', 'byblos'), 'fa fa-fax' => __( ' fax', 'byblos'), 'fa fa-feed' => __( ' feed', 'byblos'), 'fa fa-female' => __( ' female', 'byblos'), 'fa fa-fighter-jet' => __( ' fighter-jet', 'byblos'), 'fa fa-file-archive-o' => __( ' file-archive-o', 'byblos'), 'fa fa-file-audio-o' => __( ' file-audio-o', 'byblos'), 'fa fa-file-code-o' => __( ' file-code-o', 'byblos'), 'fa fa-file-excel-o' => __( ' file-excel-o', 'byblos'), 'fa fa-file-image-o' => __( ' file-image-o', 'byblos'), 'fa fa-file-movie-o' => __( ' file-movie-o', 'byblos'), 'fa fa-file-pdf-o' => __( ' file-pdf-o', 'byblos'), 'fa fa-file-photo-o' => __( ' file-photo-o', 'byblos'), 'fa fa-file-picture-o' => __( ' file-picture-o', 'byblos'), 'fa fa-file-powerpoint-o' => __( ' file-powerpoint-o', 'byblos'), 'fa fa-file-sound-o' => __( ' file-sound-o', 'byblos'), 'fa fa-file-video-o' => __( ' file-video-o', 'byblos'), 'fa fa-file-word-o' => __( ' file-word-o', 'byblos'), 'fa fa-file-zip-o' => __( ' file-zip-o', 'byblos'), 'fa fa-film' => __( ' film', 'byblos'), 'fa fa-filter' => __( ' filter', 'byblos'), 'fa fa-fire' => __( ' fire', 'byblos'), 'fa fa-fire-extinguisher' => __( ' fire-extinguisher', 'byblos'), 'fa fa-flag' => __( ' flag', 'byblos'), 'fa fa-flag-checkered' => __( ' flag-checkered', 'byblos'), 'fa fa-flag-o' => __( ' flag-o', 'byblos'), 'fa fa-flash' => __( ' flash', 'byblos'), 'fa fa-flask' => __( ' flask', 'byblos'), 'fa fa-folder' => __( ' folder', 'byblos'), 'fa fa-folder-o' => __( ' folder-o', 'byblos'), 'fa fa-folder-open' => __( ' folder-open', 'byblos'), 'fa fa-folder-open-o' => __( ' folder-open-o', 'byblos'), 'fa fa-frown-o' => __( ' frown-o', 'byblos'), 'fa fa-futbol-o' => __( ' futbol-o', 'byblos'), 'fa fa-gamepad' => __( ' gamepad', 'byblos'), 'fa fa-gavel' => __( ' gavel', 'byblos'), 'fa fa-gear' => __( ' gear', 'byblos'), 'fa fa-gears' => __( ' gears', 'byblos'), 'fa fa-gift' => __( ' gift', 'byblos'), 'fa fa-glass' => __( ' glass', 'byblos'), 'fa fa-globe' => __( ' globe', 'byblos'), 'fa fa-graduation-cap' => __( ' graduation-cap', 'byblos'), 'fa fa-group' => __( ' group', 'byblos'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'byblos'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'byblos'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'byblos'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'byblos'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'byblos'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'byblos'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'byblos'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'byblos'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'byblos'), 'fa fa-hdd-o' => __( ' hdd-o', 'byblos'), 'fa fa-headphones' => __( ' headphones', 'byblos'), 'fa fa-heart' => __( ' heart', 'byblos'), 'fa fa-heart-o' => __( ' heart-o', 'byblos'), 'fa fa-heartbeat' => __( ' heartbeat', 'byblos'), 'fa fa-history' => __( ' history', 'byblos'), 'fa fa-home' => __( ' home', 'byblos'), 'fa fa-hotel' => __( ' hotel', 'byblos'), 'fa fa-hourglass' => __( ' hourglass', 'byblos'), 'fa fa-hourglass-1' => __( ' hourglass-1', 'byblos'), 'fa fa-hourglass-2' => __( ' hourglass-2', 'byblos'), 'fa fa-hourglass-3' => __( ' hourglass-3', 'byblos'), 'fa fa-hourglass-end' => __( ' hourglass-end', 'byblos'), 'fa fa-hourglass-half' => __( ' hourglass-half', 'byblos'), 'fa fa-hourglass-o' => __( ' hourglass-o', 'byblos'), 'fa fa-hourglass-start' => __( ' hourglass-start', 'byblos'), 'fa fa-i-cursor' => __( ' i-cursor', 'byblos'), 'fa fa-image' => __( ' image', 'byblos'), 'fa fa-inbox' => __( ' inbox', 'byblos'), 'fa fa-industry' => __( ' industry', 'byblos'), 'fa fa-info' => __( ' info', 'byblos'), 'fa fa-info-circle' => __( ' info-circle', 'byblos'), 'fa fa-institution' => __( ' institution', 'byblos'), 'fa fa-key' => __( ' key', 'byblos'), 'fa fa-keyboard-o' => __( ' keyboard-o', 'byblos'), 'fa fa-language' => __( ' language', 'byblos'), 'fa fa-laptop' => __( ' laptop', 'byblos'), 'fa fa-leaf' => __( ' leaf', 'byblos'), 'fa fa-legal' => __( ' legal', 'byblos'), 'fa fa-lemon-o' => __( ' lemon-o', 'byblos'), 'fa fa-level-down' => __( ' level-down', 'byblos'), 'fa fa-level-up' => __( ' level-up', 'byblos'), 'fa fa-life-bouy' => __( ' life-bouy', 'byblos'), 'fa fa-life-buoy' => __( ' life-buoy', 'byblos'), 'fa fa-life-ring' => __( ' life-ring', 'byblos'), 'fa fa-life-saver' => __( ' life-saver', 'byblos'), 'fa fa-lightbulb-o' => __( ' lightbulb-o', 'byblos'), 'fa fa-line-chart' => __( ' line-chart', 'byblos'), 'fa fa-location-arrow' => __( ' location-arrow', 'byblos'), 'fa fa-lock' => __( ' lock', 'byblos'), 'fa fa-magic' => __( ' magic', 'byblos'), 'fa fa-magnet' => __( ' magnet', 'byblos'), 'fa fa-mail-forward' => __( ' mail-forward', 'byblos'), 'fa fa-mail-reply' => __( ' mail-reply', 'byblos'), 'fa fa-mail-reply-all' => __( ' mail-reply-all', 'byblos'), 'fa fa-male' => __( ' male', 'byblos'), 'fa fa-map' => __( ' map', 'byblos'), 'fa fa-map-marker' => __( ' map-marker', 'byblos'), 'fa fa-map-o' => __( ' map-o', 'byblos'), 'fa fa-map-pin' => __( ' map-pin', 'byblos'), 'fa fa-map-signs' => __( ' map-signs', 'byblos'), 'fa fa-meh-o' => __( ' meh-o', 'byblos'), 'fa fa-microphone' => __( ' microphone', 'byblos'), 'fa fa-microphone-slash' => __( ' microphone-slash', 'byblos'), 'fa fa-minus' => __( ' minus', 'byblos'), 'fa fa-minus-circle' => __( ' minus-circle', 'byblos'), 'fa fa-minus-square' => __( ' minus-square', 'byblos'), 'fa fa-minus-square-o' => __( ' minus-square-o', 'byblos'), 'fa fa-mobile' => __( ' mobile', 'byblos'), 'fa fa-mobile-phone' => __( ' mobile-phone', 'byblos'), 'fa fa-money' => __( ' money', 'byblos'), 'fa fa-moon-o' => __( ' moon-o', 'byblos'), 'fa fa-mortar-board' => __( ' mortar-board', 'byblos'), 'fa fa-motorcycle' => __( ' motorcycle', 'byblos'), 'fa fa-mouse-pointer' => __( ' mouse-pointer', 'byblos'), 'fa fa-music' => __( ' music', 'byblos'), 'fa fa-navicon' => __( ' navicon', 'byblos'), 'fa fa-newspaper-o' => __( ' newspaper-o', 'byblos'), 'fa fa-object-group' => __( ' object-group', 'byblos'), 'fa fa-object-ungroup' => __( ' object-ungroup', 'byblos'), 'fa fa-paint-brush' => __( ' paint-brush', 'byblos'), 'fa fa-paper-plane' => __( ' paper-plane', 'byblos'), 'fa fa-paper-plane-o' => __( ' paper-plane-o', 'byblos'), 'fa fa-paw' => __( ' paw', 'byblos'), 'fa fa-pencil' => __( ' pencil', 'byblos'), 'fa fa-pencil-square' => __( ' pencil-square', 'byblos'), 'fa fa-pencil-square-o' => __( ' pencil-square-o', 'byblos'), 'fa fa-phone' => __( ' phone', 'byblos'), 'fa fa-phone-square' => __( ' phone-square', 'byblos'), 'fa fa-photo' => __( ' photo', 'byblos'), 'fa fa-picture-o' => __( ' picture-o', 'byblos'), 'fa fa-pie-chart' => __( ' pie-chart', 'byblos'), 'fa fa-plane' => __( ' plane', 'byblos'), 'fa fa-plug' => __( ' plug', 'byblos'), 'fa fa-plus' => __( ' plus', 'byblos'), 'fa fa-plus-circle' => __( ' plus-circle', 'byblos'), 'fa fa-plus-square' => __( ' plus-square', 'byblos'), 'fa fa-plus-square-o' => __( ' plus-square-o', 'byblos'), 'fa fa-power-off' => __( ' power-off', 'byblos'), 'fa fa-print' => __( ' print', 'byblos'), 'fa fa-puzzle-piece' => __( ' puzzle-piece', 'byblos'), 'fa fa-qrcode' => __( ' qrcode', 'byblos'), 'fa fa-question' => __( ' question', 'byblos'), 'fa fa-question-circle' => __( ' question-circle', 'byblos'), 'fa fa-quote-left' => __( ' quote-left', 'byblos'), 'fa fa-quote-right' => __( ' quote-right', 'byblos'), 'fa fa-random' => __( ' random', 'byblos'), 'fa fa-recycle' => __( ' recycle', 'byblos'), 'fa fa-refresh' => __( ' refresh', 'byblos'), 'fa fa-registered' => __( ' registered', 'byblos'), 'fa fa-remove' => __( ' remove', 'byblos'), 'fa fa-reorder' => __( ' reorder', 'byblos'), 'fa fa-reply' => __( ' reply', 'byblos'), 'fa fa-reply-all' => __( ' reply-all', 'byblos'), 'fa fa-retweet' => __( ' retweet', 'byblos'), 'fa fa-road' => __( ' road', 'byblos'), 'fa fa-rocket' => __( ' rocket', 'byblos'), 'fa fa-rss' => __( ' rss', 'byblos'), 'fa fa-rss-square' => __( ' rss-square', 'byblos'), 'fa fa-search' => __( ' search', 'byblos'), 'fa fa-search-minus' => __( ' search-minus', 'byblos'), 'fa fa-search-plus' => __( ' search-plus', 'byblos'), 'fa fa-send' => __( ' send', 'byblos'), 'fa fa-send-o' => __( ' send-o', 'byblos'), 'fa fa-server' => __( ' server', 'byblos'), 'fa fa-share' => __( ' share', 'byblos'), 'fa fa-share-alt' => __( ' share-alt', 'byblos'), 'fa fa-share-alt-square' => __( ' share-alt-square', 'byblos'), 'fa fa-share-square' => __( ' share-square', 'byblos'), 'fa fa-share-square-o' => __( ' share-square-o', 'byblos'), 'fa fa-shield' => __( ' shield', 'byblos'), 'fa fa-ship' => __( ' ship', 'byblos'), 'fa fa-shopping-cart' => __( ' shopping-cart', 'byblos'), 'fa fa-sign-in' => __( ' sign-in', 'byblos'), 'fa fa-sign-out' => __( ' sign-out', 'byblos'), 'fa fa-signal' => __( ' signal', 'byblos'), 'fa fa-sitemap' => __( ' sitemap', 'byblos'), 'fa fa-sliders' => __( ' sliders', 'byblos'), 'fa fa-smile-o' => __( ' smile-o', 'byblos'), 'fa fa-soccer-ball-o' => __( ' soccer-ball-o', 'byblos'), 'fa fa-sort' => __( ' sort', 'byblos'), 'fa fa-sort-alpha-asc' => __( ' sort-alpha-asc', 'byblos'), 'fa fa-sort-alpha-desc' => __( ' sort-alpha-desc', 'byblos'), 'fa fa-sort-amount-asc' => __( ' sort-amount-asc', 'byblos'), 'fa fa-sort-amount-desc' => __( ' sort-amount-desc', 'byblos'), 'fa fa-sort-asc' => __( ' sort-asc', 'byblos'), 'fa fa-sort-desc' => __( ' sort-desc', 'byblos'), 'fa fa-sort-down' => __( ' sort-down', 'byblos'), 'fa fa-sort-numeric-asc' => __( ' sort-numeric-asc', 'byblos'), 'fa fa-sort-numeric-desc' => __( ' sort-numeric-desc', 'byblos'), 'fa fa-sort-up' => __( ' sort-up', 'byblos'), 'fa fa-space-shuttle' => __( ' space-shuttle', 'byblos'), 'fa fa-spinner' => __( ' spinner', 'byblos'), 'fa fa-spoon' => __( ' spoon', 'byblos'), 'fa fa-square' => __( ' square', 'byblos'), 'fa fa-square-o' => __( ' square-o', 'byblos'), 'fa fa-star' => __( ' star', 'byblos'), 'fa fa-star-half' => __( ' star-half', 'byblos'), 'fa fa-star-half-empty' => __( ' star-half-empty', 'byblos'), 'fa fa-star-half-full' => __( ' star-half-full', 'byblos'), 'fa fa-star-half-o' => __( ' star-half-o', 'byblos'), 'fa fa-star-o' => __( ' star-o', 'byblos'), 'fa fa-sticky-note' => __( ' sticky-note', 'byblos'), 'fa fa-sticky-note-o' => __( ' sticky-note-o', 'byblos'), 'fa fa-street-view' => __( ' street-view', 'byblos'), 'fa fa-suitcase' => __( ' suitcase', 'byblos'), 'fa fa-sun-o' => __( ' sun-o', 'byblos'), 'fa fa-support' => __( ' support', 'byblos'), 'fa fa-tablet' => __( ' tablet', 'byblos'), 'fa fa-tachometer' => __( ' tachometer', 'byblos'), 'fa fa-tag' => __( ' tag', 'byblos'), 'fa fa-tags' => __( ' tags', 'byblos'), 'fa fa-tasks' => __( ' tasks', 'byblos'), 'fa fa-taxi' => __( ' taxi', 'byblos'), 'fa fa-television' => __( ' television', 'byblos'), 'fa fa-terminal' => __( ' terminal', 'byblos'), 'fa fa-thumb-tack' => __( ' thumb-tack', 'byblos'), 'fa fa-thumbs-down' => __( ' thumbs-down', 'byblos'), 'fa fa-thumbs-o-down' => __( ' thumbs-o-down', 'byblos'), 'fa fa-thumbs-o-up' => __( ' thumbs-o-up', 'byblos'), 'fa fa-thumbs-up' => __( ' thumbs-up', 'byblos'), 'fa fa-ticket' => __( ' ticket', 'byblos'), 'fa fa-times' => __( ' times', 'byblos'), 'fa fa-times-circle' => __( ' times-circle', 'byblos'), 'fa fa-times-circle-o' => __( ' times-circle-o', 'byblos'), 'fa fa-tint' => __( ' tint', 'byblos'), 'fa fa-toggle-down' => __( ' toggle-down', 'byblos'), 'fa fa-toggle-left' => __( ' toggle-left', 'byblos'), 'fa fa-toggle-off' => __( ' toggle-off', 'byblos'), 'fa fa-toggle-on' => __( ' toggle-on', 'byblos'), 'fa fa-toggle-right' => __( ' toggle-right', 'byblos'), 'fa fa-toggle-up' => __( ' toggle-up', 'byblos'), 'fa fa-trademark' => __( ' trademark', 'byblos'), 'fa fa-trash' => __( ' trash', 'byblos'), 'fa fa-trash-o' => __( ' trash-o', 'byblos'), 'fa fa-tree' => __( ' tree', 'byblos'), 'fa fa-trophy' => __( ' trophy', 'byblos'), 'fa fa-truck' => __( ' truck', 'byblos'), 'fa fa-tty' => __( ' tty', 'byblos'), 'fa fa-tv' => __( ' tv', 'byblos'), 'fa fa-umbrella' => __( ' umbrella', 'byblos'), 'fa fa-university' => __( ' university', 'byblos'), 'fa fa-unlock' => __( ' unlock', 'byblos'), 'fa fa-unlock-alt' => __( ' unlock-alt', 'byblos'), 'fa fa-unsorted' => __( ' unsorted', 'byblos'), 'fa fa-upload' => __( ' upload', 'byblos'), 'fa fa-user' => __( ' user', 'byblos'), 'fa fa-user-plus' => __( ' user-plus', 'byblos'), 'fa fa-user-secret' => __( ' user-secret', 'byblos'), 'fa fa-user-times' => __( ' user-times', 'byblos'), 'fa fa-users' => __( ' users', 'byblos'), 'fa fa-video-camera' => __( ' video-camera', 'byblos'), 'fa fa-volume-down' => __( ' volume-down', 'byblos'), 'fa fa-volume-off' => __( ' volume-off', 'byblos'), 'fa fa-volume-up' => __( ' volume-up', 'byblos'), 'fa fa-warning' => __( ' warning', 'byblos'), 'fa fa-wheelchair' => __( ' wheelchair', 'byblos'), 'fa fa-wifi' => __( ' wifi', 'byblos'), 'fa fa-wrench' => __( ' wrench', 'byblos'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'byblos'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'byblos'), 'fa fa-hand-o-down' => __( ' hand-o-down', 'byblos'), 'fa fa-hand-o-left' => __( ' hand-o-left', 'byblos'), 'fa fa-hand-o-right' => __( ' hand-o-right', 'byblos'), 'fa fa-hand-o-up' => __( ' hand-o-up', 'byblos'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'byblos'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'byblos'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'byblos'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'byblos'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'byblos'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'byblos'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'byblos'), 'fa fa-thumbs-down' => __( ' thumbs-down', 'byblos'), 'fa fa-thumbs-o-down' => __( ' thumbs-o-down', 'byblos'), 'fa fa-thumbs-o-up' => __( ' thumbs-o-up', 'byblos'), 'fa fa-thumbs-up' => __( ' thumbs-up', 'byblos'), 'fa fa-ambulance' => __( ' ambulance', 'byblos'), 'fa fa-automobile' => __( ' automobile', 'byblos'), 'fa fa-bicycle' => __( ' bicycle', 'byblos'), 'fa fa-bus' => __( ' bus', 'byblos'), 'fa fa-cab' => __( ' cab', 'byblos'), 'fa fa-car' => __( ' car', 'byblos'), 'fa fa-fighter-jet' => __( ' fighter-jet', 'byblos'), 'fa fa-motorcycle' => __( ' motorcycle', 'byblos'), 'fa fa-plane' => __( ' plane', 'byblos'), 'fa fa-rocket' => __( ' rocket', 'byblos'), 'fa fa-ship' => __( ' ship', 'byblos'), 'fa fa-space-shuttle' => __( ' space-shuttle', 'byblos'), 'fa fa-subway' => __( ' subway', 'byblos'), 'fa fa-taxi' => __( ' taxi', 'byblos'), 'fa fa-train' => __( ' train', 'byblos'), 'fa fa-truck' => __( ' truck', 'byblos'), 'fa fa-wheelchair' => __( ' wheelchair', 'byblos'), 'fa fa-genderless' => __( ' genderless', 'byblos'), 'fa fa-intersex' => __( ' intersex', 'byblos'), 'fa fa-mars' => __( ' mars', 'byblos'), 'fa fa-mars-double' => __( ' mars-double', 'byblos'), 'fa fa-mars-stroke' => __( ' mars-stroke', 'byblos'), 'fa fa-mars-stroke-h' => __( ' mars-stroke-h', 'byblos'), 'fa fa-mars-stroke-v' => __( ' mars-stroke-v', 'byblos'), 'fa fa-mercury' => __( ' mercury', 'byblos'), 'fa fa-neuter' => __( ' neuter', 'byblos'), 'fa fa-transgender' => __( ' transgender', 'byblos'), 'fa fa-transgender-alt' => __( ' transgender-alt', 'byblos'), 'fa fa-venus' => __( ' venus', 'byblos'), 'fa fa-venus-double' => __( ' venus-double', 'byblos'), 'fa fa-venus-mars' => __( ' venus-mars', 'byblos'), 'fa fa-file' => __( ' file', 'byblos'), 'fa fa-file-archive-o' => __( ' file-archive-o', 'byblos'), 'fa fa-file-audio-o' => __( ' file-audio-o', 'byblos'), 'fa fa-file-code-o' => __( ' file-code-o', 'byblos'), 'fa fa-file-excel-o' => __( ' file-excel-o', 'byblos'), 'fa fa-file-image-o' => __( ' file-image-o', 'byblos'), 'fa fa-file-movie-o' => __( ' file-movie-o', 'byblos'), 'fa fa-file-o' => __( ' file-o', 'byblos'), 'fa fa-file-pdf-o' => __( ' file-pdf-o', 'byblos'), 'fa fa-file-photo-o' => __( ' file-photo-o', 'byblos'), 'fa fa-file-picture-o' => __( ' file-picture-o', 'byblos'), 'fa fa-file-powerpoint-o' => __( ' file-powerpoint-o', 'byblos'), 'fa fa-file-sound-o' => __( ' file-sound-o', 'byblos'), 'fa fa-file-text' => __( ' file-text', 'byblos'), 'fa fa-file-text-o' => __( ' file-text-o', 'byblos'), 'fa fa-file-video-o' => __( ' file-video-o', 'byblos'), 'fa fa-file-word-o' => __( ' file-word-o', 'byblos'), 'fa fa-file-zip-o' => __( ' file-zip-o', 'byblos'), 'fa fa-circle-o-notch' => __( ' circle-o-notch', 'byblos'), 'fa fa-cog' => __( ' cog', 'byblos'), 'fa fa-gear' => __( ' gear', 'byblos'), 'fa fa-refresh' => __( ' refresh', 'byblos'), 'fa fa-spinner' => __( ' spinner', 'byblos'), 'fa fa-check-square' => __( ' check-square', 'byblos'), 'fa fa-check-square-o' => __( ' check-square-o', 'byblos'), 'fa fa-circle' => __( ' circle', 'byblos'), 'fa fa-circle-o' => __( ' circle-o', 'byblos'), 'fa fa-dot-circle-o' => __( ' dot-circle-o', 'byblos'), 'fa fa-minus-square' => __( ' minus-square', 'byblos'), 'fa fa-minus-square-o' => __( ' minus-square-o', 'byblos'), 'fa fa-plus-square' => __( ' plus-square', 'byblos'), 'fa fa-plus-square-o' => __( ' plus-square-o', 'byblos'), 'fa fa-square' => __( ' square', 'byblos'), 'fa fa-square-o' => __( ' square-o', 'byblos'), 'fa fa-cc-amex' => __( ' cc-amex', 'byblos'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'byblos'), 'fa fa-cc-discover' => __( ' cc-discover', 'byblos'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'byblos'), 'fa fa-cc-mastercard' => __( ' cc-mastercard', 'byblos'), 'fa fa-cc-paypal' => __( ' cc-paypal', 'byblos'), 'fa fa-cc-stripe' => __( ' cc-stripe', 'byblos'), 'fa fa-cc-visa' => __( ' cc-visa', 'byblos'), 'fa fa-credit-card' => __( ' credit-card', 'byblos'), 'fa fa-google-wallet' => __( ' google-wallet', 'byblos'), 'fa fa-paypal' => __( ' paypal', 'byblos'), 'fa fa-area-chart' => __( ' area-chart', 'byblos'), 'fa fa-bar-chart' => __( ' bar-chart', 'byblos'), 'fa fa-bar-chart-o' => __( ' bar-chart-o', 'byblos'), 'fa fa-line-chart' => __( ' line-chart', 'byblos'), 'fa fa-pie-chart' => __( ' pie-chart', 'byblos'), 'fa fa-bitcoin' => __( ' bitcoin', 'byblos'), 'fa fa-btc' => __( ' btc', 'byblos'), 'fa fa-cny' => __( ' cny', 'byblos'), 'fa fa-dollar' => __( ' dollar', 'byblos'), 'fa fa-eur' => __( ' eur', 'byblos'), 'fa fa-euro' => __( ' euro', 'byblos'), 'fa fa-gbp' => __( ' gbp', 'byblos'), 'fa fa-gg' => __( ' gg', 'byblos'), 'fa fa-gg-circle' => __( ' gg-circle', 'byblos'), 'fa fa-ils' => __( ' ils', 'byblos'), 'fa fa-inr' => __( ' inr', 'byblos'), 'fa fa-jpy' => __( ' jpy', 'byblos'), 'fa fa-krw' => __( ' krw', 'byblos'), 'fa fa-money' => __( ' money', 'byblos'), 'fa fa-rmb' => __( ' rmb', 'byblos'), 'fa fa-rouble' => __( ' rouble', 'byblos'), 'fa fa-rub' => __( ' rub', 'byblos'), 'fa fa-ruble' => __( ' ruble', 'byblos'), 'fa fa-rupee' => __( ' rupee', 'byblos'), 'fa fa-shekel' => __( ' shekel', 'byblos'), 'fa fa-sheqel' => __( ' sheqel', 'byblos'), 'fa fa-try' => __( ' try', 'byblos'), 'fa fa-turkish-lira' => __( ' turkish-lira', 'byblos'), 'fa fa-usd' => __( ' usd', 'byblos'), 'fa fa-won' => __( ' won', 'byblos'), 'fa fa-yen' => __( ' yen', 'byblos'), 'fa fa-align-center' => __( ' align-center', 'byblos'), 'fa fa-align-justify' => __( ' align-justify', 'byblos'), 'fa fa-align-left' => __( ' align-left', 'byblos'), 'fa fa-align-right' => __( ' align-right', 'byblos'), 'fa fa-bold' => __( ' bold', 'byblos'), 'fa fa-chain' => __( ' chain', 'byblos'), 'fa fa-chain-broken' => __( ' chain-broken', 'byblos'), 'fa fa-clipboard' => __( ' clipboard', 'byblos'), 'fa fa-columns' => __( ' columns', 'byblos'), 'fa fa-copy' => __( ' copy', 'byblos'), 'fa fa-cut' => __( ' cut', 'byblos'), 'fa fa-dedent' => __( ' dedent', 'byblos'), 'fa fa-eraser' => __( ' eraser', 'byblos'), 'fa fa-file' => __( ' file', 'byblos'), 'fa fa-file-o' => __( ' file-o', 'byblos'), 'fa fa-file-text' => __( ' file-text', 'byblos'), 'fa fa-file-text-o' => __( ' file-text-o', 'byblos'), 'fa fa-files-o' => __( ' files-o', 'byblos'), 'fa fa-floppy-o' => __( ' floppy-o', 'byblos'), 'fa fa-font' => __( ' font', 'byblos'), 'fa fa-header' => __( ' header', 'byblos'), 'fa fa-indent' => __( ' indent', 'byblos'), 'fa fa-italic' => __( ' italic', 'byblos'), 'fa fa-link' => __( ' link', 'byblos'), 'fa fa-list' => __( ' list', 'byblos'), 'fa fa-list-alt' => __( ' list-alt', 'byblos'), 'fa fa-list-ol' => __( ' list-ol', 'byblos'), 'fa fa-list-ul' => __( ' list-ul', 'byblos'), 'fa fa-outdent' => __( ' outdent', 'byblos'), 'fa fa-paperclip' => __( ' paperclip', 'byblos'), 'fa fa-paragraph' => __( ' paragraph', 'byblos'), 'fa fa-paste' => __( ' paste', 'byblos'), 'fa fa-repeat' => __( ' repeat', 'byblos'), 'fa fa-rotate-left' => __( ' rotate-left', 'byblos'), 'fa fa-rotate-right' => __( ' rotate-right', 'byblos'), 'fa fa-save' => __( ' save', 'byblos'), 'fa fa-scissors' => __( ' scissors', 'byblos'), 'fa fa-strikethrough' => __( ' strikethrough', 'byblos'), 'fa fa-subscript' => __( ' subscript', 'byblos'), 'fa fa-superscript' => __( ' superscript', 'byblos'), 'fa fa-table' => __( ' table', 'byblos'), 'fa fa-text-height' => __( ' text-height', 'byblos'), 'fa fa-text-width' => __( ' text-width', 'byblos'), 'fa fa-th' => __( ' th', 'byblos'), 'fa fa-th-large' => __( ' th-large', 'byblos'), 'fa fa-th-list' => __( ' th-list', 'byblos'), 'fa fa-underline' => __( ' underline', 'byblos'), 'fa fa-undo' => __( ' undo', 'byblos'), 'fa fa-unlink' => __( ' unlink', 'byblos'), 'fa fa-angle-double-down' => __( ' angle-double-down', 'byblos'), 'fa fa-angle-double-left' => __( ' angle-double-left', 'byblos'), 'fa fa-angle-double-right' => __( ' angle-double-right', 'byblos'), 'fa fa-angle-double-up' => __( ' angle-double-up', 'byblos'), 'fa fa-angle-down' => __( ' angle-down', 'byblos'), 'fa fa-angle-left' => __( ' angle-left', 'byblos'), 'fa fa-angle-right' => __( ' angle-right', 'byblos'), 'fa fa-angle-up' => __( ' angle-up', 'byblos'), 'fa fa-arrow-circle-down' => __( ' arrow-circle-down', 'byblos'), 'fa fa-arrow-circle-left' => __( ' arrow-circle-left', 'byblos'), 'fa fa-arrow-circle-o-down' => __( ' arrow-circle-o-down', 'byblos'), 'fa fa-arrow-circle-o-left' => __( ' arrow-circle-o-left', 'byblos'), 'fa fa-arrow-circle-o-right' => __( ' arrow-circle-o-right', 'byblos'), 'fa fa-arrow-circle-o-up' => __( ' arrow-circle-o-up', 'byblos'), 'fa fa-arrow-circle-right' => __( ' arrow-circle-right', 'byblos'), 'fa fa-arrow-circle-up' => __( ' arrow-circle-up', 'byblos'), 'fa fa-arrow-down' => __( ' arrow-down', 'byblos'), 'fa fa-arrow-left' => __( ' arrow-left', 'byblos'), 'fa fa-arrow-right' => __( ' arrow-right', 'byblos'), 'fa fa-arrow-up' => __( ' arrow-up', 'byblos'), 'fa fa-arrows' => __( ' arrows', 'byblos'), 'fa fa-arrows-alt' => __( ' arrows-alt', 'byblos'), 'fa fa-arrows-h' => __( ' arrows-h', 'byblos'), 'fa fa-arrows-v' => __( ' arrows-v', 'byblos'), 'fa fa-caret-down' => __( ' caret-down', 'byblos'), 'fa fa-caret-left' => __( ' caret-left', 'byblos'), 'fa fa-caret-right' => __( ' caret-right', 'byblos'), 'fa fa-caret-square-o-down' => __( ' caret-square-o-down', 'byblos'), 'fa fa-caret-square-o-left' => __( ' caret-square-o-left', 'byblos'), 'fa fa-caret-square-o-right' => __( ' caret-square-o-right', 'byblos'), 'fa fa-caret-square-o-up' => __( ' caret-square-o-up', 'byblos'), 'fa fa-caret-up' => __( ' caret-up', 'byblos'), 'fa fa-chevron-circle-down' => __( ' chevron-circle-down', 'byblos'), 'fa fa-chevron-circle-left' => __( ' chevron-circle-left', 'byblos'), 'fa fa-chevron-circle-right' => __( ' chevron-circle-right', 'byblos'), 'fa fa-chevron-circle-up' => __( ' chevron-circle-up', 'byblos'), 'fa fa-chevron-down' => __( ' chevron-down', 'byblos'), 'fa fa-chevron-left' => __( ' chevron-left', 'byblos'), 'fa fa-chevron-right' => __( ' chevron-right', 'byblos'), 'fa fa-chevron-up' => __( ' chevron-up', 'byblos'), 'fa fa-exchange' => __( ' exchange', 'byblos'), 'fa fa-hand-o-down' => __( ' hand-o-down', 'byblos'), 'fa fa-hand-o-left' => __( ' hand-o-left', 'byblos'), 'fa fa-hand-o-right' => __( ' hand-o-right', 'byblos'), 'fa fa-hand-o-up' => __( ' hand-o-up', 'byblos'), 'fa fa-long-arrow-down' => __( ' long-arrow-down', 'byblos'), 'fa fa-long-arrow-left' => __( ' long-arrow-left', 'byblos'), 'fa fa-long-arrow-right' => __( ' long-arrow-right', 'byblos'), 'fa fa-long-arrow-up' => __( ' long-arrow-up', 'byblos'), 'fa fa-toggle-down' => __( ' toggle-down', 'byblos'), 'fa fa-toggle-left' => __( ' toggle-left', 'byblos'), 'fa fa-toggle-right' => __( ' toggle-right', 'byblos'), 'fa fa-toggle-up' => __( ' toggle-up', 'byblos'), 'fa fa-arrows-alt' => __( ' arrows-alt', 'byblos'), 'fa fa-backward' => __( ' backward', 'byblos'), 'fa fa-compress' => __( ' compress', 'byblos'), 'fa fa-eject' => __( ' eject', 'byblos'), 'fa fa-expand' => __( ' expand', 'byblos'), 'fa fa-fast-backward' => __( ' fast-backward', 'byblos'), 'fa fa-fast-forward' => __( ' fast-forward', 'byblos'), 'fa fa-forward' => __( ' forward', 'byblos'), 'fa fa-pause' => __( ' pause', 'byblos'), 'fa fa-play' => __( ' play', 'byblos'), 'fa fa-play-circle' => __( ' play-circle', 'byblos'), 'fa fa-play-circle-o' => __( ' play-circle-o', 'byblos'), 'fa fa-random' => __( ' random', 'byblos'), 'fa fa-step-backward' => __( ' step-backward', 'byblos'), 'fa fa-step-forward' => __( ' step-forward', 'byblos'), 'fa fa-stop' => __( ' stop', 'byblos'), 'fa fa-youtube-play' => __( ' youtube-play', 'byblos'), 'fa fa-500px' => __( ' 500px', 'byblos'), 'fa fa-adn' => __( ' adn', 'byblos'), 'fa fa-amazon' => __( ' amazon', 'byblos'), 'fa fa-android' => __( ' android', 'byblos'), 'fa fa-angellist' => __( ' angellist', 'byblos'), 'fa fa-apple' => __( ' apple', 'byblos'), 'fa fa-behance' => __( ' behance', 'byblos'), 'fa fa-behance-square' => __( ' behance-square', 'byblos'), 'fa fa-bitbucket' => __( ' bitbucket', 'byblos'), 'fa fa-bitbucket-square' => __( ' bitbucket-square', 'byblos'), 'fa fa-bitcoin' => __( ' bitcoin', 'byblos'), 'fa fa-black-tie' => __( ' black-tie', 'byblos'), 'fa fa-btc' => __( ' btc', 'byblos'), 'fa fa-buysellads' => __( ' buysellads', 'byblos'), 'fa fa-cc-amex' => __( ' cc-amex', 'byblos'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'byblos'), 'fa fa-cc-discover' => __( ' cc-discover', 'byblos'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'byblos'), 'fa fa-cc-mastercard' => __( ' cc-mastercard', 'byblos'), 'fa fa-cc-paypal' => __( ' cc-paypal', 'byblos'), 'fa fa-cc-stripe' => __( ' cc-stripe', 'byblos'), 'fa fa-cc-visa' => __( ' cc-visa', 'byblos'), 'fa fa-chrome' => __( ' chrome', 'byblos'), 'fa fa-codepen' => __( ' codepen', 'byblos'), 'fa fa-connectdevelop' => __( ' connectdevelop', 'byblos'), 'fa fa-contao' => __( ' contao', 'byblos'), 'fa fa-css3' => __( ' css3', 'byblos'), 'fa fa-dashcube' => __( ' dashcube', 'byblos'), 'fa fa-delicious' => __( ' delicious', 'byblos'), 'fa fa-deviantart' => __( ' deviantart', 'byblos'), 'fa fa-digg' => __( ' digg', 'byblos'), 'fa fa-dribbble' => __( ' dribbble', 'byblos'), 'fa fa-dropbox' => __( ' dropbox', 'byblos'), 'fa fa-drupal' => __( ' drupal', 'byblos'), 'fa fa-empire' => __( ' empire', 'byblos'), 'fa fa-expeditedssl' => __( ' expeditedssl', 'byblos'), 'fa fa-facebook' => __( ' facebook', 'byblos'), 'fa fa-facebook-f' => __( ' facebook-f', 'byblos'), 'fa fa-facebook-official' => __( ' facebook-official', 'byblos'), 'fa fa-facebook-square' => __( ' facebook-square', 'byblos'), 'fa fa-firefox' => __( ' firefox', 'byblos'), 'fa fa-flickr' => __( ' flickr', 'byblos'), 'fa fa-fonticons' => __( ' fonticons', 'byblos'), 'fa fa-forumbee' => __( ' forumbee', 'byblos'), 'fa fa-foursquare' => __( ' foursquare', 'byblos'), 'fa fa-ge' => __( ' ge', 'byblos'), 'fa fa-get-pocket' => __( ' get-pocket', 'byblos'), 'fa fa-gg' => __( ' gg', 'byblos'), 'fa fa-gg-circle' => __( ' gg-circle', 'byblos'), 'fa fa-git' => __( ' git', 'byblos'), 'fa fa-git-square' => __( ' git-square', 'byblos'), 'fa fa-github' => __( ' github', 'byblos'), 'fa fa-github-alt' => __( ' github-alt', 'byblos'), 'fa fa-github-square' => __( ' github-square', 'byblos'), 'fa fa-gittip' => __( ' gittip', 'byblos'), 'fa fa-google' => __( ' google', 'byblos'), 'fa fa-google-plus' => __( ' google-plus', 'byblos'), 'fa fa-google-plus-square' => __( ' google-plus-square', 'byblos'), 'fa fa-google-wallet' => __( ' google-wallet', 'byblos'), 'fa fa-gratipay' => __( ' gratipay', 'byblos'), 'fa fa-hacker-news' => __( ' hacker-news', 'byblos'), 'fa fa-houzz' => __( ' houzz', 'byblos'), 'fa fa-html5' => __( ' html5', 'byblos'), 'fa fa-instagram' => __( ' instagram', 'byblos'), 'fa fa-internet-explorer' => __( ' internet-explorer', 'byblos'), 'fa fa-ioxhost' => __( ' ioxhost', 'byblos'), 'fa fa-joomla' => __( ' joomla', 'byblos'), 'fa fa-jsfiddle' => __( ' jsfiddle', 'byblos'), 'fa fa-lastfm' => __( ' lastfm', 'byblos'), 'fa fa-lastfm-square' => __( ' lastfm-square', 'byblos'), 'fa fa-leanpub' => __( ' leanpub', 'byblos'), 'fa fa-linkedin' => __( ' linkedin', 'byblos'), 'fa fa-linkedin-square' => __( ' linkedin-square', 'byblos'), 'fa fa-linux' => __( ' linux', 'byblos'), 'fa fa-maxcdn' => __( ' maxcdn', 'byblos'), 'fa fa-meanpath' => __( ' meanpath', 'byblos'), 'fa fa-medium' => __( ' medium', 'byblos'), 'fa fa-odnoklassniki' => __( ' odnoklassniki', 'byblos'), 'fa fa-odnoklassniki-square' => __( ' odnoklassniki-square', 'byblos'), 'fa fa-opencart' => __( ' opencart', 'byblos'), 'fa fa-openid' => __( ' openid', 'byblos'), 'fa fa-opera' => __( ' opera', 'byblos'), 'fa fa-optin-monster' => __( ' optin-monster', 'byblos'), 'fa fa-pagelines' => __( ' pagelines', 'byblos'), 'fa fa-paypal' => __( ' paypal', 'byblos'), 'fa fa-pied-piper' => __( ' pied-piper', 'byblos'), 'fa fa-pied-piper-alt' => __( ' pied-piper-alt', 'byblos'), 'fa fa-pinterest' => __( ' pinterest', 'byblos'), 'fa fa-pinterest-p' => __( ' pinterest-p', 'byblos'), 'fa fa-pinterest-square' => __( ' pinterest-square', 'byblos'), 'fa fa-qq' => __( ' qq', 'byblos'), 'fa fa-ra' => __( ' ra', 'byblos'), 'fa fa-rebel' => __( ' rebel', 'byblos'), 'fa fa-reddit' => __( ' reddit', 'byblos'), 'fa fa-reddit-square' => __( ' reddit-square', 'byblos'), 'fa fa-renren' => __( ' renren', 'byblos'), 'fa fa-safari' => __( ' safari', 'byblos'), 'fa fa-sellsy' => __( ' sellsy', 'byblos'), 'fa fa-share-alt' => __( ' share-alt', 'byblos'), 'fa fa-share-alt-square' => __( ' share-alt-square', 'byblos'), 'fa fa-shirtsinbulk' => __( ' shirtsinbulk', 'byblos'), 'fa fa-simplybuilt' => __( ' simplybuilt', 'byblos'), 'fa fa-skyatlas' => __( ' skyatlas', 'byblos'), 'fa fa-skype' => __( ' skype', 'byblos'), 'fa fa-slack' => __( ' slack', 'byblos'), 'fa fa-slideshare' => __( ' slideshare', 'byblos'), 'fa fa-soundcloud' => __( ' soundcloud', 'byblos'), 'fa fa-spotify' => __( ' spotify', 'byblos'), 'fa fa-stack-exchange' => __( ' stack-exchange', 'byblos'), 'fa fa-stack-overflow' => __( ' stack-overflow', 'byblos'), 'fa fa-steam' => __( ' steam', 'byblos'), 'fa fa-steam-square' => __( ' steam-square', 'byblos'), 'fa fa-stumbleupon' => __( ' stumbleupon', 'byblos'), 'fa fa-stumbleupon-circle' => __( ' stumbleupon-circle', 'byblos'), 'fa fa-tencent-weibo' => __( ' tencent-weibo', 'byblos'), 'fa fa-trello' => __( ' trello', 'byblos'), 'fa fa-tripadvisor' => __( ' tripadvisor', 'byblos'), 'fa fa-tumblr' => __( ' tumblr', 'byblos'), 'fa fa-tumblr-square' => __( ' tumblr-square', 'byblos'), 'fa fa-twitch' => __( ' twitch', 'byblos'), 'fa fa-twitter' => __( ' twitter', 'byblos'), 'fa fa-twitter-square' => __( ' twitter-square', 'byblos'), 'fa fa-viacoin' => __( ' viacoin', 'byblos'), 'fa fa-vimeo' => __( ' vimeo', 'byblos'), 'fa fa-vimeo-square' => __( ' vimeo-square', 'byblos'), 'fa fa-vine' => __( ' vine', 'byblos'), 'fa fa-vk' => __( ' vk', 'byblos'), 'fa fa-wechat' => __( ' wechat', 'byblos'), 'fa fa-weibo' => __( ' weibo', 'byblos'), 'fa fa-weixin' => __( ' weixin', 'byblos'), 'fa fa-whatsapp' => __( ' whatsapp', 'byblos'), 'fa fa-wikipedia-w' => __( ' wikipedia-w', 'byblos'), 'fa fa-windows' => __( ' windows', 'byblos'), 'fa fa-wordpress' => __( ' wordpress', 'byblos'), 'fa fa-xing' => __( ' xing', 'byblos'), 'fa fa-xing-square' => __( ' xing-square', 'byblos'), 'fa fa-y-combinator' => __( ' y-combinator', 'byblos'), 'fa fa-y-combinator-square' => __( ' y-combinator-square', 'byblos'), 'fa fa-yahoo' => __( ' yahoo', 'byblos'), 'fa fa-yc' => __( ' yc', 'byblos'), 'fa fa-yc-square' => __( ' yc-square', 'byblos'), 'fa fa-yelp' => __( ' yelp', 'byblos'), 'fa fa-youtube' => __( ' youtube', 'byblos'), 'fa fa-youtube-play' => __( ' youtube-play', 'byblos'), 'fa fa-youtube-square' => __( ' youtube-square', 'byblos'), 'fa fa-ambulance' => __( ' ambulance', 'byblos'), 'fa fa-h-square' => __( ' h-square', 'byblos'), 'fa fa-heart' => __( ' heart', 'byblos'), 'fa fa-heart-o' => __( ' heart-o', 'byblos'), 'fa fa-heartbeat' => __( ' heartbeat', 'byblos'), 'fa fa-hospital-o' => __( ' hospital-o', 'byblos'), 'fa fa-medkit' => __( ' medkit', 'byblos'), 'fa fa-plus-square' => __( ' plus-square', 'byblos'), 'fa fa-stethoscope' => __( ' stethoscope', 'byblos'), 'fa fa-user-md' => __( ' user-md', 'byblos'), 'fa fa-wheelchair' => __( ' wheelchair', 'byblos') );
    
    
    
}

function byblos_font_sizes(){
    
    $font_size_array = array(
        '10px' => '10 px',
        '12px' => '12 px',
        '14px' => '14 px',
        '16px' => '16 px',
        '18px' => '18 px',
        '20px' => '20 px',
        '22px' => '22 px',
        '24px' => '24 px',
    );
    
    return $font_size_array;
    
}


function byblos_font_sanitize( $input ) {
    
    $valid_keys = byblos_fonts();
    
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
    
}

function byblos_font_size_sanitize( $input ) {
    
    $valid_keys = byblos_font_sizes();
    
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
    
}

function byblos_icon_sanitize( $input ) {
    
    $valid_keys = byblos_icons();
    
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
    
}

function byblos_text_sanitize( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function byblos_slider_transition_sanitize($input) {
    $valid_keys = array(
        'true' => __('Fade', 'byblos'),
        'false' => __('Slide', 'byblos'),
    );
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
}

function byblos_radio_sanitize_enabledisable($input) {
    $valid_keys = array(
        'enable' => __('Enable', 'byblos'),
        'disable' => __('Disable', 'byblos')
    );
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
}

function byblos_radio_sanitize_yesno($input) {
    $valid_keys = array(
        'yes' => __('Yes', 'byblos'),
        'no' => __('No', 'byblos')
    );
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
}

// checkbox sanitization
function byblos_checkbox_sanitize($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}

//integer sanitize
function byblos_integer_sanitize($input) {
    return intval($input);
}


function byblos_sidebar_sanitize($input) {
    
    $valid = array(
        'none'              => __( 'No Sidebar', 'byblos'),
        'right'             => __( 'Right', 'byblos'),
        'left'              => __( 'Left', 'byblos'),
    );
    
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
    
    
}

function byblos_on_off_sanitize($input) {
    $valid = array(
        'on'    => __( 'Show', 'byblos' ),
        'off'    => __( 'Hide', 'byblos' )
    );

    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

function byblos_theme_color_sanitize($input) {
    $valid = array(
        'green'             => __( 'Green', 'byblos' ),
        'blue'              => __( 'Blue', 'byblos' ),
        'red'               => __( 'Red', 'byblos' ),
        'pink'              => __( 'Pink', 'byblos' ),
        'yellow'            => __( 'Yellow', 'byblos' ),
        'darkblue'          => __( 'Dark Blue', 'byblos' ),
    );

    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

