<?php
/**
 * byblos functions and definitions
 *
 * @package byblos
 */
if (!function_exists('byblos_setup')) :
    function byblos_setup() {
        if (!isset($content_width)) {
            global $content_width;
            $content_width = 1060;
        }

        define('BYBLOS_VERSION', '3.2.2');
        load_theme_textdomain('byblos', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support( "title-tag" );
        
        
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'byblos'),
        ));
        add_editor_style('');

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('byblos_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Enable support for HTML5 markup.
        add_theme_support('html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'caption',
        ));
        add_filter('widget_text', 'do_shortcode');
        
        if( ! get_option('byblos') ) :
            
            add_option('byblos', byblos_get_options() );
            
        endif;
    }
endif; 
add_action('after_setup_theme', 'byblos_setup');
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
include_once get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';
require_once dirname(__FILE__) . '/inc/engine/byblos.php';
require get_template_directory() . '/inc/tgm.php';