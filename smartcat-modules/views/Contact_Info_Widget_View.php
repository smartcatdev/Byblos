<div class="byblos-contact-info <?php echo isset( $instance['scmod_contact_info_width'] ) ? 'col-sm-' . $instance['scmod_contact_info_width'] : 'col-sm-12'; ?>">

    <div class="widget">

        <div class="inner">
            
            <h2 class="widget-title cpt-widget-title">
                <?php echo !empty( $instance['scmod_contact_info_title'] ) ? esc_html( $instance['scmod_contact_info_title'] ) : ''; ?>
            </h2>
            
            <div class="byblos-underline"></div>

            <div class="detail">
                <?php echo !empty( $instance['scmod_contact_info_detail'] ) ? esc_html( $instance['scmod_contact_info_detail'] ) : ''; ?>
            </div>

            <?php if( !empty( $instance['scmod_contact_info_phone'] ) ) : ?>

                    <div class="contact-row">
                        <div class="detail">
                            <?php echo !empty( $instance['scmod_contact_info_phone'] ) ? esc_html ( $instance['scmod_contact_info_phone'] ) : ''; ?>
                        </div>
                    </div>

            <?php endif; ?>

            <?php if( !empty( $instance['scmod_contact_info_email'] ) ) : ?>

                    <div class="contact-row">
                        <div class="detail">
                            <?php echo !empty( $instance['scmod_contact_info_email'] ) ? esc_html( $instance['scmod_contact_info_email'] ) : ''; ?>
                        </div>    
                    </div>

            <?php endif; ?>

            <?php if( !empty( $instance['scmod_contact_info_address'] ) ) : ?>

                    <div class="contact-row">
                        <div class="detail">
                            <?php echo !empty( $instance['scmod_contact_info_address'] ) ? esc_html( $instance['scmod_contact_info_address'] ) : ''; ?>
                        </div>
                    </div>

            <?php endif; ?>
            
        </div>

    </div>
        
</div>