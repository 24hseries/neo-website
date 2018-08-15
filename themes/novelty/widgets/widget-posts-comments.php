<?php

class Novelty_widget_posts_comments extends WP_Widget {

    function __construct() {
        parent::__construct(
                'novelty_widget_posts_comments',
                'Novelty - Latest Posts & Comments',
                array(
                    'description' => __('Displays a list of recent posts and comments in tabs', 'novelty'),
                    'classname' => 'novelty_widget_posts_comments tabs',
                )
        );
    }

    function widget($args, $instance) {

        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'] );
        $image_size = novelty_image_size($instance['image_size']);
        $posts_nr = $instance['posts_nr'];
        $comments_nr = $instance['comments_nr'];

        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . $after_title;
        ?>

        <ul class="tab_nav">
            <?php
            echo '<li class="active"><a href="#'.$this->get_field_id('posts').'" data-toggle="tab">'.__('Latest Posts', 'novelty').'</a></li>';
            echo '<li><a href="#'.$this->get_field_id('comments').'" data-toggle="tab">'.__('Latest Comments', 'novelty').'</a></li>';
            ?>
        </ul>
        <div class="clear"></div>
        <div class="tab-content">
            <?php

            echo '<div class="tab-pane tab-posts active" id="'.$this->get_field_id('posts').'">';
            $args = array(
                'numberposts' => $posts_nr,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'publish',
                'suppress_filters' => false
            );
            $query = get_posts($args);
            if(count($query)){
                foreach($query as $q){
                    setup_postdata($q);

                    echo
                    '<div class="tab-one'.(has_post_thumbnail($q->ID)?'':' no-image').'">';

                    if(has_post_thumbnail($q->ID))
                        echo
                        '<div class="tab-cover">
                            <a href="'.get_permalink($q->ID).'">
                                '.get_the_post_thumbnail($q->ID,$image_size).'
                            </a>
                        </div>';

                    echo
                        '<div>
                            <h4>
                                <a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a>
                            </h4>
                            <div class="tab-date">
                                <span>'._x('Posted :', 'tabs widget', 'novelty').'</span> '.novelty_post_time($q).'
                            </div>
                        </div>';

                    echo
                    '</div>';
                }
                wp_reset_postdata();
            }else
                echo '<p>'.__('No posts.','novelty').'</p>';
            echo '</div>';

            echo '<div class="tab-pane tab-comments" id="'.$this->get_field_id('comments').'">';
            $args = array(
                'number' => $comments_nr,
                'status' => 'approve',
                'post_status' => 'publish'
            );
            $query = get_comments($args);
            if(count($query)){
                echo '<ul>';
                foreach($query as $q){
                    echo '<li>';
                    echo '<p>'.sprintf(_x('%1$s on %2$s', 'latest posts & comments widget', 'novelty'), get_comment_author_link($q->comment_ID), '<a href="'.esc_url(get_comment_link($q->comment_ID)).'">'.get_the_title($q->comment_post_ID).'</a>').'</p>';
                    echo '<span>'.novelty_comment_time($q).'</span>';
                    echo '</li>';
                }
                echo '</ul>';
            }else
                echo '<p>'.__('No comments.','novelty').'</p>';
            echo '</div>';
            ?>
        </div>

        <?php

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['image_size'] = $new_instance['image_size'];
        $instance['posts_nr'] = (int)strip_tags($new_instance['posts_nr']);
        $instance['comments_nr'] = (int)strip_tags($new_instance['comments_nr']);

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'posts_nr' => 3, 'comments_nr' => 3, 'image_size' => 'thumbnail'));
        $title = esc_attr($instance['title']);
        $image_size = esc_attr($instance['image_size']);
        $posts_nr = esc_attr($instance['posts_nr']);
        $comments_nr = esc_attr($instance['comments_nr']);
        ?>
        <p>
            <label><?php _e('Title:','novelty'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
        </p>
        <p>
            <label><?php _e('Image size:','novelty'); ?><input class="widefat" name="<?php echo $this->get_field_name('image_size'); ?>" type="text" value="<?php echo $image_size; ?>" /></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('posts_nr'); ?>"><?php _e('Max. nr of posts:','novelty'); ?></label>
            <input id="<?php echo $this->get_field_id('posts_nr'); ?>" name="<?php echo $this->get_field_name('posts_nr'); ?>" type="text" value="<?php echo $posts_nr; ?>" size="3" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('comments_nr'); ?>"><?php _e('Max. nr of comments:','novelty'); ?></label>
            <input id="<?php echo $this->get_field_id('comments_nr'); ?>" name="<?php echo $this->get_field_name('comments_nr'); ?>" type="text" value="<?php echo $comments_nr; ?>" size="3" />
        </p>
        <?php
    }
}
