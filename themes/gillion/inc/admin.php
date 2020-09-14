<?php
function gillion_admin_enqueue() {
    global $pagenow;
    $page = !empty( $_GET['page'] ) ? $_GET['page'] : '';
    $post = !empty( $_GET['post'] ) ? $_GET['post'] : '';
    $post_id = !empty( $_GET['post_id'] ) ? $_GET['post_id'] : '';


    // General assets
    wp_enqueue_style( 'gillion-admin', get_template_directory_uri() . '/assets/admin/css/admin.css' );


    // Load redux related assets
    if( gillion_framework() == 'redux' ) :
        if( $page == 'gillion-theme-settings' ) :
            wp_enqueue_style( 'gillion-admin-redux', get_template_directory_uri() . '/assets/admin/css/admin-redux.css' );
        endif;
    endif;


    // Load metaboxes assets
    if( !defined( 'FW' ) || gillion_framework() == 'redux'  ) :
        wp_enqueue_style( 'gillion-admin-metaboxes', get_template_directory_uri() . '/assets/admin/css/admin-metaboxes.css' );
        wp_enqueue_script( 'gillion-admin-metaboxes', get_template_directory_uri() . '/assets/admin/js/admin-metaboxes.js', [ 'jquery' ] );
    endif;


    // Load revslider assets
    if( $page == 'revslider' ) :
        wp_enqueue_style( 'gillion-admin-revslider', get_template_directory_uri() . '/assets/admin/css/admin-revslider.css' );
    endif;


    // Load unyson related assets
    if( $page == 'fw-settings' ) :
        wp_enqueue_style( 'gillion-admin-unyson', get_template_directory_uri() . '/assets/admin/css/admin-unyson.css' );
        wp_enqueue_script( 'gillion-admin-unyson', get_template_directory_uri() . '/assets/admin/css/admin-unyson.js', array( 'jquery' ) );
        wp_enqueue_script( 'gillion-jquery-cookie', get_template_directory_uri() . '/js/plugins/jquery.cookie.js', array( 'jquery' ) );
    endif;


    // Load post related assetes
    if( $post > 0 || $post_id > 0 || $pagenow == 'post-new.php' ) :
        wp_enqueue_style( 'gillion-admin-post', get_template_directory_uri() . '/assets/admin/css/admin-post.css' );
        wp_enqueue_style( 'gillion-admin-wpbakkery', get_template_directory_uri() . '/assets/admin/css/admin-wpbakery.css' );
        wp_enqueue_script( 'gillion-admin-wpbakkery', get_template_directory_uri() . '/assets/admin/js/admin-wpbakery.js', array( 'jquery' ) );
    endif;


    // Load fonts
    wp_enqueue_style( 'gillion-simple-icons', get_template_directory_uri() . '/css/plugins/simple-line-icons.css', false, '1.0.0' );
    wp_enqueue_style( 'gillion-themify-icons', get_template_directory_uri() . '/css/plugins/themify-icons.css', false, '1.0.0' );
    wp_enqueue_style( 'gillion-pixeden-icons', get_template_directory_uri() . '/css/plugins/pe-icon-7-stroke.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'gillion_admin_enqueue' );


/**
 * Admin panel - Customizer Styling
 */
function gillion_customizer_styles() { ?>
	<style>
        .fw-backend-option {
            opacity: 1!important;
        }

        .fw-backend-customizer-option .button.wp-color-result > .color-alpha {
            height: 28px!important;
        }

        .customize-control h3.sh-custom-group-divder {
            font-size: 24px!important;
            margin-bottom: 0px!important;
            line-height: 1.1!important;
        }

        <?php /* Fix for Unyson Framework 2.7.9 color picker issue */
        if( is_admin() && defined( 'FW' ) && defined('WP_PLUGIN_DIR') ) :
            $unyson = get_plugin_data( WP_PLUGIN_DIR. '/unyson/unyson.php' );
            if( isset( $unyson['Version'] ) && $unyson['Version'] == '2.7.9' ) : ?>

                .fw-backend-option-input-type-rgba-color-picker .wp-color-result span {
                    border: 1px solid rgba(16, 16, 16, 0.32)!important;
                }

                .fw-backend-option-input-type-rgba-color-picker .wp-color-result{
                    display: block;
                    width: 152px!important;
                    max-width: 152px!important;
                    height: 19px !important;
                    position: relative;
                }

                .fw-backend-option-input-type-rgba-color-picker .iris-palette {
                    height: 19.5784px!important;
                    width: 19.5784px!important;
                }

            <?php elseif( isset( $unyson['Version'] ) && version_compare( $unyson['Version'], '2.7.9', '>' ) ) : ?>

                .wp-picker-container input[type=text].wp-color-picker {
                    display: inline-block!important;
                }

                .wp-picker-container .wp-color-result {
                    vertical-align: top;
                }

            <?php endif;
        endif; ?>
	</style>
	<?php

}
add_action( 'customize_controls_print_styles', 'gillion_customizer_styles', 999 );


/**
 * Admin panel - TinyMCE Styling
 */
function gillion_tiny_mce_styling( $mceInit ) {
    $guttenberg_body = ( gillion_is_gutenberg_page() ) ? ' .wp-block-freeform.block-library-rich-text__tinymce' : '';
    $body_font = gillion_option_value('styling_body','family');
    $body_color = gillion_option_value('styling_body','color');
    $single_content_size = gillion_option('styling_single_content_size', '15');
    $background_color = gillion_option( 'styling_body_background', '');

    ob_start(); ?>

    <?php if( $background_color && $background_color != '#ffffff' ) : ?>
        html body <?php echo esc_attr( $guttenberg_body ); ?> {
            background-color: <?php echo esc_attr( $background_color ); ?>;
            padding: 10px 15px;
        }
    <?php endif; ?>

    html body <?php echo esc_attr( $guttenberg_body ); ?> {
        font-family: <?php echo esc_attr( $body_font ); ?>;
        color: <?php echo esc_attr( $body_color ); ?>;
        font-size: <?php echo esc_attr( $single_content_size ); ?>px;
    }

    <?php if( isset( $headings ) ) : ?>
        body <?php echo esc_attr( $guttenberg_body ); ?> h1,
    	body <?php echo esc_attr( $guttenberg_body ); ?> h2,
    	body <?php echo esc_attr( $guttenberg_body ); ?> h3,
    	body <?php echo esc_attr( $guttenberg_body ); ?> h4,
    	body <?php echo esc_attr( $guttenberg_body ); ?> h5,
    	body <?php echo esc_attr( $guttenberg_body ); ?> h6 {
    		<?php echo wp_kses_post( $headings ); ?>
    	}
    <?php endif; ?>

    <?php
    $styles = gillion_compress( ob_get_clean() );
    if( !isset( $mceInit['content_style'] ) ) :
        $mceInit['content_style'] = $styles . ' ';
    else :
        $mceInit['content_style'] .= ' ' . $styles . ' ';
    endif;

    return $mceInit;
}
add_filter( 'tiny_mce_before_init', 'gillion_tiny_mce_styling' );


/**
 * Admin panel - styling
 */
if ( ! function_exists( 'gillion_admin_styling' ) ) :
    add_action('admin_head', 'gillion_admin_styling');
    function gillion_admin_styling() { ?>

        <script type="text/javascript">
            // Admin page loaded
            jQuery(function($){
                $(window).load(function() {
                    $('body').removeClass( 'sh-adminbody-loading' );
                });
            });


            // Visual Composer 5.2 Version undefined vc_js function fix
            function vc_js() { }
            function htmlDecode(value) {
               return (typeof value === 'undefined') ? '' : jQuery('<div/>').html(value).text();
            }


            <?php
            // Unyson block editor fix
            if( gillion_is_gutenberg_page() && gillion_framework() == 'unyson' ) : ?>

                var GuttenbergPageSettingsFixAdded = 0;
                jQuery( function($) {

                    // while content is loading
                    function GuttenbergPageSettingsFix(){
                        if( document.readyState != "complete" ) {
                            if( $('#fw-options-box-page_settings ul.ui-tabs-nav.ui-widget-header > li').length ) {
                                $('#fw-options-box-page_settings ul.ui-tabs-nav.ui-widget-header > li').each( function() {
                                    $(this).find('a').trigger( 'click' );
                                });
                                $('#fw-options-box-page_settings ul.ui-tabs-nav.ui-widget-header > li:first-child > a').trigger( 'click' );
                                GuttenbergPageSettingsFixAdded++;
                            }

                            if( GuttenbergPageSettingsFixAdded == 0 ) {
                                setTimeout( GuttenbergPageSettingsFix, 15 );
                            }
                        }
                    }
                    GuttenbergPageSettingsFix();


                    // when content is loaded
                    jQuery( window ).load( function() {
                        if( GuttenbergPageSettingsFixAdded == 0 ) {
                            $('#fw-options-box-page_settings ul.ui-tabs-nav.ui-widget-header > li').each( function() {
                                $(this).find('a').trigger( 'click' );
                            });
                            $('#fw-options-box-page_settings ul.ui-tabs-nav.ui-widget-header > li:first-child > a').trigger( 'click' );
                            GuttenbergPageSettingsFixAdded++;
                        }
                    });
                });
            <?php endif; ?>


            // Unyson framework post format and general fixes
            <?php if( gillion_framework() == 'unyson' ) : ?>
                jQuery( function($) {
                    // Post format meta box show
                    <?php if( gillion_is_gutenberg_page() ) : ?>

                        jQuery( window ).load( function() {
                            var post_format = $('.editor-post-format .editor-post-format__content select option:selected').val();
                            if( post_format != 0 ) {
                                $('#fw-options-box-post-format-0').hide();
                                $('#fw-options-box-post-format-gallery').hide();
                                $('#fw-options-box-post-format-quote').hide();
                                $('#fw-options-box-post-format-link').hide();
                                $('#fw-options-box-post-format-video').hide();
                                $('#fw-options-box-post-format-audio').hide();
                                $('#fw-options-box-post-format-'+post_format).show();

                                if( post_format == 'standard' ) {
                                    $('#fw-options-box-post-format-0').show();
                                }
                            }

                            $('.editor-post-format .editor-post-format__content select').on( 'change', function() {
                                var post_format_change = $(this).find('option:selected').val();
                                $('#fw-options-box-post-format-0').hide();
                                $('#fw-options-box-post-format-gallery').hide();
                                $('#fw-options-box-post-format-quote').hide();
                                $('#fw-options-box-post-format-link').hide();
                                $('#fw-options-box-post-format-video').hide();
                                $('#fw-options-box-post-format-audio').hide();
                                $('#fw-options-box-post-format-'+ post_format_change ).show();

                                if( post_format_change == 'standard' ) {
                                    $('#fw-options-box-post-format-0').show();
                                }
                            });
                        });

                    <?php else : ?>

                        var post_format = $('input[name=post_format]:checked', '#post-formats-select').val();
                        if( post_format != 0 ) {
                            $('#fw-options-box-post-format-'+post_format).show();
                        } else {
                            $('#fw-options-box-post-format-0').show();
                        }

                        $('input[name=post_format]').on( 'change', function() {
                            var post_format_change = $(this).val();

                            $('#fw-options-box-post-format-0').hide();
                            $('#fw-options-box-post-format-gallery').hide();
                            $('#fw-options-box-post-format-quote').hide();
                            $('#fw-options-box-post-format-link').hide();
                            $('#fw-options-box-post-format-video').hide();
                            $('#fw-options-box-post-format-audio').hide();
                            $('#fw-options-box-post-format-'+ post_format_change ).show();
                        });

                    <?php endif; ?>


                    var timeoutId;
                    $(document).on('widget-updated widget-added', function(){
                        clearTimeout(timeoutId);
                        timeoutId = setTimeout(function(){ // wait a few milliseconds for html replace to finish
                            fwEvents.trigger('fw:options:init', { $elements: $('#widgets-right .fw-theme-admin-widget-wrap') });
                        }, 100);
                    });

                    $('.mega-menu-column-new-row').parent().parent().remove();


                    /* Fix Visual Composer frontend Unyson compatibility issue */
                    if( $('body').hasClass('vc_editor') ) {
                        $('.fw-options-tab').each( function() {
                            $(this).html( $(this).attr( 'data-fw-tab-html' ));
                        });
                    }
                });
            <?php endif; ?>
        </script>


        <style type="text/css">
            <?php /* Fix for Unyson Framework 2.7.9 color picker issue */
            if( is_admin() && defined( 'FW' ) && defined('WP_PLUGIN_DIR') ) :
            	$unyson = get_plugin_data( WP_PLUGIN_DIR. '/unyson/unyson.php' );
            	if( isset( $unyson['Version'] ) && $unyson['Version'] == '2.7.9' ) : ?>

                    .fw-backend-option-input-type-rgba-color-picker .wp-color-result span {
                        border: 1px solid rgba(16, 16, 16, 0.32)!important;
                    }

                    .fw-backend-option-input-type-rgba-color-picker .wp-color-result{
                    	display: block;
                        width: 152px!important;
                        max-width: 152px!important;
                    	height: 19px !important;
                    	position: relative;
                    }

                    .fw-backend-option-input-type-rgba-color-picker .iris-palette {
                        height: 19.5784px!important;
                        width: 19.5784px!important;
                    }

                <?php elseif( isset( $unyson['Version'] ) && version_compare( $unyson['Version'], '2.7.9', '>' ) ) : ?>

                    .wp-picker-container input[type=text].wp-color-picker {
                        display: inline-block!important;
                    }

                    .wp-picker-container .wp-color-result {
                        vertical-align: top;
                    }

                <?php endif;
            endif; ?>


            <?php
            // WPBakery preview accent color from theme settings
            if( !isset( $_GET['vc_action'] ) && !isset( $_GET['action'] ) && !isset( $_GET['post'] ) ) :
            $accent_color = gillion_option('accent_color');
                if( $accent_color ) :
            ?>
                .sh-revslider-button2 {
                    background-color: <?php echo esc_attr( $accent_color ); ?>!important;
                }
            <?php endif; endif; ?>


            <?php
            // AMP styling
            if( gillion_option('amp_mode') != 'all' && gillion_option('amp_mode') != 'disabled' ) : ?>
                #theme_support_standard,
                #theme_support_transitional,
                label[for="theme_support_standard"],
                label[for="theme_support_transitional"] {
                    opacity: 0.5;
                    cursor: default;
                }

                #amp-settings:before {
                    display: block;
                    content: "Gillion AMP optimized mode is enabled (supports only reader mode). You can disable it under Gillion Settings > AMP > AMP Mode (by setting it to All)";
                    color: red;
                }
            <?php endif; ?>
        </style>
    <?php }
endif;


/**
 * Admin - body classes
 */
if( !function_exists( 'gillion_add_admin_body_classes' ) ) :
    add_filter('admin_body_class', 'gillion_add_admin_body_classes');
    function gillion_add_admin_body_classes( $classes ) {
        $classes.= ' sh-adminbody-loading';
        return $classes;
    }
endif;


/**
 * Admin - Thumbnail column
 */
global $pagenow;
if( ( $pagenow == 'edit.php' ) && !isset( $_GET['post_type'] ) ) :
    add_filter('manage_posts_columns', 'gillion_posts_columns', 5);
    add_action('manage_posts_custom_column', 'gillion_posts_custom_columns', 5, 2);

    function gillion_posts_columns($defaults){
        $defaults['sh_post_thumbs'] = esc_html__('Image', 'gillion');
        return $defaults;
    }

    function gillion_posts_custom_columns($column_name, $id){
        if($column_name === 'sh_post_thumbs'){
            echo the_post_thumbnail( 'thumbnail' );
        }
    }
endif;
