<?php
/**
 * The Homepage Area B section widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Byblos
 */

if ( ! is_active_sidebar( 'homepage-area-b' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'homepage-area-b' ); ?>
</aside><!-- #secondary -->
