<?php

/**
 * byblos Theme Customizer
 *
 * @package byblos
 */

function byblos_get_options() {
    
    return get_option('_byblos', array(
        'sc_logo_image'         => '',
        'sc_facebook_url'       => '#',
        'sc_twitter_url'        => '#',
        'sc_linkedin_url'       => '#',
        'sc_gplus_url'          => '#',
        'sc_instagram_url'      => '#',
        'sc_pinterest_url'      => '#',
        'sc_soundcloud_url'     => '#',
        'sc_theme_color'        => 'orange',
        'sc_font_size'          => '16px',
        'sc_font_family'        => 'Raleway, sans-serif',
        'sc_slider_bool'        => 'yes',
        'sc_slide1_image'       => get_template_directory_uri() . '/inc/images/bride.jpg',
        'sc_slide1_text'        => __( 'Welcome to Byblos', 'byblos' ),
        'sc_slide2_image'       => get_template_directory_uri() . '/inc/images/bride.jpg',
        'sc_slide2_text'        => __( 'Responsive WordPress theme', 'byblos' ),
        'sc_slide3_image'       => get_template_directory_uri() . '/inc/images/bride.jpg',
        'sc_slide3_text'        => __( 'Featuring a fullscreen responsive slider', 'byblos' ),
        'sc_banner_bool'        => 'yes',
        'sc_cta_bool'           => 'yes',
        'sc_cta1_title'         => __( 'Responsive', 'byblos'),
        'sc_cta1_text'          => __( 'Byblos is a reponsive theme that looks great on desktop, tablet and mobile', 'byblos' ),
        'sc_cta1_url'           => '#',
        'sc_box1_image'         => get_template_directory_uri() . '/inc/images/bride.jpg',
        'sc_cta2_title'         => __( 'Appealing', 'byblos' ),
        'sc_cta2_text'          => __( 'Byblos is a reponsive theme that looks great on desktop, tablet and mobile', 'byblos' ),
        'sc_cta2_url'           => '#',
        'sc_box2_image'         => get_template_directory_uri() . '/inc/images/bride.jpg',
        'sc_cta3_title'         => __( 'Customizable', 'byblos' ),
        'sc_cta3_text'          => __( 'Byblos is a reponsive theme that looks great on desktop, tablet and mobile', 'byblos' ),
        'sc_cta3_url'           => '#',
        'sc_box3_image'         => get_template_directory_uri() . '/inc/images/bride.jpg',
        'sc_footer_text'        => __( 'Company Name', 'byblos' )
        
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
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('title_tagline');

    // *********************************************
    // ****************** LOGO  *****************
    // *********************************************
    
    $wp_customize->add_panel('logo', array(
        'title' => __('Logo, Title & Favicon', 'byblos'),
        'description' => __('set the logo image, site title, description and site icon favicon', 'byblos'),
        'priority' => 10
    ));
    
    $wp_customize->add_section( 'title_tagline', array (
        'title' => __( 'Site Title & Icon', 'athena' ),
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
        'sanitize_callback'     => 'byblos_sanitize',
        'type'                  => 'option'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control4', array (
        'label' =>              __( 'Logo', 'athena' ),
        'section'               => 'logo',
        'mime_type'             => 'image',
        'settings'              => 'byblos[sc_logo_image]',
        'description'           => __( 'Image for your site - Leave blank to use the Site Title & Tagline instead.', 'athena' ),        
    ) ) );

    
    // *********************************************
    // ****************** Frontpage *****************
    // *********************************************

    $wp_customize->add_panel('frontpage', array(
        'title' => __('Frontpage', 'byblos'),
        'description' => __('Customize the frontpage', 'byblos'),
        'priority' => 10
    ));

    $wp_customize->add_section('callouts', array(
        'title' => __('Callout Boxes', 'byblos'),
        'description' => __('Use these settings to enable/disable the callouts, as well as set titles & images', 'byblos'),
        'panel' => 'frontpage',
    ));

    
    
    // *********************************************
    // ****************** Slider *****************
    // *********************************************

    $wp_customize->add_panel('slider', array(
        'title' => __('Slider', 'byblos'),
        'description' => __('Customize the slider. Athena includes 2 slides, and the pro version supports up to 5', 'byblos'),
        'priority' => 10
    ));

    $wp_customize->add_section('slide1', array(
        'title' => __('Slide #1', 'byblos'),
        'description' => __('Use the settings below to upload your images, set main callout text and button text & URLs', 'byblos'),
        'panel' => 'slider',
    ));

    $wp_customize->add_section('slide2', array(
        'title' => __('Slide #2', 'byblos'),
        'description' => __('Use the settings below to upload your images, set main callout text and button text & URLs', 'byblos'),
        'panel' => 'slider',
    ));

    $wp_customize->add_section('slide3', array(
        'title' => __('Slide #3', 'byblos'),
        'description' => __('Use the settings below to upload your images, set main callout text and button text & URLs', 'byblos'),
        'panel' => 'slider',
    ));

    // 1st slide
    $wp_customize->add_setting('sc_slide1_image', array(
        'default' => get_template_directory_uri() . '/inc/images/bride.jpg',
        'transport' => 'refresh',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_sanitize'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control1', array(
        'label' => __('Background Image', 'byblos'),
        'section' => 'slide1',
        'mime_type' => 'image',
        'settings' => 'sc_slide1_image',
        'description' => __('Select the image file that you would like to use as the featured images', 'byblos'),
    )));

    $wp_customize->add_setting('byblos_slide1_text', array(
        'default' => __('Welcome to Athena', 'byblos'),
        'transport' => 'postMessage',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_sanitize'
    ));

    $wp_customize->add_control('byblos_slide1_text', array(
        'type' => 'text',
        'section' => 'slide1',
        'label' => __('Header Text', 'byblos'),
        'description' => __('The main heading text, leave blank to hide', 'byblos'),
    ));


    // 2nd slide
    $wp_customize->add_setting('byblos_slide2_image', array(
        'default' => get_template_directory_uri() . '/inc/images/bride.jpg',
        'transport' => 'postMessage',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_sanitize'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control2', array(
        'label' => __('Background Image', 'byblos'),
        'section' => 'slide2',
        'mime_type' => 'image',
        'settings' => 'byblos_slide2_image',
        'description' => __('Select the image file that you would like to use as the featured images', 'byblos'),
    )));

    $wp_customize->add_setting('byblos_slide2_text', array(
        'default' => __('Welcome to Athena', 'byblos'),
        'transport' => 'postMessage',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_sanitize'
    ));

    $wp_customize->add_control('byblos_slide2_text', array(
        'type' => 'text',
        'section' => 'slide2',
        'label' => __('Header Text', 'byblos'),
        'description' => __('The main heading text, leave blank to hide', 'byblos'),
    ));

    // 3rd slide
    $wp_customize->add_setting('byblos_slide3_image', array(
        'default' => get_template_directory_uri() . '/inc/images/bride.jpg',
        'transport' => 'postMessage',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_sanitize'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control3', array(
        'label' => __('Background Image', 'byblos'),
        'section' => 'slide3',
        'mime_type' => 'image',
        'settings' => 'byblos_slide3_image',
        'description' => __('Select the image file that you would like to use as the featured images', 'byblos'),
    )));

    $wp_customize->add_setting('byblos_slide3_text', array(
        'default' => __('Welcome to Athena', 'byblos'),
        'transport' => 'postMessage',
        'type'  => 'option',
        'sanitize_callback' => 'byblos_sanitize'
    ));

    $wp_customize->add_control('byblos_slide3_text', array(
        'type' => 'text',
        'section' => 'slide3',
        'label' => __('Header Text', 'byblos'),
        'description' => __('The main heading text, leave blank to hide', 'byblos'),
    ));

    
    // *********************************************
    // ****************** Appearance *****************
    // *********************************************
    
    $wp_customize->add_panel( 'appearance', array (
        'title'                 => __( 'Appearance', 'athena' ),
        'description'           => __( 'Customize your site colros, fonts and other appearance settings', 'athena' ),
        'priority'              => 10
    ) );
    
    $wp_customize->add_section( 'color', array (
        'title'                 => __( 'Skin Color', 'athena' ),
        'panel'                 => 'appearance',
    ) );
    
    $wp_customize->add_section( 'font', array (
        'title'                 => __( 'Fonts', 'athena' ),
        'panel'                 => 'appearance',
    ) );
    
    $wp_customize->add_setting( 'byblos[sc_theme_color]', array (
        'default'               => 'green',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_sanitize',
        'type'  => 'option'
    ) );
    
    $wp_customize->add_control( 'byblos[sc_theme_color]', array(
        'type'                  => 'radio',
        'section'               => 'color',
        'label'                 => __( 'Theme Skin Color', 'athena' ),
        'description'           => __( 'Select the theme main color', 'athena' ),
        'choices'               => array(
            'orange'             => __( 'Orange', 'athena' ),
            'green'             => __( 'Green', 'athena' ),
            'blue'              => __( 'Blue', 'athena' ),
            'red'               => __( 'Red', 'athena' ),
            'pink'              => __( 'Pink', 'athena' ),
            'yellow'            => __( 'Yellow', 'athena' ),
            'darkblue'          => __( 'Dark Blue', 'athena' ),
        )
        
    ) );
    
    
    $wp_customize->add_setting( 'byblos[sc_font_family]', array (
        'default'               => 'Josefin Sans, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_sanitize',
        'type'  => 'option'
    ) );
    
    $wp_customize->add_control( 'byblos[sc_font_family]', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'Menu Font', 'athena' ),
        'choices'               => byblos_fonts()
        
    ) );
    
    
    $wp_customize->add_setting( 'byblos[sc_font_size]', array (
        'default'               => '18px',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_sanitize',
        'type'  => 'option'
    ) );
    
    $wp_customize->add_control( 'byblos[sc_font_size]', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'Menu Font Size', 'athena' ),
        'choices'               => athena_font_sizes()
        
    ) );
    
    $wp_customize->add_setting( 'byblos_main_font_size', array (
        'default'               => '20px',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'byblos_sanitize',
        'type'  => 'option'
    ) );
    
    $wp_customize->add_control( 'byblos_main_font_size', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'Content Font Size', 'athena' ),
        'choices'               => athena_font_sizes()
        
    ) );
    
    

    // *********************************************
    // ****************** Vertical Bar *****************
    // *********************************************
    $wp_customize->add_panel('social', array(
        'title' => __('Vertical Menu', 'athena'),
        'description' => __('Social Icons, Links, Credits', 'athena'),
        'priority' => 10
    ));

    // Social Links Section
    $wp_customize->add_section('social_links', array(
        'title' => __('Social Icons & Links', 'athena'),
        'panel' => 'social',
    ));

    $wp_customize->add_setting('byblos_social_title', array(
        'default' => __( 'Find Us', 'byblos'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos_social_title', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Social Section Title', 'athena')
    ));

    $wp_customize->add_setting('byblos_phone', array(
        'default' => '888.989.1111',
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos_phone', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Phone Number', 'athena')
    ));

    $wp_customize->add_setting('byblos_email', array(
        'default' => 'info@domain.com',
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos_email', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Email Address', 'athena')
    ));

    $wp_customize->add_setting('byblos[sc_facebook_url]', array(
        'default' => '#',
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_facebook_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Facebook URL', 'athena')
    ));

    $wp_customize->add_setting('byblos[sc_gplus_url]', array(
        'default' => '#',
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_gplus_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Google Plus URL', 'athena')
    ));

    $wp_customize->add_setting('byblos[sc_instagram_url]', array(
        'default' => '#',
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_instagram_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Instagram URL', 'athena')
    ));

    $wp_customize->add_setting('byblos[sc_linkedin_url]', array(
        'default' => '#',
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_linkedin_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Linkedin URL', 'athena')
    ));

    $wp_customize->add_setting('byblos[sc_pinterest_url]', array(
        'default' => '#',
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_pinterest_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Pinterest URL', 'athena')
    ));

    $wp_customize->add_setting('byblos[sc_soundcloud_url]', array(
        'default' => '#',
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_soundcloud_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Soundcloud URL', 'athena')
    ));

    $wp_customize->add_setting('byblos[sc_twitter_url]', array(
        'default' => '#',
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos[sc_twitter_url]', array(
        'type' => 'text',
        'section' => 'social_links',
        'label' => __('Twitter URL', 'athena')
    ));
    
    // Company Name
    $wp_customize->add_section('credits', array(
        'title' => __('Company Name & Branding', 'athena'),
        'panel' => 'social',
    ));
    
    $wp_customize->add_setting('byblos_company', array(
        'default' => __( '&copy; Comapny Name 2016', 'byblos' ),
        'transport' => 'postMessage',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('byblos_company', array(
        'type' => 'text',
        'section' => 'credits',
        'label' => __('Company Name', 'athena')
    ));
    
    // *********************************************
    // ****************** Templates *****************
    // *********************************************
    $wp_customize->add_panel('templates', array(
        'title' => __('Templates', 'athena'),
        'description' => __('Modify the appearance of your WordPress templates', 'athena'),
        'priority' => 10
    ));

    // Single post Section
    $wp_customize->add_section('single', array(
        'title' => __('Social post template', 'athena'),
        'panel' => 'templates',
    ));
    
    $wp_customize->add_setting('single_date', array(
        'default' => __( 'on', 'byblos' ),
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('single_date', array(
        'type' => 'radio',
        'section' => 'single',
        'label' => __('Post Date', 'athena'),
        'choices'   => array(
            'on'    => 'Show',
            'off'   => 'Hide'
        )
    ));
    
    $wp_customize->add_setting('single_image', array(
        'default' => __( 'on', 'byblos' ),
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('single_image', array(
        'type' => 'radio',
        'section' => 'single',
        'label' => __('Post Image', 'athena'),
        'choices'   => array(
            'on'    => 'Show',
            'off'   => 'Hide'
        )
    ));
    
    $wp_customize->add_setting('single_author', array(
        'default' => __( 'on', 'byblos' ),
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('single_author', array(
        'type' => 'radio',
        'section' => 'single',
        'label' => __('Post Author', 'athena'),
        'choices'   => array(
            'on'    => __( 'Show','byblos' ),
            'off'   => __( 'Hide','byblos')
        )
    ));
    
    // Blog Section
    $wp_customize->add_section('blog', array(
        'title' => __('Blog template', 'athena'),
        'panel' => 'templates',
    ));
    
    $wp_customize->add_setting('blog_sidebar', array(
        'default' => __( 'on', 'byblos' ),
        'transport' => 'refresh',
        'sanitize_callback' => 'byblos_sanitize',
        'type'  => 'option'
    ));

    $wp_customize->add_control('blog_sidebar', array(
        'type' => 'radio',
        'section' => 'blog',
        'label' => __('Blog Sidebar', 'athena'),
        'choices'   => array(
            'col1'    => __( 'Full Width', 'byblos' ),
            'col2r'   => __( 'Sidebar', 'byblos' )
        )
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


function athena_icons(){
    
    return array( 
        'fa fa-clock' => __( 'Select One', 'athena'), 
        'fa fa-500px' => __( ' 500px', 'athena'), 
        'fa fa-amazon' => __( ' amazon', 'athena'), 
        'fa fa-balance-scale' => __( ' balance-scale', 'athena'), 'fa fa-battery-0' => __( ' battery-0', 'athena'), 'fa fa-battery-1' => __( ' battery-1', 'athena'), 'fa fa-battery-2' => __( ' battery-2', 'athena'), 'fa fa-battery-3' => __( ' battery-3', 'athena'), 'fa fa-battery-4' => __( ' battery-4', 'athena'), 'fa fa-battery-empty' => __( ' battery-empty', 'athena'), 'fa fa-battery-full' => __( ' battery-full', 'athena'), 'fa fa-battery-half' => __( ' battery-half', 'athena'), 'fa fa-battery-quarter' => __( ' battery-quarter', 'athena'), 'fa fa-battery-three-quarters' => __( ' battery-three-quarters', 'athena'), 'fa fa-black-tie' => __( ' black-tie', 'athena'), 'fa fa-calendar-check-o' => __( ' calendar-check-o', 'athena'), 'fa fa-calendar-minus-o' => __( ' calendar-minus-o', 'athena'), 'fa fa-calendar-plus-o' => __( ' calendar-plus-o', 'athena'), 'fa fa-calendar-times-o' => __( ' calendar-times-o', 'athena'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'athena'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'athena'), 'fa fa-chrome' => __( ' chrome', 'athena'), 'fa fa-clone' => __( ' clone', 'athena'), 'fa fa-commenting' => __( ' commenting', 'athena'), 'fa fa-commenting-o' => __( ' commenting-o', 'athena'), 'fa fa-contao' => __( ' contao', 'athena'), 'fa fa-creative-commons' => __( ' creative-commons', 'athena'), 'fa fa-expeditedssl' => __( ' expeditedssl', 'athena'), 'fa fa-firefox' => __( ' firefox', 'athena'), 'fa fa-fonticons' => __( ' fonticons', 'athena'), 'fa fa-genderless' => __( ' genderless', 'athena'), 'fa fa-get-pocket' => __( ' get-pocket', 'athena'), 'fa fa-gg' => __( ' gg', 'athena'), 'fa fa-gg-circle' => __( ' gg-circle', 'athena'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'athena'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'athena'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'athena'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'athena'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'athena'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'athena'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'athena'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'athena'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'athena'), 'fa fa-hourglass' => __( ' hourglass', 'athena'), 'fa fa-hourglass-1' => __( ' hourglass-1', 'athena'), 'fa fa-hourglass-2' => __( ' hourglass-2', 'athena'), 'fa fa-hourglass-3' => __( ' hourglass-3', 'athena'), 'fa fa-hourglass-end' => __( ' hourglass-end', 'athena'), 'fa fa-hourglass-half' => __( ' hourglass-half', 'athena'), 'fa fa-hourglass-o' => __( ' hourglass-o', 'athena'), 'fa fa-hourglass-start' => __( ' hourglass-start', 'athena'), 'fa fa-houzz' => __( ' houzz', 'athena'), 'fa fa-i-cursor' => __( ' i-cursor', 'athena'), 'fa fa-industry' => __( ' industry', 'athena'), 'fa fa-internet-explorer' => __( ' internet-explorer', 'athena'), 'fa fa-map' => __( ' map', 'athena'), 'fa fa-map-o' => __( ' map-o', 'athena'), 'fa fa-map-pin' => __( ' map-pin', 'athena'), 'fa fa-map-signs' => __( ' map-signs', 'athena'), 'fa fa-mouse-pointer' => __( ' mouse-pointer', 'athena'), 'fa fa-object-group' => __( ' object-group', 'athena'), 'fa fa-object-ungroup' => __( ' object-ungroup', 'athena'), 'fa fa-odnoklassniki' => __( ' odnoklassniki', 'athena'), 'fa fa-odnoklassniki-square' => __( ' odnoklassniki-square', 'athena'), 'fa fa-opencart' => __( ' opencart', 'athena'), 'fa fa-opera' => __( ' opera', 'athena'), 'fa fa-optin-monster' => __( ' optin-monster', 'athena'), 'fa fa-registered' => __( ' registered', 'athena'), 'fa fa-safari' => __( ' safari', 'athena'), 'fa fa-sticky-note' => __( ' sticky-note', 'athena'), 'fa fa-sticky-note-o' => __( ' sticky-note-o', 'athena'), 'fa fa-television' => __( ' television', 'athena'), 'fa fa-trademark' => __( ' trademark', 'athena'), 'fa fa-tripadvisor' => __( ' tripadvisor', 'athena'), 'fa fa-tv' => __( ' tv', 'athena'), 'fa fa-vimeo' => __( ' vimeo', 'athena'), 'fa fa-wikipedia-w' => __( ' wikipedia-w', 'athena'), 'fa fa-y-combinator' => __( ' y-combinator', 'athena'), 'fa fa-yc' => __( ' yc', 'athena'), 'fa fa-adjust' => __( ' adjust', 'athena'), 'fa fa-anchor' => __( ' anchor', 'athena'), 'fa fa-archive' => __( ' archive', 'athena'), 'fa fa-area-chart' => __( ' area-chart', 'athena'), 'fa fa-arrows' => __( ' arrows', 'athena'), 'fa fa-arrows-h' => __( ' arrows-h', 'athena'), 'fa fa-arrows-v' => __( ' arrows-v', 'athena'), 'fa fa-asterisk' => __( ' asterisk', 'athena'), 'fa fa-at' => __( ' at', 'athena'), 'fa fa-automobile' => __( ' automobile', 'athena'), 'fa fa-balance-scale' => __( ' balance-scale', 'athena'), 'fa fa-ban' => __( ' ban', 'athena'), 'fa fa-bank' => __( ' bank', 'athena'), 'fa fa-bar-chart' => __( ' bar-chart', 'athena'), 'fa fa-bar-chart-o' => __( ' bar-chart-o', 'athena'), 'fa fa-barcode' => __( ' barcode', 'athena'), 'fa fa-bars' => __( ' bars', 'athena'), 'fa fa-battery-0' => __( ' battery-0', 'athena'), 'fa fa-battery-1' => __( ' battery-1', 'athena'), 'fa fa-battery-2' => __( ' battery-2', 'athena'), 'fa fa-battery-3' => __( ' battery-3', 'athena'), 'fa fa-battery-4' => __( ' battery-4', 'athena'), 'fa fa-battery-empty' => __( ' battery-empty', 'athena'), 'fa fa-battery-full' => __( ' battery-full', 'athena'), 'fa fa-battery-half' => __( ' battery-half', 'athena'), 'fa fa-battery-quarter' => __( ' battery-quarter', 'athena'), 'fa fa-battery-three-quarters' => __( ' battery-three-quarters', 'athena'), 'fa fa-bed' => __( ' bed', 'athena'), 'fa fa-beer' => __( ' beer', 'athena'), 'fa fa-bell' => __( ' bell', 'athena'), 'fa fa-bell-o' => __( ' bell-o', 'athena'), 'fa fa-bell-slash' => __( ' bell-slash', 'athena'), 'fa fa-bell-slash-o' => __( ' bell-slash-o', 'athena'), 'fa fa-bicycle' => __( ' bicycle', 'athena'), 'fa fa-binoculars' => __( ' binoculars', 'athena'), 'fa fa-birthday-cake' => __( ' birthday-cake', 'athena'), 'fa fa-bolt' => __( ' bolt', 'athena'), 'fa fa-bomb' => __( ' bomb', 'athena'), 'fa fa-book' => __( ' book', 'athena'), 'fa fa-bookmark' => __( ' bookmark', 'athena'), 'fa fa-bookmark-o' => __( ' bookmark-o', 'athena'), 'fa fa-briefcase' => __( ' briefcase', 'athena'), 'fa fa-bug' => __( ' bug', 'athena'), 'fa fa-building' => __( ' building', 'athena'), 'fa fa-building-o' => __( ' building-o', 'athena'), 'fa fa-bullhorn' => __( ' bullhorn', 'athena'), 'fa fa-bullseye' => __( ' bullseye', 'athena'), 'fa fa-bus' => __( ' bus', 'athena'), 'fa fa-cab' => __( ' cab', 'athena'), 'fa fa-calculator' => __( ' calculator', 'athena'), 'fa fa-calendar' => __( ' calendar', 'athena'), 'fa fa-calendar-check-o' => __( ' calendar-check-o', 'athena'), 'fa fa-calendar-minus-o' => __( ' calendar-minus-o', 'athena'), 'fa fa-calendar-o' => __( ' calendar-o', 'athena'), 'fa fa-calendar-plus-o' => __( ' calendar-plus-o', 'athena'), 'fa fa-calendar-times-o' => __( ' calendar-times-o', 'athena'), 'fa fa-camera' => __( ' camera', 'athena'), 'fa fa-camera-retro' => __( ' camera-retro', 'athena'), 'fa fa-car' => __( ' car', 'athena'), 'fa fa-caret-square-o-down' => __( ' caret-square-o-down', 'athena'), 'fa fa-caret-square-o-left' => __( ' caret-square-o-left', 'athena'), 'fa fa-caret-square-o-right' => __( ' caret-square-o-right', 'athena'), 'fa fa-caret-square-o-up' => __( ' caret-square-o-up', 'athena'), 'fa fa-cart-arrow-down' => __( ' cart-arrow-down', 'athena'), 'fa fa-cart-plus' => __( ' cart-plus', 'athena'), 'fa fa-cc' => __( ' cc', 'athena'), 'fa fa-certificate' => __( ' certificate', 'athena'), 'fa fa-check' => __( ' check', 'athena'), 'fa fa-check-circle' => __( ' check-circle', 'athena'), 'fa fa-check-circle-o' => __( ' check-circle-o', 'athena'), 'fa fa-check-square' => __( ' check-square', 'athena'), 'fa fa-check-square-o' => __( ' check-square-o', 'athena'), 'fa fa-child' => __( ' child', 'athena'), 'fa fa-circle' => __( ' circle', 'athena'), 'fa fa-circle-o' => __( ' circle-o', 'athena'), 'fa fa-circle-o-notch' => __( ' circle-o-notch', 'athena'), 'fa fa-circle-thin' => __( ' circle-thin', 'athena'), 'fa fa-clock-o' => __( ' clock-o', 'athena'), 'fa fa-clone' => __( ' clone', 'athena'), 'fa fa-close' => __( ' close', 'athena'), 'fa fa-cloud' => __( ' cloud', 'athena'), 'fa fa-cloud-download' => __( ' cloud-download', 'athena'), 'fa fa-cloud-upload' => __( ' cloud-upload', 'athena'), 'fa fa-code' => __( ' code', 'athena'), 'fa fa-code-fork' => __( ' code-fork', 'athena'), 'fa fa-coffee' => __( ' coffee', 'athena'), 'fa fa-cog' => __( ' cog', 'athena'), 'fa fa-cogs' => __( ' cogs', 'athena'), 'fa fa-comment' => __( ' comment', 'athena'), 'fa fa-comment-o' => __( ' comment-o', 'athena'), 'fa fa-commenting' => __( ' commenting', 'athena'), 'fa fa-commenting-o' => __( ' commenting-o', 'athena'), 'fa fa-comments' => __( ' comments', 'athena'), 'fa fa-comments-o' => __( ' comments-o', 'athena'), 'fa fa-compass' => __( ' compass', 'athena'), 'fa fa-copyright' => __( ' copyright', 'athena'), 'fa fa-creative-commons' => __( ' creative-commons', 'athena'), 'fa fa-credit-card' => __( ' credit-card', 'athena'), 'fa fa-crop' => __( ' crop', 'athena'), 'fa fa-crosshairs' => __( ' crosshairs', 'athena'), 'fa fa-cube' => __( ' cube', 'athena'), 'fa fa-cubes' => __( ' cubes', 'athena'), 'fa fa-cutlery' => __( ' cutlery', 'athena'), 'fa fa-dashboard' => __( ' dashboard', 'athena'), 'fa fa-database' => __( ' database', 'athena'), 'fa fa-desktop' => __( ' desktop', 'athena'), 'fa fa-diamond' => __( ' diamond', 'athena'), 'fa fa-dot-circle-o' => __( ' dot-circle-o', 'athena'), 'fa fa-download' => __( ' download', 'athena'), 'fa fa-edit' => __( ' edit', 'athena'), 'fa fa-ellipsis-h' => __( ' ellipsis-h', 'athena'), 'fa fa-ellipsis-v' => __( ' ellipsis-v', 'athena'), 'fa fa-envelope' => __( ' envelope', 'athena'), 'fa fa-envelope-o' => __( ' envelope-o', 'athena'), 'fa fa-envelope-square' => __( ' envelope-square', 'athena'), 'fa fa-eraser' => __( ' eraser', 'athena'), 'fa fa-exchange' => __( ' exchange', 'athena'), 'fa fa-exclamation' => __( ' exclamation', 'athena'), 'fa fa-exclamation-circle' => __( ' exclamation-circle', 'athena'), 'fa fa-exclamation-triangle' => __( ' exclamation-triangle', 'athena'), 'fa fa-external-link' => __( ' external-link', 'athena'), 'fa fa-external-link-square' => __( ' external-link-square', 'athena'), 'fa fa-eye' => __( ' eye', 'athena'), 'fa fa-eye-slash' => __( ' eye-slash', 'athena'), 'fa fa-eyedropper' => __( ' eyedropper', 'athena'), 'fa fa-fax' => __( ' fax', 'athena'), 'fa fa-feed' => __( ' feed', 'athena'), 'fa fa-female' => __( ' female', 'athena'), 'fa fa-fighter-jet' => __( ' fighter-jet', 'athena'), 'fa fa-file-archive-o' => __( ' file-archive-o', 'athena'), 'fa fa-file-audio-o' => __( ' file-audio-o', 'athena'), 'fa fa-file-code-o' => __( ' file-code-o', 'athena'), 'fa fa-file-excel-o' => __( ' file-excel-o', 'athena'), 'fa fa-file-image-o' => __( ' file-image-o', 'athena'), 'fa fa-file-movie-o' => __( ' file-movie-o', 'athena'), 'fa fa-file-pdf-o' => __( ' file-pdf-o', 'athena'), 'fa fa-file-photo-o' => __( ' file-photo-o', 'athena'), 'fa fa-file-picture-o' => __( ' file-picture-o', 'athena'), 'fa fa-file-powerpoint-o' => __( ' file-powerpoint-o', 'athena'), 'fa fa-file-sound-o' => __( ' file-sound-o', 'athena'), 'fa fa-file-video-o' => __( ' file-video-o', 'athena'), 'fa fa-file-word-o' => __( ' file-word-o', 'athena'), 'fa fa-file-zip-o' => __( ' file-zip-o', 'athena'), 'fa fa-film' => __( ' film', 'athena'), 'fa fa-filter' => __( ' filter', 'athena'), 'fa fa-fire' => __( ' fire', 'athena'), 'fa fa-fire-extinguisher' => __( ' fire-extinguisher', 'athena'), 'fa fa-flag' => __( ' flag', 'athena'), 'fa fa-flag-checkered' => __( ' flag-checkered', 'athena'), 'fa fa-flag-o' => __( ' flag-o', 'athena'), 'fa fa-flash' => __( ' flash', 'athena'), 'fa fa-flask' => __( ' flask', 'athena'), 'fa fa-folder' => __( ' folder', 'athena'), 'fa fa-folder-o' => __( ' folder-o', 'athena'), 'fa fa-folder-open' => __( ' folder-open', 'athena'), 'fa fa-folder-open-o' => __( ' folder-open-o', 'athena'), 'fa fa-frown-o' => __( ' frown-o', 'athena'), 'fa fa-futbol-o' => __( ' futbol-o', 'athena'), 'fa fa-gamepad' => __( ' gamepad', 'athena'), 'fa fa-gavel' => __( ' gavel', 'athena'), 'fa fa-gear' => __( ' gear', 'athena'), 'fa fa-gears' => __( ' gears', 'athena'), 'fa fa-gift' => __( ' gift', 'athena'), 'fa fa-glass' => __( ' glass', 'athena'), 'fa fa-globe' => __( ' globe', 'athena'), 'fa fa-graduation-cap' => __( ' graduation-cap', 'athena'), 'fa fa-group' => __( ' group', 'athena'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'athena'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'athena'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'athena'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'athena'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'athena'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'athena'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'athena'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'athena'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'athena'), 'fa fa-hdd-o' => __( ' hdd-o', 'athena'), 'fa fa-headphones' => __( ' headphones', 'athena'), 'fa fa-heart' => __( ' heart', 'athena'), 'fa fa-heart-o' => __( ' heart-o', 'athena'), 'fa fa-heartbeat' => __( ' heartbeat', 'athena'), 'fa fa-history' => __( ' history', 'athena'), 'fa fa-home' => __( ' home', 'athena'), 'fa fa-hotel' => __( ' hotel', 'athena'), 'fa fa-hourglass' => __( ' hourglass', 'athena'), 'fa fa-hourglass-1' => __( ' hourglass-1', 'athena'), 'fa fa-hourglass-2' => __( ' hourglass-2', 'athena'), 'fa fa-hourglass-3' => __( ' hourglass-3', 'athena'), 'fa fa-hourglass-end' => __( ' hourglass-end', 'athena'), 'fa fa-hourglass-half' => __( ' hourglass-half', 'athena'), 'fa fa-hourglass-o' => __( ' hourglass-o', 'athena'), 'fa fa-hourglass-start' => __( ' hourglass-start', 'athena'), 'fa fa-i-cursor' => __( ' i-cursor', 'athena'), 'fa fa-image' => __( ' image', 'athena'), 'fa fa-inbox' => __( ' inbox', 'athena'), 'fa fa-industry' => __( ' industry', 'athena'), 'fa fa-info' => __( ' info', 'athena'), 'fa fa-info-circle' => __( ' info-circle', 'athena'), 'fa fa-institution' => __( ' institution', 'athena'), 'fa fa-key' => __( ' key', 'athena'), 'fa fa-keyboard-o' => __( ' keyboard-o', 'athena'), 'fa fa-language' => __( ' language', 'athena'), 'fa fa-laptop' => __( ' laptop', 'athena'), 'fa fa-leaf' => __( ' leaf', 'athena'), 'fa fa-legal' => __( ' legal', 'athena'), 'fa fa-lemon-o' => __( ' lemon-o', 'athena'), 'fa fa-level-down' => __( ' level-down', 'athena'), 'fa fa-level-up' => __( ' level-up', 'athena'), 'fa fa-life-bouy' => __( ' life-bouy', 'athena'), 'fa fa-life-buoy' => __( ' life-buoy', 'athena'), 'fa fa-life-ring' => __( ' life-ring', 'athena'), 'fa fa-life-saver' => __( ' life-saver', 'athena'), 'fa fa-lightbulb-o' => __( ' lightbulb-o', 'athena'), 'fa fa-line-chart' => __( ' line-chart', 'athena'), 'fa fa-location-arrow' => __( ' location-arrow', 'athena'), 'fa fa-lock' => __( ' lock', 'athena'), 'fa fa-magic' => __( ' magic', 'athena'), 'fa fa-magnet' => __( ' magnet', 'athena'), 'fa fa-mail-forward' => __( ' mail-forward', 'athena'), 'fa fa-mail-reply' => __( ' mail-reply', 'athena'), 'fa fa-mail-reply-all' => __( ' mail-reply-all', 'athena'), 'fa fa-male' => __( ' male', 'athena'), 'fa fa-map' => __( ' map', 'athena'), 'fa fa-map-marker' => __( ' map-marker', 'athena'), 'fa fa-map-o' => __( ' map-o', 'athena'), 'fa fa-map-pin' => __( ' map-pin', 'athena'), 'fa fa-map-signs' => __( ' map-signs', 'athena'), 'fa fa-meh-o' => __( ' meh-o', 'athena'), 'fa fa-microphone' => __( ' microphone', 'athena'), 'fa fa-microphone-slash' => __( ' microphone-slash', 'athena'), 'fa fa-minus' => __( ' minus', 'athena'), 'fa fa-minus-circle' => __( ' minus-circle', 'athena'), 'fa fa-minus-square' => __( ' minus-square', 'athena'), 'fa fa-minus-square-o' => __( ' minus-square-o', 'athena'), 'fa fa-mobile' => __( ' mobile', 'athena'), 'fa fa-mobile-phone' => __( ' mobile-phone', 'athena'), 'fa fa-money' => __( ' money', 'athena'), 'fa fa-moon-o' => __( ' moon-o', 'athena'), 'fa fa-mortar-board' => __( ' mortar-board', 'athena'), 'fa fa-motorcycle' => __( ' motorcycle', 'athena'), 'fa fa-mouse-pointer' => __( ' mouse-pointer', 'athena'), 'fa fa-music' => __( ' music', 'athena'), 'fa fa-navicon' => __( ' navicon', 'athena'), 'fa fa-newspaper-o' => __( ' newspaper-o', 'athena'), 'fa fa-object-group' => __( ' object-group', 'athena'), 'fa fa-object-ungroup' => __( ' object-ungroup', 'athena'), 'fa fa-paint-brush' => __( ' paint-brush', 'athena'), 'fa fa-paper-plane' => __( ' paper-plane', 'athena'), 'fa fa-paper-plane-o' => __( ' paper-plane-o', 'athena'), 'fa fa-paw' => __( ' paw', 'athena'), 'fa fa-pencil' => __( ' pencil', 'athena'), 'fa fa-pencil-square' => __( ' pencil-square', 'athena'), 'fa fa-pencil-square-o' => __( ' pencil-square-o', 'athena'), 'fa fa-phone' => __( ' phone', 'athena'), 'fa fa-phone-square' => __( ' phone-square', 'athena'), 'fa fa-photo' => __( ' photo', 'athena'), 'fa fa-picture-o' => __( ' picture-o', 'athena'), 'fa fa-pie-chart' => __( ' pie-chart', 'athena'), 'fa fa-plane' => __( ' plane', 'athena'), 'fa fa-plug' => __( ' plug', 'athena'), 'fa fa-plus' => __( ' plus', 'athena'), 'fa fa-plus-circle' => __( ' plus-circle', 'athena'), 'fa fa-plus-square' => __( ' plus-square', 'athena'), 'fa fa-plus-square-o' => __( ' plus-square-o', 'athena'), 'fa fa-power-off' => __( ' power-off', 'athena'), 'fa fa-print' => __( ' print', 'athena'), 'fa fa-puzzle-piece' => __( ' puzzle-piece', 'athena'), 'fa fa-qrcode' => __( ' qrcode', 'athena'), 'fa fa-question' => __( ' question', 'athena'), 'fa fa-question-circle' => __( ' question-circle', 'athena'), 'fa fa-quote-left' => __( ' quote-left', 'athena'), 'fa fa-quote-right' => __( ' quote-right', 'athena'), 'fa fa-random' => __( ' random', 'athena'), 'fa fa-recycle' => __( ' recycle', 'athena'), 'fa fa-refresh' => __( ' refresh', 'athena'), 'fa fa-registered' => __( ' registered', 'athena'), 'fa fa-remove' => __( ' remove', 'athena'), 'fa fa-reorder' => __( ' reorder', 'athena'), 'fa fa-reply' => __( ' reply', 'athena'), 'fa fa-reply-all' => __( ' reply-all', 'athena'), 'fa fa-retweet' => __( ' retweet', 'athena'), 'fa fa-road' => __( ' road', 'athena'), 'fa fa-rocket' => __( ' rocket', 'athena'), 'fa fa-rss' => __( ' rss', 'athena'), 'fa fa-rss-square' => __( ' rss-square', 'athena'), 'fa fa-search' => __( ' search', 'athena'), 'fa fa-search-minus' => __( ' search-minus', 'athena'), 'fa fa-search-plus' => __( ' search-plus', 'athena'), 'fa fa-send' => __( ' send', 'athena'), 'fa fa-send-o' => __( ' send-o', 'athena'), 'fa fa-server' => __( ' server', 'athena'), 'fa fa-share' => __( ' share', 'athena'), 'fa fa-share-alt' => __( ' share-alt', 'athena'), 'fa fa-share-alt-square' => __( ' share-alt-square', 'athena'), 'fa fa-share-square' => __( ' share-square', 'athena'), 'fa fa-share-square-o' => __( ' share-square-o', 'athena'), 'fa fa-shield' => __( ' shield', 'athena'), 'fa fa-ship' => __( ' ship', 'athena'), 'fa fa-shopping-cart' => __( ' shopping-cart', 'athena'), 'fa fa-sign-in' => __( ' sign-in', 'athena'), 'fa fa-sign-out' => __( ' sign-out', 'athena'), 'fa fa-signal' => __( ' signal', 'athena'), 'fa fa-sitemap' => __( ' sitemap', 'athena'), 'fa fa-sliders' => __( ' sliders', 'athena'), 'fa fa-smile-o' => __( ' smile-o', 'athena'), 'fa fa-soccer-ball-o' => __( ' soccer-ball-o', 'athena'), 'fa fa-sort' => __( ' sort', 'athena'), 'fa fa-sort-alpha-asc' => __( ' sort-alpha-asc', 'athena'), 'fa fa-sort-alpha-desc' => __( ' sort-alpha-desc', 'athena'), 'fa fa-sort-amount-asc' => __( ' sort-amount-asc', 'athena'), 'fa fa-sort-amount-desc' => __( ' sort-amount-desc', 'athena'), 'fa fa-sort-asc' => __( ' sort-asc', 'athena'), 'fa fa-sort-desc' => __( ' sort-desc', 'athena'), 'fa fa-sort-down' => __( ' sort-down', 'athena'), 'fa fa-sort-numeric-asc' => __( ' sort-numeric-asc', 'athena'), 'fa fa-sort-numeric-desc' => __( ' sort-numeric-desc', 'athena'), 'fa fa-sort-up' => __( ' sort-up', 'athena'), 'fa fa-space-shuttle' => __( ' space-shuttle', 'athena'), 'fa fa-spinner' => __( ' spinner', 'athena'), 'fa fa-spoon' => __( ' spoon', 'athena'), 'fa fa-square' => __( ' square', 'athena'), 'fa fa-square-o' => __( ' square-o', 'athena'), 'fa fa-star' => __( ' star', 'athena'), 'fa fa-star-half' => __( ' star-half', 'athena'), 'fa fa-star-half-empty' => __( ' star-half-empty', 'athena'), 'fa fa-star-half-full' => __( ' star-half-full', 'athena'), 'fa fa-star-half-o' => __( ' star-half-o', 'athena'), 'fa fa-star-o' => __( ' star-o', 'athena'), 'fa fa-sticky-note' => __( ' sticky-note', 'athena'), 'fa fa-sticky-note-o' => __( ' sticky-note-o', 'athena'), 'fa fa-street-view' => __( ' street-view', 'athena'), 'fa fa-suitcase' => __( ' suitcase', 'athena'), 'fa fa-sun-o' => __( ' sun-o', 'athena'), 'fa fa-support' => __( ' support', 'athena'), 'fa fa-tablet' => __( ' tablet', 'athena'), 'fa fa-tachometer' => __( ' tachometer', 'athena'), 'fa fa-tag' => __( ' tag', 'athena'), 'fa fa-tags' => __( ' tags', 'athena'), 'fa fa-tasks' => __( ' tasks', 'athena'), 'fa fa-taxi' => __( ' taxi', 'athena'), 'fa fa-television' => __( ' television', 'athena'), 'fa fa-terminal' => __( ' terminal', 'athena'), 'fa fa-thumb-tack' => __( ' thumb-tack', 'athena'), 'fa fa-thumbs-down' => __( ' thumbs-down', 'athena'), 'fa fa-thumbs-o-down' => __( ' thumbs-o-down', 'athena'), 'fa fa-thumbs-o-up' => __( ' thumbs-o-up', 'athena'), 'fa fa-thumbs-up' => __( ' thumbs-up', 'athena'), 'fa fa-ticket' => __( ' ticket', 'athena'), 'fa fa-times' => __( ' times', 'athena'), 'fa fa-times-circle' => __( ' times-circle', 'athena'), 'fa fa-times-circle-o' => __( ' times-circle-o', 'athena'), 'fa fa-tint' => __( ' tint', 'athena'), 'fa fa-toggle-down' => __( ' toggle-down', 'athena'), 'fa fa-toggle-left' => __( ' toggle-left', 'athena'), 'fa fa-toggle-off' => __( ' toggle-off', 'athena'), 'fa fa-toggle-on' => __( ' toggle-on', 'athena'), 'fa fa-toggle-right' => __( ' toggle-right', 'athena'), 'fa fa-toggle-up' => __( ' toggle-up', 'athena'), 'fa fa-trademark' => __( ' trademark', 'athena'), 'fa fa-trash' => __( ' trash', 'athena'), 'fa fa-trash-o' => __( ' trash-o', 'athena'), 'fa fa-tree' => __( ' tree', 'athena'), 'fa fa-trophy' => __( ' trophy', 'athena'), 'fa fa-truck' => __( ' truck', 'athena'), 'fa fa-tty' => __( ' tty', 'athena'), 'fa fa-tv' => __( ' tv', 'athena'), 'fa fa-umbrella' => __( ' umbrella', 'athena'), 'fa fa-university' => __( ' university', 'athena'), 'fa fa-unlock' => __( ' unlock', 'athena'), 'fa fa-unlock-alt' => __( ' unlock-alt', 'athena'), 'fa fa-unsorted' => __( ' unsorted', 'athena'), 'fa fa-upload' => __( ' upload', 'athena'), 'fa fa-user' => __( ' user', 'athena'), 'fa fa-user-plus' => __( ' user-plus', 'athena'), 'fa fa-user-secret' => __( ' user-secret', 'athena'), 'fa fa-user-times' => __( ' user-times', 'athena'), 'fa fa-users' => __( ' users', 'athena'), 'fa fa-video-camera' => __( ' video-camera', 'athena'), 'fa fa-volume-down' => __( ' volume-down', 'athena'), 'fa fa-volume-off' => __( ' volume-off', 'athena'), 'fa fa-volume-up' => __( ' volume-up', 'athena'), 'fa fa-warning' => __( ' warning', 'athena'), 'fa fa-wheelchair' => __( ' wheelchair', 'athena'), 'fa fa-wifi' => __( ' wifi', 'athena'), 'fa fa-wrench' => __( ' wrench', 'athena'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'athena'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'athena'), 'fa fa-hand-o-down' => __( ' hand-o-down', 'athena'), 'fa fa-hand-o-left' => __( ' hand-o-left', 'athena'), 'fa fa-hand-o-right' => __( ' hand-o-right', 'athena'), 'fa fa-hand-o-up' => __( ' hand-o-up', 'athena'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'athena'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'athena'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'athena'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'athena'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'athena'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'athena'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'athena'), 'fa fa-thumbs-down' => __( ' thumbs-down', 'athena'), 'fa fa-thumbs-o-down' => __( ' thumbs-o-down', 'athena'), 'fa fa-thumbs-o-up' => __( ' thumbs-o-up', 'athena'), 'fa fa-thumbs-up' => __( ' thumbs-up', 'athena'), 'fa fa-ambulance' => __( ' ambulance', 'athena'), 'fa fa-automobile' => __( ' automobile', 'athena'), 'fa fa-bicycle' => __( ' bicycle', 'athena'), 'fa fa-bus' => __( ' bus', 'athena'), 'fa fa-cab' => __( ' cab', 'athena'), 'fa fa-car' => __( ' car', 'athena'), 'fa fa-fighter-jet' => __( ' fighter-jet', 'athena'), 'fa fa-motorcycle' => __( ' motorcycle', 'athena'), 'fa fa-plane' => __( ' plane', 'athena'), 'fa fa-rocket' => __( ' rocket', 'athena'), 'fa fa-ship' => __( ' ship', 'athena'), 'fa fa-space-shuttle' => __( ' space-shuttle', 'athena'), 'fa fa-subway' => __( ' subway', 'athena'), 'fa fa-taxi' => __( ' taxi', 'athena'), 'fa fa-train' => __( ' train', 'athena'), 'fa fa-truck' => __( ' truck', 'athena'), 'fa fa-wheelchair' => __( ' wheelchair', 'athena'), 'fa fa-genderless' => __( ' genderless', 'athena'), 'fa fa-intersex' => __( ' intersex', 'athena'), 'fa fa-mars' => __( ' mars', 'athena'), 'fa fa-mars-double' => __( ' mars-double', 'athena'), 'fa fa-mars-stroke' => __( ' mars-stroke', 'athena'), 'fa fa-mars-stroke-h' => __( ' mars-stroke-h', 'athena'), 'fa fa-mars-stroke-v' => __( ' mars-stroke-v', 'athena'), 'fa fa-mercury' => __( ' mercury', 'athena'), 'fa fa-neuter' => __( ' neuter', 'athena'), 'fa fa-transgender' => __( ' transgender', 'athena'), 'fa fa-transgender-alt' => __( ' transgender-alt', 'athena'), 'fa fa-venus' => __( ' venus', 'athena'), 'fa fa-venus-double' => __( ' venus-double', 'athena'), 'fa fa-venus-mars' => __( ' venus-mars', 'athena'), 'fa fa-file' => __( ' file', 'athena'), 'fa fa-file-archive-o' => __( ' file-archive-o', 'athena'), 'fa fa-file-audio-o' => __( ' file-audio-o', 'athena'), 'fa fa-file-code-o' => __( ' file-code-o', 'athena'), 'fa fa-file-excel-o' => __( ' file-excel-o', 'athena'), 'fa fa-file-image-o' => __( ' file-image-o', 'athena'), 'fa fa-file-movie-o' => __( ' file-movie-o', 'athena'), 'fa fa-file-o' => __( ' file-o', 'athena'), 'fa fa-file-pdf-o' => __( ' file-pdf-o', 'athena'), 'fa fa-file-photo-o' => __( ' file-photo-o', 'athena'), 'fa fa-file-picture-o' => __( ' file-picture-o', 'athena'), 'fa fa-file-powerpoint-o' => __( ' file-powerpoint-o', 'athena'), 'fa fa-file-sound-o' => __( ' file-sound-o', 'athena'), 'fa fa-file-text' => __( ' file-text', 'athena'), 'fa fa-file-text-o' => __( ' file-text-o', 'athena'), 'fa fa-file-video-o' => __( ' file-video-o', 'athena'), 'fa fa-file-word-o' => __( ' file-word-o', 'athena'), 'fa fa-file-zip-o' => __( ' file-zip-o', 'athena'), 'fa fa-circle-o-notch' => __( ' circle-o-notch', 'athena'), 'fa fa-cog' => __( ' cog', 'athena'), 'fa fa-gear' => __( ' gear', 'athena'), 'fa fa-refresh' => __( ' refresh', 'athena'), 'fa fa-spinner' => __( ' spinner', 'athena'), 'fa fa-check-square' => __( ' check-square', 'athena'), 'fa fa-check-square-o' => __( ' check-square-o', 'athena'), 'fa fa-circle' => __( ' circle', 'athena'), 'fa fa-circle-o' => __( ' circle-o', 'athena'), 'fa fa-dot-circle-o' => __( ' dot-circle-o', 'athena'), 'fa fa-minus-square' => __( ' minus-square', 'athena'), 'fa fa-minus-square-o' => __( ' minus-square-o', 'athena'), 'fa fa-plus-square' => __( ' plus-square', 'athena'), 'fa fa-plus-square-o' => __( ' plus-square-o', 'athena'), 'fa fa-square' => __( ' square', 'athena'), 'fa fa-square-o' => __( ' square-o', 'athena'), 'fa fa-cc-amex' => __( ' cc-amex', 'athena'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'athena'), 'fa fa-cc-discover' => __( ' cc-discover', 'athena'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'athena'), 'fa fa-cc-mastercard' => __( ' cc-mastercard', 'athena'), 'fa fa-cc-paypal' => __( ' cc-paypal', 'athena'), 'fa fa-cc-stripe' => __( ' cc-stripe', 'athena'), 'fa fa-cc-visa' => __( ' cc-visa', 'athena'), 'fa fa-credit-card' => __( ' credit-card', 'athena'), 'fa fa-google-wallet' => __( ' google-wallet', 'athena'), 'fa fa-paypal' => __( ' paypal', 'athena'), 'fa fa-area-chart' => __( ' area-chart', 'athena'), 'fa fa-bar-chart' => __( ' bar-chart', 'athena'), 'fa fa-bar-chart-o' => __( ' bar-chart-o', 'athena'), 'fa fa-line-chart' => __( ' line-chart', 'athena'), 'fa fa-pie-chart' => __( ' pie-chart', 'athena'), 'fa fa-bitcoin' => __( ' bitcoin', 'athena'), 'fa fa-btc' => __( ' btc', 'athena'), 'fa fa-cny' => __( ' cny', 'athena'), 'fa fa-dollar' => __( ' dollar', 'athena'), 'fa fa-eur' => __( ' eur', 'athena'), 'fa fa-euro' => __( ' euro', 'athena'), 'fa fa-gbp' => __( ' gbp', 'athena'), 'fa fa-gg' => __( ' gg', 'athena'), 'fa fa-gg-circle' => __( ' gg-circle', 'athena'), 'fa fa-ils' => __( ' ils', 'athena'), 'fa fa-inr' => __( ' inr', 'athena'), 'fa fa-jpy' => __( ' jpy', 'athena'), 'fa fa-krw' => __( ' krw', 'athena'), 'fa fa-money' => __( ' money', 'athena'), 'fa fa-rmb' => __( ' rmb', 'athena'), 'fa fa-rouble' => __( ' rouble', 'athena'), 'fa fa-rub' => __( ' rub', 'athena'), 'fa fa-ruble' => __( ' ruble', 'athena'), 'fa fa-rupee' => __( ' rupee', 'athena'), 'fa fa-shekel' => __( ' shekel', 'athena'), 'fa fa-sheqel' => __( ' sheqel', 'athena'), 'fa fa-try' => __( ' try', 'athena'), 'fa fa-turkish-lira' => __( ' turkish-lira', 'athena'), 'fa fa-usd' => __( ' usd', 'athena'), 'fa fa-won' => __( ' won', 'athena'), 'fa fa-yen' => __( ' yen', 'athena'), 'fa fa-align-center' => __( ' align-center', 'athena'), 'fa fa-align-justify' => __( ' align-justify', 'athena'), 'fa fa-align-left' => __( ' align-left', 'athena'), 'fa fa-align-right' => __( ' align-right', 'athena'), 'fa fa-bold' => __( ' bold', 'athena'), 'fa fa-chain' => __( ' chain', 'athena'), 'fa fa-chain-broken' => __( ' chain-broken', 'athena'), 'fa fa-clipboard' => __( ' clipboard', 'athena'), 'fa fa-columns' => __( ' columns', 'athena'), 'fa fa-copy' => __( ' copy', 'athena'), 'fa fa-cut' => __( ' cut', 'athena'), 'fa fa-dedent' => __( ' dedent', 'athena'), 'fa fa-eraser' => __( ' eraser', 'athena'), 'fa fa-file' => __( ' file', 'athena'), 'fa fa-file-o' => __( ' file-o', 'athena'), 'fa fa-file-text' => __( ' file-text', 'athena'), 'fa fa-file-text-o' => __( ' file-text-o', 'athena'), 'fa fa-files-o' => __( ' files-o', 'athena'), 'fa fa-floppy-o' => __( ' floppy-o', 'athena'), 'fa fa-font' => __( ' font', 'athena'), 'fa fa-header' => __( ' header', 'athena'), 'fa fa-indent' => __( ' indent', 'athena'), 'fa fa-italic' => __( ' italic', 'athena'), 'fa fa-link' => __( ' link', 'athena'), 'fa fa-list' => __( ' list', 'athena'), 'fa fa-list-alt' => __( ' list-alt', 'athena'), 'fa fa-list-ol' => __( ' list-ol', 'athena'), 'fa fa-list-ul' => __( ' list-ul', 'athena'), 'fa fa-outdent' => __( ' outdent', 'athena'), 'fa fa-paperclip' => __( ' paperclip', 'athena'), 'fa fa-paragraph' => __( ' paragraph', 'athena'), 'fa fa-paste' => __( ' paste', 'athena'), 'fa fa-repeat' => __( ' repeat', 'athena'), 'fa fa-rotate-left' => __( ' rotate-left', 'athena'), 'fa fa-rotate-right' => __( ' rotate-right', 'athena'), 'fa fa-save' => __( ' save', 'athena'), 'fa fa-scissors' => __( ' scissors', 'athena'), 'fa fa-strikethrough' => __( ' strikethrough', 'athena'), 'fa fa-subscript' => __( ' subscript', 'athena'), 'fa fa-superscript' => __( ' superscript', 'athena'), 'fa fa-table' => __( ' table', 'athena'), 'fa fa-text-height' => __( ' text-height', 'athena'), 'fa fa-text-width' => __( ' text-width', 'athena'), 'fa fa-th' => __( ' th', 'athena'), 'fa fa-th-large' => __( ' th-large', 'athena'), 'fa fa-th-list' => __( ' th-list', 'athena'), 'fa fa-underline' => __( ' underline', 'athena'), 'fa fa-undo' => __( ' undo', 'athena'), 'fa fa-unlink' => __( ' unlink', 'athena'), 'fa fa-angle-double-down' => __( ' angle-double-down', 'athena'), 'fa fa-angle-double-left' => __( ' angle-double-left', 'athena'), 'fa fa-angle-double-right' => __( ' angle-double-right', 'athena'), 'fa fa-angle-double-up' => __( ' angle-double-up', 'athena'), 'fa fa-angle-down' => __( ' angle-down', 'athena'), 'fa fa-angle-left' => __( ' angle-left', 'athena'), 'fa fa-angle-right' => __( ' angle-right', 'athena'), 'fa fa-angle-up' => __( ' angle-up', 'athena'), 'fa fa-arrow-circle-down' => __( ' arrow-circle-down', 'athena'), 'fa fa-arrow-circle-left' => __( ' arrow-circle-left', 'athena'), 'fa fa-arrow-circle-o-down' => __( ' arrow-circle-o-down', 'athena'), 'fa fa-arrow-circle-o-left' => __( ' arrow-circle-o-left', 'athena'), 'fa fa-arrow-circle-o-right' => __( ' arrow-circle-o-right', 'athena'), 'fa fa-arrow-circle-o-up' => __( ' arrow-circle-o-up', 'athena'), 'fa fa-arrow-circle-right' => __( ' arrow-circle-right', 'athena'), 'fa fa-arrow-circle-up' => __( ' arrow-circle-up', 'athena'), 'fa fa-arrow-down' => __( ' arrow-down', 'athena'), 'fa fa-arrow-left' => __( ' arrow-left', 'athena'), 'fa fa-arrow-right' => __( ' arrow-right', 'athena'), 'fa fa-arrow-up' => __( ' arrow-up', 'athena'), 'fa fa-arrows' => __( ' arrows', 'athena'), 'fa fa-arrows-alt' => __( ' arrows-alt', 'athena'), 'fa fa-arrows-h' => __( ' arrows-h', 'athena'), 'fa fa-arrows-v' => __( ' arrows-v', 'athena'), 'fa fa-caret-down' => __( ' caret-down', 'athena'), 'fa fa-caret-left' => __( ' caret-left', 'athena'), 'fa fa-caret-right' => __( ' caret-right', 'athena'), 'fa fa-caret-square-o-down' => __( ' caret-square-o-down', 'athena'), 'fa fa-caret-square-o-left' => __( ' caret-square-o-left', 'athena'), 'fa fa-caret-square-o-right' => __( ' caret-square-o-right', 'athena'), 'fa fa-caret-square-o-up' => __( ' caret-square-o-up', 'athena'), 'fa fa-caret-up' => __( ' caret-up', 'athena'), 'fa fa-chevron-circle-down' => __( ' chevron-circle-down', 'athena'), 'fa fa-chevron-circle-left' => __( ' chevron-circle-left', 'athena'), 'fa fa-chevron-circle-right' => __( ' chevron-circle-right', 'athena'), 'fa fa-chevron-circle-up' => __( ' chevron-circle-up', 'athena'), 'fa fa-chevron-down' => __( ' chevron-down', 'athena'), 'fa fa-chevron-left' => __( ' chevron-left', 'athena'), 'fa fa-chevron-right' => __( ' chevron-right', 'athena'), 'fa fa-chevron-up' => __( ' chevron-up', 'athena'), 'fa fa-exchange' => __( ' exchange', 'athena'), 'fa fa-hand-o-down' => __( ' hand-o-down', 'athena'), 'fa fa-hand-o-left' => __( ' hand-o-left', 'athena'), 'fa fa-hand-o-right' => __( ' hand-o-right', 'athena'), 'fa fa-hand-o-up' => __( ' hand-o-up', 'athena'), 'fa fa-long-arrow-down' => __( ' long-arrow-down', 'athena'), 'fa fa-long-arrow-left' => __( ' long-arrow-left', 'athena'), 'fa fa-long-arrow-right' => __( ' long-arrow-right', 'athena'), 'fa fa-long-arrow-up' => __( ' long-arrow-up', 'athena'), 'fa fa-toggle-down' => __( ' toggle-down', 'athena'), 'fa fa-toggle-left' => __( ' toggle-left', 'athena'), 'fa fa-toggle-right' => __( ' toggle-right', 'athena'), 'fa fa-toggle-up' => __( ' toggle-up', 'athena'), 'fa fa-arrows-alt' => __( ' arrows-alt', 'athena'), 'fa fa-backward' => __( ' backward', 'athena'), 'fa fa-compress' => __( ' compress', 'athena'), 'fa fa-eject' => __( ' eject', 'athena'), 'fa fa-expand' => __( ' expand', 'athena'), 'fa fa-fast-backward' => __( ' fast-backward', 'athena'), 'fa fa-fast-forward' => __( ' fast-forward', 'athena'), 'fa fa-forward' => __( ' forward', 'athena'), 'fa fa-pause' => __( ' pause', 'athena'), 'fa fa-play' => __( ' play', 'athena'), 'fa fa-play-circle' => __( ' play-circle', 'athena'), 'fa fa-play-circle-o' => __( ' play-circle-o', 'athena'), 'fa fa-random' => __( ' random', 'athena'), 'fa fa-step-backward' => __( ' step-backward', 'athena'), 'fa fa-step-forward' => __( ' step-forward', 'athena'), 'fa fa-stop' => __( ' stop', 'athena'), 'fa fa-youtube-play' => __( ' youtube-play', 'athena'), 'fa fa-500px' => __( ' 500px', 'athena'), 'fa fa-adn' => __( ' adn', 'athena'), 'fa fa-amazon' => __( ' amazon', 'athena'), 'fa fa-android' => __( ' android', 'athena'), 'fa fa-angellist' => __( ' angellist', 'athena'), 'fa fa-apple' => __( ' apple', 'athena'), 'fa fa-behance' => __( ' behance', 'athena'), 'fa fa-behance-square' => __( ' behance-square', 'athena'), 'fa fa-bitbucket' => __( ' bitbucket', 'athena'), 'fa fa-bitbucket-square' => __( ' bitbucket-square', 'athena'), 'fa fa-bitcoin' => __( ' bitcoin', 'athena'), 'fa fa-black-tie' => __( ' black-tie', 'athena'), 'fa fa-btc' => __( ' btc', 'athena'), 'fa fa-buysellads' => __( ' buysellads', 'athena'), 'fa fa-cc-amex' => __( ' cc-amex', 'athena'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'athena'), 'fa fa-cc-discover' => __( ' cc-discover', 'athena'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'athena'), 'fa fa-cc-mastercard' => __( ' cc-mastercard', 'athena'), 'fa fa-cc-paypal' => __( ' cc-paypal', 'athena'), 'fa fa-cc-stripe' => __( ' cc-stripe', 'athena'), 'fa fa-cc-visa' => __( ' cc-visa', 'athena'), 'fa fa-chrome' => __( ' chrome', 'athena'), 'fa fa-codepen' => __( ' codepen', 'athena'), 'fa fa-connectdevelop' => __( ' connectdevelop', 'athena'), 'fa fa-contao' => __( ' contao', 'athena'), 'fa fa-css3' => __( ' css3', 'athena'), 'fa fa-dashcube' => __( ' dashcube', 'athena'), 'fa fa-delicious' => __( ' delicious', 'athena'), 'fa fa-deviantart' => __( ' deviantart', 'athena'), 'fa fa-digg' => __( ' digg', 'athena'), 'fa fa-dribbble' => __( ' dribbble', 'athena'), 'fa fa-dropbox' => __( ' dropbox', 'athena'), 'fa fa-drupal' => __( ' drupal', 'athena'), 'fa fa-empire' => __( ' empire', 'athena'), 'fa fa-expeditedssl' => __( ' expeditedssl', 'athena'), 'fa fa-facebook' => __( ' facebook', 'athena'), 'fa fa-facebook-f' => __( ' facebook-f', 'athena'), 'fa fa-facebook-official' => __( ' facebook-official', 'athena'), 'fa fa-facebook-square' => __( ' facebook-square', 'athena'), 'fa fa-firefox' => __( ' firefox', 'athena'), 'fa fa-flickr' => __( ' flickr', 'athena'), 'fa fa-fonticons' => __( ' fonticons', 'athena'), 'fa fa-forumbee' => __( ' forumbee', 'athena'), 'fa fa-foursquare' => __( ' foursquare', 'athena'), 'fa fa-ge' => __( ' ge', 'athena'), 'fa fa-get-pocket' => __( ' get-pocket', 'athena'), 'fa fa-gg' => __( ' gg', 'athena'), 'fa fa-gg-circle' => __( ' gg-circle', 'athena'), 'fa fa-git' => __( ' git', 'athena'), 'fa fa-git-square' => __( ' git-square', 'athena'), 'fa fa-github' => __( ' github', 'athena'), 'fa fa-github-alt' => __( ' github-alt', 'athena'), 'fa fa-github-square' => __( ' github-square', 'athena'), 'fa fa-gittip' => __( ' gittip', 'athena'), 'fa fa-google' => __( ' google', 'athena'), 'fa fa-google-plus' => __( ' google-plus', 'athena'), 'fa fa-google-plus-square' => __( ' google-plus-square', 'athena'), 'fa fa-google-wallet' => __( ' google-wallet', 'athena'), 'fa fa-gratipay' => __( ' gratipay', 'athena'), 'fa fa-hacker-news' => __( ' hacker-news', 'athena'), 'fa fa-houzz' => __( ' houzz', 'athena'), 'fa fa-html5' => __( ' html5', 'athena'), 'fa fa-instagram' => __( ' instagram', 'athena'), 'fa fa-internet-explorer' => __( ' internet-explorer', 'athena'), 'fa fa-ioxhost' => __( ' ioxhost', 'athena'), 'fa fa-joomla' => __( ' joomla', 'athena'), 'fa fa-jsfiddle' => __( ' jsfiddle', 'athena'), 'fa fa-lastfm' => __( ' lastfm', 'athena'), 'fa fa-lastfm-square' => __( ' lastfm-square', 'athena'), 'fa fa-leanpub' => __( ' leanpub', 'athena'), 'fa fa-linkedin' => __( ' linkedin', 'athena'), 'fa fa-linkedin-square' => __( ' linkedin-square', 'athena'), 'fa fa-linux' => __( ' linux', 'athena'), 'fa fa-maxcdn' => __( ' maxcdn', 'athena'), 'fa fa-meanpath' => __( ' meanpath', 'athena'), 'fa fa-medium' => __( ' medium', 'athena'), 'fa fa-odnoklassniki' => __( ' odnoklassniki', 'athena'), 'fa fa-odnoklassniki-square' => __( ' odnoklassniki-square', 'athena'), 'fa fa-opencart' => __( ' opencart', 'athena'), 'fa fa-openid' => __( ' openid', 'athena'), 'fa fa-opera' => __( ' opera', 'athena'), 'fa fa-optin-monster' => __( ' optin-monster', 'athena'), 'fa fa-pagelines' => __( ' pagelines', 'athena'), 'fa fa-paypal' => __( ' paypal', 'athena'), 'fa fa-pied-piper' => __( ' pied-piper', 'athena'), 'fa fa-pied-piper-alt' => __( ' pied-piper-alt', 'athena'), 'fa fa-pinterest' => __( ' pinterest', 'athena'), 'fa fa-pinterest-p' => __( ' pinterest-p', 'athena'), 'fa fa-pinterest-square' => __( ' pinterest-square', 'athena'), 'fa fa-qq' => __( ' qq', 'athena'), 'fa fa-ra' => __( ' ra', 'athena'), 'fa fa-rebel' => __( ' rebel', 'athena'), 'fa fa-reddit' => __( ' reddit', 'athena'), 'fa fa-reddit-square' => __( ' reddit-square', 'athena'), 'fa fa-renren' => __( ' renren', 'athena'), 'fa fa-safari' => __( ' safari', 'athena'), 'fa fa-sellsy' => __( ' sellsy', 'athena'), 'fa fa-share-alt' => __( ' share-alt', 'athena'), 'fa fa-share-alt-square' => __( ' share-alt-square', 'athena'), 'fa fa-shirtsinbulk' => __( ' shirtsinbulk', 'athena'), 'fa fa-simplybuilt' => __( ' simplybuilt', 'athena'), 'fa fa-skyatlas' => __( ' skyatlas', 'athena'), 'fa fa-skype' => __( ' skype', 'athena'), 'fa fa-slack' => __( ' slack', 'athena'), 'fa fa-slideshare' => __( ' slideshare', 'athena'), 'fa fa-soundcloud' => __( ' soundcloud', 'athena'), 'fa fa-spotify' => __( ' spotify', 'athena'), 'fa fa-stack-exchange' => __( ' stack-exchange', 'athena'), 'fa fa-stack-overflow' => __( ' stack-overflow', 'athena'), 'fa fa-steam' => __( ' steam', 'athena'), 'fa fa-steam-square' => __( ' steam-square', 'athena'), 'fa fa-stumbleupon' => __( ' stumbleupon', 'athena'), 'fa fa-stumbleupon-circle' => __( ' stumbleupon-circle', 'athena'), 'fa fa-tencent-weibo' => __( ' tencent-weibo', 'athena'), 'fa fa-trello' => __( ' trello', 'athena'), 'fa fa-tripadvisor' => __( ' tripadvisor', 'athena'), 'fa fa-tumblr' => __( ' tumblr', 'athena'), 'fa fa-tumblr-square' => __( ' tumblr-square', 'athena'), 'fa fa-twitch' => __( ' twitch', 'athena'), 'fa fa-twitter' => __( ' twitter', 'athena'), 'fa fa-twitter-square' => __( ' twitter-square', 'athena'), 'fa fa-viacoin' => __( ' viacoin', 'athena'), 'fa fa-vimeo' => __( ' vimeo', 'athena'), 'fa fa-vimeo-square' => __( ' vimeo-square', 'athena'), 'fa fa-vine' => __( ' vine', 'athena'), 'fa fa-vk' => __( ' vk', 'athena'), 'fa fa-wechat' => __( ' wechat', 'athena'), 'fa fa-weibo' => __( ' weibo', 'athena'), 'fa fa-weixin' => __( ' weixin', 'athena'), 'fa fa-whatsapp' => __( ' whatsapp', 'athena'), 'fa fa-wikipedia-w' => __( ' wikipedia-w', 'athena'), 'fa fa-windows' => __( ' windows', 'athena'), 'fa fa-wordpress' => __( ' wordpress', 'athena'), 'fa fa-xing' => __( ' xing', 'athena'), 'fa fa-xing-square' => __( ' xing-square', 'athena'), 'fa fa-y-combinator' => __( ' y-combinator', 'athena'), 'fa fa-y-combinator-square' => __( ' y-combinator-square', 'athena'), 'fa fa-yahoo' => __( ' yahoo', 'athena'), 'fa fa-yc' => __( ' yc', 'athena'), 'fa fa-yc-square' => __( ' yc-square', 'athena'), 'fa fa-yelp' => __( ' yelp', 'athena'), 'fa fa-youtube' => __( ' youtube', 'athena'), 'fa fa-youtube-play' => __( ' youtube-play', 'athena'), 'fa fa-youtube-square' => __( ' youtube-square', 'athena'), 'fa fa-ambulance' => __( ' ambulance', 'athena'), 'fa fa-h-square' => __( ' h-square', 'athena'), 'fa fa-heart' => __( ' heart', 'athena'), 'fa fa-heart-o' => __( ' heart-o', 'athena'), 'fa fa-heartbeat' => __( ' heartbeat', 'athena'), 'fa fa-hospital-o' => __( ' hospital-o', 'athena'), 'fa fa-medkit' => __( ' medkit', 'athena'), 'fa fa-plus-square' => __( ' plus-square', 'athena'), 'fa fa-stethoscope' => __( ' stethoscope', 'athena'), 'fa fa-user-md' => __( ' user-md', 'athena'), 'fa fa-wheelchair' => __( ' wheelchair', 'athena') );
    
    
    
}

function byblos_fonts2(){
    
    $font_family_array = array(
        'Arial, Helvetica, sans-serif'          => 'Arial',
        'Arial Black, Gadget, sans-serif'       => 'Arial Black',
        'Courier New, monospace'                => 'Courier New',
        'Lobster, cursive'                      => 'Lobster - Cursive',
        'Georgia, serif'                        => 'Georgia',
        'Impact, Charcoal, sans-serif'          => 'Impact',
        'Josefin Sans, sans-serif'              => 'Josefin',
        'Lucida Console, Monaco, monospace'     => 'Lucida Console',
        'Lucida Sans Unicode, Lucida Grande, sans-serif' => 'Lucida Sans Unicode',
        'MS Sans Serif, Geneva, sans-serif'     => 'MS Sans Serif',
        'MS Serif, New York, serif'             => 'MS Serif',
        'Open Sans, sans-serif'                 => 'Open Sans',
        'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino Linotype',
        'Source Sans Pro, sans-serif'           => 'Source Sans Pro',
        'Lato, sans-serif'                      => 'Lato',
        'Tahoma, Geneva, sans-serif'            => 'Tahoma',
        'Times New Roman, Times, serif'         => 'Times New Roman',
        'Trebuchet MS, sans-serif'              => 'Trebuchet MS',
        'Verdana, Geneva, sans-serif'           => 'Verdana',
    );
    
    return $font_family_array;
}

function athena_font_sizes(){
    
    $font_size_array = array(
        '10px' => '10 px',
        '12px' => '12 px',
        '14px' => '14 px',
        '16px' => '16 px',
        '18px' => '18 px',
        '20px' => '20 px',
    );
    
    return $font_size_array;
    
}

function byblos_sanitize( $input ) {
    return $input;
}