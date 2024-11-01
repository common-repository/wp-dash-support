<?php
/*
 * Template for dashboard widget
 */


do_action('wpds_before_form');
?>
<form id="wpds_widget_form" action="">
    <div class="wpds-above-form-text">
        <?php echo wp_kses(get_option('_wpds_message', __('<h3>Enter a message below to contact your developer for assistance.</h3>', 'wpdashsupport')), $allowed_html); ?>
    </div>
    <div class="input-text-wrap">
        <input type="text" placeholder="<?php _e('Subject', 'wpdashsupport') ?>" id="wpds_subject" name="wpds_subject">
    </div>
    <div class="input-text-wrap">
        <input type="text" placeholder="<?php _e('Your Email Address', 'wpdashsupport') ?>" id="wpds_email" name="wpds_email">
    </div>
    <div class="textarea-wrap">
        <textarea name="wpds_message" id="wpds_message" class="mceEditor" cols="30" rows="10" placeholder="Message to developer"></textarea>
    </div>
    <?php do_action('wpds_inside_form_before_submit'); ?>
    <?php wp_nonce_field( 'wpds_send_mail' ); ?>
    <p class="submit">
        <input type="submit" class="button button-primary" value="<?php _e('Send Support Request', 'wpdashsupport') ?>">
    </p>
</form>
