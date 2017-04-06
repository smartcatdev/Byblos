<?php 

$args = array (
    'numberposts'   => ( !empty( $instance['scmod_gallery_limit'] ) ? (int)$instance['scmod_gallery_limit'] : -1 ),
    'post_status'   => 'publish',
    'post_type'     => 'gallery'
);

$gallery = wp_get_recent_posts( $args );
$gallery_style = empty( $instance['scmod_gallery_shuffle'] ) || $instance['scmod_gallery_shuffle'] == 'normal' ? 'normal' : 'shuffle';

?>

<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery(".byblos-gallery-contents").unitegallery({
            <?php if ( !empty( $instance['scmod_gallery_tile_style'] ) && $instance['scmod_gallery_tile_style'] != 'columns' ) : ?>
                tiles_type: '<?php echo $instance['scmod_gallery_tile_style'] == 'justified' ? 'justified' : 'nested'; ?>',
            <?php endif; ?>
            tiles_col_width: 300,
            lightbox_type: 'compact',
            tile_enable_icons: false,
            theme_appearance_order: '<?php echo $gallery_style; ?>',
            tiles_space_between_cols: <?php echo esc_js( get_theme_mod( 'byblos_gallery_gutter_space', 5 ) ); ?>,
            tiles_space_between_cols_mobile: <?php echo esc_js( get_theme_mod( 'byblos_gallery_gutter_space', 5 ) ); ?>,
            tiles_justified_space_between: <?php echo esc_js( get_theme_mod( 'byblos_gallery_gutter_space', 5 ) ); ?>,
            lightbox_slider_image_border: false,
            lightbox_slider_image_shadow: false,
            lightbox_overlay_opacity: .95,
            tile_overlay_opacity: <?php echo esc_js( get_theme_mod( 'byblos_gallery_hover_opacity', .33 ) ); ?>,
            tile_overlay_color: "<?php echo esc_js( get_theme_mod( 'byblos_gallery_hover_color', '#ffffff' ) ); ?>",
        });
    });

</script>

<div class="byblos-gallery <?php echo isset( $instance['scmod_gallery_widget_width'] ) ? 'col-sm-' . $instance['scmod_gallery_widget_width'] : 'col-sm-12'; ?>">

    <div class="widget">
    
        <div class="inner">
        
            <h2 class="widget-title cpt-widget-title">
                <?php echo !empty( $instance['scmod_gallery_title'] ) ? esc_html( $instance['scmod_gallery_title'] ) : ''; ?>
            </h2>

            <div class="byblos-underline"></div>

            <?php if ( !empty( $gallery ) ) : ?>

                <div id="gallery" style="display:none;" class="byblos-gallery-contents">

                    <?php foreach( $gallery as $item ) : ?>

                        <?php $feat_image = get_the_post_thumbnail_url( $item['ID'] ); ?>

                        <a href="#">
                            <img alt="<?php echo esc_attr( $item['post_title'] ); ?>"
                                 src="<?php echo esc_url( $feat_image ); ?>"
                                 data-image="<?php echo esc_url( $feat_image ); ?>"
                                 data-description="<?php echo esc_attr( $item['post_title'] ); ?>">
                        </a>

                    <?php endforeach; ?>

                    <?php wp_reset_postdata(); ?>

                </div>

            <?php else : ?>

                <h4 class="none-to-display"><?php _e( 'There are currently no photos to display in the Gallery, please check again at a later time.', 'byblos' ); ?></h4>

            <?php endif; ?>
        
        </div>
        
    </div>

</div>
