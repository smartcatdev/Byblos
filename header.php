<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package byblos
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site <?php echo is_front_page() ? 'byblos-frontpage' : ''; ?>">
            <header id="masthead" class="site-header" role="banner">
                <div class="site-branding dark">
                    <!--<div class="row ">-->
                            <div class="col-xs-12 center">
                                <h2 class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php if (get_option('byblos_logo') != '') : ?>
                                        <img src="<?php echo get_option('byblos_logo'); ?>" alt="" id="sc_logo"/>
                                        <?php else : ?>
                                        <?php bloginfo('name');?>
                                        <?php endif; ?>                                        
                                    </a>
                                </h2>
                                <?php if (get_option('byblos_logo') == '') : ?>
                                    <h3 class="site-description"><?php bloginfo('description'); ?></h3>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-xs-12 menu-bar center bs_nopad">
                                <nav id="site-navigation" class="main-navigation" role="navigation">
                                    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                                </nav>
                            </div>
                            <div class="col-xs-12 search-bar center">
                                <!-- header right -->
                                <?php get_sidebar('header-right'); ?>
                            </div>
                            <div class="col-xs-12" id="site-toolbar">
                                <?php sc_toolbar(); ?>
                            </div>
                            <div class="col-xs-12 sc_footer">
                                <?php sc_footer(); ?>
                            </div>
                    <!--</div>-->
                </div>
                <div class="site-branding-mobile dark">
                    <div class="col-xs-2">
                        <div id="tasty-mobile-toggle">
                            <i class="fa fa-bars"></i>
                            <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                        </div>  

                                             
                    </div>
                    <div class="col-xs-10">
                        <h2 class="site-title-mobile">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php if (get_option('byblos_logo') != '') : ?>
                                <img src="<?php echo get_option('byblos_logo'); ?>" alt="" id="sc_logo"/>
                                <?php else : ?>
                                <?php bloginfo('name');?>
                                <?php endif; ?>                                        
                            </a>  
                        </h2>
                    </div>
                </div>
            </header><!-- #masthead -->
