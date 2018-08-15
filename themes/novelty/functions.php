<?php

/*============================== TESLA FRAMEWORK ======================================================================================================================*/

require_once locate_template('tesla_framework/tesla.php');


TT_ENQUEUE::$enabled = FALSE;



/*============================== THEME FEATURES ======================================================================================================================*/

function novelty_theme_features() {

    register_nav_menus(array(
        'novelty_menu' => 'Header Menu'
    ));

    if (!isset($content_width))
        $content_width = 1170;

    add_theme_support('post-thumbnails');

    add_theme_support( 'automatic-feed-links' );
}

add_action('after_setup_theme', 'novelty_theme_features');



/*============================== SIDEBARS ======================================================================================================================*/
if (!function_exists('novelty_sidebars')){
function novelty_sidebars() {

    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'blog-sidebar',
        'description' => 'This sidebar is located on the right side of the content on the blog page.',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Footer Left Sidebar',
        'id' => 'footer-left-sidebar',
        'description' => 'This sidebar is located in the left column of the footer area.',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Footer Middle Sidebar',
        'id' => 'footer-middle-sidebar',
        'description' => 'This sidebar is located in the middle column of the footer area.',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Footer Right Sidebar',
        'id' => 'footer-right-sidebar',
        'description' => 'This sidebar is located in the right column of the footer area.',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Page Sidebar',
        'id' => 'page-sidebar',
        'description' => 'This sidebar is located in the right column of any page.',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

}

add_action('widgets_init', 'novelty_sidebars');

}

/*============================== LANGUAGE SETUP ======================================================================================================================*/

function novelty_language_setup(){

    load_theme_textdomain('novelty', locate_template('languages'));

}

add_action('after_setup_theme', 'novelty_language_setup');



/*============================== SCRIPTS & STYLES ======================================================================================================================*/

function novelty_scripts_and_styles() {

    $protocol = is_ssl() ? 'https' : 'http';

    $font_custom = _go('logo_text_font');

    wp_enqueue_style('novelty-font-opensans', $protocol.'://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,600,700,800', false, null);

    if($font_custom){

        $font_custom = str_replace(' ', '+', $font_custom);

        wp_enqueue_style( 'novelty-font-custom', $protocol.'://fonts.googleapis.com/css?family='.$font_custom, false, null);

    }

    wp_enqueue_style('novelty-css-bootstrap', tesla_locate_uri('css/bootstrap.css'), false, null);
    wp_enqueue_style('novelty-css-awesome', $protocol.'://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', false, null);
    wp_enqueue_style('novelty-css-main', tesla_locate_uri('css/style.css'), array('novelty-css-bootstrap'), '1.01');
    wp_enqueue_style('novelty-css-root', tesla_locate_uri('style.css'), false, null);

    wp_enqueue_script('jquery');
		//laadt scripts alleen op deze pagina
	if(is_page('769')){
		wp_enqueue_script('show-registrations', tesla_locate_uri('js/show_data.js'), array('jquery'), null, true);
	}
	if(is_page('1072')){
		wp_enqueue_script('show-standings', tesla_locate_uri('js/show_standings.js'), array('jquery'), null, true);
	}
	if(is_page('1090')){
		wp_enqueue_script('show-results', tesla_locate_uri('js/show_results.js'), array('jquery'), null, true);
	}
	//js-countdown plug-in
	wp_enqueue_script('js-countdown', tesla_locate_uri('js/countdownpro.js'), false, null, false);
	
    wp_enqueue_script('novelty-js-retina', tesla_locate_uri('js/retina-1.1.0.min.js'), false, null, true);
    wp_enqueue_script('novelty-js-modernizr', tesla_locate_uri('js/modernizr.custom.63321.js'), false, null, true);
    wp_enqueue_script('novelty-js-bootstrap', tesla_locate_uri('js/bootstrap.js'), array('jquery', 'novelty-js-modernizr'), null, true);
    wp_enqueue_script('novelty-js-placeholder', tesla_locate_uri('js/placeholder.js'), array('jquery', 'novelty-js-modernizr'), null, true);
    wp_enqueue_script('novelty-js-imagesloaded', tesla_locate_uri('js/imagesloaded.pkgd.min.js'), array('jquery', 'novelty-js-modernizr'), null, true);
    wp_enqueue_script('novelty-js-masonry', tesla_locate_uri('js/masonry.pkgd.js'), array('jquery', 'novelty-js-modernizr', 'novelty-js-imagesloaded'), null, true);
    wp_enqueue_script('novelty-js-plugins', tesla_locate_uri('js/plugins.js'), array('jquery', 'novelty-js-modernizr', 'novelty-js-imagesloaded', 'novelty-js-masonry'), '1.01', true);
    wp_enqueue_script('novelty-js-swipebox', tesla_locate_uri('js/jquery.swipebox.min.js'), array('jquery', 'novelty-js-modernizr'), null, true);
    wp_enqueue_script('novelty-js-sharethis', tesla_locate_uri('js/buttons.js'), array('jquery'), null, true);
    wp_enqueue_script('novelty-js-options', tesla_locate_uri('js/options.js'), array('jquery', 'novelty-js-modernizr', 'novelty-js-bootstrap', 'novelty-js-placeholder', 'novelty-js-imagesloaded', 'novelty-js-masonry', 'novelty-js-plugins', 'novelty-js-swipebox', 'novelty-js-sharethis'), null, true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply', array('jquery') );

    wp_localize_script( 'novelty-js-options', 'novelty', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'contact_fill' => _x('Please fill in all the required fields.','contact form','novelty'),
        'contact_email' => _x('Please provide a valid e-mail.','contact form','novelty')
    ) );

}

function novelty_admin_scripts_and_styles($hook_suffix) {

    if ('widgets.php' === $hook_suffix) {
        wp_enqueue_style('novelty-css-admin-widgets', tesla_locate_uri('admin/widgets.css'), false, null);

        wp_enqueue_media();
        wp_enqueue_script('novelty-js-admin-widgets', tesla_locate_uri('admin/widgets.js'), array('media-upload', 'media-views'), null);
    }

    if ('novelty_page_tt_fw_diim' === $hook_suffix) {
        wp_enqueue_script('novelty-js-admin-diim', tesla_locate_uri('admin/diim.js'), array(), null);

        wp_localize_script('novelty-js-admin-diim', 'tesla_diim', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('tesla_diim_nonce'),
        ));
    }

    $screen = get_current_screen();

    if('page'===$screen->id){

        wp_enqueue_style('novelty-css-admin-page', tesla_locate_uri('admin/page.css'), false, null);

        wp_enqueue_script('novelty-js-admin-widgets', tesla_locate_uri('admin/page.js'), false, null);

    }

}

if(!is_admin())
    add_action('wp_enqueue_scripts', 'novelty_scripts_and_styles');
else
    add_action('admin_enqueue_scripts', 'novelty_admin_scripts_and_styles');

