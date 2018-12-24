<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$header_options = array(
	'logo' => array(
		'label' => esc_html__( 'Standard Logo', 'gillion' ),
		'desc'  => esc_html__( 'Upload a logo image (max height 250px) ', 'gillion' ),
		'type'  => 'upload',
		'images_only' => true,
	),

	'logo_sticky' => array(
		'label' => esc_html__( 'Sticky Header Logo (optional)', 'gillion' ),
		'desc'  => esc_html__( 'Upload a sticky logo image (max height 250px) ', 'gillion' ),
		'type'  => 'upload',
		'images_only' => true,
	),

	'logo_light' => array(
		'label' => esc_html__( 'Light Logo Version (optional)', 'gillion' ),
		'desc'  => esc_html__( 'Upload a light logo version (max height 250px) ', 'gillion' ),
		'type'  => 'upload',
		'images_only' => true,
	),

	'header_settings' => array(
		'type'  => 'html-full',
		'value' => '',
		'label' => false,
		'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Header Settings', 'gillion').'</span></h3>',
	),

	'header_layout' => array(
		'type'  => 'radio',
		'value' => '2',
		'label' => esc_html__('Layout', 'gillion'),
		'desc'  => esc_html__('Choose main header layout', 'gillion'),
		'choices' => array(
			'2' => esc_html__( 'Standard', 'gillion' ),
			'1' => esc_html__( 'Menu Center', 'gillion' ),
			'4' => esc_html__( 'Logo/menu center', 'gillion' ),
			'3' => esc_html__( 'With Ad place', 'gillion' ),
		),
		'inline' => false,
	),

	'header_width' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Width', 'gillion' ),
		'desc' => esc_html__( 'Select header width', 'gillion' ),
		'value' => 'default',
		'left-choice' => array(
			'value' => 'default',
			'label' => esc_html__('Default', 'gillion'),
		),
		'right-choice' => array(
			'value' => 'full',
			'label' => esc_html__('Full', 'gillion'),
		),
	),

	'header_additional_padding' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Additional Padding', 'gillion'),
		'desc'  => esc_html__('Add additional padding around not sticky header (top right bottom left). For example: 30px 0px 30px 0px', 'gillion'),
	),

	'ipad_landscape_full_navigation' => array(
		'label' => esc_html__( 'iPad landscape navigation', 'gillion' ),
		'desc'  => esc_html__( 'Enable or disable iPad landscape to use desktop navigation (expermetal feature)', 'gillion' ),
		'type'  => 'switch',
		'value' => false,
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Off', 'gillion'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('On', 'gillion'),
		),
	),

	'header_logo_sizes' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'header_logo_sizes' => 'orginal',
			'manual' => array(
				'standard_height' => '40',
				'sticky_height' => '40',
				'responsive_height' => '40',
			),
		),
		'picker' => array(
			'header_logo_sizes' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Header Logo Sizes', 'gillion' ),
				'desc' => esc_html__( 'Switch between orgianl and manual header logo sizing', 'gillion' ),
				'value' => true,
				'left-choice' => array(
					'value' => 'orginal',
					'label' => esc_html__('Orginal', 'gillion'),
				),
				'right-choice' => array(
					'value' => 'manual',
					'label' => esc_html__('Manual', 'gillion'),
				),
			)
		),
		'choices' => array(
			'manual' => array(
				'standard_height' => array(
					'type'  => 'slider',
					'value' => '50',
					'label' => esc_html__('Logo Height', 'gillion'),
					'desc'  => esc_html__('Choose header logo height size', 'gillion'),
					'properties' => array(
						'min' => 20,
						'max' => 250,
						'step' => 1
					),
					'inline' => false,
				),

				'sticky_height' => array(
					'type'  => 'slider',
					'value' => '40',
					'label' => esc_html__('Sticky Logo Height', 'gillion'),
					'desc'  => esc_html__('Choose sticky logo height size', 'gillion'),
					'properties' => array(
						'min' => 20,
						'max' => 250,
						'step' => 1
					),
					'inline' => false,
				),

				'responsive_height' => array(
					'type'  => 'slider',
					'value' => '30',
					'label' => esc_html__('Responsive Logo Height', 'gillion'),
					'desc'  => esc_html__('Choose responsive logo height size', 'gillion'),
					'properties' => array(
						'min' => 20,
						'max' => 250,
						'step' => 1
					),
					'inline' => false,
				),
			),
		),
	),

	'header_sticky' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Sticky Header', 'gillion' ),
		'desc' => esc_html__( 'Enable or disable sticky header', 'gillion' ),
		'value' => true,
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Off', 'gillion'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('On', 'gillion'),
		),
	),

	'header_elements' => array(
		'type'  => 'checkboxes',
		'value' => array(
			'social' => true,
			'social_mobile' => true,
			'search' => true,
			'login' => true,
			'sidemenu' => true,
		),
		'label' => esc_html__('Elements', 'gillion'),
		'desc'  => esc_html__('Select header elements you want to see', 'gillion'),
		'choices' => array(
			'social' => esc_html__('Social Media', 'gillion'),
			'social_mobile' => esc_html__('Social Media (mobile)', 'gillion'),
			'search' => esc_html__('Search', 'gillion'),
			'login' => esc_html__('Login/Register button (button in topbar)', 'gillion'),
			'login_icon' => esc_html__('Login/Register button (icon next to navigation)', 'gillion'),
			'sidemenu' => esc_html__('Side Menu', 'gillion'),
		),
		'inline' => false,
	),

	'header_elements_shop' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Elements - WooCommerce Cart Icon', 'gillion' ),
		'desc' => esc_html__( 'Enable or disable WooCommerce cart icon in header', 'gillion' ),
		'value' => true,
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Off', 'gillion'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('On', 'gillion'),
		),
	),

	'header_elements_shop_wishlist' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Elements - WooCommerce Wishlist', 'gillion' ),
		'desc' => esc_html__( 'Enable or disable WooCommerce wishlist icon in header', 'gillion' ),
		'value' => true,
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Off', 'gillion'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('On', 'gillion'),
		),
	),

	'header_side_menu_icon' => array(
		'type'  => 'icon',
		'label' => esc_html__('Side Menu Icon', 'gillion'),
		'desc'  => esc_html__('Choose your header side menu icon', 'gillion'),
		'set' => 'gillion-icons',
		'value' => 'icon-energy'
	),


	'title_topbar' => array(
		'type'  => 'html-full',
		'value' => '',
		'label' => false,
		'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Top Bar Settings', 'gillion').'</span></h3>',
	),

	'topbar_status' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Topbar', 'gillion' ),
		'desc' => esc_html__( 'Enable or disable header topbar', 'gillion' ),
		'value' => 'on',
		'left-choice' => array(
			'value' => 'off',
			'label' => esc_html__('Off', 'gillion'),
		),
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__('On', 'gillion'),
		),
	),


	'title_header_animations' => array(
		'type'  => 'html-full',
		'label' => false,
		'html'  => '
		<h3 class="hndle sh-custom-group-divder">
			<span>'.esc_html__('Header Animations', 'gillion').'</span>
		</h3>',
	),

	'header_animation_dropdown_delay' => array(
		'type'  => 'slider',
		'value' => '1',
		'label' => esc_html__('Dropdown Closing Delay', 'gillion'),
		'desc'  => esc_html__('Choose header dropdown closing delay speed (seconds)', 'gillion'),
		'properties' => array(
			'min' => 0,
			'max' => 4,
			'step' => 0.1
		),
		'inline' => false,
	),

	'header_animation_dropdown_speed' => array(
		'type'  => 'slider',
		'value' => '0.3',
		'label' => esc_html__('Dropdown Opening Speed', 'gillion'),
		'desc'  => esc_html__('Choose header dropdown opening speed (seconds)', 'gillion'),
		'properties' => array(
			'min' => 0,
			'max' => 4,
			'step' => 0.1
		),
		'inline' => false,
	),

	'header_animation_dropdown' => array(
		'type'  => 'radio',
		'value' => 'easeOutQuint',
		'label' => esc_html__('Dropdown Animation', 'gillion'),
		'desc'  => esc_html__('Choose dropdown animation', 'gillion'),
		'choices' => array(
			'linear' => esc_html__( 'Linear', 'gillion' ),
			'easeOutQuint' => esc_html__( 'Fast to slow', 'gillion' ),
			'easeInExpo' => esc_html__( 'Slow to fast', 'gillion' ),
			'easeInOutExpo' => esc_html__( 'Slow to fast (2)', 'gillion' ),
			'easeOutBounce' => esc_html__( 'Bounce', 'gillion' ),
		),
		'inline' => false,
	),

);

$options = array(
	'header' => array(
		'title'   => esc_html__( 'Header', 'gillion' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'header-box' => array(
				'title'   => esc_html__( 'Header Logos', 'gillion' ),
				'type'    => 'box',
				'options' => $header_options
			),
		)
	)
);
