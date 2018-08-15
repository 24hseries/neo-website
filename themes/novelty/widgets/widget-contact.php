<?php

class Novelty_widget_contact extends WP_Widget {

    function __construct() {
        parent::__construct(
                'novelty_widget_contact',
                'Novelty - Contact',
                array(
                    'description' => __('Displays contact information', 'novelty'),
                    'classname' => 'novelty_widget_contact',
                )
        );
    }

    function widget($args, $instance) {

        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'] );
        $phone_1 = $instance['phone_1'];
        $phone_2 = $instance['phone_2'];
        $email = $instance['email'];
        $address = $instance['address'];

        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . $after_title;

        echo '<ul class="widget-contact">';

        if(''!==$phone_1)
            echo '<li class="widget-contact-phone">'.$phone_1.'</li>';

        if(''!==$phone_2)
            echo '<li class="widget-contact-phone">'.$phone_2.'</li>';

        if(''!==$email)
            echo '<li class="widget-contact-mail"><a href="mailto:'.$email.'">'.$email.'</a></li>';

        if(''!==$address)
            echo '<li class="widget-contact-address">'.nl2br($address).'</li>';

        echo '</ul>';

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['phone_1'] = $new_instance['phone_1'];
        $instance['phone_2'] = $new_instance['phone_2'];
        $instance['email'] = $new_instance['email'];
        $instance['address'] = $new_instance['address'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'phone_1' => '', 'phone_2' => '', 'email' => '', 'address' => ''));
        $title = esc_attr($instance['title']);
        $phone_1 = esc_attr($instance['phone_1']);
        $phone_2 = esc_attr($instance['phone_2']);
        $email = esc_attr($instance['email']);
        $address = esc_textarea($instance['address']);
        ?>
        <p>
            <label><?php _e('Title:','novelty'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
        </p>
        <p>
            <label><?php _e('Phone 1:','novelty'); ?><input class="widefat" name="<?php echo $this->get_field_name('phone_1'); ?>" type="text" value="<?php echo $phone_1; ?>" /></label>
        </p>
        <p>
            <label><?php _e('Phone 2:','novelty'); ?><input class="widefat" name="<?php echo $this->get_field_name('phone_2'); ?>" type="text" value="<?php echo $phone_2; ?>" /></label>
        </p>
        <p>
            <label><?php _e('E-mail:','novelty'); ?><input class="widefat" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></label>
        </p>
        <p>
            <label><?php _e('Address:','novelty'); ?><textarea class="widefat" name="<?php echo $this->get_field_name('address'); ?>" rows="5" cols="20" style="overflow:scroll;resize:vertical;white-space:nowrap;"><?php echo $address; ?></textarea></label>
        </p>
        <?php
    }
}
