<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package byblos
 */

if (!is_active_sidebar('sidebar-left')) :
    return;
endif;

?>
<div id="secondary" class="widget-area" role="complementary">
    
    <?php dynamic_sidebar('sidebar-left'); ?>

</div><!-- #secondary -->
