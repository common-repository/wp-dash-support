<?php


class DashSupport_Mail
{
    public function __construct()
    {
        add_action( 'wp_ajax_wpds_send_mail', array($this, 'mail') );
    }

    public function message($message, $email)
    {
        $data = System_Snapshot_Report::getInstance();

        $full_message = $message . "\n" . 'Sent from email: '.$email."\n".$data->snapshot_data();

        return $full_message;
    }

    public function mail()
    {
        $data = array(
            'subject' => sanitize_text_field($_POST['subject']),
            'message' =>  $this->message(esc_textarea($_POST['message']), sanitize_email($_POST['email'])),
        );

        $response = wp_mail(get_option('_wpds_dev_email'), $data['subject'], $data['message']);

        wp_send_json_success($response);
        exit;
    }

}
new DashSupport_Mail();