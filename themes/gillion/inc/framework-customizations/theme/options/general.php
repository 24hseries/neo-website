<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$demo_content = ( isset( $customizer_mode ) ) ? '' : '<div class="fw-backend-option-design-default sh-demo-content-title">
	<div class="fw-backend-option-label">
		<label for="fw-option-responsive_layout">'.esc_html__( 'Demo Content', 'gillion' ).'</label>
	</div>
</div>
<div class="sh-demo-content-link">
	<a href="'.admin_url( 'tools.php?page=fw-backups-demo-content' ).'">'.esc_html__( ' Click here', 'gillion' ).'</a>
	'.esc_html__( 'to install a demo content', 'gillion' ).'
</div>';

$google_api = 'https://developers.google.com/maps/documentation/javascript/get-api-key';
$general_options = array(
	/*'demo_content' => array(
		'type'  => 'html-full',
		'value' => '',
		'label' => false,
		'html'  => $demo_content,
	),*/


    'global_page_layout' => array(
        'type'  => 'radio',
        'value' => 'default',
        'label' => esc_html__( 'Page Layout', 'gillion' ),
        'desc'  => esc_html__( 'Choose main page layout', 'gillion' ),
        'choices' => array(
			'default' => esc_html__( 'Default (without sidebar)', 'gillion' ),
			'default default-nopadding' => esc_html__( 'Default (without sidebar and extra padding)', 'gillion' ),
			'default default-content-after-posts' => esc_html__( 'Default Inversed (without sidebar and content at the bottom)', 'gillion' ),
			'full' => esc_html__( 'Full Width (without sidebar)', 'gillion' ),
			'sidebar-left' => esc_html__( 'Sidebar Left', 'gillion' ),
			'sidebar-right' => esc_html__( 'Sidebar Right', 'gillion' ),
        ),
        'inline' => false,
    ),


	'page_layout' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'page_layout' => 'full',
		),
		'picker' => array(
			'page_layout' => array(
				'label'   => esc_html__('Whole Page Layout', 'gillion'),
				'desc'    => esc_html__('Choose main page layout. Boxed layout will not work together with left header', 'gillion'),
				'type'    => 'radio',
				'choices' => array(
					'full' => esc_html__('Full Width', 'gillion'),
					'boxed' => esc_html__('Boxed Layout', 'gillion'),
				),
			)
		),
		'choices' => array(
			'boxed' => array(
				'border_style' => array(
					'label'   => esc_html__('Border Style', 'gillion'),
					'desc'    => esc_html__('Choose content border style', 'gillion'),
					'type'    => 'radio',
					'choices' => array(
						'none' => esc_html__('None', 'gillion'),
						'shadow' => esc_html__('Shadow', 'gillion'),
						'line' => esc_html__('Line', 'gillion'),
					),
					'value' => 'shadow'
				),


				'page_background_color' => array(
					'label' => esc_html__('Page Background Color', 'gillion'),
					'desc'  => esc_html__('Select page background color, useful for specific page option', 'gillion'),
					'type'  => 'color-picker',
					'value' => ''
				),

				'page_background_image' => array(
					'label' => esc_html__( 'Page Background Image', 'gillion' ),
					'desc'  => esc_html__( 'Select page background image', 'gillion' ),
					'type'  => 'upload',
					'images_only' => true,
				),

				'content_background_color' => array(
					'label' => esc_html__('Content Background Color', 'gillion'),
					'desc'  => esc_html__('Select content background color', 'gillion'),
					'type'  => 'color-picker',
					'value' => '#ffffff'
				),

				'specific_pages' => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__('Specific Pages Only', 'gillion'),
					'desc'  => esc_html__('Enter page and post IDs with comas, for examle: 1,2,3,4,5', 'gillion'),
				),

				'margin_top' => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__('Top margin', 'gillion'),
					'desc'  => esc_html__('Enter top margin', 'gillion'),
				),

				'footer_width' => array(
					'label' => esc_html__( 'Footer Width', 'gillion' ),
					'desc'  => esc_html__( 'Enable or disable full footer width', 'gillion' ),
					'type'  => 'switch',
					'value' => 'boxed',
					'left-choice' => array(
						'value' => 'boxed',
						'label' => esc_html__('Boxed', 'gillion'),
					),
					'right-choice' => array(
						'value' => 'full',
						'label' => esc_html__('Full', 'gillion'),
					),
				),

				'page_radius' => array(
					'label' => esc_html__( 'Page Radius', 'gillion' ),
					'desc'  => esc_html__( 'Enable or disable page radius', 'gillion' ),
					'type'  => 'switch',
					'value' => false,
					'left-choice' => array(
						'value' => false,
						'label' => esc_html__('Off', 'gillion'),
					),
					'right-choice' => array(
						'value' => '8px',
						'label' => esc_html__('On', 'gillion'),
					),
				),

			),
		),
	),

	'responsive_layout' => array(
		'label' => esc_html__( 'Responsive Layout', 'gillion' ),
		'desc'  => esc_html__( 'Enable or disable responsive layout for mobile devices', 'gillion' ),
		'type'  => 'switch',
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

	'smooth-scrooling' => array(
		'label' => esc_html__( 'Smooth Scrooling', 'gillion' ),
		'desc'  => esc_html__( 'Enable or disable smooth scrolling for webkit browers like Chrome', 'gillion' ),
		'type'  => 'switch',
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

	'back_to_top' => array(
		'type'  => 'select',
		'value' => '1',
		'label' => esc_html__('Back To Top Button', 'gillion'),
		'desc'  => esc_html__('Choose style for "Back to top" button or disable it', 'gillion'),
		'choices' => array(
			'disabled' => esc_html__( 'Disabled', 'gillion' ),
			'1' => esc_html__( 'Style 1', 'gillion' ),
		),
	),

	'back_to_top_radius' => array(
		'label' => esc_html__('Back To Top Button Radius', 'gillion'),
		'desc'  => esc_html__( 'Choose back to top button radius', 'gillion' ),
		'type'  => 'select',
		'value' => '8px',
		'choices' => array(
			'0px' => esc_html__( 'None (0px)', 'gillion' ),
			'8px' => esc_html__( 'Little (8px)', 'gillion' ),
			'100%' => esc_html__( 'Full (100%)', 'gillion' ),
		),
	),

	'rtl' => array(
		'label' => esc_html__( 'RTL Support', 'gillion' ),
		'desc'  => esc_html__( 'Enable or disable RTL(Right to Left) support', 'gillion' ),
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

	'crispy_images' => array(
		'label' => esc_html__( 'Crispy Images', 'gillion' ),
		'desc'  => esc_html__( 'Enable or disable crispy images effect', 'gillion' ),
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

	'white_borders' => array(
		'label' => esc_html__( 'White Frame', 'gillion' ),
		'desc'  => esc_html__( 'Enable or disable white frame around the page', 'gillion' ),
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

	'page_comments' => array(
		'label' => esc_html__( 'Comments', 'gillion' ),
		'desc'  => esc_html__( 'Enable or disable post comments and page comments', 'gillion' ),
		'type'  => 'switch',
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





	'global_carousel_buttons' => array(
        'type'  => 'radio',
        'value' => 'style1',
        'label' => esc_html__( 'Carousel Buttons Style', 'gillion' ),
        'desc'  => esc_html__( 'Choose global carousel buttons style', 'gillion' ),
        'choices' => array(
			'style1' => esc_html__( '2 Round Circles with Arrows', 'gillion' ),
			'style2' => esc_html__( '1 Round Box with Arrows', 'gillion' ),
        ),
        'inline' => false,
    ),

	'global_carousel_buttons_position' => array(
        'type'  => 'radio',
        'value' => 'title',
        'label' => esc_html__( 'Carousel Buttons Position in Widgets', 'gillion' ),
        'desc'  => esc_html__( 'Choose global carousel position in widgets', 'gillion' ),
        'choices' => array(
			'title' => esc_html__( 'In Title', 'gillion' ),
			'bottom' => esc_html__( 'Bellow Content', 'gillion' ),
        ),
        'inline' => false,
    ),

	'global_title' => array(
        'type'  => 'radio',
        'value' => 'style1',
        'label' => esc_html__( 'Section Title Style', 'gillion' ),
        'desc'  => esc_html__( 'Choose global section title style', 'gillion' ),
        'choices' => array(
			'style1' => esc_html__( 'Line in Middle', 'gillion' ),
			'style2' => esc_html__( 'Line Under Title', 'gillion' ),
        ),
        'inline' => false,
    ),

	'global_title_transform' => array(
		'type'  => 'select',
        'value' => 'none',
		'label' => esc_html__( 'Section Title Transform', 'gillion' ),
		'desc' => esc_html__( 'Choose section title transform', 'gillion' ),
		'choices' => array(
			'none' => esc_html__( 'None', 'gillion' ),
			'uppercase' => esc_html__( 'Uppercase (transforms all characters to uppercase)', 'gillion' ),
			'lowercase' => esc_html__( 'Lowercase (transforms all characters to lowercase)', 'gillion' ),
			'capitalize' => esc_html__( 'Capitalize (transforms the first character of each word to uppercase)', 'gillion' ),
        ),
	),

	'global_title_weight' => array(
		'type'  => 'select',
        'value' => 'default',
		'label' => esc_html__( 'Section Title Weight', 'gillion' ),
		'desc' => esc_html__( 'Choose section title weight', 'gillion' ),
		'choices' => array(
			'default' => esc_html__( 'Default (from heading settings)', 'gillion' ),
			'100' => esc_html__( '100 - Extra Light', 'gillion' ),
			'300' => esc_html__( '300 - Light', 'gillion' ),
			'400' => esc_html__( '400 - Regular', 'gillion' ),
			'600' => esc_html__( '600 - SemiBold', 'gillion' ),
			'700' => esc_html__( '700 - Bold', 'gillion' ),
			'900' => esc_html__( '900 - Extra Bold', 'gillion' ),
        ),
	),

	'global_categories' => array(
        'type'  => 'radio',
        'value' => 'style1',
        'label' => esc_html__( 'Categories Style', 'gillion' ),
        'desc'  => esc_html__( 'Choose global categories style', 'gillion' ),
        'choices' => array(
			'style1' => esc_html__( 'Standard Text', 'gillion' ),
			'style2' => esc_html__( 'Fancy Button', 'gillion' ),
        ),
        'inline' => false,
    ),

	'global_review' => array(
        'type'  => 'radio',
        'value' => 'style1',
        'label' => esc_html__( 'Review Icon Style', 'gillion' ),
        'desc'  => esc_html__( 'Choose global review icon style', 'gillion' ),
        'choices' => array(
			'style1' => esc_html__( 'Standard', 'gillion' ),
			'style2' => esc_html__( 'Transparent', 'gillion' ),
        ),
        'inline' => false,
    ),

	'global_post_meta_order' => array(
        'type'  => 'radio',
        'value' => 'bottom',
        'label' => esc_html__( 'Post Meta and Description Order', 'gillion' ),
        'desc'  => esc_html__( 'Choose global post meta (information) and description (excerpt) order', 'gillion' ),
        'choices' => array(
			'bottom' => esc_html__( '1. Description 2. Meta data', 'gillion' ),
			'top' => esc_html__( '1. Meta data 2. Description', 'gillion' ),
        ),
        'inline' => false,
    ),

	'global_instagram_widget_columns' => array(
        'type'  => 'radio',
        'value' => 'columns2',
        'label' => esc_html__( 'Instagram Widget Image Columns', 'gillion' ),
        'desc'  => esc_html__( 'Choose global instagram widget image columns in sidebar', 'gillion' ),
        'choices' => array(
			'columns2' => esc_html__( '2 columns ', 'gillion' ),
			'columns3' => esc_html__( '3 columns', 'gillion' ),
        ),
        'inline' => false,
    ),

	'global_instagram_widget_button' => array(
		'label' => esc_html__( 'Instagram Widget Button', 'gillion' ),
		'desc'  => esc_html__( 'Enable or disable instagram widget button in sidebar', 'gillion' ),
		'type'  => 'switch',
		'value' => 'off',
		'left-choice' => array(
			'value' => 'off',
			'label' => esc_html__('Off', 'gillion'),
		),
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__('On', 'gillion'),
		),
	),

	'global_categories_position' => array(
        'type'  => 'radio',
        'value' => 'title',
        'label' => esc_html__( 'Categories Position', 'gillion' ),
        'desc'  => esc_html__( 'Choose post categories position', 'gillion' ),
        'choices' => array(
			'title' => esc_html__( 'Above Title ', 'gillion' ),
			'image' => esc_html__( 'Inside Image', 'gillion' ),
        ),
        'inline' => false,
    ),

	'global_slider_icon_style' => array(
        'type'  => 'radio',
        'value' => 'title',
        'label' => esc_html__( 'Slider/Gallery Icon Style', 'gillion' ),
        'desc'  => esc_html__( 'Choose post categories position', 'gillion' ),
        'choices' => array(
			'style1' => esc_html__('Bullets in circle', 'gillion'),
			'style2' => esc_html__('Bullets without circle', 'gillion'),
        ),
        'inline' => false,
    ),

);


$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'gillion' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'gillion' ),
				'type'    => 'box',
				'options' => $general_options
			),
		)
	)
);
