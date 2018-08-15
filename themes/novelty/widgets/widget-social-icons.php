<?php

class Novelty_widget_social_icons extends WP_Widget {

    function __construct() {
        parent::__construct(
                'novelty_widget_social_icons',
                'Novelty - Social Icons',
                array(
                    'description' => __('Displays an image with a link', 'novelty'),
                    'classname' => 'novelty_widget_social_icons',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'] );

        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . $after_title;

        $novelty_social = array(
            'facebook'=>_go('social_platforms_facebook'),
            'twitter'=>_go('social_platforms_twitter'),
            'linkedin'=>_go('social_platforms_linkedin'),
            'rss'=>_go('social_platforms_rss'),
            'pinterest'=>_go('social_platforms_pinterest'),
            'youtube'=>_go('social_platforms_youtube'),
            'flickr'=>_go('social_platforms_flickr'),
            'behance'=>_go('social_platforms_behance'),
            'dribbble'=>_go('social_platforms_dribbble'),
            'google'=>_go('social_platforms_google'),
            'vimeo'=>_go('social_platforms_vimeo')
        );
        $novelty_social_names = array(
            'facebook'=>'Facebook',
            'twitter'=>'Twitter',
            'linkedin'=>'Linkedin',
            'rss'=>'RSS',
            'pinterest'=>'Pinterest',
            'youtube'=>'Youtube',
            'flickr'=>'Flickr',
            'behance'=>'Behance',
            'dribbble'=>'Dribbble',
            'google'=>'Google+',
            'vimeo'=>'Vimeo'
        );
        $novelty_social_font = array(
            'facebook'=>'<i class="fa fa-facebook"></i>',
            'twitter'=>'<i class="fa fa-twitter"></i>',
            'linkedin'=>'<i class="fa fa-linkedin"></i>',
            'rss'=>'<i class="fa fa-rss"></i>',
            'pinterest'=>'<i class="fa fa-pinterest"></i>',
            'youtube'=>'<i class="fa fa-youtube"></i>',
            'flickr'=>'<i class="fa fa-flickr"></i>',
            'behance'=>'<i class="fa fa-behance"></i>',
            'dribbble'=>'<i class="fa fa-dribbble"></i>',
            'google'=>'<i class="fa fa-google-plus"></i>',
            'vimeo'=>'<i class="fa fa-vimeo-square"></i>'
        );
        $novelty_social_filtered = array_filter($novelty_social);
        if(!empty($novelty_social_filtered)):
        ?>
        <ul class="widget-follow-us">
            <?php foreach($novelty_social_filtered as $novelty_social_key => $novelty_social_value): ?>
            <li><a href="<?php echo $novelty_social_value; ?>" class="widget-follow-us-<?php echo $novelty_social_key; ?>"><span><?php echo $novelty_social_font[$novelty_social_key]; ?></span><?php echo $novelty_social_names[$novelty_social_key]; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php
        endif;

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => ''));
        $title = esc_attr($instance['title']);
        ?>
        <div class="novelty_widget_social_icons">
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','novelty') ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
            </p>
            <p>
                Configure the icons on Dashboard > Novelty > Social Icons.
            </p>
        </div>
        <?php
    }
}
