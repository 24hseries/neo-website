<?php
/**
** Change default Unyson Framework path
**/
add_filter(
    'fw_framework_customizations_dir_rel_path',
    'gillion_fw_customizations_dir_rel_path'
);
function gillion_fw_customizations_dir_rel_path($rel_path) {
    return '/inc/framework-customizations';
}




/**
 * Admin panel - TinyMCE Fonts
 */
function gillion_tiny_mce_fonts( $mce_css ) {
    $fonts_url = '';
    $enqueue_fonts = array();
    $google_fonts = function_exists('fw_get_google_fonts') ? fw_get_google_fonts() : '';
	$typography1 = gillion_option('styling_body');
	$typography2 = gillion_option('styling_headings');

	if( isset($google_fonts[$typography1['family']]) ) :
	    $enqueue_fonts[$typography1['family']] = $google_fonts[$typography1['family']];
	endif;
	if( isset($google_fonts[$typography2['family']]) ) :
	    $enqueue_fonts[$typography2['family']] = $google_fonts[$typography2['family']];
	endif;

	if( count( $enqueue_fonts) ) :
		$font_families = array();
		foreach ( $enqueue_fonts as $font => $styles ) :
		    $font_families[] = str_replace( ' ', '+', esc_attr($font) ) . ':' . implode( ',', $styles['variants'] );
		endforeach;

		$subset = gillion_option( 'google_fonts_subset', 'gillion' );
		if( count( $subset ) < 1 ) :
			$subset = array( 'latin' );
		endif;

		if( count($font_families) > 0 ) {
			$fonts_args = array(
				'family' => implode( '%7C', $font_families ),
				'subset' => implode( ',', array_keys($subset) ),
			);
			$fonts_url = esc_url( add_query_arg( $fonts_args, 'https://fonts.googleapis.com/css' ) );
		}
	endif;

    if( $fonts_url ) :
        $mce_css.= ', '.str_replace( ',', '%2C', $fonts_url );
    endif;
    return $mce_css;

}
add_filter( 'mce_css', 'gillion_tiny_mce_fonts' );




/**
 * Sync common Theme Settings and Customizer options db values
 * @internal
 */
class gillion_Sync_Customizer_Options {
    public static function init() {
        add_action('customize_save_after', array(__CLASS__, '_action_after_customizer_save'));
        add_action('fw_settings_form_saved', array(__CLASS__, '_action_after_settings_save'));
        add_action('fw_settings_form_reset', array(__CLASS__, '_action_after_settings_save'));

        /* Callback when lattest settings is not registered */
        add_action('customize_save_after', array(__CLASS__, '_action_after_customizer_save_delay'));
        add_action('customize_save_after_delay','gillion_Sync_Customizer_Options::_action_after_customizer_save', 5 );
    }

    /**
     * If a customizer option also exists in settings options, copy its value to settings option value
     */

     public static function _action_after_customizer_save_delay(){
         gillion_Sync_Customizer_Options::_action_after_customizer_save();
         wp_schedule_single_event(time() + 0, 'customize_save_after_delay');
     }


    public static function _action_after_customizer_save()
    {
        $settings_options = fw_extract_only_options(fw()->theme->get_settings_options());
        //error_log( print_r( $settings_options, true ) );

        foreach (
            array_intersect_key(
                fw_extract_only_options(fw()->theme->get_customizer_options()),
                $settings_options
            )
            as $option_id => $option
        ) {
            if ($option['type'] === $settings_options[$option_id]['type']) {
                fw_set_db_settings_option(
                    $option_id, fw_get_db_customizer_option($option_id)
                );
            }
        }
    }

    /**
     * If a settings option also exists in customizer options, copy its value to customizer option value
     */
    public static function _action_after_settings_save()
    {
        $customizer_options = fw_extract_only_options(fw()->theme->get_customizer_options());
        //error_log( print_r($customizer_options, TRUE) );
        foreach (
            array_intersect_key(
                fw_extract_only_options(fw()->theme->get_settings_options()),
                $customizer_options
            )
            as $option_id => $option
        ) {
            if ($option['type'] === $customizer_options[$option_id]['type']) {
                fw_set_db_customizer_option(
                    $option_id, fw_get_db_settings_option($option_id)
                );
            }
        }
    }
}
gillion_Sync_Customizer_Options::init();




/**
 * Load Custom Icon Option
 */
if ( ! function_exists( 'gillion_include_custom_option_types' ) ) :
    function gillion_include_custom_option_types() {
        if (is_admin()) {
            require_once get_template_directory() . '/inc/includes/option-types/new-icon/class-fw-option-type-new-icon.php';
            // and all other option types
        }
    }
    add_action('fw_option_types_init', 'gillion_include_custom_option_types');
endif;




/**
 * Theme Customizer support
 */
if ( defined( 'FW' ) ):
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'gillion_display_form_errors' ) ):
		function gillion_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'gillion-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'gillion-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action('wp_enqueue_scripts', 'gillion_display_form_errors');
endif;




/**
 * Display current submitted FW_Form errors
 */
if ( defined( 'FW' ) && !function_exists( 'gillion_form_errors' ) ):
	function gillion_form_errors() {
		$form = FW_Form::get_submitted();

		if ( ! $form || $form->is_valid() ) {
			return;
		}

		wp_enqueue_script(
			'gillion-theme-show-form-errors',
			get_template_directory_uri() . '/js/form-errors.js',
			array( 'jquery' ),
			'1.0',
			true
		);

		wp_localize_script( 'fw-theme-show-form-errors', '_localized_form_errors', array(
			'errors'  => $form->get_errors(),
			'form_id' => $form->get_id()
		) );
	}
	add_action('wp_enqueue_scripts', 'gillion_form_errors');
endif;
