<div class="juno-contact-info <?php echo isset( $instance['scmod_contact_info_width'] ) ? 'col-sm-' . $instance['scmod_contact_info_width'] : 'col-sm-12'; ?>">

    <div class="widget">

        <h2 class="widget-title cpt-widget-title">
            <?php echo !empty( $instance['scmod_contact_info_title'] ) ? esc_html( $instance['scmod_contact_info_title'] ) : ''; ?>
        </h2>

        <div class="detail">
            <?php echo !empty( $instance['scmod_contact_info_detail'] ) ? esc_html( $instance['scmod_contact_info_detail'] ) : ''; ?>
        </div>

        <?php if( !empty( $instance['scmod_contact_info_phone'] ) ) : ?>

                <div class="contact-row">
                    <p>
                        <?php _e( 'Phone Number', 'juno' ); ?>
                    </p>
                    <div class="detail">
                        <?php echo !empty( $instance['scmod_contact_info_phone'] ) ? esc_html ( $instance['scmod_contact_info_phone'] ) : ''; ?>
                    </div>
                </div>

        <?php endif; ?>

        <?php if( !empty( $instance['scmod_contact_info_email'] ) ) : ?>

                <div class="contact-row">
                    <p>
                        <?php _e( 'Email', 'juno' ); ?>
                    </p>
                    <div class="detail">
                        <?php echo !empty( $instance['scmod_contact_info_email'] ) ? esc_html( $instance['scmod_contact_info_email'] ) : ''; ?>
                    </div>    
                </div>

        <?php endif; ?>

        <?php if( !empty( $instance['scmod_contact_info_address'] ) ) : ?>

                <div class="contact-row">
                    <p>
                        <?php _e( 'Address', 'juno' ); ?>
                    </p>
                    <div class="detail">
                        <?php echo !empty( $instance['scmod_contact_info_address'] ) ? esc_html( $instance['scmod_contact_info_address'] ) : ''; ?>
                    </div>
                </div>

        <?php endif; ?>

    </div>
        
</div>