<div class="juno-contact-form <?php echo isset( $instance['scmod_contact_form_width'] ) ? 'col-sm-' . $instance['scmod_contact_form_width'] : 'col-sm-12'; ?>">

    <div class="widget">

        <h6 class="feature-title">
            <?php echo !empty( $instance['scmod_contact_form_title'] ) ? esc_html( $instance['scmod_contact_form_title'] ) : ''; ?>
        </h6>

        <div class="detail">
            <?php echo !empty( $instance['scmod_contact_form_detail'] ) ? esc_html( $instance['scmod_contact_form_detail'] ) : ''; ?>
        </div>

        <form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" id="scmod-contact-form">

            <input type="hidden" class="recipient" name="recipient" value="<?php echo !empty( $instance['scmod_contact_form_recipient_email'] ) ? $instance['scmod_contact_form_recipient_email'] : ''; ?>" />

            <div class="group">
                <label><?php echo !empty( $instance['scmod_contact_form_from_label'] ) ? esc_html( $instance['scmod_contact_form_from_label'] ) : ''; ?></label>
                <input type="text" name="name" class="control name"/>
            </div>

            <div class="group">
                <label><?php echo !empty( $instance['scmod_contact_form_email_label'] ) ? esc_html( $instance['scmod_contact_form_email_label'] ) : ''; ?></label>
                <input type="text" name="email" class="control email"/>
            </div>

            <div class="group">
                <label class="message"><?php echo !empty( $instance['scmod_contact_form_message_label'] ) ? esc_html( $instance['scmod_contact_form_message_label'] ) : ''; ?></label>
                <textarea name="message" class="control message"></textarea>
            </div>

            <input type="submit" class="accent-button" value="<?php echo !empty( $instance['scmod_contact_form_submit_label'] ) ? esc_attr( $instance['scmod_contact_form_submit_label'] ) : ''; ?>"/>

            <div class="mail-sent"><span class="fa fa-check-circle"></span> <?php _e( 'Email sent!', 'juno' ); ?></div>
            <div class="mail-not-sent"><span class="fa fa-exclamation-circle"></span> <?php _e( 'There has been an error, please check the information you entered and try again.', 'juno' ); ?></div>

        </form>

    </div>
    
</div>