function novelty_header(){
    $background_image = _go('bg_image');
    $background_position = _go('bg_image_position');
    $background_repeat = _go('bg_image_repeat');
    $background_attachment = _go('bg_image_attachment');
    $background_color = _go('bg_color');
    ?>
    <style type="text/css">
    .novelty_video_wrapper,
    .video-player {
        position: relative !important;
        padding-bottom: 56.25% !important;
        overflow: hidden !important;
        height: 0 !important;
        width: auto !important;
    }

    .novelty_video_wrapper>iframe,
    .novelty_video_wrapper>object,
    .novelty_video_wrapper>embed,
    .video-player>iframe,
    .video-player>object,
    .video-player>embed {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
    }
    .contact_map{
        height: 100%;
    }
    <?php
    echo 'body{'."\n";
    if(!empty($background_image))
        echo 'background-image: url('.$background_image.');'."\n";
    if(!empty($background_position)){
        echo 'background-position: ';
        switch($background_position){
            case 'Left':
                echo 'top left';
                break;
            case 'Center':
                echo 'top center';
                break;
            case 'Right':
                echo 'top right';
                break;
            default:
                break;
        }
        echo ';'."\n";
    }
    if(!empty($background_repeat)){
        echo 'background-repeat: ';
        switch($background_repeat){
            case 'No Repeat':
                echo 'no-repeat';
                break;
            case 'Tile':
                echo 'repeat';
                break;
            case 'Tile Horizontally':
                echo 'repeat-x';
                break;
            case 'Tile Vertically':
                echo 'repeat-y';
                break;
            default:
                break;
        }
        echo ';'."\n";
    }
    if(!empty($background_attachment)){
        echo 'background-attachment: ';
        switch($background_attachment){
            case 'Scroll':
                echo 'scroll';
                break;
            case 'Fixed':
                echo 'fixed';
                break;
            default:
                break;
        }
        echo ';'."\n";
    }
    if(!empty($background_color))
        echo 'background-color: '.$background_color.';'."\n";
    echo '}'."\n";
    $default = _go('site_color');
    $default2 = _go('site_color_2');
    $default3 = _go('site_color_3');
    $default4 = _go('site_color_4');
    $default5 = _go('site_color_5');
    if(empty($default))
        $default = '#c90000';
    if(empty($default2))
        $default2 = '#a13233';
    if(empty($default3))
        $default3 = '#bd3b3c';
    if(empty($default4))
        $default4 = '#ab0000';
    if(empty($default5))
        $default5 = '#279cbe';
    ?>
    /* first color */
    a:hover {
        color: <?php echo $default; ?>;
    }
    .site-title {
        border-left-color: <?php echo $default; ?>;
        color: <?php echo $default; ?>;
        background-color: <?php echo $default; ?>;
    }
    .site-title a,
    .tabs .tab-one h4 a:hover,
    .footer .footer-copyright a:hover,
    .widget-follow-us li a:hover,
    .widget-latest-posts li h4 a:hover,
    .widget-contact li a:hover,
    .category-post .category-post-details a:hover,
    .the-slider .the-bullets li.active span,
    .the-slider .the-bullets li.active h4,
    .home-post .home-post-title a:hover,
    .twitter_widget li a:hover,
    .featured-posts ul li.active a,
    .featured-posts ul li a:hover,
    .home-post .home-post-more .comment-more:hover,
    .site-text-color {
        color: <?php echo $default; ?>;
    }
    .twitter_widget {
        border-top-color: <?php echo $default; ?>;
    }
    .button-1,
    .comments-area .comment-form .form-submit input,
    .contact-form-box .contact-form .contact-button {
        background-color: <?php echo $default; ?>;
    }
    .button-1:hover,
    .comments-area .comment-form .form-submit input:hover, 
    .contact-form-box .contact-form .contact-button:hover {
        background-color: <?php echo $default; ?>;
    }
    .subscription .input-cover .subscription-button {
        background-color: <?php echo $default; ?>;
    }
    .subscription .input-cover .subscription-line.s_error {
        border-color: <?php echo $default; ?> !important; 
        color: <?php echo $default; ?>; 
    }
    .accordion .accordion-heading.active a,
    .the-slider .the-bullets-dots li.active span,
    .site-bg-color {
        background-color: <?php echo $default; ?>;
    }
    .sidebar .widget .widget-title {
        border-left-color: <?php echo $default; ?>;
        color: <?php echo $default; ?>;
    }
    .category-page a {
        color: <?php echo $default; ?>;
    }
    .hot-news .hot-news-title {
        border-color: <?php echo $default; ?>;
    }
    .hot-news p span {
        color: <?php echo $default; ?>;
    }
    .alert.alert-warning {
        background-color: <?php echo $default; ?>;
    }
    .menu {
        background-color: <?php echo $default; ?>;
    }
    .page-numbers li .current,
    .page-numbers li a:hover {
        background-color: <?php echo $default; ?>;
        border-color: <?php echo $default; ?>;
    }
    /* second color */
    .sidebar .tabs .tab_nav li a:hover,
    .sidebar .tabs .tab_nav li.active a,
    .tabs .tab_nav li a:hover,
    .tabs .tab_nav li.active a {
        background-color: <?php echo $default2; ?>;
    }
    /* third color */
    .sidebar .tabs .tab_nav li a,
    .tabs .tab_nav li a {
        background-color: <?php echo $default3; ?>;
    }
    .comments-area,
    .contact-form-box {
        border-top-color: <?php echo $default3; ?>;
    }
    .comments-area .comment-form-write,
    .contact-form-box .contact-form-write {
        background-color: <?php echo $default3; ?>;
    }
    /* fourth color */
    .header .logo span span {
        color: <?php echo $default4; ?>;
    }
    .menu ul li.current-menu-item>a,
    .menu ul li.current-page a,
    .menu ul li a:hover {
        background-color: <?php echo $default4; ?>;
    }
    /* fifth color */
    .sidebar .widget ul li a:hover {
        color: <?php echo $default5; ?>;
    }
    .blog-entry .entry-content-details a {
        color: <?php echo $default5; ?>;
    }
    .button-3 {
        background-color: <?php echo $default5; ?>;
    }
    .button-3:hover {
        background-color: <?php echo $default5; ?>;
    }
    .pricing-table .pricing-table-name {
        background-color: <?php echo $default5; ?>;
    }
    .pricing-table ul li span {
        color: <?php echo $default5; ?>;
    }
    .comment .comment-info span {
        color: <?php echo $default5; ?>;
    }
    .comments-area h1 span,
    .comments-area h2.perfect-form-title span {
        color: <?php echo $default5; ?>;
    }
    .comments-area .comment-form span,
    .contact-form-box .contact-form span {
        background-color: <?php echo $default5; ?>;
    }
    .comments-area .comment-form .perfect-line:focus,
    .comments-area .comment-form .perfect-area:focus,
    .contact-form-box .contact-form .contact-line:focus,
    .contact-form-box .contact-form .contact-area:focus {
        border-color: <?php echo $default5; ?> !important;
    }
    <?php
    $header_align = _go('header_menu_alignment');
    if(!empty($header_align))
        echo '.header div.menu>ul{'."\n".'text-align: '.$header_align.';'."\n".'}'."\n";
    $map_height = _go('map_height');
    if(!empty($map_height))
        echo '.map{'."\n".'height: '.$map_height.'px;'."\n".'}'."\n";
    echo _go('custom_css');
    ?>
    </style>
    <?php
    $favicon = _go('favicon');
    if(!empty($favicon))
        echo '<link rel="icon" type="image/png" href="'.$favicon.'">';
}

add_action('wp_head','novelty_header',1000);

function novelty_footer(){

    echo '<!--[if lt IE 9]><script src="'.tesla_locate_uri('js/html5.js').'"></script><![endif]-->';

    echo _go('append_to_footer');

}

add_action('wp_footer','novelty_footer',1000);



/*============================== FILTERS ======================================================================================================================*/

function novelty_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    $title .= get_bloginfo( 'name' );
    
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'tesla' ), max( $paged, $page ) );

    return $title;
}

add_filter( 'wp_title', 'novelty_wp_title', 10, 2 );

function novelty_the_title( $title, $id = NULL ) {
    
    if(''===$title)
        $title = _x('Untitled', 'post or page without title', 'novelty');

    return $title;

}

add_filter( 'the_title', 'novelty_the_title', 10, 2 );

function novelty_wp_link_pages_link( $link, $i ) {
    
    return '<li>'.$link.'</li>';

}

add_filter( 'wp_link_pages_link', 'novelty_wp_link_pages_link', 10, 2 );

function novelty_excerpt_length( $length ) {

    $novelty_excerpt_length = _go('excerpt_length');

    return $novelty_excerpt_length ? (int) $novelty_excerpt_length : $length;

}

add_filter('excerpt_length', 'novelty_excerpt_length');



/*============================== WIDGETS ======================================================================================================================*/

require_once locate_template('widgets/widget-banner.php');
require_once locate_template('widgets/widget-recent-posts.php');
require_once locate_template('widgets/widget-social-icons.php');
require_once locate_template('widgets/widget-posts-comments.php');
require_once locate_template('widgets/widget-contact.php');

function novelty_register_widgets() {

    register_widget('Novelty_widget_banner');
    register_widget('Novelty_widget_recent_posts');
    register_widget('Novelty_widget_social_icons');
    register_widget('Novelty_widget_posts_comments');
    register_widget('Novelty_widget_contact');
    
}

add_action('widgets_init', 'novelty_register_widgets');



/*============================== COMMENTS ======================================================================================================================*/

