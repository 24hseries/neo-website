<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

class Widget_Social_counter extends WP_Widget {

    /**
     * Widget constructor.
     */
    private $options;
    private $prefix;
    function __construct() {

        $widget_ops = array( 'description' => esc_html__( 'Get more income with ads', 'gillion' ) );
        parent::__construct( false, esc_html__( 'Shufflehound Social Counter', 'gillion' ), $widget_ops );
        $this->options = array(

            'id' => array( 'type' => 'unique' ),

            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Widget Title', 'gillion'),
                'value' => esc_html__('Stay connected', 'gillion'),
            ),

            'demo_mode' => array(
                'label' => esc_html__( 'Demo Mode', 'gillion' ),
                'desc'  => esc_html__( 'Enable or disable demo mode, which will give some random numbers', 'gillion' ),
                'type'  => 'switch',
                'value' => false,
                'left-choice' => array(
                    'value' => false,
                    'label' => esc_html__('Off', 'gillion'),
                ),
                'right-choice' => array(
                    'value' => true,
                    'label' => esc_html__('On', 'gillion'),
                ),
            ),

            'style' => array(
                'type'  => 'select',
                'value' => 'style1',
                'label' => esc_html__('Style', 'gillion'),
                'desc'  => esc_html__('Select widget style', 'gillion'),
                'choices' => array(
                    'style1' => esc_html__('Standard', 'gillion'),
                    'style2' => esc_html__('Round Boxes', 'gillion'),
                ),
            ),

            'instagram_username' => array(
                'type' => 'text',
                'label' => esc_html__('Instagram Username (optional)', 'gillion'),
            ),

            'instagram_client_id' => array(
                'type' => 'text',
                'label' => esc_html__('Instagram Client ID (optional)', 'gillion'),
            ),

            'instagram_access_token' => array(
                'type' => 'text',
                'label' => esc_html__('Instagram Access Token', 'gillion'),
                'help' => esc_html__('Search in Google: How to get Instagram access token', 'gillion'),
            ),

            'instagram_client_id' => array(
                'type' => 'text',
                'label' => esc_html__('Instagram Client ID (optional)', 'gillion'),
            ),


            'facebook_username' => array(
                'type' => 'text',
                'label' => esc_html__('Facebook Username', 'gillion'),
                'help' => esc_html__('Enter your facebook username', 'gillion'),
            ),

            'facebook_app_id' => array(
                'type' => 'text',
                'label' => esc_html__('Facebook App ID', 'gillion'),
                'help' => esc_html__('Enter your facebook app ID', 'gillion'),
            ),

            'facebook_app_secret' => array(
                'type' => 'text',
                'label' => esc_html__('Facebook App Secret', 'gillion'),
                'help' => esc_html__('Enter your facebook app secret', 'gillion'),
            ),


            'youtube_channel_id' => array(
                'type' => 'text',
                'label' => esc_html__('Youtube Channel ID', 'gillion'),
                'help' => esc_html__('Enter your youtube channel ID', 'gillion'),
            ),

            'youtube_api_key' => array(
                'type' => 'text',
                'label' => esc_html__('Youtube API Key', 'gillion'),
                'help' => esc_html__('Enter your Youtube API key', 'gillion'),
            ),


            'googleplus_id' => array(
                'type' => 'text',
                'label' => esc_html__('Google Plus ID', 'gillion'),
                'help' => esc_html__('Enter your Google Plus ID', 'gillion'),
            ),

            'googleplus_api_key' => array(
                'type' => 'text',
                'label' => esc_html__('Google Plus API Key', 'gillion'),
                'help' => esc_html__('Enter your Google Plus ID key', 'gillion'),
            ),

        );
        $this->prefix = 'online_support';
    }

    function widget( $args, $instance ) {
        extract( $args );
        $params = array();

        foreach ( $instance as $key => $value ) {
            $atts[ $key ] = $value;
        }

        $filepath = get_template_directory().'/inc/widgets/social-counter/views/widget.php';

        $instance = $atts;
        $before_widget = str_replace( 'class="', 'class="widget_advertise ', $before_widget );

        if ( file_exists( $filepath ) ) {
            include ( $filepath );
        }
    }

    function update( $new_instance, $old_instance ) {
        return fw_get_options_values_from_input(
            $this->options,
            FW_Request::POST(fw_html_attr_name_to_array_multi_key($this->get_field_name($this->prefix)), array())
        );
    }

    function form( $values ) {

        $prefix = $this->get_field_id($this->prefix);
        $id = 'fw-widget-options-'. $prefix;

        echo '<div class="fw-force-xs fw-theme-admin-widget-wrap" id="'. esc_attr($id) .'">';
        echo fw()->backend->render_options($this->options, $values, array(
            'id_prefix' => $prefix .'-',
            'name_prefix' => $this->get_field_name($this->prefix),
        ));
        echo '</div>';
        $this->print_widget_javascript($id);

        return $values;
    }

    private function print_widget_javascript($id) {
        ?><script type="text/javascript">
            jQuery(function($) {
                var selector = '#<?php echo esc_js($id) ?>', timeoutId;

                $(selector).on('remove', function(){ // ReInit options on html replace (on widget Save)
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function(){ // wait a few milliseconds for html replace to finish
                        fwEvents.trigger('fw:options:init', { $elements: $(selector) });
                    }, 100);
                });
            });
        </script><?php
    }

}
