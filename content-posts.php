<?php
/*
 * Posts Template
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
?>
<div class="item-post">
    <a href="<?php the_permalink(); ?>">
        <?php if(has_post_thumbnail() ) : the_post_thumbnail('large'); ?>
        <?php else :  ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/post_image.jpg" class="wp-post-image" />
        <?php endif; ?>
        <h2 class="post-title"><?php the_title(); ?></h2>
    </a>    
</div>
