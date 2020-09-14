<?php
/*
** Get current framework
**/
function gillion_framework( $framework = '' ) {
    $current_framework = get_option( 'gillion_framework' );
    if( in_array( $current_framework, [ 'redux', 'unyson' ] ) ) :
        return $current_framework;
    else :
        return 'unyson';
    endif;
}


/*
** Get current framework
**/
function gillion_framework_active() {
    if(
        ( class_exists( 'Redux' ) && gillion_framework() == 'redux' ) ||
        ( defined( 'FW' ) && gillion_framework() == 'unyson' )
    ) :
        return true;
    endif;
}


/*
** Disable Unyson
**/
if( gillion_framework() == 'redux' ) :
    add_action( 'admin_menu', 'remove_unyson_theme_settings', 999 );
    function remove_unyson_theme_settings() {
    	remove_submenu_page( 'themes.php', 'fw-settings' );
    }

    global $pagenow;
    $themes_page_id = isset( $_GET['page'] ) ? $_GET['page'] : '';
    if( $pagenow == 'themes.php' && $themes_page_id == 'fw-settings' ) :
        wp_redirect( admin_url( '/' ) );
        exit;
    endif;
endif;


/**
 * Add link to theme settings
 */
if ( !function_exists( 'gillion_theme_options_link' ) && current_user_can('manage_options') && gillion_framework_active() ) :
    function gillion_theme_options_link( $wp_admin_bar ) {
        $url = ( gillion_framework() == 'redux' ) ? 'admin.php?page=gillion-theme-settings' : 'themes.php?page=fw-settings';

        $args = [
            'id' => 'gillion-options',
            'title' => 'Gillion Settings',
            'href' => get_admin_url( NULL, $url ),
        ];
        $wp_admin_bar->add_node( $args );
    }
    add_action( 'admin_bar_menu', 'gillion_theme_options_link', 999 );
endif;


/**
** Theme Body Class
**/
add_filter( 'admin_body_class', 'gillion_admin_body_class' );
function gillion_admin_body_class( $classes ) {
    return $classes . ' gillion-theme';
}


/**
 * Dynamic Styles Update
 */
if( !function_exists( 'gillion_dynamic_styles_update' ) ) :
    function gillion_dynamic_styles_update() {
        $css = gillion_render_css();
        $upload_dir = wp_upload_dir();
        if( isset( $upload_dir['basedir'] ) ) :
            $file_path  = $upload_dir['basedir'] . '/gillion-dynamic-styles.css';

            global $wp_filesystem;
            if( empty( $wp_filesystem ) ) :
                require_once ( ABSPATH . '/wp-admin/includes/file.php' );
                WP_Filesystem();
            endif;

            if( !$wp_filesystem || !$wp_filesystem->put_contents( $file_path, $css ) ) :
        		delete_option( 'gillion_settings_updated' );
        	else :
                update_option( 'gillion_settings_updated', rand( 10000000, 900000000 ) );
            endif;
        endif;

    }
    add_action( 'redux/options/gillion_options/saved', 'gillion_dynamic_styles_update' );
    add_action( 'fw_settings_form_saved', 'gillion_dynamic_styles_update' );
    add_action( 'fw_settings_form_reset', 'gillion_dynamic_styles_update' );
    add_action( 'customize_save_after', 'gillion_dynamic_styles_update' );
    add_action( 'after_switch_theme', 'gillion_dynamic_styles_update' );
endif;
