<?php


class DashSupport_Dashboard
{
    public function __construct()
    {
        add_action( 'wp_dashboard_setup', array($this, 'add_dashboard_widgets') );
    }

    public function add_dashboard_widgets() {

        wp_add_dashboard_widget(
            'dashsupport_widget',         // Widget slug.
            __('Contact Developer Support', 'wpdashsupport'),         // Title.
            array($this, 'dashboard_widget_function') // Display function.
        );
    }


    /**
     * Create the function to output the contents of our Dashboard Widget.
     */
    public function dashboard_widget_function() {
        $allowed_html = array(
            'a' => array(
                'href' => array(),
                'title' => array(),
                'style' => array(),
                'class' => array()
            ),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'img' => array(
                'src' => array(),
                'alt' => array(),
                'style' => array(),
                'class' => array()
            ),
            'p' => array(
                'style' => array()
            )
        );
        include(WPDS_PLUGIN_PATH . 'templates/widget.php');
    }

}

new DashSupport_Dashboard();