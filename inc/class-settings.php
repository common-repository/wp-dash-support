<?php

class DashSupport_Settings {

    public function __construct( )
    {
        add_action( 'admin_init' , array($this , 'register_settings' ) );
        add_action('admin_menu', array($this, 'admin_menu'));
    }

    public function admin_menu() {

        $options_page = 'options-general.php';

        if(get_option('_wpds_hide') === '1') {
            $options_page = 'options.php';
        }

        add_submenu_page(
            $options_page,
            'WP Dash Support Settings',
            'Dashboard Support',
            'manage_options',
            'dash_support_settings',
            array(
                $this,
                'settings_page'
            )
        );
    }

    public function settings_page() {
        ob_start();
        $wpds_tiny_mce_settings = array(
            'textarea_rows' => 15,
            'tabindex' => 1
        );
        $hidden_url = get_admin_url() . 'options.php?page=dash_support_settings';
        include(WPDS_PLUGIN_PATH . 'templates/admin/settings.php');
        $settings_page = ob_get_clean();
        echo $settings_page;
    }

    public function register_settings()
    {
        register_setting( 'wpdsoptions-group', '_wpds_dev_email' );
        register_setting( 'wpdsoptions-group', '_wpds_hide' );
        register_setting( 'wpdsoptions-group', '_wpds_message' );
    }

}

new DashSupport_Settings();