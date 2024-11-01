<div class="wrap" id="wpds_settings_form">
    <h2>WP Dash Support Settings</h2>
    <form method="post" action="options.php">
        <?php settings_fields('wpdsoptions-group'); ?>
        <?php do_settings_sections( 'wpdsoptions-group' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php _e('Developer Email Address', 'wpdashsupport') ?></th>
                <td><input type="text" name="_wpds_dev_email" value="<?php echo esc_attr( get_option('_wpds_dev_email') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Hide from Menu?', 'wpdashsupport') ?></th>
                <td><input type="checkbox" name="_wpds_hide" value="1" <?php checked( 1 == sanitize_text_field(get_option('_wpds_hide')) ); ?> /></td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Above Form Message', 'wpdashsupport') ?>
                    <div class="wpds-settings-notice">
                        <?php echo sprintf(__('
                        <p>This message will appear right above the form on your dash page.</p>
                        <p>Remember, if you are hiding this settings page from the menu it might make sense to not upload
                        an image using the image uploader but rather upload it somewhere else and link to it in your
                        message.</p>
                        <p>If you hide the page and you need to get back to change the settings you can just visit it
                        by going to the url <a href="%s">here</a> or by bookmarking
                        this page.</p>'), $hidden_url); ?>
                    </div>
                </th>
                <td><?php wp_editor( __(get_option('_wpds_message')), '_wpds_message', $wpds_tiny_mce_settings); ?></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>