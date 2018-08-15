<?php

class Novelty_widget_recent_posts extends WP_Widget {

    function __construct() {
        parent::__construct(
                'novelty_widget_recent_posts',
                'Novelty - Latest Posts',
                array(
                    'description' => __('Displays a list of latest posts', 'novelty'),
                    'classname' => 'novelty_widget_recent_posts',
                )
        );
    }

    function widget($args, $instance) {

        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'] );
        $image_size = novelty_image_size($instance['image_size']);
        $nr = $instance['nr'];
        $category = $instance['category'];

        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . $after_title;

        $args = array(
            'numberposts' => $nr,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'suppress_filters' => false
        );

        if(''!==$category)
            $args['cat'] = $category;

        $query = get_posts($args);

        if(count($query)):
            echo '<ul class="widget-latest-posts">';
            foreach($query as $q):
                setup_postdata($q);
        ?>
            <li<?php if(!has_post_thumbnail($q->ID)) echo ' class="no-image"'; ?>>
                <?php if(has_post_thumbnail($q->ID)): ?>
                <span class="widget-latest-posts-cover">
                    <a href="<?php echo get_permalink($q->ID); ?>">
                        <?php echo get_the_post_thumbnail($q->ID,$image_size); ?>
                    </a>
                </span>
                <?php endif; ?>
                <h4><a href="<?php echo get_permalink($q->ID); ?>"><?php echo get_the_title($q->ID); ?></a></h4>
                <span class="widget-latest-posts-time"><?php echo _x('Posted: ', 'Novelty - Latest Posts', 'novelty').novelty_post_time($q); ?></span>
            </li>
        <?php
            endforeach;
            echo '</ul>';
        else:
            echo '<p>'.__('No posts.','novelty').'</p>';
        endif;
        wp_reset_postdata();

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['image_size'] = $new_instance['image_size'];
        $instance['nr'] = (int)strip_tags($new_instance['nr']);
        $instance['category'] = $new_instance['category'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'nr' => 3, 'category' => '', 'image_size' => 'thumbnail'));
        $title = esc_attr($instance['title']);
        $image_size = esc_attr($instance['image_size']);
        $nr = esc_attr($instance['nr']);
        $category = $instance['category'];
        $categories_all = get_categories(array('hide_empty'=>0));
        ?>
        <p>
            <label><?php _e('Title:','novelty'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
        </p>
        <p>
            <label><?php _e('Image size:','novelty'); ?><input class="widefat" name="<?php echo $this->get_field_name('image_size'); ?>" type="text" value="<?php echo $image_size; ?>" /></label>
        </p>
        <p>
            Select a cetegory to take the posts from. <em>(optional)</em>
        </p>
        <p>
            <?php $this->novelty_option(array('cats'=>$categories_all,'value'=>$category,'disabled'=>false)); ?>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nr'); ?>"><?php _e('Max. nr of posts:','novelty'); ?></label>
            <input id="<?php echo $this->get_field_id('nr'); ?>" name="<?php echo $this->get_field_name('nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" />
        </p>
        <?php
    }

    private function novelty_option($args){
        ?>
        <select class="widefat" name="<?php echo $this->get_field_name('category'); ?>" <?php disabled($args['disabled']); ?>>
            <?php
            echo '<option value=""> - No category - </option>';
            foreach ($args['cats'] as $c) {
                $option = '<option value="' . $c->cat_ID . '"' . selected($args['value'], $c->cat_ID, false) . '>';
                $option .= $c->cat_name.' ('.$c->count.')';
                $option .= '</option>';
                echo $option;
            }
            ?>
        </select>
        <?php
    }
}
