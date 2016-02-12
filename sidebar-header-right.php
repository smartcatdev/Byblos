<?php
/*
 * Short description
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */

if ( !is_active_sidebar('sidebar-header-right') ) :
    return;
endif;

?>

<div id="secondary" class="widget-area" role="complementary">
    
    <?php dynamic_sidebar('sidebar-header-right'); ?>

</div><!-- #secondary -->
