<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Load framework
 */
require_once ( trailingslashit( get_template_directory() ) . '/inc/init.php' );


/**
 * Load VC Elements
 */
if( defined( 'WPB_VC_VERSION' ) ) :
    add_action( 'vc_before_init', 'gillion_vc_before_init_actions' );
    function gillion_vc_before_init_actions() {
        require_once( get_template_directory().'/inc/elements/blog-slider.php' );
        require_once( get_template_directory().'/inc/elements/blog-posts.php' );
        require_once( get_template_directory().'/inc/elements/blog-posts-basic.php' );
        require_once( get_template_directory().'/inc/elements/blog-posts-categories.php' );
        require_once( get_template_directory().'/inc/elements/blog-categories.php' );
        require_once( get_template_directory().'/inc/elements/blog-text-slider.php' );
        require_once( get_template_directory().'/inc/elements/text-block.php' );
        require_once( get_template_directory().'/inc/elements/heading.php' );
        require_once( get_template_directory().'/inc/elements/empty-space.php' );
        require_once( get_template_directory().'/inc/elements/text-separator.php' );
        require_once( get_template_directory().'/inc/elements/button.php' );
        require_once( get_template_directory().'/inc/elements/list.php' );
        require_once( get_template_directory().'/inc/elements/seperator.php' );
        require_once( get_template_directory().'/inc/elements/single-image.php' );
        require_once( get_template_directory().'/inc/elements/image-gallery.php' );
        require_once( get_template_directory().'/inc/elements/image-container.php' );
        require_once( get_template_directory().'/inc/elements/social-networks.php' );
        require_once( get_template_directory().'/inc/elements/footer-widgets.php' );

        /* WooCommerce Elements */
        if ( class_exists( 'woocommerce' ) ) :
            require_once( get_template_directory().'/inc/elements/woocommerce-products.php' );
            require_once( get_template_directory().'/inc/elements/woocommerce-categories.php' );
            require_once( get_template_directory().'/inc/elements/woocommerce-spotlight.php' );
        endif;
    }
endif;


/**
 * Setup Yellow Pencil Pro
 */
define('YP_THEME_MODE', "true");
