<div class="byblos-callout <?php echo isset( $instance['scmod_cta_widget_width'] ) ? 'col-sm-' . $instance['scmod_cta_widget_width'] : 'col-sm-12'; ?>">

    <div class="widget">
    
        <div class="inner">
        
            <?php if ( !empty( $instance['scmod_cta_title'] ) ) : ?>
                <h2 class="widget-title cpt-widget-title">
                    <?php echo !empty( $instance['scmod_cta_title'] ) ? esc_html( $instance['scmod_cta_title'] ) : ''; ?>
                </h2>
                <div class="byblos-underline"></div>
            <?php endif; ?>

            <?php if ( !empty( $instance['scmod_cta_detail'] ) ) : ?>
                <div class="detail">
                    <?php echo !empty( $instance['scmod_cta_detail'] ) ? $instance['scmod_cta_detail'] : ''; ?>
                </div>
            <?php endif; ?>

            <div class="buttons">

                <?php if( !empty( $instance['scmod_cta_btn_1_text'] ) ) : ?>
                    <a class="button-primary button" href="<?php echo esc_url( $instance['scmod_cta_btn_1_url'] ); ?>">
                        <?php echo esc_html( $instance['scmod_cta_btn_1_text'] ); ?>
                    </a>
                <?php endif; ?>

                <?php if( !empty( $instance['scmod_cta_btn_2_text'] ) ) : ?>
                    <a class="button-primary button" href="<?php echo esc_url( $instance['scmod_cta_btn_2_url'] ); ?>">
                        <?php echo esc_html( $instance['scmod_cta_btn_2_text'] ); ?>
                    </a>
                <?php endif; ?>

            </div>
            
        </div>

    </div>
        
</div>