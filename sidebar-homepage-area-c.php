<?php
/**
 * The Homepage Area C section widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Byblos
 */

if ( ! is_active_sidebar( 'homepage-area-c' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'homepage-area-c' ); ?>
</aside><!-- #secondary -->
