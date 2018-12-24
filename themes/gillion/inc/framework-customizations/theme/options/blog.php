<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$blog_options = array(

	'pagination' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Pagination', 'gillion' ),
		'desc' => esc_html__( 'Enable or disable pagination', 'gillion' ),
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

	'blog-items' => array(
		'type'  => 'slider',
		'value' => 12,
		'properties' => array(
			'min' => 1,
			'max' => 30,
		),
		'label' => esc_html__('Blog Posts Per Page', 'gillion'),
		'desc'  => esc_html__('Choose how many posts will be disaplayed per page', 'gillion'),
	),

	'blog_tag_cloud' => array(
		'type'  => 'slider',
		'value' => 10,
		'properties' => array(
			'min' => 1,
			'max' => 40,
		),
		'label' => esc_html__('Tag Cloud', 'gillion'),
		'desc'  => esc_html__('Choose blog tag cloud widget limit', 'gillion'),
	),

	'blog_bookmarks' => array(
		'type'  => 'radio',
		'value' => 'style_title',
		'label' => esc_html__('Post Bookmarks', 'gillion'),
		'desc'  => esc_html__('Enable or disable post bookmarks and change its location', 'gillion'),
		'choices' => array(
			'disabled' => esc_html__( 'Disabled', 'gillion' ),
			'style_title' => esc_html__( 'Enabled in title (on hover)', 'gillion' ),
			'style_meta' => esc_html__( 'Enabled in post meta', 'gillion' ),
		),
		'inline' => false,
	),

	'categories-blog-style' => array(
		'type'  => 'radio',
		'value' => 'masonry masonry-shadow',
		'label' => esc_html__( 'Blog Style', 'gillion' ),
		'desc'  => esc_html__( 'Choose blog style for category and main posts pages', 'gillion' ),
		'choices' => array(
			'masonry' => esc_html__( 'Masonry', 'gillion' ),
			'masonry blog-style-masonry-card' => esc_html__( 'Masonry Card', 'gillion' ),
			'grid' => esc_html__( 'Grid', 'gillion' ),
			'left-small' => esc_html__( 'Left', 'gillion' ),
			'left' => esc_html__( 'Left (large)', 'gillion' ),
			'left-right' => esc_html__( 'Left/Right Mix', 'gillion' ),
			'left-right blog-style-left-right-small' => esc_html__( 'Left/Right Mix (small without description)', 'gillion' ),
			'left-right blog-style-left-right-large' => esc_html__( 'Left/Right Mix (large)', 'gillion' ),
			'large' => esc_html__( 'Large (title at the top)', 'gillion' ),
			'large large-title-bellow' => esc_html__( 'Large (title bellow the image)', 'gillion' ),
			'large large-centered' => esc_html__( 'Large (centered)', 'gillion' ),
		),
		'inline' => false,
	),

	'post_switcher_style' => array(
		'type'  => 'radio',
		'value' => 'style1',
		'label' => esc_html__('Post Switch Style', 'gillion'),
		'desc'  => esc_html__('Choose post switcher style', 'gillion'),
		'choices' => array(
			'style1' => esc_html__( 'With image in background', 'gillion' ),
			'style2' => esc_html__( 'Withou background image', 'gillion' ),
		),
		'inline' => false,
	),

	'blockquote_style' => array(
		'type'  => 'radio',
		'value' => 'style1',
		'label' => esc_html__('Blockquote Style', 'gillion'),
		'desc'  => esc_html__('Choose blockquote style', 'gillion'),
		'choices' => array(
			'style1'  => esc_html__( 'Standard with icon in background', 'gillion' ),
			'style2' => esc_html__( 'With icon in left side', 'gillion' ),
		),
		'inline' => false,
	),

	'post_desc' => array(
		'type'  => 'slider',
		'value' => 45,
		'properties' => array(
			'min' => 10,
			'max' => 250,
		),
		'label' => esc_html__('Description Length (Excerpt)', 'gillion'),
		'desc'  => esc_html__('Choose post description preview length', 'gillion'),
	),

	'categories_title' => array(
		'type'  => 'html-full',
		'value' => '',
		'label' => false,
		'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Categories Page Settings', 'gillion').'</span></h3>',
	),


	'categories-page-layout' => array(
		'type'  => 'radio',
		'value' => 'sidebar-right',
		'label' => esc_html__( 'Categories Page Layout', 'gillion' ),
		'desc'  => esc_html__( 'Choose categories page layout', 'gillion' ),
		'choices' => array(
			'default' => esc_html__( 'Default (without sidebar)', 'gillion' ),
			'sidebar-left' => esc_html__( 'Sidebar Left', 'gillion' ),
			'sidebar-right' => esc_html__( 'Sidebar Right', 'gillion' ),
		),
		'inline' => false,
	),


	'post_title' => array(
		'type'  => 'html-full',
		'value' => '',
		'label' => false,
		'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Post Settings', 'gillion').'</span></h3>',
	),

	'post_date_format' => array(
		'type'  => 'radio',
		'value' => 'friendly',
		'label' => esc_html__( 'Post Data Format', 'gillion' ),
		'desc'  => esc_html__( 'Choose post date format', 'gillion' ),
		'choices' => array(
			'standard' => esc_html__( 'Standard (from WordPress settings)', 'gillion' ),
			'friendly' => esc_html__( 'User Friendly (min, hours ago)', 'gillion' ),
		),
		'inline' => false,
	),

	'post_view_count' => array(
		'type'  => 'radio',
		'value' => 'default',
		'label' => esc_html__('Post View Count', 'gillion'),
		'desc'  => esc_html__('Choose post count option', 'gillion'),
		'choices' => array(
			'off' => esc_html__( 'Off', 'gillion' ),
			'default' => esc_html__( 'On (fast, does not work with cache plugins)', 'gillion' ),
			'ajax' => esc_html__( 'On (slow, works with cache plugins)', 'gillion' ),
		),
		'inline' => false,
	),

	'post_layout' => array(
		'type'  => 'radio',
		'value' => 'sidebar-right',
		'label' => esc_html__('Post Layout', 'gillion'),
		'desc'  => esc_html__('Choose post layout', 'gillion'),
		'choices' => array(
			'standard' => esc_html__( 'Standard (without sidebar)', 'gillion' ),
			'standard-mini' => esc_html__( 'Standard Mini (without sidebar)', 'gillion' ),
			'sidebar-left' => esc_html__( 'Sidebar Left', 'gillion' ),
			'sidebar-right' => esc_html__( 'Sidebar Right', 'gillion' ),
		),
		'inline' => false,
	),

	'post_style' => array(
		'type'  => 'radio',
		'value' => 'standard',
		'label' => esc_html__( 'Post Style', 'gillion' ),
		'desc'  => esc_html__( 'Choose post style', 'gillion' ),
		'choices' => array(
			'standard' => esc_html__( 'Standard', 'gillion' ),
			'toptitle' => esc_html__( 'Standard (with title in the top)', 'gillion' ),
			'slider'   => esc_html__( 'Slider (will disable titlebar)', 'gillion' ),
		),
		'inline' => false,
	),

	'post_elements' => array(
		'type'  => 'checkboxes',
		'value' => array(
			'date' => true,
			'prev_next' => true,
			'athor_box' => true,
			'share' => true,
			'comments' => true,
		),
		'label' => esc_html__('Post Elements', 'gillion'),
		'desc'  => esc_html__('Select post elements you want to see in blog', 'gillion'),
		'choices' => array(
			'date' => esc_html__('Date', 'gillion'),
			'share' => esc_html__('Share', 'gillion'),
			'prev_next' => esc_html__('Prev/next links', 'gillion'),
			'athor_box' => esc_html__('Author additional information box', 'gillion'),
			'comments' => esc_html__('Comments', 'gillion'),
		),
		'inline' => false,
	),

	'post_meta' => array(
		'type'  => 'radio',
		'value' => 'enabled',
		'label' => esc_html__( 'Post Meta', 'gillion' ),
		'desc'  => esc_html__( 'Choose post style', 'gillion' ),
		'choices' => array(
			'enabled' => esc_html__( 'Enabled', 'gillion' ),
			'enabled_single' => esc_html__( 'Enabled only in single post page ', 'gillion' ),
			'disabled'   => esc_html__( 'Disabled', 'gillion' ),
		),
		'inline' => false,
	),

	'single_related_posts' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Related Posts', 'gillion' ),
		'desc' => esc_html__( 'Enable or disable related posts', 'gillion' ),
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

	'post_desc' => array(
		'type'  => 'slider',
		'value' => 45,
		'properties' => array(
			'min' => 10,
			'max' => 80,
		),
		'label' => esc_html__('Description Lenght', 'gillion'),
		'desc'  => esc_html__('Choose post description preview lenght', 'gillion'),
	),

	'single_image_captions' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Image Captions', 'gillion' ),
		'desc' => esc_html__( 'Enable or disable image captions', 'gillion' ),
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

	'single_image_captions_label' => array(
		'type'  => 'text',
		'label' => esc_html__('Image Captions Label ', 'gillion'),
		'desc'  => esc_html__('Enter image captions label', 'gillion'),
		'value' => '',
	),

);

$options = array(
	'blog' => array(
		'title'	=> esc_html__( 'Blog', 'gillion' ),
		'type'	=> 'tab',
		'icon'	=> 'fa fa-phone',
		'options' => array(
			'blog-box' => array(
				'title'   => esc_html__( 'Blog Settings', 'gillion' ),
				'type'    => 'box',
				'options' => $blog_options
			),
		)
	)
);
