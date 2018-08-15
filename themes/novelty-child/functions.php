<?php
// Exit if accessed directly
//if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

// Function add js-countdown
function loadCountdownScript(){

    wp_register_script('js-countdown', get_stylesheet_directory_uri().'/js/countdownpro.js', false, null, false);
    wp_enqueue_script('js-countdown');
}
add_action('wp_enqueue_scripts', 'loadCountdownScript');

// Insert Handlebars into the pages where the entry list is
function loadHandlebars(){
    if(is_page('2857') || is_page('769')){

        wp_register_script('load-handlebars', get_stylesheet_directory_uri().'/js/handlebars.js', array(), null, true);
        wp_enqueue_script('load-handlebars');
	}
}
add_action('wp_enqueue_scripts', 'loadHandlebars');

// Load entry list
function loadEntryList(){

    if(is_page('769')){

        wp_register_script('show-registrations', get_stylesheet_directory_uri().'/js/nes4_entrylist.js', array('jquery'), null, true);
        wp_enqueue_script('show-registrations');
	}
}
add_action('wp_enqueue_scripts', 'loadEntryList');

// Load pre-qualifying entry list
function loadPQEntryList(){

    if(is_page('2875')){

        wp_register_script('show-pq-registrations', get_stylesheet_directory_uri().'/js/nes4_pq_entrylist.js', array('jquery'), null, true);
        wp_enqueue_script('show-pq-registrations');
	}
}
add_action('wp_enqueue_scripts', 'loadPQEntryList');

// Load test script entry list
function loadTestEntryList(){

    if(is_page('2857')){

        wp_register_script('test-show-registrations', get_stylesheet_directory_uri().'/js/test_entrylist.js', array('jquery'), null, true);
        wp_enqueue_script('test-show-registrations');
	}
}
add_action('wp_enqueue_scripts', 'loadTestEntryList');

// Load standings
function loadStandings(){

    if(is_page('1072')){
		wp_enqueue_script('show-standings', get_stylesheet_directory_uri().'/js/show_standings.js', array('jquery'), null, true);
	}
}
add_action('wp_enqueue_scripts', 'loadStandings');

// Load results
function loadResults(){

    if(is_page('1090')){
		wp_enqueue_script('show-results', get_stylesheet_directory_uri().'/js/show_results.js', array('jquery'), null, true);
	}
}
add_action('wp_enqueue_scripts', 'loadResults');

