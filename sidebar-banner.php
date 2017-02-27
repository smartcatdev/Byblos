<?php
/*
 * Short description
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
?>
<?php if (!dynamic_sidebar('sidebar-banner')) : ?>
<h2><?php _e( 'HOMEPAGE BANNER','byblos') ?></h2>
<div class="textwidget">
    <?php _e( 'You can customize the contents of this widget under Appearance - Widgets. Use any widget you want. Or you can completly remove it from the theme Customizer.', 'byblos' ); ?>
</div>
<?php endif; // end sidebar widget area  ?>