function novelty_comment($comment, $args, $depth){

    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' :
            ?>

            <li>
                <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                    <span class="comment-pingback"><?php _ex('Pingback: ', 'comments', 'novelty'); ?></span>
                    <span class="comment-info"><?php echo novelty_comment_time(); ?> <span><?php echo get_comment_author_link(); ?></span> </span>
                    <?php edit_comment_link(_x('Edit', 'comments', 'novelty')); ?>
                </div>

            <?php
            break;
        default :
            ?>

            <li>
                <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                    <span class="avatar"><?php echo get_avatar($comment, 64); ?></span>
                    <span class="comment-info"><?php echo novelty_comment_time(); ?> <span><?php echo get_comment_author_link(); ?></span> </span>
                    <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation"><?php _ex('Your comment is awaiting moderation.', 'comments', 'novelty'); ?></p>
                    <?php endif; ?>
                    <?php comment_text(); ?>
                    <?php comment_reply_link(array_merge($args, array('reply_text' => _x('Reply', 'comments', 'novelty'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?><?php edit_comment_link(_x('Edit', 'comments', 'novelty')); ?>
                </div>

            <?php
            break;
    endswitch;

}

function novelty_comment_end($comment, $args, $depth){

    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' :
            ?>

            </li>

            <?php
            break;
        default :
            ?>

            </li>

            <?php
            break;
    endswitch;

}



/*============================== FEATURED CONTENT UTILITIES ======================================================================================================================*/

function novelty_has_featured($id = null){

    if(is_null($id))
        $id = get_the_id();

    $featured_image = has_post_thumbnail($id);

    $novelty_metabox_video = novelty_metabox_video_get($id);

    $featured_video = !empty($novelty_metabox_video['video']);

    return $featured_image || $featured_video;
}

function novelty_get_featured($id = null, $echo = false, $size = 'full'){

    if(is_null($id))
        $id = get_the_id();

    $featured_image = has_post_thumbnail($id);

    $novelty_metabox_video = novelty_metabox_video_get($id);

    $featured_video = !empty($novelty_metabox_video['video']);

    switch(true){

        case $featured_video:
            $featured = '<div class="novelty_video_wrapper">'.$novelty_metabox_video['video'].'</div>';
            break;

        case $featured_image:
            $featured = get_the_post_thumbnail($id, $size);
            break;

        default:
            $featured = '';
            break;

    }

    if($echo)
        echo $featured;
    
    return $featured;
}



/*============================== COMMENTS NUMBER ======================================================================================================================*/

function novelty_comments_number( $post_id = 0 ) {

    $zero = false;
    $one = false;
    $more = false;
    $deprecated = '';

    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );

    $number = get_comments_number($post_id);

    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? __('No Comments') : $zero;
    else // must be one
        $output = ( false === $one ) ? __('1 Comment') : $one;

    return apply_filters( 'comments_number', $output, $number );
}



/*============================== QUERY VARS ======================================================================================================================*/

function novelty_get_query($var){
    
    if(isset($_GET[$var]))
        $categories = $_GET[$var];
    else
        $categories = get_query_var($var);

    return $categories;

}



//============================== METABOXES ======================================================================================================================

function novelty_array_filter_recursive_callback(&$value){

    if(is_array($value)){

        $value = array_filter($value,'novelty_array_filter_recursive_callback');

        return (bool)count($value);

    }else{

        return ''!==$value;

    }

}

function novelty_array_filter_recursive($array){

    return array_filter($array,'novelty_array_filter_recursive_callback');

}

function novelty_parse_args_callback(&$value, $key, $options){

    if(isset($options[$key])){

        if(is_array($value)&&isset($options[$key])){

            array_walk($value, 'novelty_parse_args_callback', $options[$key]);

        }else{

            $value = $options[$key];

        }

    }

}

function novelty_parse_args($options, $defaults){

    $options = novelty_array_filter_recursive($options);

    array_walk($defaults, 'novelty_parse_args_callback', $options);

    return $defaults;

}

function novelty_metabox_template_input_select_term($input_name, $taxonomy, $current_category){

    ?>

    <?php $terms = get_terms($taxonomy); ?>
    <select name="<?php echo $input_name; ?>" disabled="disabled">
        <option value="" <?php selected($current_category, ''); ?>> - no category - </option>
        <?php foreach($terms as $t): ?>
        <option value="<?php echo $t->slug; ?>" <?php selected($current_category, $t->slug); ?>><?php echo $t->name; ?> (<?php echo $t->count; ?>)</option>
        <?php endforeach; ?>
    </select>

    <?php

}

function novelty_metabox_template_input_checkbox($input_name, $value){

    ?>

    <input type="hidden" name="<?php echo $input_name; ?>" value="0" /><input type="checkbox" name="<?php echo $input_name; ?>" <?php checked($value); ?> value="1" />

    <?php

}

function novelty_metabox_template_input_disable_section_checkbox($input_name, $value){

    ?>

    <p>
        <label>
            <input type="hidden" name="<?php echo $input_name; ?>" value="0" /><input class="tesla_template_disable_section" type="checkbox" name="<?php echo $input_name; ?>" <?php checked($value); ?> value="1" /> Disable section<br/><em>(disables this section)</em>
        </label>
    </p>

    <?php

}

function novelty_metabox_template_input_image($input_name, $value){

    ?>

    <span class="tesla_template_meta_image">
        <?php if(''!==$value): ?>
        <img src="<?php echo esc_attr($value); ?>" /><button type="button" class="button button-secondary">Remove image</button><input type="hidden" class="widefat" name="<?php echo $input_name; ?>" value="<?php echo esc_attr($value); ?>" disabled="disabled" />
        <?php else: ?>
        <button type="button" class="button button-secondary">Set image</button><input type="hidden" class="widefat" name="<?php echo $input_name; ?>" value="<?php echo esc_attr($value); ?>" disabled="disabled" />
        <?php endif; ?>
    </span>

    <?php

}

function novelty_metabox_template_options_get($post_id){

    $options = (array) get_post_meta($post_id, 'novelty_metabox_template_options', true);

    $defaults = array(

        'blog' => array(
            'blog' => array(
                'sidebar' => true,
                'layout' => 0,
                'columns' => 1,
                'masonry' => false,
                'posts_per_page' => 10,
                'twitter' => 3,
                'twitter_user' => '',
                'twitter_widget' => 0
            )
        )

    );

    return novelty_parse_args($options, $defaults);

}

function novelty_metabox_page_options_get($post_id){

    $options = (array) get_post_meta($post_id, 'novelty_metabox_page_options', true);

    $defaults = array(

        'layout' => 'default',
        'title_description' => '',

    );

    return novelty_parse_args($options, $defaults);

}

function novelty_metabox_video_get($post_id){

    $options = array( 'video' => get_post_meta($post_id, 'novelty_featured_video',true) );

    $defaults = array(

        'video' => ''

    );

    return novelty_parse_args($options, $defaults);

}

function novelty_metabox_template_options($post) {
    wp_nonce_field(-1, 'novelty_metabox_template_options_nonce');
    $novelty_metabox_template_options = novelty_metabox_template_options_get($post->ID);
    ?>
    <div data-template="default" style="display: none;">
        <p>
            Select a template to see the available options.
        </p>
    </div>
    <div data-template="templates_novelty/contact.php" style="display: none;">
        <p>
            Configure the options for this template in Dashboard > Novelty > Contact Info.
        </p>
    </div>
    <div data-template="templates_novelty/blog.php" style="display: none;">
        <p>
            <strong>Contact template options:</strong>
        </p>
        <div class="tesla_template_section">
            <p>
                <label>
                    Posts per page: <input type="text" size="3" name="novelty_metabox_template_options[blog][blog][posts_per_page]" value="<?php echo esc_attr($novelty_metabox_template_options['blog']['blog']['posts_per_page']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <label>
                    Columns: <input type="text" size="3" name="novelty_metabox_template_options[blog][blog][columns]" value="<?php echo esc_attr($novelty_metabox_template_options['blog']['blog']['columns']); ?>" disabled="disabled" /> <em>(valid values: 1, 2, 3, 4, 6 and 12)</em>
                </label>
            </p>
            <p>
                Layout:
            </p>
            <p>
                <label>
                    <input type="radio" name="novelty_metabox_template_options[blog][blog][layout]" <?php checked((int)$novelty_metabox_template_options['blog']['blog']['layout'],0); ?> value="0" /> Image to the left of the text
                </label>
            </p>
            <p>
                <label>
                    <input type="radio" name="novelty_metabox_template_options[blog][blog][layout]" <?php checked((int)$novelty_metabox_template_options['blog']['blog']['layout'],1); ?> value="1" /> Image above the text
                </label>
            </p>
            <p>
                <label>
                    <?php novelty_metabox_template_input_checkbox('novelty_metabox_template_options[blog][blog][sidebar]',$novelty_metabox_template_options['blog']['blog']['sidebar']); ?> Enable sidebar<br/>
                </label>
            </p>
            <p>
                <label>
                    <?php novelty_metabox_template_input_checkbox('novelty_metabox_template_options[blog][blog][masonry]',$novelty_metabox_template_options['blog']['blog']['masonry']); ?> Enable masonry<br/>
                </label>
            </p>
            <p>
                <label>
                    <?php novelty_metabox_template_input_checkbox('novelty_metabox_template_options[blog][blog][twitter_widget]',$novelty_metabox_template_options['blog']['blog']['twitter_widget']); ?> Enable twitter widget<br/>
                </label>
            </p>
            <p>
                <label>
                    Twitter user: <input type="text" size="3" name="novelty_metabox_template_options[blog][blog][twitter_user]" value="<?php echo esc_attr($novelty_metabox_template_options['blog']['blog']['twitter_user']); ?>" disabled="disabled" /> <em>(the user for the twitter widget)</em>
                </label>
            </p>
            <p>
                <label>
                    Nr of tweets: <input type="text" size="3" name="novelty_metabox_template_options[blog][blog][twitter]" value="<?php echo esc_attr($novelty_metabox_template_options['blog']['blog']['twitter']); ?>" disabled="disabled" /> <em>(set to 0 to disable the twitter widget)</em>
                </label>
            </p>
        </div>
    </div>
    <?php
}

function novelty_metabox_template_options_save($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!isset($_POST['novelty_metabox_template_options_nonce']) || !wp_verify_nonce($_POST['novelty_metabox_template_options_nonce']))
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if (wp_is_post_revision($post_id) === false) {

        add_post_meta($post_id, 'novelty_metabox_template_options', $_POST['novelty_metabox_template_options'], true) or
                update_post_meta($post_id, 'novelty_metabox_template_options', $_POST['novelty_metabox_template_options']);
    }
}

function novelty_add_meta_boxes() {

    add_meta_box('novelty_metabox_template_options', 'Template options', 'novelty_metabox_template_options', 'page', 'normal', 'high');

}

add_action('add_meta_boxes', 'novelty_add_meta_boxes');

add_action('save_post', 'novelty_metabox_template_options_save');



/*============================== AJAX ======================================================================================================================*/

function novelty_contact_ajax(){

    $receiver_mail = _go('email_contact');
    if(!empty($receiver_mail))
    {
        $mail_title_prefix = _go('email_prefix');
        if(empty($mail_title_prefix))
            $mail_title_prefix = '';
        if( !empty($_POST['novelty-name']) && !empty($_POST['novelty-email']) && !empty($_POST['novelty-message']) ){
                $subject = $mail_title_prefix._x(' message from ', 'contact form','novelty').$_POST['novelty-name'].' ('.$_POST['novelty-email'].')';
            $reply_to = is_email($_POST['novelty-email']);
            if(false!==$reply_to){
                $reply_to = !empty($_POST['novelty-name']) ? $_POST['novelty-name'] . '<' . $reply_to . '>' : $reply_to;
                $headers = '';
                $headers .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= 'From: ['.get_bloginfo('name').']' . "\r\n";
                $headers .= 'Reply-to: ' . $reply_to . "\r\n";
                if ( wp_mail($receiver_mail, $subject, $_POST['novelty-message'].(!empty($_POST['novelty-category'])?"\n\n".'Category: '.$_POST['novelty-category']:'').(!empty($_POST['novelty-website'])?"\n\n".'Website: '.$_POST['novelty-website']:''), $headers) )
                    $result = _x("Your message was successfully sent.", 'contact form','novelty');
                else
                    $result = _x("Operation could not be completed.", 'contact form','novelty');
            }else{
                $result = _x("You have provided an invalid e-mail address.", 'contact form','novelty');
            }
        }else{
            $result = _x("Please fill in all the required fields.", 'contact form','novelty');
        }
    }else{
        $result = _x('Error! There is no e-mail configured to receive the messages.', 'contact form','novelty');
    }
    echo $result;
    die;

}
add_action( "wp_ajax_novelty_contact", "novelty_contact_ajax" );
add_action( "wp_ajax_nopriv_novelty_contact", "novelty_contact_ajax" );



/*============================== VIDEO ======================================================================================================================*/

function novelty_embed_oembed_html($html) {

    return '<div class="novelty_video_wrapper">'.$html.'</div>';
    
}

add_filter( 'embed_oembed_html', 'novelty_embed_oembed_html');



/*============================== EXCERPT & CONTENT ======================================================================================================================*/

function novelty_excerpt($q = null, $length = null, $more_text = null, $more_link = null){

    $q = get_post($q);

    if(''!==$q->post_excerpt){

        $text = $q->post_excerpt;

    }else{

        $text = novelty_content($q, '');

        $text = strip_shortcodes($text);

        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]&gt;', $text);

        $excerpt_length = $length ? $length : apply_filters('excerpt_length', 55);

        $more_text = $more_text ? $more_text : '[&hellip;]';
        if(true===$more_link)
            $more_link = get_permalink($q->ID);
        if($more_link)
            $more_text = '<a href="'.$more_link.'">'.$more_text.'</a>';
        $excerpt_more = apply_filters('excerpt_more', ' ' . $more_text);

        $text = wp_trim_words($text, $excerpt_length, $excerpt_more);

    }

    $text = apply_filters('wp_trim_excerpt', $text, $q->post_excerpt);

    $text = apply_filters('the_excerpt', $text);

    return $text;

}

function novelty_content($q = null, $more_link_text = null, $strip_teaser = false) {
    global $page, $more, $preview, $pages, $multipage;

    $post = get_post($q);

    if ( null === $more_link_text )
        $more_link_text = __( '(more&hellip;)' );

    $output = '';
    $has_teaser = false;

    if ( post_password_required( $post ) )
        return get_the_password_form( $post );

    if ( $page > count( $pages ) )
        $page = count( $pages );

    $content = $pages[$page - 1];
    if ( preg_match( '/<!--more(.*?)?-->/', $content, $matches ) ) {
        $content = explode( $matches[0], $content, 2 );
        if ( ! empty( $matches[1] ) && ! empty( $more_link_text ) )
            $more_link_text = strip_tags( wp_kses_no_null( trim( $matches[1] ) ) );

        $has_teaser = true;
    } else {
        $content = array( $content );
    }

    if ( false !== strpos( $post->post_content, '<!--noteaser-->' ) && ( ! $multipage || $page == 1 ) )
        $strip_teaser = true;

    $teaser = $content[0];

    if ( $more && $strip_teaser && $has_teaser )
        $teaser = '';

    $output .= $teaser;

    if ( count( $content ) > 1 ) {
        if ( $more ) {
            $output .= '<span id="more-' . $post->ID . '"></span>' . $content[1];
        } else {
            if ( ! empty( $more_link_text ) )
                $output .= apply_filters( 'the_content_more_link', ' <a href="' . get_permalink() . "#more-{$post->ID}\" class=\"more-link\">$more_link_text</a>", $more_link_text );
            $output = force_balance_tags( $output );
        }
    }

    if ( $preview )
        $output =   preg_replace_callback( '/\%u([0-9A-F]{4})/', '_convert_urlencoded_to_entities', $output );

    return $output;
}



/*============================== DATE & TIME ======================================================================================================================*/

function novelty_time($time){

    $output = sprintf(__('%1$s at %2$s'), mysql2date(get_option('date_format'), $time), mysql2date(get_option('time_format'), $time));

    return $output;

}

function novelty_post_time($q = null){

    if(is_null($q)){

        global $post;

        $q = $post;

    }else{

        if(!is_object($q)){

            $q = get_post($q);

        }

    }

    $time = $q->post_date;

    return novelty_time($time);

}

function novelty_comment_time($q = null){

    if(is_null($q)){

        global $comment;

        $q = $comment;

    }else{

        if(!is_object($q)){

            $q = get_comment($q);

        }

    }

    $time = $q->comment_date;

    return novelty_time($time);

}



/*============================== CATEGORY OPTIONS ======================================================================================================================*/

function tt_taxonomy_add_fields() {
    ?>
    <br/>
    <h3><?php _ex( 'Archive options', 'category options', 'novelty' ); ?></h3>
    <p class="description"><?php _ex( 'These options are applied to the archive page for current category.', 'category options', 'novelty' ); ?></p>
    <div class="form-field">
        <input type="hidden" name="tt_tax_input[sidebar]" value="0" />
        <label>
            <input type="checkbox" style="width:auto;" name="tt_tax_input[sidebar]" value="1" />
            <?php _ex( 'Enable sidebar', 'category options', 'novelty' ); ?>
        </label>
        <p class="description"><?php _ex( 'Check to enable the blog sidebar.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <label><?php _ex( 'Layout', 'category options', 'novelty' ); ?></label>
        <label>
            <input type="radio" style="width:auto;" name="tt_tax_input[layout]" value="0" checked="checked" />
            <?php _ex( 'Image to the left of the text.', 'category options', 'novelty' ); ?>
        </label>
        <label>
            <input type="radio" style="width:auto;" name="tt_tax_input[layout]" value="1" />
            <?php _ex( 'Image above the text.', 'category options', 'novelty' ); ?>
        </label>
        <p class="description"><?php _ex( 'Select the layout.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <label>
            <?php _ex( 'Nr of columns', 'category options', 'novelty' ); ?>
            <br/>
            <input type="text" style="width:auto;" size="3" name="tt_tax_input[columns]" value="" />
        </label>
        <p class="description"><?php _ex( 'Valid values: 1, 2, 3, 4, 6 and 12. (default is 1)', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <label>
            <?php _ex( 'Excerpt length', 'category options', 'novelty' ); ?>
            <br/>
            <input type="text" style="width:auto;" size="3" name="tt_tax_input[excerpt_length]" value="" />
        </label>
        <p class="description"><?php _ex( 'Set the excerpt length.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <input type="hidden" name="tt_tax_input[masonry]" value="0" />
        <label>
            <input type="checkbox" style="width:auto;" name="tt_tax_input[masonry]" value="1" />
            <?php _ex( 'Enable masonry', 'category options', 'novelty' ); ?>
        </label>
        <p class="description"><?php _ex( 'Check to enable the masonry layout.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <input type="hidden" name="tt_tax_input[twitter_widget]" value="0" />
        <label>
            <input type="checkbox" style="width:auto;" name="tt_tax_input[twitter_widget]" value="1" />
            <?php _ex( 'Enable twitter widget', 'category options', 'novelty' ); ?>
        </label>
        <p class="description"><?php _ex( 'Check to enable the twitter widget.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <label>
            <?php _ex( 'Twitter user', 'category options', 'novelty' ); ?>
            <br/>
            <input type="text" style="width:auto;" name="tt_tax_input[twitter_user]" value="" />
        </label>
        <p class="description"><?php _ex( 'Set the user for the twitter widget.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <label>
            <?php _ex( 'Nr of tweets', 'category options', 'novelty' ); ?>
            <br/>
            <input type="text" style="width:auto;" size="3" name="tt_tax_input[twitter_nr]" value="" />
        </label>
        <p class="description"><?php _ex( 'Set to 0 to disable the twitter widget.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <input type="hidden" name="tt_tax_input[news_ticker_widget]" value="0" />
        <label>
            <input type="checkbox" style="width:auto;" name="tt_tax_input[news_ticker_widget]" value="1" />
            <?php _ex( 'Enable news ticker widget', 'category options', 'novelty' ); ?>
        </label>
        <p class="description"><?php _ex( 'Check to enable the news ticker widget.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <label>
            <?php _ex( 'News ticker title', 'category options', 'novelty' ); ?>
            <br/>
            <input type="text" style="width:auto;" name="tt_tax_input[news_ticker_title]" value="" />
        </label>
        <p class="description"><?php _ex( 'Set the title for the news ticker widget.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <label>
            <?php _ex( 'News ticker category', 'category options', 'novelty' ); ?>
            <br/>
            <input type="text" style="width:auto;" name="tt_tax_input[news_ticker_category]" value="" />
        </label>
        <p class="description"><?php _ex( 'Set the category for the posts in the news ticker widget.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <label>
            <?php _ex( 'News ticker limit', 'category options', 'novelty' ); ?>
            <br/>
            <input type="text" style="width:auto;" size="3" name="tt_tax_input[news_ticker_nr]" value="" />
        </label>
        <p class="description"><?php _ex( 'Set the nr of posts to show in the news ticker widget.', 'category options', 'novelty' ); ?></p>
    </div>
    <div class="form-field">
        <label>
            <?php _ex( 'Image size', 'category options', 'novelty' ); ?>
            <br/>
            <input type="text" style="width:auto;" name="tt_tax_input[image_size]" value="" />
        </label>
        <p class="description"><?php _ex( 'Set the desired image size in "width,height" format. For ex: 300,200.', 'category options', 'novelty' ); ?></p>
    </div>
    <?php
}

add_action( 'category_add_form_fields', 'tt_taxonomy_add_fields', 10, 2 );

function tt_taxonomy_edit_fields($term) {
 
    $term_id = $term->term_id;
    $term_meta = tt_taxonomy_get_option($term_id);

    ?>
    <tr>
        <th>
            <br/>
            <h3><?php _ex( 'Archive options', 'category options', 'novelty' ); ?></h3>
        </th>
        <td>
            <br/>
            <p class="description"><?php _ex( 'These options are applied to the archive page for current category.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'Sidebar', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <input type="hidden" name="tt_tax_input[sidebar]" value="0" />
            <label>
                <input type="checkbox" style="width:auto;" name="tt_tax_input[sidebar]" value="1" <?php checked($term_meta['sidebar'], 1); ?> />
                <?php _ex( 'Enable sidebar', 'category options', 'novelty' ); ?>
            </label>
            <p class="description"><?php _ex( 'Check to enable the blog sidebar.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'Layout', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <label>
                <input type="radio" style="width:auto;" name="tt_tax_input[layout]" value="0" <?php checked($term_meta['layout'], 0); ?> />
                <?php _ex( 'Image to the left of the text.', 'category options', 'novelty' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" style="width:auto;" name="tt_tax_input[layout]" value="1" <?php checked($term_meta['layout'], 1); ?> />
                <?php _ex( 'Image above the text.', 'category options', 'novelty' ); ?>
            </label>
            <p class="description"><?php _ex( 'Select the layout.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'Columns', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <label>
                <?php _ex( 'Nr of columns', 'category options', 'novelty' ); ?>
                <br/>
                <input type="text" style="width:auto;" size="3" name="tt_tax_input[columns]" value="<?php echo esc_attr($term_meta['columns']); ?>" />
            </label>
            <p class="description"><?php _ex( 'Valid values: 1, 2, 3, 4, 6 and 12. (default is 1)', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'Excerpt', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <label>
                <?php _ex( 'Excerpt length', 'category options', 'novelty' ); ?>
                <br/>
                <input type="text" style="width:auto;" size="3" name="tt_tax_input[excerpt_length]" value="<?php echo esc_attr($term_meta['excerpt_length']); ?>" />
            </label>
            <p class="description"><?php _ex( 'Set the excerpt length.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'Masonry', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <input type="hidden" name="tt_tax_input[masonry]" value="0" />
            <label>
                <input type="checkbox" style="width:auto;" name="tt_tax_input[masonry]" value="1" <?php checked($term_meta['masonry'], 1); ?> />
                <?php _ex( 'Enable masonry', 'category options', 'novelty' ); ?>
            </label>
            <p class="description"><?php _ex( 'Check to enable the masonry layout.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'Twitter widget', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <input type="hidden" name="tt_tax_input[twitter_widget]" value="0" />
            <label>
                <input type="checkbox" style="width:auto;" name="tt_tax_input[twitter_widget]" value="1" <?php checked($term_meta['twitter_widget'], 1); ?> />
                <?php _ex( 'Enable twitter widget', 'category options', 'novelty' ); ?>
            </label>
            <p class="description"><?php _ex( 'Check to enable the twitter widget.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'Twitter user', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <label>
                <?php _ex( 'Twitter user', 'category options', 'novelty' ); ?>
                <br/>
                <input type="text" style="width:auto;" name="tt_tax_input[twitter_user]" value="<?php echo esc_attr($term_meta['twitter_user']); ?>" />
            </label>
            <p class="description"><?php _ex( 'Set the user for the twitter widget.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'Tweets', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <label>
                <?php _ex( 'Nr of tweets', 'category options', 'novelty' ); ?>
                <br/>
                <input type="text" style="width:auto;" size="3" name="tt_tax_input[twitter_nr]" value="<?php echo esc_attr($term_meta['twitter_nr']); ?>" />
            </label>
            <p class="description"><?php _ex( 'Set the nr of tweets to show.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'News ticker widget', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <input type="hidden" name="tt_tax_input[news_ticker_widget]" value="0" />
            <label>
                <input type="checkbox" style="width:auto;" name="tt_tax_input[news_ticker_widget]" value="1" <?php checked($term_meta['news_ticker_widget'], 1); ?> />
                <?php _ex( 'Enable news ticker widget', 'category options', 'novelty' ); ?>
            </label>
            <p class="description"><?php _ex( 'Check to enable the news ticker widget.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'News ticker title', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <label>
                <?php _ex( 'News ticker title', 'category options', 'novelty' ); ?>
                <br/>
                <input type="text" style="width:auto;" name="tt_tax_input[news_ticker_title]" value="<?php echo esc_attr($term_meta['news_ticker_title']); ?>" />
            </label>
            <p class="description"><?php _ex( 'Set the title for the news ticker widget.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'News ticker category', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <label>
                <?php _ex( 'News ticker category', 'category options', 'novelty' ); ?>
                <br/>
                <input type="text" style="width:auto;" name="tt_tax_input[news_ticker_category]" value="<?php echo esc_attr($term_meta['news_ticker_category']); ?>" />
            </label>
            <p class="description"><?php _ex( 'Set the category for the posts in the news ticker widget.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'News ticker limit', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <label>
                <?php _ex( 'News ticker limit', 'category options', 'novelty' ); ?>
                <br/>
                <input type="text" style="width:auto;" size="3" name="tt_tax_input[news_ticker_nr]" value="<?php echo esc_attr($term_meta['news_ticker_nr']); ?>" />
            </label>
            <p class="description"><?php _ex( 'Set the nr of posts to show in the news ticker widget.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php _ex( 'Image size', 'portfolio category order', 'novelty' ); ?></label></th>
        <td>
            <label>
                <?php _ex( 'Image size', 'category options', 'novelty' ); ?>
                <br/>
                <input type="text" style="width:auto;" name="tt_tax_input[image_size]" value="<?php echo esc_attr($term_meta['image_size']); ?>" />
            </label>
            <p class="description"><?php _ex( 'Set the desired image size in "width,height" format. For ex: 300,200.', 'category options', 'novelty' ); ?></p>
        </td>
    </tr>
    <?php
}

add_action( 'category_edit_form_fields', 'tt_taxonomy_edit_fields', 10, 2 );

function tt_taxonomy_save_fields( $term_id ) {
    if ( isset( $_POST['tt_tax_input'] ) ) {
        $term_meta = $_POST['tt_tax_input'];
        tt_taxonomy_save_option($term_id, $term_meta);
    }
}

add_action( 'edited_category', 'tt_taxonomy_save_fields', 10, 2 );
add_action( 'create_category', 'tt_taxonomy_save_fields', 10, 2 );

function tt_taxonomy_default_option(){

    return array(
        'sidebar' => 0,
        'layout' => 0,
        'columns' => 1,
        'masonry' => 0,
        'excerpt_length' => apply_filters('excerpt_length', 55),
        'twitter_nr' => 3,
        'twitter_user' => '',
        'twitter_widget' => 0,
        'news_ticker_widget' => 0,
        'news_ticker_category' => '',
        'news_ticker_nr' => 5,
        'news_ticker_title' => 'hot news',
        'image_size' => ''
    );

}

function tt_taxonomy_filter_option($term_meta){

    $term_meta_defaults = tt_taxonomy_default_option();

    $term_meta_result = array();

    foreach(array_keys($term_meta_defaults) as $value)
        if(isset($term_meta[$value]) && ''!==$term_meta[$value])
            $term_meta_result[$value] = $term_meta[$value];
        else
            $term_meta_result[$value] = $term_meta_defaults[$value];

    return $term_meta_result;

}

function tt_taxonomy_get_option($term_id){

    $term_meta_array = get_option('novelty_category_options', array());

    $term_meta = array_key_exists($term_id, $term_meta_array) ? tt_taxonomy_filter_option((array) $term_meta_array[$term_id]) : tt_taxonomy_default_option();

    return $term_meta;

}

function tt_taxonomy_save_option($term_id, $term_meta){

    $term_meta_array = get_option('novelty_category_options', array());

    $term_meta_array[$term_id] = tt_taxonomy_filter_option((array)$term_meta);

    update_option('novelty_category_options', $term_meta_array);

}

function tt_taxonomy_quick_edit_html(){

    return '

    <br/>
    <h4>Archive options</h4>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">Sidebar</span>
                <span class="input-text-wrap">
                    <input type="hidden" name="tt_tax_input[sidebar]" value="0" />
                    <label>
                        <input type="checkbox" style="width:auto;" name="tt_tax_input[sidebar]" value="1" />
                        '._x( 'Enable sidebar', 'category options', 'novelty' ).'
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">Layout</span>
                <span class="input-text-wrap">
                    <label>
                        <input type="radio" style="width:auto;" name="tt_tax_input[layout]" value="0" />
                        '._x( 'Image to the left of the text.', 'category options', 'novelty' ).'
                    </label>
                    <label>
                        <input type="radio" style="width:auto;" name="tt_tax_input[layout]" value="1" />
                        '._x( 'Image above the text.', 'category options', 'novelty' ).'
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">Columns</span>
                <span class="input-text-wrap">
                    <label>
                        <input type="text" style="width:auto;" size="3" name="tt_tax_input[columns]" value="" />
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">Excerpt</span>
                <span class="input-text-wrap">
                    <label>
                        <input type="text" style="width:auto;" size="3" name="tt_tax_input[excerpt_length]" value="" />
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">Masonry</span>
                <span class="input-text-wrap">
                    <input type="hidden" name="tt_tax_input[masonry]" value="0" />
                    <label>
                        <input type="checkbox" style="width:auto;" name="tt_tax_input[masonry]" value="1" />
                        '._x( 'Enable masonry', 'category options', 'novelty' ).'
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">Twitter widget</span>
                <span class="input-text-wrap">
                    <input type="hidden" name="tt_tax_input[twitter_widget]" value="0" />
                    <label>
                        <input type="checkbox" style="width:auto;" name="tt_tax_input[twitter_widget]" value="1" />
                        '._x( 'Enable twitter widget', 'category options', 'novelty' ).'
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">Twitter user</span>
                <span class="input-text-wrap">
                    <label>
                        <input type="text" style="width:auto;" name="tt_tax_input[twitter_user]" value="" />
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">Tweets</span>
                <span class="input-text-wrap">
                    <label>
                        <input type="text" style="width:auto;" size="3" name="tt_tax_input[twitter_nr]" value="" />
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">News ticker widget</span>
                <span class="input-text-wrap">
                    <input type="hidden" name="tt_tax_input[news_ticker_widget]" value="0" />
                    <label>
                        <input type="checkbox" style="width:auto;" name="tt_tax_input[news_ticker_widget]" value="1" />
                        '._x( 'Enable news ticker widget', 'category options', 'novelty' ).'
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">News ticker title</span>
                <span class="input-text-wrap">
                    <label>
                        <input type="text" style="width:auto;" name="tt_tax_input[news_ticker_title]" value="" />
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">News ticker category</span>
                <span class="input-text-wrap">
                    <label>
                        <input type="text" style="width:auto;" name="tt_tax_input[news_ticker_category]" value="" />
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">New ticker limit</span>
                <span class="input-text-wrap">
                    <label>
                        <input type="text" style="width:auto;" size="3" name="tt_tax_input[news_ticker_nr]" value="" />
                    </label>
                </span>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <div class="inline-edit-col">
            <label>
                <span class="title">Image size</span>
                <span class="input-text-wrap">
                    <label>
                        <input type="text" style="width:auto;" name="tt_tax_input[image_size]" value="" />
                    </label>
                </span>
            </label>
        </div>
    </fieldset>

    ';

}

function tt_taxonomy_quickedit_data($actions, $tag) {

    $actions['novelty_category_options'] = '<span data-option="'.htmlspecialchars(json_encode(tt_taxonomy_get_option($tag->term_id))).'"></span>';

    return $actions;

}

add_filter('category_row_actions', 'tt_taxonomy_quickedit_data', 10, 2);

function tt_taxonomy_columns_scripts($hook_suffix) {
    if ('edit-tags.php' === $hook_suffix && isset($_GET['taxonomy']) && 'category' === $_GET['taxonomy'] && !isset($_GET['action'])){
        wp_enqueue_script('tt-tax-quickedit', get_template_directory_uri() . '/admin/quickedit.js',array('inline-edit-tax'),null,true);
        wp_localize_script('tt-tax-quickedit', 'novelty_category_options', array('html'=>tt_taxonomy_quick_edit_html()));
    }
}

if(is_admin())
    add_action('admin_enqueue_scripts', 'tt_taxonomy_columns_scripts');



/*============================== SHORTCODES ======================================================================================================================*/

function novelty_image_size($image_size){

    $image_size_defaults = array('thumbnail','medium','large','full');

    $image_size = strtolower($image_size);

    if(!in_array($image_size, $image_size_defaults)&&''!==$image_size){
        $image_size_array = explode(',', $image_size);
        if(2===count($image_size_array)){
            $image_size = array((int)$image_size_array[0],(int)$image_size_array[1],'context'=>'tesla');
        }
    }

    return $image_size;

}

function novelty_main_slider( $atts, $content = null ){

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
                        <span>'.sprintf('%02d',$i+1).'</span>
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

add_shortcode('novelty_main_slider', 'novelty_main_slider');

 if (!function_exists('novelty_front_posts')){

function novelty_front_posts( $atts, $content = null ){

    extract(shortcode_atts(array(
        'nr' => 3,
        'columns' => 3,
        'columns_tablet' => 2,
        'columns_phone' => 1,
        'category' => '',
        'layout_switcher' => false,
        'excerpt_length' => '',
        'image_size' => 'full',
        'image_size_2nd' => 'full'
    ), $atts));

    $image_size = novelty_image_size($image_size);

    $image_size_2nd = novelty_image_size($image_size_2nd);

    $excerpt_length = ''===$excerpt_length ? null : (int) $excerpt_length;

    $layout_switcher = 'false'===strtolower($layout_switcher) ? false : (bool) $layout_switcher;

    $output = '';

    $categories = explode(',', $category);

    foreach ($categories as $key => $value) $categories[$key] = trim($value);

    $categories = array_filter($categories);

    $size = round(12/$columns);

    $size_tablet = round(12/$columns_tablet);

    $size_phone = round(12/$columns_phone);

    if($layout_switcher){

        $output .= 
        '
        <div class="front-posts">
        <div class="center-it">
            <ul class="display-metod">
                <li>'._x('view', '[novelty_front_posts]', 'novelty').'</li>
                <li class="view-1"><a href="#"></a></li>
                <li class="view-2"><a href="#"></a></li>
            </ul>
        </div>
        ';

    }

    foreach ($categories as $i => $c_slug) {
        
        $c = get_category_by_slug($c_slug);

        if($layout_switcher){

            $output .= 
            '
            <div class="front-posts-layout-0">
            ';

        }

        $output .= 
        '
        <div class="font-posts-container" data-tesla-plugin="carousel'.($layout_switcher?'-pre':'').'" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-rotate="false" data-tesla-autoplay="false" data-tesla-hide-effect="false">
        <div class="site-title">
            <a href="'.get_category_link($c->term_id).'">'.$c->name.'</a>
            <span class="next" style="float:right;margin-left:10px;"></span>
            <span class="prev" style="float:right;margin-left:10px;"></span>
        </div>
        ';

        $output .= 
        '
        <div class="row tesla-carousel-items">
        ';

        $args = array(
            'numberposts' => $nr,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in' => get_option( 'sticky_posts' ),
            'category_name' => $c_slug,
            'suppress_filters' => false
        );

        $query = get_posts($args);

        foreach($query as $j => $q){

            setup_postdata($q);

            $output .= 
            '
                <div class="col-md-'.$size.' col-xs-'.$size_phone.' col-sm-'.$size_tablet.'">
                    <div class="home-post">
            ';

            if(novelty_has_featured($q->ID)){

                $output .= 
                '
                        <div class="home-post-cover">
                            <a href="'.get_permalink($q->ID).'">'.novelty_get_featured($q->ID,false,$image_size).'</a>
                        </div>
                ';

            }

            $output .= 
            '
                        <h2 class="home-post-title">
                            <a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a>
                        </h2>
                        <div class="home-post-details">
                            <span>'._x('Posted:', 'blog', 'novelty').'</span> '.novelty_post_time($q).'
            ';

            if(has_category('',$q->ID)){

                 $output .= ' &nbsp; / &nbsp; '.get_the_category_list(', ', '', $q->ID);

            }

            $output .= 
            '
                        </div>
                        '.novelty_excerpt($q,$excerpt_length).'
                        <div class="home-post-more">
                        <a href="'.get_permalink($q->ID).'" class="comment-more">'.novelty_comments_number($q->ID).'</a>
                            <a class="click-more" href="'.get_permalink($q->ID).'">'._x('read more', 'blog', 'novelty').'</a>
                        </div>
                    </div>
                </div>
            ';

        }

        wp_reset_postdata();

        $output .= 
        '
        </div>
        </div>
        ';

        if($layout_switcher){

            $output .= 
            '
            </div>
            <div class="front-posts-layout-1">
            ';

            $output .= 
            '
            <div class="font-posts-container" data-tesla-plugin="carousel'.($layout_switcher?'-pre':'').'" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-rotate="false" data-tesla-autoplay="false" data-tesla-hide-effect="false">
                <div class="site-title">
                    <a href="'.get_category_link($c->term_id).'">'.$c->name.'</a>
                    <span class="next" style="float:right;margin-left:10px;"></span>
                    <span class="prev" style="float:right;margin-left:10px;"></span>
                </div>
                <div class="row tesla-carousel-items">
            ';

            foreach($query as $j => $q){

                setup_postdata($q);

                $output .= 
                '
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="home-post">
                                <div class="row">
                ';

                if(novelty_has_featured($q->ID))
                    $output .= 
                    '
                                    <div class="col-md-6">
                                        <div class="home-post-cover">
                                            <a href="'.get_permalink($q->ID).'">'.novelty_get_featured($q->ID,false,$image_size_2nd).'</a>
                                        </div>
                                    </div>
                    ';

                $output .= 
                '
                                    <div class="col-md-'.(novelty_has_featured($q->ID)?6:12).'">
                                        <h2 class="home-post-title">
                                            <a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a>
                                        </h2>
                                        <div class="home-post-details">
                                            <span>'._x('Posted:', 'blog', 'novelty').'</span> '.novelty_post_time($q);

                if(has_category(array(),$q->ID)){

                    $output .= ' &nbsp; / &nbsp; '.get_the_category_list(', ', '', $q->ID);

                }

                $output .= 
                '
                                        </div>
                                        '.novelty_excerpt($q,$excerpt_length).'
                                        <div class="home-post-more">
                                        <a href="'.get_permalink($q->ID).'" class="comment-more">'.novelty_comments_number($q->ID).'</a>
                                            <a class="click-more" href="'.get_permalink($q->ID).'">'._x('read more', 'blog', 'novelty').'</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                ';

            }

            wp_reset_postdata();

            $output .= 
            '
                </div>
            </div>
            ';

            $output .= 
            '
            </div>
            ';

        }

    }

    if($layout_switcher){

        $output .= 
        '
        </div>
        ';

    }

    return $output;

}

add_shortcode('novelty_front_posts', 'novelty_front_posts');

}

function novelty_featured_posts( $atts, $content = null ){

    extract(shortcode_atts(array(
        'nr' => 3,
        'category' => '',
        'enable_links' => true,
        'link_target' => '',
        'title' => _x('Featured posts', '[novelty_featured_posts] - default title', 'novelty'),
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
    <div class="featured-posts" data-tesla-plugin="slider" data-tesla-container=">.featured-posts-cover" data-tesla-item=">div">
        <div class="featured-posts-title">'.$title.'</div>
        <div class="featured-posts-cover" style="position:relative;">
    ';

    foreach ($query as $i => $q) {

        $output .= '<div style="'.($i?'position:absolute;top:0px;left:0px;right:0px;z-index:0;display:none;':'position:relative;z-index:1;').'">';

        if($enable_links)
            $output .= '<a href="'.get_permalink($q->ID).'" target="'.$link_target.'">';

        $output .= novelty_get_featured($q->ID,false,$image_size);

        if($enable_links)
            $output .= '</a>';

        $output .= '</div>';

    }
    
    $output .= 
    '
        </div>
        <ul data-tesla-plugin="bullets" data-tesla-hover="true">
    ';

    foreach ($query as $i => $q) {

        $output .= '<li><a href="'.get_permalink($q->ID).'" target="'.$link_target.'">'.get_the_title($q->ID).'</a></li>';

    }
    
    $output .= 
    '
        </ul>
    </div>
    ';

    return $output;

}

add_shortcode('novelty_featured_posts', 'novelty_featured_posts');

function novelty_posts_comments( $atts, $content = null ){

    extract(shortcode_atts(array(
        'posts_nr' => 3,
        'comments_nr' => 3,
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
        <ul class="tab_nav">
            <li class="active"><a href="#novelty-posts-'.$novelty_posts_comments_id.'" data-toggle="tab">'.__('Latest Posts', 'novelty').'</a></li>
            <li><a href="#novelty-popular-'.$novelty_posts_comments_id.'" data-toggle="tab">'.__('Latest Comments', 'novelty').'</a></li>
        </ul>
        <div class="clear"></div>
        <div class="tab-content">
            <div class="tab-pane tab-posts active" id="novelty-posts-'.$novelty_posts_comments_id.'">
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
            '<div class="tab-one'.(has_post_thumbnail($q->ID)?'':' no-image').'">';

            if(has_post_thumbnail($q->ID))
                $output .= 
                '<div class="tab-cover">
                    <a href="'.get_permalink($q->ID).'">
                        '.get_the_post_thumbnail($q->ID,$image_size).'
                    </a>
                </div>';

            $output .= 
                '<div>
                    <h4>
                        <a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a>
                    </h4>
                    <div class="tab-date">
                        <span>'._x('Posted :', 'tabs widget', 'novelty').'</span> '.novelty_post_time($q).'
                    </div>
                </div>';

            $output .= 
            '</div>';

        }

    }else{

        $output .= '<p>'.__('No posts.','novelty').'</p>';

    }
    
    $output .= 
    '
            </div>
            <div class="tab-pane tab-comments" id="novelty-popular-'.$novelty_posts_comments_id.'">
    ';

    $args = array(
        'number' => $comments_nr,
        'status' => 'approve',
        'post_status' => 'publish'
    );

    $query = get_comments($args);

    $count = count($query);

    if($count){

        $output .= '<ul>';

        foreach ($query as $i => $q) {

            $output .=  '<li>';
            $output .=  '<p>'.sprintf(_x('%1$s on %2$s', 'latest posts & comments widget', 'novelty'), get_comment_author_link($q->comment_ID), '<a href="'.esc_url(get_comment_link($q->comment_ID)).'">'.get_the_title($q->comment_post_ID).'</a>').'</p>';
            $output .=  '<span>'.novelty_comment_time($q).'</span>';
            $output .=  '</li>';

        }

        $output .= '</ul>';

    }else{

        $output .= '<p>'.__('No comments.','novelty').'</p>';

    }
    
    $output .= 
    '
            </div>
        </div>
    </div>
    ';

    return $output;

}

add_shortcode('novelty_posts_comments', 'novelty_posts_comments');

function novelty_twitter( $atts, $content = null ){

    extract(shortcode_atts(array(
        'nr' => 3,
        'user' => '',
        'title' => _x('latest tweets', '[novelty_twitter] - default title', 'novelty'),
        'min_height' => ''
    ), $atts));

    $output = '';

    $output .= '<div class="twitter_widget">';

    if(''!==$title)
        $output .= '<h4 class="twitter-title site-text-color">'.$title.'</h4>';

    $output .= twitter_generate_output($user, $nr, '', 'novelty_twitter_output','<ul class="twitter" style="position:relative;'.(''!==$min_height?'min-height:'.$min_height.'px;':'').'" data-tesla-plugin="slider" data-tesla-item=">li">','</ul>');

    $output .= '</div>';

    return $output;

}

function novelty_twitter_output($i, $text, $date){

    return '<li style="'.($i?'position:absolute;top:0px;left:0px;right:0px;z-index:0;display:none;':'position:relative;z-index:1;').'">'.$text.'<span>'.$date.'</span></li>';

}

add_shortcode('novelty_twitter', 'novelty_twitter');

function novelty_breadcrumb( $atts, $content = null ){

    extract(shortcode_atts(array(
        'title' => '',
        'subtitle' => ''
    ), $atts));

    $output = '';

    $output .= '<div class="breadcramps">';

    if(''!==$title)
        $output .= '<h1>'.$title.'</h1>';

    if(''!==$subtitle)
        $output .= '<h4>'.$subtitle.'</h4>';

    $output .= do_shortcode($content);

    $output .= '</div>';

    return $output;

}

add_shortcode('novelty_breadcrumb', 'novelty_breadcrumb');

function novelty_news_ticker( $atts, $content = null ){

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

add_shortcode('novelty_news_ticker', 'novelty_news_ticker');

function novelty_column_first( $atts, $content = null ){
    extract(shortcode_atts(array(
            'size' => 4,
            'offset' => 0,
            'style' => '',
        ), $atts));
    $size = (int)$size;
    return '<div class="row"><div class="col-md-'.$size.($offset?' offset'.$offset:'').'" style="'.$style.'">'.do_shortcode($content).'</div>';
}
function novelty_column( $atts, $content = null ){
    extract(shortcode_atts(array(
            'size' => 4,
            'offset' => 0,
            'style' => '',
        ), $atts));
    $size = (int)$size;
    return '<div class="col-md-'.$size.($offset?' offset'.$offset:'').'" style="'.$style.'">'.do_shortcode($content).'</div>';
}
function novelty_column_last( $atts, $content = null ){
    extract(shortcode_atts(array(
            'size' => 4,
            'offset' => 0,
            'style' => '',
        ), $atts));
    $size = (int)$size;
    return '<div class="col-md-'.$size.($offset?' offset'.$offset:'').'" style="'.$style.'">'.do_shortcode($content).'</div></div>';

    ?>

    <div class="abc" <?php echo "<div class='123'>"; ?>></div>

    <?php


}
add_shortcode( 'novelty_column_first', 'novelty_column_first' );
add_shortcode( 'novelty_column', 'novelty_column' );
add_shortcode( 'novelty_column_last', 'novelty_column_last' );

include(WP_CONTENT_DIR . '/widget-nextrace.php');
add_shortcode( 'next_race', 'next_race' );


/*============================== IMAGE RESIZING ======================================================================================================================*/

function tesla_media_downsize($out, $id, $size) {

    if(is_array($size)){

        if(!isset($size['context'])||'tesla'!==$size['context']||!is_int($size[0])||(isset($size[1])&&!is_int($size[1])))
            return false;

        $size_name = 'tesla-'.$size[0].'x'.$size[1];

        $imagedata = wp_get_attachment_metadata($id);

        if (!is_array($imagedata) || !isset($imagedata['sizes']))
            return false;

        if (isset($imagedata['sizes'][$size_name])){
            $resized = $imagedata['sizes'][$size_name];
        }else{
            if (!$resized = image_make_intermediate_size(
                get_attached_file($id),
                $size[0],
                $size[1],
                true
            ))
                return false;

            $imagedata['sizes'][$size_name] = $resized;
            wp_update_attachment_metadata($id, $imagedata);
        }

        $att_url = wp_get_attachment_url($id);
        return array(dirname($att_url) . '/' . $resized['file'], $resized['width'], $resized['height'], true);

    }else
        return false;

}

add_filter('image_downsize', 'tesla_media_downsize', 10, 3);

function tesla_delete_attachment($id) {

    $imagedata = wp_get_attachment_metadata($id);

    if (is_array($imagedata) && isset($imagedata['sizes'])){

        $defaults = array('thumbnail','medium','large');
        $att_url = get_attached_file($id);
        $path = dirname($att_url) . '/';

        foreach($imagedata['sizes'] as $key => $value){

            if(!in_array($key, $defaults)){

                @ unlink($path . $value['file']);

            }

        }

    }

}

add_action('delete_attachment', 'tesla_delete_attachment', 10, 1);



/*============================== DELETE INTERMEDIATE IMAGES ======================================================================================================================*/

function tesla_diim(){

    $args = array(
        'post_type' => 'attachment',
        'posts_per_page' => -1,
        'post_status' => 'any',
        'post_parent' => null,
        'post_mime_type' => 'image',
    );
    $attachments = get_posts($args);
    $defaults = array('thumbnail','medium','large');
    if ($attachments) {
        foreach ($attachments as $post) {
            $att_url = get_attached_file($post->ID);
            $path = dirname($att_url) . '/';
            $imagedata = wp_get_attachment_metadata($post->ID);
            if(is_array($imagedata)&&isset($imagedata['sizes'])){
                foreach($imagedata['sizes'] as $key => $value){
                    if(!in_array($key, $defaults)&&0===strpos($key, 'tesla')){
                        unset($imagedata['sizes'][$key]);
                        @ unlink($path . $value['file']);
                        wp_update_attachment_metadata($post->ID, $imagedata);
                    }
                }
            }
        }
    }

}

function tesla_diim_page(){

    echo '

    <div class="wrap">
        <h2>Delete Intermediate Images</h2>
        <p>This will delete all images with custom size that have been generated.</p>
        <p>When you set a custom image size in the image_size attribute of shortcodes or in the category page options then there will be created images with corresponding sizes and saved on your server.</p>
        <p>In the process of finding the best image sizes for your website you may test multiple image sizes.</p>
        <p>This may result in many unwanted images to be stored on your server.</p>
        <p>Use this option to delete all these images and free up some space.</p>
        <p>This does not affect the original images and the Wordpress generated images with default sizes (thumbnail, medium and large).</p>
        <p><input id="tesla-diim-button" type="button" class="button button-primary" value="Delete" ></p>
        <p id="tesla-diim-result"></p>
    </div>

    ';
    
}

function tesla_diim_admin_menu(){

    add_submenu_page(THEME_NAME . '_options', 'Delete intermediate images', 'Delete intermediate images', 'manage_options', 'tt_fw_diim', 'tesla_diim_page');

}

add_action('admin_menu','tesla_diim_admin_menu');

function tesla_diim_action(){
    wp_create_nonce('tesla_diim_nonce');
    if(!empty($_POST['tesla_diim_nonce'])&&wp_verify_nonce($_POST['tesla_diim_nonce'],'tesla_diim_nonce')){
        tesla_diim();
    }
    exit;
}

add_action('wp_ajax_tesla_diim','tesla_diim_action');