// Load CleanX CHallenge standings
function loadCleanXStandings(){

    if(is_page('2993')){

        wp_enqueue_script('show-cleanx-standings', get_stylesheet_directory_uri().'/js/nes4_cleanx_standings.js', array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'loadCleanXStandings');

// Replace the main slider short code ===================================================
add_action('init','RemoveParentSlider');
function RemoveParentSlider(){

    remove_shortcode('novelty_main_slider');
    add_shortcode('novelty_main_slider','CustomMainSlider');
}

function CustomMainSlider( $atts, $content = null ){

    extract(shortcode_atts(array(
        'nr' => 3,
        'category' => '',
        'enable_links' => true,
        'link_target' => '',
        'image_size' => 'full'
    ), $atts));

    $image_size = novelty_image_size($image_size);

    $enable_links = 'false'===strtolower($enable_links) ? false : (bool) $enable_links;

    $output = '';

    $args = array(
        'numberposts' => $nr,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'post__not_in' => get_option( 'sticky_posts' ),
        'category_name' => $category,
        'suppress_filters' => false,
        'meta_key' => '_thumbnail_id'
    );

    $query = get_posts($args);

    $count = count($query);

    $output .=
    '
    <div class="the-slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".slide-right" data-tesla-prev=".slide-left" data-tesla-container=".slide-wrapper">
        <div class="row">
            <div class="col-md-8 slider-left">
                <div class="slide-arrows">
                    <div class="slide-left"></div>
                    <div class="slide-right"></div>
                </div>
                <ul class="slide-wrapper" style="position:relative;">
                    ';

    foreach ($query as $i => $q) {

        $output .= '<li class="slide" style="'.($i?'position:absolute;top:0px;left:0px;right:0px;z-index:0;display:none;':'position:relative;z-index:1;').'">';

        if($enable_links)
            $output .= '<a href="'.get_permalink($q->ID).'" target="'.$link_target.'">';

        $output .= novelty_get_featured($q->ID,false,$image_size);

        if($enable_links)
            $output .= '</a>';

        $output .= '</li>';

    }

    $output .=
                    '
                </ul>
                <ul class="the-bullets-dots" data-tesla-plugin="bullets">
                    '.str_repeat('<li><span></span></li>', $count).'
                </ul>
            </div>
            <div class="col-md-4 slider-right">
                <ul class="the-bullets" data-tesla-plugin="bullets">
                    ';

    foreach ($query as $i => $q) {

        $output .=
                    '
                    <li>
                        <h4>';

        foreach(get_the_category($q->ID) as $j => $c) $output .= ($j?', ':'').$c->name;

        $output .=
                        '</h4>
                        <p>'.get_the_title($q->ID).'</p>
                    </li>
                    ';

    }

    $output .=
                    '
                </ul>
            </div>
        </div>
    </div>
    ';

    return $output;
}

// Replace the news ticker, to change the format from time to date ======================

add_action('init','RemoveParentNewsTicker');
function RemoveParentNewsTicker(){

    remove_shortcode('novelty_news_ticker');
    add_shortcode('novelty_news_ticker','CustomNewsTicker');
}

function CustomNewsTicker( $atts, $content = null ){

    extract(shortcode_atts(array(
        'title' => 'hot news',
        'speed' => 10,
        'category' => '',
        'nr' => 5
    ), $atts));

    $nr = (int) $nr;

    $output = '';

    $args = array(
        'numberposts' => $nr,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'post__not_in' => get_option('sticky_posts'),
        'category_name' => $category,
        'suppress_filters' => false
    );

    $query = get_posts($args);

    $count = count($query);

    $output .= '
    <div class="hot-news">
        <div class="hot-news-title">'.$title.'</div>
        <div class="hot-news-container" data-tesla-plugin="news_ticker" data-tesla-item=">p" data-tesla-speed="'.$speed.'">
        ';

    foreach ($query as $i => $q)
        $output .= '<p><span>'.mysql2date(get_option('date_format'), $q->post_date).'</span> <a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a></p>';

    $output .= '
        </div>
    </div>
    ';

    return $output;

}

// Replace the latest news widget, removing the latest comments tab =====================
add_action('init','RemoveParentPostsComments');
function RemoveParentPostsComments(){

    remove_shortcode('novelty_posts_comments');

    add_shortcode('novelty_posts_comments','CustomPostsComments');
}

function CustomPostsComments( $atts, $content = null ){

    extract(shortcode_atts(array(
        'posts_nr' => 3,
        'image_size' => 'thumbnail'
    ), $atts));

    $image_size = novelty_image_size($image_size);

    global $novelty_posts_comments_id;

    if(!isset($novelty_posts_comments_id))
        $novelty_posts_comments_id = 0;
    else
        $novelty_posts_comments_id++;

    $output = '';

    $output .=
    '
    <div class="tabs">
        <div class="site-title">
            <a href="https://www.neo-endurance.com/news/">Latest News</a>
        </div>
        <div class="latest-news-container">
    ';

    $args = array(
        'numberposts' => $posts_nr,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'post__not_in' => get_option( 'sticky_posts' ),
        'suppress_filters' => false
    );

    $query = get_posts($args);

    $count = count($query);

    if($count){

        foreach ($query as $i => $q) {

            $output .=
            '<div class="latest-news-item">';

            $output .=
                '<h4 class="latest-news-item-title">
                    <a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a>
                </h4>
                <div class="latest-news-date">
                    <span>'.novelty_post_time($q).'</span>
                </div>
                ';

            $output .=
            '</div>';

        }

    }else{

        $output .= '<p>'.__('No posts.','novelty').'</p>';

    }

    $output .=
    '
        </div>
    </div>
    ';

    return $output;

}

// END ENQUEUE PARENT ACTION
