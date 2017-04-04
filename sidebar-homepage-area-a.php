<?php
/**
 * The Homepage Area A section widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Byblos
 */

if ( ! is_active_sidebar( 'homepage-area-a' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'homepage-area-a' ); ?>

</aside><!-- #secondary -->
