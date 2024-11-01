<?php


class DashSupport_Init
{

    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'scripts'));
        add_action('admin_enqueue_scripts', array($this, 'styles'));
        register_activation_hook(WPDS_PLUGIN_MAIN_FILE, array( 'DashSupport_Init', 'activate' ));
        add_action('admin_notices', array($this, 'installation_notice'));
    }


    public function scripts()
    {
        wp_enqueue_script('wpds-script', WPDS_PLUGIN_URL.'assets/js/wpds.js', array('jquery'), 1.0);
    }

    public function styles()
    {
        wp_enqueue_style('wpds-style', WPDS_PLUGIN_URL.'assets/css/wpds.css');
    }

    public static function activate()
    {
        $notices= get_option('_wpds_deferred_admin_notice', array());
        $notices[]= "Thanks for installing WP Dash Support! Please remember to set your email under Settings - Dashboard Support.";
        update_option('_wpds_deferred_admin_notice', $notices);
    }

    public function installation_notice()
    {
        if ($notices= get_option('_wpds_deferred_admin_notice')) {
            foreach ($notices as $notice) {
                echo "<div class='notice notice-error'><p>$notice</p></div>";
            }
            if(get_option('_wpds_dev_email')) {
                delete_option('_wpds_deferred_admin_notice');
            }
        }
    }

}
new DashSupport_Init();

