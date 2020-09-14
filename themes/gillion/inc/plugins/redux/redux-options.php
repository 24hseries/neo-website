<?php
/*
** Layout
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'General', 'gillion' ),
    'id'     => 'general',
    'icon'   => 'ti-crown',
    'fields' => array(


        array(
            'id'       => 'global_page_layout',
            'title'    => __( 'Page Layout', 'gillion' ),
            'subtitle' => __( 'Choose main page layout', 'gillion' ),
            'type'     => 'radio',
            'options'  => array(
                'default' => esc_html__( 'Default (without sidebar)', 'gillion' ),
    			'default default-nopadding' => esc_html__( 'Default (without sidebar and extra padding)', 'gillion' ),
    			'default default-content-after-posts' => esc_html__( 'Default Inversed (without sidebar and content at the bottom)', 'gillion' ),
    			'full' => esc_html__( 'Full Width (without sidebar)', 'gillion' ),
    			'sidebar-left' => esc_html__( 'Sidebar Left', 'gillion' ),
    			'sidebar-right' => esc_html__( 'Sidebar Right', 'gillion' ),
            ),
            'default' => 'default'
        ),

        array(
            'id'       => 'categories-page-layout',
            'title'    => __( 'Categories Page Layout', 'gillion' ),
            'subtitle' => __( 'Choose categories page layout', 'gillion' ),
            'type'     => 'radio',
            'options'  => array(
                'default' => esc_html__( 'Default (without sidebar)', 'gillion' ),
    			'sidebar-left' => esc_html__( 'Sidebar Left', 'gillion' ),
    			'sidebar-right' => esc_html__( 'Sidebar Right', 'gillion' ),
            ),
            'default' => 'sidebar-right'
        ),

        array(
            'id'       => 'author-page-layout',
            'title'    => __( 'Author Page Layout', 'gillion' ),
            'subtitle' => __( 'Choose author page layout', 'gillion' ),
            'type'     => 'radio',
            'options'  => array(
                'default' => esc_html__( 'Default (without sidebar)', 'gillion' ),
    			'sidebar-left' => esc_html__( 'Sidebar Left', 'gillion' ),
    			'sidebar-right' => esc_html__( 'Sidebar Right', 'gillion' ),
            ),
            'default' => 'sidebar-right'
        ),

        array(
            'id'       => 'page_layout',
            'title'    => __( 'Boxed Layout', 'gillion' ),
            'subtitle' => __( 'Choose main page layout. Boxed layout will not work together with left header', 'gillion' ),
            'type'     => 'radio',
            'options'  => array(
                'full' => esc_html__('Disabled', 'gillion'),
                'boxed' => esc_html__('Enabled', 'gillion'),
            ),
            'default' => 'full'
        ),

            array(
        		'id' => 'boxed_border_style',
        		'title' => esc_html__( 'Border Style', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose content border style', 'gillion' ),
        		'type' => 'radio',
        		'options' => array(
        			'none' => esc_html__( 'None', 'gillion' ),
        			'shadow' => esc_html__( 'Shadow', 'gillion' ),
        			'line' => esc_html__( 'Line', 'gillion' ),
        		),
        		'default' => 'shadow',
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        	array(
        		'id' => 'boxed_page_background_color',
        		'title' => esc_html__( 'Page Background Color', 'gillion' ),
        		'subtitle' => esc_html__( 'Select page background color, useful for specific page option', 'gillion' ),
        		'type' => 'color',
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        	array(
        		'id' => 'boxed_page_background_image',
        		'title' => esc_html__( 'Page Background Image', 'gillion' ),
        		'subtitle' => esc_html__( 'Select page background image', 'gillion' ),
        		'url' => '1',
        		'type' => 'media',
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        	array(
        		'id' => 'boxed_content_background_color',
        		'title' => esc_html__( 'Content Background Color', 'gillion' ),
        		'subtitle' => esc_html__( 'Select content background color', 'gillion' ),
        		'type' => 'color',
        		'default' => '#ffffff',
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        	array(
        		'id' => 'boxed_specific_pages',
        		'title' => esc_html__( 'Specific Pages Only', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter page and post IDs with comas, for examle: 1,2,3,4,5', 'gillion' ),
        		'type' => 'text',
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        	array(
        		'id' => 'boxed_margin_top',
        		'title' => esc_html__( 'Top margin', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter top margin', 'gillion' ),
        		'type' => 'text',
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        	array(
        		'id' => 'boxed_footer_width',
        		'title' => esc_html__( 'Footer Width', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable full footer width', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'boxed' => esc_html__( 'Boxed', 'gillion' ),
        			'full' => esc_html__( 'Full', 'gillion' ),
        		),
        		'default' => 'boxed',
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        	array(
        		'id' => 'boxed_page_radius',
        		'title' => esc_html__( 'Page Radius', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable page radius', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'0' => 'Off',
        			'8px' => esc_html__( 'On', 'gillion' ),
        		),
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        array(
            'id'       => 'content_width',
            'title'    => __( 'Content Width', 'gillion' ),
            'subtitle' => __( 'Choose content width', 'gillion' ),
            'type'     => 'select',
            'options'  => array(
                '1000' => esc_html__('1000px', 'gillion'),
    			'1100' => esc_html__('1100px', 'gillion'),
    			'1200' => esc_html__('1200px', 'gillion'),
    			'1400' => esc_html__('1400px', 'gillion'),
    			'1600' => esc_html__('1600px', 'gillion'),
            ),
            'default' => '1200'
        ),


    array(
        'id'       => 'backtotop_divider',
        'title'    => '<h2>'.__( 'Back To Top Button', 'gillion' ).'</h2>',
        'type'     => 'raw',
    ),


        array(
            'id'       => 'back_to_top',
            'title'    => __( 'Style', 'gillion' ),
            'subtitle' => __( 'Choose style for "Back to top" button or disable it', 'gillion' ),
            'type'     => 'select',
            'options'  => array(
                'disabled' => esc_html__( 'Disabled', 'gillion' ),
    			'1' => esc_html__( 'Style 1', 'gillion' ),
            ),
            'default' => '1'
        ),

        array(
            'id'       => 'back_to_top_radius',
            'title'    => __( 'Border Radius', 'gillion' ),
            'subtitle' => __( 'Choose style for "Back to top" button or disable it', 'gillion' ),
            'type'     => 'select',
            'options'  => array(
                '0px' => esc_html__( 'None (0px)', 'gillion' ),
    			'8px' => esc_html__( 'Small (8px)', 'gillion' ),
    			'100%' => esc_html__( 'Full (100%)', 'gillion' ),
            ),
            'default' => '8px'
        ),


    array(
        'id'       => 'miscellaneous_divider',
        'title'    => '<h2>'.__( 'Miscellaneous', 'gillion' ).'</h2>',
        'type'     => 'raw',
    ),


        array(
            'id'       => 'enhanced_post_gallery',
            'type'     => 'button_set',
            'title'    => __('Enhanced Post Gallery', 'gillion'),
            'subtitle' => __('Enable or disable enhanced gillion post gallery. Should be disabled for Jetpack carousel to work in posts', 'gillion'),
            'options' => array(
                'off' => esc_html__('Off', 'gillion'),
                'on' => esc_html__('On', 'gillion'),
             ),
            'default' => 'on'
        ),

        array(
            'id'       => 'page_comments',
            'type'     => 'button_set',
            'title'    => __('Comments', 'gillion'),
            'subtitle' => __('Enable or disable post comments and page comments', 'gillion'),
            'options' => array(
                '0' => esc_html__( 'Off', 'gillion'),
                '1' => esc_html__( 'On', 'gillion'),
             ),
            'default' => '1'
        ),

        array(
            'id'       => 'rtl',
            'type'     => 'button_set',
            'title'    => __('RTL Support', 'gillion'),
            'subtitle' => __('Enable or disable RTL (Right to Left) support', 'gillion'),
            'options' => array(
                0 => esc_html__( 'Off', 'gillion'),
                1 => esc_html__( 'On', 'gillion'),
             ),
            'default' => 0
        ),

        array(
            'id'       => 'smooth-scrooling',
            'type'     => 'button_set',
            'title' => esc_html__( 'Smooth Scrolling', 'gillion' ),
    		'subtitle'  => esc_html__( 'Enable or disable smooth scrolling for webkit browers like Chrome', 'gillion' ),
            'options' => array(
                0 => esc_html__( 'Off', 'gillion'),
                1 => esc_html__( 'On', 'gillion'),
             ),
            'default' => 1
        ),

        array(
            'id'       => 'responsive_layout',
            'type'     => 'button_set',
            'title' => esc_html__( 'Responsive Layout', 'gillion' ),
    		'subtitle'  => esc_html__( 'Enable or disable responsive layout for mobile devices', 'gillion' ),
            'options' => array(
                0 => esc_html__( 'Off', 'gillion'),
                1 => esc_html__( 'On', 'gillion'),
             ),
            'default' => 1
        ),

        array(
            'id'       => 'crispy_images',
            'type'     => 'button_set',
            'title' => esc_html__( 'Crispy Images', 'gillion' ),
    		'subtitle'  => esc_html__( 'Enable or disable crispy images effect', 'gillion' ),
            'options' => array(
                0 => esc_html__( 'Off', 'gillion'),
                1 => esc_html__( 'On', 'gillion'),
             ),
            'default' => 0
        ),

        array(
            'id'       => 'white_borders',
            'type'     => 'button_set',
            'title' => esc_html__( 'White Frame', 'gillion' ),
    		'subtitle'  => esc_html__( 'Enable or disable white frame around the page', 'gillion' ),
            'options' => array(
                0 => esc_html__( 'Off', 'gillion'),
                1 => esc_html__( 'On', 'gillion'),
             ),
            'default' => 1
        ),

        array(
            'id'       => 'theme_options_stored',
            'title' => esc_html__('Themes Options Stored In', 'jevelin'),
    	    'subtitle'  => esc_html__('Choose how theme options are stored', 'jevelin'),
            'type'     => 'select',
            'options'  => array(
                'file' => esc_html__( 'Stored in CSS file (inside wp-content/uploads) - faster', 'jevelin' ),
    	        'inline' => esc_html__( 'Generated on fly in HTML HEAD tag as dynamic CSS - slower', 'jevelin' ),
            ),
            'default' => 'file'
        ),

    )
));




/*
** Content
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Content', 'gillion' ),
    'id'     => 'colors',
    'icon'   => 'ti-panel',
    'fields' => array(

        array(
            'id'       => 'border_radius_images',
            'title'    => __( 'Images Border Radius', 'gillion' ),
            'subtitle' => __( 'Enable or disable image border radius', 'gillion' ),
            'type'     => 'radio',
            'options'  => array(
                'disabled' => esc_html__( 'Disabled', 'gillion' ),
                'enabled' => esc_html__( 'Enabled', 'gillion' ),
            ),
            'default' => 'enabled',
        ),

    array(
        'id'       => 'titles_tabs_divider',
        'title'    => '<h2>'.__( 'Titles & Tabs', 'gillion' ).'</h2>',
        'type'     => 'raw',
    ),

        array(
            'id'       => 'global_title',
            'title' => esc_html__( 'Title Style', 'gillion' ),
            'subtitle'  => esc_html__( 'Choose global section title style', 'gillion' ),
            'type'     => 'radio',
            'options'  => array(
                'style1' => esc_html__( 'Line in middle', 'gillion' ),
    			'style2' => esc_html__( 'Line under title', 'gillion' ),
            ),
            'default' => 'style1',
        ),

        array(
            'id'       => 'global_title_transform',
            'title' => esc_html__( 'Title Transform', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose section title transform', 'gillion' ),
            'type'     => 'select',
            'options'  => array(
                'none' => esc_html__( 'None', 'gillion' ),
    			'uppercase' => esc_html__( 'Uppercase (transforms all characters to uppercase)', 'gillion' ),
    			'lowercase' => esc_html__( 'Lowercase (transforms all characters to lowercase)', 'gillion' ),
    			'capitalize' => esc_html__( 'Capitalize (transforms the first character of each word to uppercase)', 'gillion' ),
            ),
            'default' => 'none'
        ),

        array(
            'id' => 'global_tabs_transform',
    		'title' => esc_html__( 'Title Tabs Transform', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose section title tabs transform', 'gillion' ),
    		'type'  => 'select',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'gillion' ),
    			'none' => esc_html__( 'None', 'gillion' ),
    			'uppercase' => esc_html__( 'Uppercase (transforms all characters to uppercase)', 'gillion' ),
    			'lowercase' => esc_html__( 'Lowercase (transforms all characters to lowercase)', 'gillion' ),
    			'capitalize' => esc_html__( 'Capitalize (transforms the first character of each word to uppercase)', 'gillion' ),
            ),
            'default' => 'default',
    	),

    	array(
            'id' => 'global_title_weight',
    		'title' => esc_html__( 'Title Font Weight', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose section title weight', 'gillion' ),
    		'type'  => 'select',
    		'options' => array(
    			'default' => esc_html__( 'Default (from heading settings)', 'gillion' ),
    			'100' => esc_html__( '100 - Extra Light', 'gillion' ),
    			'300' => esc_html__( '300 - Light', 'gillion' ),
    			'400' => esc_html__( '400 - Regular', 'gillion' ),
    			'600' => esc_html__( '600 - SemiBold', 'gillion' ),
    			'700' => esc_html__( '700 - Bold', 'gillion' ),
    			'800' => esc_html__( '800 - Extra Bold', 'gillion' ),
    			'900' => esc_html__( '900 - Black', 'gillion' ),
            ),
            'default' => 'default',
    	),

        array(
            'id' => 'global_title_font_size',
    		'type'  => 'text',
    		'title' => esc_html__('Title Font Size', 'gillion'),
    		'subtitle'  => wp_kses_post( __( 'Enter section title font size (with <b>px</b>)', 'gillion' ) ),
    	),

        array(
            'id' => 'global_section_tabs',
            'type'  => 'radio',
            'default' => 'default',
            'title' => esc_html__( 'Tabs Style', 'gillion' ),
            'subtitle'  => esc_html__( 'Choose global section tabs style', 'gillion' ),
            'options' => array(
    			'default' => esc_html__( 'Default', 'gillion' ),
    			'style1' => esc_html__( 'With background color for active item', 'gillion' ),
    			'style2' => esc_html__( 'Simple with bold for active item', 'gillion' ),
    			'style3' => esc_html__( 'With border line and shadow for active item', 'gillion' ),
            ),
        ),

    array(
        'id'       => 'carousels_divider',
        'title'    => '<h2>'.__( 'Carousels', 'gillion' ).'</h2>',
        'type'     => 'raw',
    ),

        array(
            'id' => 'global_carousel_buttons',
            'title' => esc_html__( 'Buttons Style', 'gillion' ),
            'subtitle'  => esc_html__( 'Choose global carousel buttons style', 'gillion' ),
            'type'  => 'radio',
            'options' => array(
                'style1' => esc_html__( '2 round circles with arrows', 'gillion' ),
                'style2' => esc_html__( '1 round box with arrows', 'gillion' ),
            ),
            'default' => 'style1',
        ),

        array(
            'id' => 'global_carousel_buttons_position',
            'title' => esc_html__( 'Buttons Position in Widgets', 'gillion' ),
            'subtitle'  => esc_html__( 'Choose global carousel position in widgets', 'gillion' ),
            'type'  => 'radio',
            'options' => array(
                'title' => esc_html__( 'In title', 'gillion' ),
                'bottom' => esc_html__( 'Below content', 'gillion' ),
            ),
            'default' => 'title',
        ),

    array(
        'id'       => 'reviews_divider',
        'title'    => '<h2>'.__( 'Reviews', 'gillion' ).'</h2>',
        'type'     => 'raw',
    ),

        array(
            'id' => 'global_review',
            'title' => esc_html__( 'Icon Style', 'gillion' ),
            'subtitle'  => esc_html__( 'Choose global review icon style', 'gillion' ),
            'type'  => 'radio',
            'options' => array(
    			'style1' => esc_html__( 'Standard', 'gillion' ),
    			'style2' => esc_html__( 'Transparent', 'gillion' ),
            ),
            'default' => 'style1',
        ),

    array(
        'id'       => 'slider_gallery_icon_divider',
        'title'    => '<h2>'.__( 'Slider/Gallery Icon', 'gillion' ).'</h2>',
        'type'     => 'raw',
    ),

        array(
            'id' => 'global_slider_icon_style',
            'title' => esc_html__( 'Style', 'gillion' ),
            'subtitle'  => esc_html__( 'Choose post categories style', 'gillion' ),
            'type'  => 'radio',
            'options' => array(
    			'style1' => esc_html__('Bullets in circle', 'gillion'),
    			'style2' => esc_html__('Bullets without circle', 'gillion'),
            ),
            'default' => 'title',
        ),

    array(
        'id'       => 'instagram_widgets_divider',
        'title'    => '<h2>'.__( 'Instagram Widgets', 'gillion' ).'</h2>',
        'type'     => 'raw',
    ),

        array(
            'id' => 'global_instagram_widget_columns',
            'title' => esc_html__( 'Image Columns', 'gillion' ),
            'subtitle'  => esc_html__( 'Choose global Instagram widget image columns in sidebar', 'gillion' ),
            'type'  => 'radio',
            'options' => array(
    			'columns2' => esc_html__( '2 columns ', 'gillion' ),
    			'columns3' => esc_html__( '3 columns', 'gillion' ),
            ),
            'default' => 'columns2',
        ),

    	array(
            'id' => 'global_instagram_widget_button',
    		'title' => esc_html__( 'Button', 'gillion' ),
    		'subtitle'  => esc_html__( 'Enable or disable instagram widget button in sidebar', 'gillion' ),
    		'type'  => 'button_set',

    		'left-choice' => array(
    			'default' => 'off',
    			'title' => esc_html__('Off', 'gillion'),
    		),
    		'right-choice' => array(
    			'default' => 'on',
    			'title' => esc_html__('On', 'gillion'),
    		),
    		'default' => 'off',
    	),

        array(
            'id' => 'global_instagram_widget_button',
            'type'     => 'button_set',
    		'title' => esc_html__( 'Button', 'gillion' ),
    		'subtitle'  => esc_html__( 'Enable or disable instagram widget button in sidebar', 'gillion' ),
            'options' => array(
                'off' => esc_html__( 'Off', 'gillion'),
                'on' => esc_html__( 'On', 'gillion'),
             ),
            'default' => 'on'
        ),

    )
));




/*
** Styling
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Styling', 'gillion' ),
    'id'     => 'styling',
    'icon'   => 'ti-palette',
    'fields' => array(

        array(
            'id'    => 'styling_body_background',
    		'type'  => 'color',
    		'title' => esc_html__( 'Background Color', 'gillion' ),
    		'subtitle'  => esc_html__( 'Select body background color', 'gillion' ),
            'default' => '#ffffff',
    	),

    	array(
            'id'    => 'accent_color',
    		'type'  => 'color',
    		'title' => esc_html__( 'Accent Color', 'gillion' ),
    		'subtitle'  => esc_html__( 'Select page accent color', 'gillion' ),
    		'default' => '#f63a4c',
    	),

    	array(
            'id'    => 'accent_hover_color',
    		'type'  => 'color',
    		'title' => esc_html__('Accent Hover Color', 'gillion'),
    		'subtitle'  => esc_html__('Select page accent color on hover', 'gillion'),
            'default' => '#dd3562'
    	),

    	array(
            'id'    => 'link_color',
    		'type'  => 'color',
    		'title' => esc_html__( 'Link Color', 'gillion' ),
    		'subtitle'  => esc_html__( 'Select page link color', 'gillion' ),
            'default' => '#2b2b2b',
    	),

    	array(
            'id'    => 'link_hover_color',
    		'type'  => 'color',
    		'title' => esc_html__( 'Link Hover Color', 'gillion' ),
    		'subtitle'  => esc_html__( 'Select page link color on hover', 'gillion' ),
    		'default' => '#1c1c1c',
    	),

    	array(
            'id'    => 'styling_meta_color',
    		'type'  => 'color',
    		'title' => esc_html__( 'Meta Color', 'gillion' ),
    		'subtitle'  => esc_html__( 'Select meta information color (author, date added, comments count)', 'gillion' ),
    		'default' => '#8d8d8d',
    	),

    array(
        'id'       => 'categories_divider',
        'title'    => '<h2>'.__( 'Categories', 'gillion' ).'</h2>',
        'type'     => 'raw',
    ),

        array(
            'id'    => 'styling_meta_categories_color',
    		'type'  => 'color',
    		'title' => esc_html__('Text Color', 'gillion'),
    		'subtitle'  => esc_html__('Select meta categories color', 'gillion'),
    		'default' => '#d79c6a',
    	),

    	array(
            'id'    => 'styling_meta_categories_hover_color',
    		'type'  => 'color',
    		'title' => esc_html__('Text Hover Color', 'gillion'),
    		'subtitle'  => esc_html__('Select meta categories hover color', 'gillion'),
    		'default' => '#d68a46',

    	),

    	array(
            'id'    => 'styling_meta_categories_slider_color',
    		'type'  => 'color_rgba',
    		'title' => esc_html__('Text Color (Inside Slider)', 'gillion'),
    		'subtitle'  => esc_html__('Select meta categories color in slider', 'gillion'),
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
            'id'    => 'styling_meta_categories_slider_hover_color',
    		'type'  => 'color_rgba',
    		'title' => esc_html__('Text Hover Color (Inside Slider)', 'gillion'),
    		'subtitle'  => esc_html__('Select meta categories hover color in slider', 'gillion'),
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    array(
        'id'       => 'fonts_divider',
        'title'    => '<h2>'.__( 'Fonts', 'gillion' ).'</h2>',
        'type'     => 'raw',
    ),

        array(
            'id'       => 'styling_body',
            'title' => esc_html__('Body', 'gillion'),
    		'subtitle'  => esc_html__('Choose body/paragraph font settings', 'gillion'),
            'type'     => 'typography',
            'google'   => true,
            'default'  => array(
                'color' => '#616161',
                'font-size'   => '14px',
                'font-family' => 'Open Sans',
                'font-weight' => '400',
            ),
            'text-align' => false,
            'letter-spacing' => true,
            'line-height' => true,
            'subsets' => false,
        ),

        array(
            'id'    => 'styling_headings',
            'title' => esc_html__('Headings', 'gillion'),
    		'subtitle'  => esc_html__('Choose font settings for all headings', 'gillion'),
            'type'     => 'typography',
            'google'   => true,
            'default'  => array(
                'color' => '#2b2b2b',
                'font-family' => 'Montserrat',
                'font-weight' => '700',
            ),
            'font-size' => false,
            'text-align' => false,
            'letter-spacing' => false,
            'line-height' => false,
            'subsets' => false,
        ),

        array(
            'id'    => 'categories_font',
            'title' => esc_html__('Meta Categories', 'gillion'),
    		'subtitle'  => esc_html__('Choose font for meta categories', 'gillion'),
            'type'     => 'typography',
            'google'   => true,
            'default'  => array(
                'font-family' => 'Montserrat',
                'font-weight' => '700',
            ),
            'color' => false,
            'font-size' => false,
            'text-align' => false,
            'letter-spacing' => false,
            'line-height' => false,
            'subsets' => false,
        ),

        array(
            'id'    => 'additional_font',
            'title' => esc_html__('Additional Font', 'gillion'),
    		'subtitle'  => esc_html__('Choose additional font (can be used for other options)', 'gillion'),
            'type'     => 'typography',
            'google'   => true,
            'default'  => array(
                'font-family' => 'Montserrat',
                'font-weight' => '700',
            ),
            'color' => false,
            'font-size' => false,
            'text-align' => false,
            'letter-spacing' => false,
            'line-height' => false,
            'subsets' => false,
        ),

    	array(
            'id'    => 'accent_element_font',
    		'title' => esc_html__('Accent Elements', 'gillion'),
    		'subtitle'  => esc_html__('Choose accent element font', 'gillion'),
    		'type'  => 'select',
    		'options' => array(
    			'heading' => esc_html__( 'Heading (default)', 'gillion' ),
    			'body' => esc_html__( 'Body', 'gillion' ),
    			'meta' => esc_html__( 'Meta Categories', 'gillion' ),
    		),
    		'default' => 'heading',
    	),

    	array(
            'id'    => 'post_title_font',
    		'title' => esc_html__('Post Title Font', 'gillion'),
    		'subtitle'  => esc_html__('Choose post title font', 'gillion'),
    		'type'  => 'select',
    		'options' => array(
    			'heading' => esc_html__( 'Heading (default)', 'gillion' ),
    			'body' => esc_html__( 'Body', 'gillion' ),
    			'meta' => esc_html__( 'Meta Categories', 'gillion' ),
    			'additional' => esc_html__( 'Additional Font', 'gillion' ),
    		),
    		'default' => 'heading',
    	),

    	array(
            'id'    => 'meta_font',
    		'title' => esc_html__('Post Meta Font', 'gillion'),
    		'subtitle'  => esc_html__('Choose post meta font for author, comments count, read time etc', 'gillion'),
    		'type'  => 'select',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'gillion' ),
    			'heading' => esc_html__( 'Heading', 'gillion' ),
    			'body' => esc_html__( 'Body', 'gillion' ),
    			'meta' => esc_html__( 'Meta Categories', 'gillion' ),
    			'additional' => esc_html__( 'Additional Font', 'gillion' ),
    		),
    		'default' => 'default',
    	),

    	array(
            'id'    => 'widget_title_font',
    		'title' => esc_html__('Widget Title Font', 'gillion'),
    		'subtitle'  => esc_html__('Choose widget title font', 'gillion'),
    		'type'  => 'select',
    		'options' => array(
    			'heading' => esc_html__( 'Heading (default)', 'gillion' ),
    			'body' => esc_html__( 'Body', 'gillion' ),
    			'meta' => esc_html__( 'Meta Categories', 'gillion' ),
    			'additional' => esc_html__( 'Additional Font', 'gillion' ),
    		),
    		'default' => 'heading',
    	),

        array(
    		'id' => 'google_fonts_subset',
    		'title' => esc_html__( 'Character Sets', 'gillion' ),
    		'subtitle' => esc_html__( 'Select the character sets you want to use for fonts (will be used only if available)', 'gillion' ),
    		'type' => 'checkbox',
    		'options' => array(
    			'greek' => esc_html__( 'Greek ', 'gillion' ),
    			'greek-ext' => esc_html__( 'Greek Extended', 'gillion' ),
    			'latin' => esc_html__( 'Latin', 'gillion' ),
    			'vietnamese' => esc_html__( 'Vietnamese', 'gillion' ),
    			'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'gillion' ),
    			'latin-ext' => esc_html__( 'Latin Extended', 'gillion' ),
    			'cyrillic' => esc_html__( 'Cyrillic ', 'gillion' ),
    		),
    		'default' => array(
    			'latin' => 1,
    		),
    	),

	array(
		'id' => 'headings_divider',
		'title' => '<h2>' . esc_html__( 'Headings', 'gillion' ) . '</h2>',
		'type' => 'raw',
	),

        array(
    		'id' => 'styling_h1',
    		'title' => esc_html__( 'Heading 1', 'gillion' ),
    		'subtitle' => esc_html__( 'Select heading 1 font size (pixels)', 'gillion' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '30',
    	),

    	array(
    		'id' => 'styling_h2',
    		'title' => esc_html__( 'Heading 2', 'gillion' ),
    		'subtitle' => esc_html__( 'Select heading 2 font size (pixels)', 'gillion' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '24',
    	),

    	array(
    		'id' => 'styling_h3',
    		'title' => esc_html__( 'Heading 3', 'gillion' ),
    		'subtitle' => esc_html__( 'Select heading 3 font size (pixels)', 'gillion' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '21',
    	),

    	array(
    		'id' => 'styling_h4',
    		'title' => esc_html__( 'Heading 4', 'gillion' ),
    		'subtitle' => esc_html__( 'Select heading 4 font size (pixels)', 'gillion' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '18',
    	),

    	array(
    		'id' => 'styling_h5',
    		'title' => esc_html__( 'Heading 5', 'gillion' ),
    		'subtitle' => esc_html__( 'Select heading 5 font size (pixels)', 'gillion' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '16',
    	),

    	array(
    		'id' => 'styling_h6',
    		'title' => esc_html__( 'Heading 6', 'gillion' ),
    		'subtitle' => esc_html__( 'Select heading 6 font size (pixels)', 'gillion' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '14',
    	),

        array(
    		'id' => 'styling_widget_font_weight',
    		'title' => esc_html__( 'Widget Font Weight', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose custom font weight for widget and other secondary page titles', 'gillion' ),
    		'type' => 'select',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'gillion' ),
    			'300' => esc_html__( 'Light', 'gillion' ),
    			'400' => esc_html__( 'Regular', 'gillion' ),
    			'500' => esc_html__( 'Medium', 'gillion' ),
    			'700' => esc_html__( 'Bold', 'gillion' ),
    			'800' => esc_html__( 'Extra Bold', 'gillion' ),
    			'900' => esc_html__( 'Black', 'gillion' ),
    		),
    		'default' => 'default',
    	),

    	array(
    		'id' => 'styling_headings_line',
    		'title' => esc_html__( 'Headings Vertical Accent Line', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable headings vertical accent line', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

	array(
		'id' => 'blog posts_divider',
		'title' => '<h2>' . esc_html__( 'Blog Posts', 'gillion' ) . '</h2>',
		'type' => 'raw',
	),

        array(
            'id' => 'post_title_uppercase',
            'title' => esc_html__( 'Post Title Uppercase (everywhere)', 'gillion' ),
            'subtitle' => esc_html__( 'Enable or disable uppercase post title transformation', 'gillion' ),
            'type' => 'button_set',
            'options' => array(
                '0' => 'Off',
                '1' => esc_html__( 'On', 'gillion' ),
            ),
            'default' => '0'
        ),

        array(
            'id' => 'styling_single_content_size',
            'title' => esc_html__( 'Post Content Size (opened page)', 'gillion' ),
            'subtitle' => esc_html__( 'Select post page content font size (pixels)', 'gillion' ),
            'min' => '10',
            'max' => '30',
            'type' => 'slider',
            'default' => '15',
        ),

        array(
            'id' => 'meta_size',
            'title' => esc_html__( 'Post Meta Size', 'gillion' ),
            'subtitle' => esc_html__( 'Select post meta informaation font size (pixels)', 'gillion' ),
            'min' => '8',
            'max' => '16',
            'type' => 'slider',
            'default' => '11',
        ),

    array(
        'id' => 'header_divider',
        'title' => '<h2>' . esc_html__( 'Header', 'gillion' ) . '</h2>',
        'type' => 'raw',
    ),

        array(
            'id' => 'header_background_color',
            'title' => esc_html__( 'Background Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select header background color', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#ffffff'
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

        array(
            'id' => 'header_background_image',
            'title' => esc_html__( 'Background Image', 'gillion' ),
            'subtitle' => esc_html__( 'Upload a header background image', 'gillion' ),
            'type' => 'media',
            'url' => '1',
        ),

        array(
            'id' => 'header_text_color',
            'title' => esc_html__( 'Text Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select header text color', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#8d8d8d'
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

        array(
            'id' => 'header_border_color',
            'title' => esc_html__( 'Border Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select header border color', 'gillion' ),
            //'default' => 'rgba( 0,0,0,0.08 )',
            'type' => 'color_rgba',
            'default' => [
                'color' => '#000000',
                'alpha' => '0.08',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

    array(
        'id' => 'navigation_divider',
        'title' => '<h2>' . esc_html__( 'Navigation', 'gillion' ) . '</h2>',
        'type' => 'raw',
    ),

        array(
            'id' => 'header_nav_size',
            'title' => esc_html__( 'Font Size', 'gillion' ),
            'subtitle' => esc_html__( 'Enter your navigation size (in px)', 'gillion' ),
            'type' => 'text',
            'default' => '12px',
        ),

        array(
            'id' => 'header_uppercase',
            'title' => esc_html__( 'Text Uppercase', 'gillion' ),
            'subtitle' => esc_html__( 'Enable or disable uppercase navigation text transformation', 'gillion' ),
            'type' => 'button_set',
            'options' => array(
                '0' => esc_html__( 'Off', 'gillion' ),
                '1' => esc_html__( 'On', 'gillion' ),
            ),
            'default' => '1',
        ),

        array(
            'id' => 'header_nav_color',
            'title' => esc_html__( 'Text Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select navigation color', 'gillion' ),
            'type' => 'color',
            'default' => 'rgba(61,61,61,0.69)',
        ),

        array(
            'id' => 'header_nav_hover_color',
            'title' => esc_html__( 'Text Hover Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select navigation color on hover', 'gillion' ),
            'type' => 'color',
            'default' => 'rgba(61,61,61,0.80)',
        ),

        array(
            'id' => 'header_nav_active_color',
            'title' => esc_html__( 'Active Text Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select active navigation color', 'gillion' ),
            'type' => 'color',
            'default' => '#505050',
        ),

        array(
            'id' => 'header_nav_active_line_color',
            'title' => esc_html__( 'Active Text Bottom Line Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select active bottom line color', 'gillion' ),
            'type' => 'color',
        ),

        array(
            'id' => 'header_nav_icon_color',
            'title' => esc_html__( 'Active Icon Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select navigation icons color', 'gillion' ),
            'type' => 'color',
            'default' => '#b5b5b5',
        ),

        array(
            'id' => 'header_nav_icon_hover_color',
            'title' => esc_html__( 'Active Icon Hover Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select navigation icons hover color', 'gillion' ),
            'type' => 'color',
            'default' => '#8d8d8d',
        ),

        array(
            'id' => 'header_nav_active_background_color',
            'title' => esc_html__( 'Background Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select active navigation background color (optional)', 'gillion' ),
            'type' => 'color_rgba',
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

    array(
        'id' => 'navigation mobile_divider',
        'title' => '<h2>' . esc_html__( 'Navigation Mobile', 'gillion' ) . '</h2>',
        'type' => 'raw',
    ),

        array(
            'id' => 'header_mobile_nav_size',
            'title' => esc_html__( 'Font Size', 'gillion' ),
            'subtitle' => esc_html__( 'Enter your navigation size (in px)', 'gillion' ),
            'type' => 'text',
            'default' => '13px',
        ),

        array(
            'id' => 'header_mobile_uppercase',
            'title' => esc_html__( 'Text Uppercase', 'gillion' ),
            'subtitle' => esc_html__( 'Enable or disable uppercase navigation text transformation for mobile header', 'gillion' ),
            'type' => 'button_set',
            'options' => array(
                '0' => 'Off',
                '1' => esc_html__( 'On', 'gillion' ),
            ),
        ),

    array(
        'id' => 'dropdown/menu_divider',
        'title' => '<h2>' . esc_html__( 'Dropdown/Menu', 'gillion' ) . '</h2>',
        'type' => 'raw',
    ),

        array(
            'id' => 'menu_background_color',
            'title' => esc_html__( 'Background Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select menu background color', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#ffffff',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

        array(
            'id' => 'menu_font_size',
            'title' => esc_html__( 'Font Size', 'gillion' ),
            'subtitle' => esc_html__( 'Enter your menu font size (in px)', 'gillion' ),
            'type' => 'text',
            'default' => '13px',
        ),

        array(
            'id' => 'menu_link_color',
            'title' => esc_html__( 'Link Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select menu link color', 'gillion' ),
            'type' => 'color',
            'default' => '#8d8d8d',
        ),

        array(
            'id' => 'menu_link_hover_color',
            'title' => esc_html__( 'Link Hover and Active Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select menu link hover and active color', 'gillion' ),
            'type' => 'color',
            'default' => '#505050',
        ),

        array(
            'id' => 'menu_link_border_color',
            'title' => esc_html__( 'Link Border Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select menu link border color', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#eaeaea',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

    array(
        'id' => 'sidebar_divider',
        'title' => '<h2>' . esc_html__( 'Sidebar', 'gillion' ) . '</h2>',
        'type' => 'raw',
    ),

        array(
            'id' => 'sidebar_headings',
            'title' => esc_html__( 'Headings', 'gillion' ),
            'subtitle' => esc_html__( 'Choose default sidebar heading font settings', 'gillion' ),
            'type' => 'typography',
            'default' => array(
                'font-size' => '18px',
                'color' => '#505050',
            ),
            'color' => true,
            'font-size' => true,
            'font-family' => false,
            'font-style' => false,
            'font-weight' => false,
            'text-align' => false,
            'letter-spacing' => false,
            'line-height' => false,
            'subsets' => false,
        ),

        array(
            'id' => 'sidebar_border_color',
            'title' => esc_html__( 'Border Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select sidebar border color', 'gillion' ),
            'type' => 'color',
            'default' => '#f0f0f0',
        ),

    array(
        'id' => 'footer_divider',
        'title' => '<h2>' . esc_html__( 'Footer', 'gillion' ) . '</h2>',
        'type' => 'raw',
    ),

        array(
            'id' => 'footer_background_image',
            'title' => esc_html__( 'Background Image', 'gillion' ),
            'subtitle' => esc_html__( 'Upload a footer widgets background image. Note: Image will appear only when background color transparency will be set', 'gillion' ),
            'type' => 'media',
            'url' => '1',
        ),

        array(
            'id' => 'footer_widgets_bottom_border_color',
            'title' => esc_html__( 'Widgets Footer Top Border Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select footers top border color', 'gillion' ),
            'type' => 'color_rgba',
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

        array(
            'id' => 'footer_bottom_border_color',
            'title' => esc_html__( 'Copyright Footer Top Border Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select footers top border color', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#2c2c2c',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

    array(
        'id' => 'widgets footer_divider',
        'title' => '<h2>' . esc_html__( 'Widgets Footer', 'gillion' ) . '</h2>',
        'type' => 'raw',
    ),

        array(
            'id' => 'footer_background_color',
            'title' => esc_html__( 'Background Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select footer background color', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#1e1e1e',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

        array(
            'id' => 'footer_headings',
            'title' => esc_html__( ' Headings', 'gillion' ),
            'subtitle' => esc_html__( 'Choose default footer heading font settings', 'gillion' ),
            'type' => 'typography',
            'default' => array(
                'font-size' => '20px',
                'color' => '#ffffff',
            ),
            'color' => true,
            'font-size' => true,
            'font-family' => false,
            'font-style' => false,
            'font-weight' => false,
            'text-align' => false,
            'letter-spacing' => false,
            'line-height' => false,
            'subsets' => false,
        ),

        array(
            'id' => 'footer_text_color',
            'title' => esc_html__( 'Text Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select footer text color', 'gillion' ),
            'type' => 'color',
            'default' => '#c7c7c7',
        ),

        array(
            'id' => 'footer_link_color',
            'title' => esc_html__( 'Link Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select footer link color', 'gillion' ),
            'type' => 'color',
            'default' => '#ffffff',
        ),

        array(
            'id' => 'footer_hover_color',
            'title' => esc_html__( 'Hover Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select footer color on hover', 'gillion' ),
            'type' => 'color',
            'default' => '#f63a4c',
        ),

        array(
            'id' => 'footer_icon_color',
            'title' => esc_html__( 'Icon Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select footer icon color', 'gillion' ),
            'type' => 'color',
            'default' => '#ffffff',
        ),

        array(
            'id' => 'footer_border_color',
            'title' => esc_html__( 'Border Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select footer border color', 'gillion' ),
            //'default' => 'rgba(255,255,255,0.10)',
            'type' => 'color_rgba',
            'default' => [
                'color' => '#ffffff',
                'alpha' => '0.1',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

        array(
            'id' => 'footer_border_color2',
            'title' => esc_html__( 'Border Color 2', 'gillion' ),
            'subtitle' => esc_html__( 'Select footer border color 2 for section title style - line under title', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#ffffff',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

        array(
            'id' => 'footer_padding',
            'title' => esc_html__( 'Padding', 'gillion' ),
            'subtitle' => esc_html__( 'Change footer padding (top, right, bottom, and left)', 'gillion' ),
            'type' => 'text',
            'default' => '100px 0px 100px 0px',
        ),

    array(
        'id' => 'copyright footer_divider',
        'title' => '<h2>' . esc_html__( 'Copyright Footer', 'gillion' ) . '</h2>',
        'type' => 'raw',
    ),

        array(
            'id' => 'copyright_background_color',
            'title' => esc_html__( 'Background Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select copyright background color', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#1e1e1e',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
        ),

        array(
            'id' => 'copyright_text_color',
            'title' => esc_html__( 'Text Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select copyright text color', 'gillion' ),
            'type' => 'color',
            'default' => '#b4b4b4',
        ),

        array(
            'id' => 'copyright_link_color',
            'title' => esc_html__( 'Link Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select copyright link color', 'gillion' ),
            'type' => 'color',
            'default' => '#ffffff',
        ),

        array(
            'id' => 'copyright_hover_color',
            'title' => esc_html__( 'Link Hover Color', 'gillion' ),
            'subtitle' => esc_html__( 'Select copyright link color on hover', 'gillion' ),
            'type' => 'color',
            'default' => '#b4b4b4',
        ),

    )
));




/*
** Header
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Header', 'gillion' ),
    'id'     => 'header',
    'icon'   => 'ti-flag-alt-2',
    'fields' => array(

        array(
    		'id' => 'logo',
    		'title' => esc_html__( 'Standard Logo', 'gillion' ),
    		'subtitle' => esc_html__( 'Upload a logo image (max height 250px) used in posts, portfolio and other pages', 'gillion' ),
    		'type' => 'media',
    	),

    	array(
    		'id' => 'logo_light',
    		'title' => esc_html__( 'Light Logo Version (optional)', 'gillion' ),
    		'subtitle' => esc_html__( 'Upload a light logo version (max height 250px) used only when light style is activated or is above slide', 'gillion' ),
    		'type' => 'media',
    	),

    	array(
    		'id' => 'logo_sticky',
    		'title' => esc_html__( 'Sticky Header Logo (optional)', 'gillion' ),
    		'subtitle' => esc_html__( 'Upload a sticky logo image (max height 250px) used only when sticky header is activated', 'gillion' ),
    		'type' => 'media',
    	),

        array(
    		'id' => 'header_logo_sizes',
    		'title' => esc_html__( 'Custom Logo Sizes', 'gillion' ),
    		'subtitle' => esc_html__( 'Switch between original and manual header logo sizing', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'orginal' => esc_html__( 'Original', 'gillion' ),
    			'manual' => esc_html__( 'Manual', 'gillion' ),
    		),
    		'default' => 'orginal',
    	),

        	array(
        		'id' => 'standard_height',
        		'title' => esc_html__( 'Logo Height', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose header logo height size', 'gillion' ),
        		'min' => '20',
        		'max' => '250',
        		'step' => '1',
        		'resolution' => '',
        		'type' => 'slider',
        		'default' => '50',
                'required' => [ 'header_logo_sizes', '=', 'manual' ],
        	),

        	array(
        		'id' => 'sticky_height',
        		'title' => esc_html__( 'Sticky Logo Height', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose sticky logo height size', 'gillion' ),
        		'min' => '20',
        		'max' => '250',
        		'step' => '1',
        		'resolution' => '',
        		'type' => 'slider',
        		'default' => '40',
                'required' => [ 'header_logo_sizes', '=', 'manual' ],
        	),

        	array(
        		'id' => 'responsive_height',
        		'title' => esc_html__( 'Responsive Logo Height', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose responsive logo height size', 'gillion' ),
        		'min' => '20',
        		'max' => '250',
        		'step' => '1',
        		'resolution' => '',
        		'type' => 'slider',
        		'default' => '30',
                'required' => [ 'header_logo_sizes', '=', 'manual' ],
        	),

    	array(
    		'id' => 'content above header_divider',
    		'title' => '<h2>' . esc_html__( 'Content Above Header', 'gillion' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'header_top_template',
    		'title' => esc_html__( 'Content Above Header', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose WPBakery page builder created page template and add any information above the header you like', 'gillion' ),
    		'type' => 'select',
            'options' => gillion_get_page_templates( 'disabled' ),
    		'default' => 'disabled',
    	),

    	array(
    		'id' => 'header settings_divider',
    		'title' => '<h2>' . esc_html__( 'Header Settings', 'gillion' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'header_layout',
    		'title' => esc_html__( 'Layout', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose main header layout', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'2' => esc_html__( 'Standard', 'gillion' ),
    			'1' => esc_html__( 'Menu center', 'gillion' ),
    			'4' => esc_html__( 'Logo/menu center (icons in menu area)', 'gillion' ),
    			'5' => esc_html__( 'Logo/menu center (icons in logo area)', 'gillion' ),
    			'3' => esc_html__( 'With ad place', 'gillion' ),
    			'6' => esc_html__( 'Logo With Background / Navigation at bottom', 'gillion' ),
    		),
    		'default' => '2',
    	),

    	array(
    		'id' => 'header_width',
    		'title' => esc_html__( 'Width', 'gillion' ),
    		'subtitle' => esc_html__( 'Select header width', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'default' => esc_html__( 'Standard (1200px wide)', 'gillion' ),
    			'full' => esc_html__( 'Full (92% wide)', 'gillion' ),
    		),
    		'default' => 'default',
    	),

    	array(
    		'id' => 'header_additional_padding',
    		'title' => esc_html__( 'Additional Padding', 'gillion' ),
    		'subtitle' => esc_html__( 'Add additional padding around non-sticky header (top right bottom left). For example: 30px 0px 30px 0px', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'ipad_landscape_full_navigation',
    		'title' => esc_html__( 'iPad Landscape Navigation', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable iPad landscape to use desktop navigation (experimental feature)', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
            'default' => '0'
    	),

    	array(
    		'id' => 'header_sticky',
    		'title' => esc_html__( 'Sticky Header', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable sticky header', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '1',
    	),

        array(
    		'id' => 'header_mobile_sticky',
    		'title' => esc_html__( 'Sticky Mobile Header', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable sticky mobile header', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '0',
    	),

    	array(
    		'id' => 'header_elements',
    		'title' => esc_html__( 'Elements', 'gillion' ),
    		'subtitle' => esc_html__( 'Select header elements you want to see', 'gillion' ),
    		'type' => 'checkbox',
    		'options' => array(
    			'search' => esc_html__( 'Search', 'gillion' ),
    			'login' => esc_html__( 'Login/register button (button in topbar)', 'gillion' ),
    			'login_icon' => esc_html__( 'Login/tegister button (icon next to navigation)', 'gillion' ),
    			'sidemenu' => esc_html__( 'Side menu', 'gillion' ),
    			'social' => esc_html__( 'Social media (topbar)', 'gillion' ),
    			'social_mobile' => esc_html__( 'Social media (mobile)', 'gillion' ),
    		),
    		'default' => array(
    			'social' => 1,
    			'social_mobile' => 1,
    			'search' => 1,
    			'login' => 1,
    			'sidemenu' => 1,
    		),
    	),

    	array(
    		'id' => 'header_elements_social_share',
    		'title' => esc_html__( 'Elements - Social Media (header)', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable social media icons in header', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'header_elements_shop',
    		'title' => esc_html__( 'Elements - WooCommerce Cart Icon', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable WooCommerce cart icon in header', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'header_elements_shop_wishlist',
    		'title' => esc_html__( 'Elements - WooCommerce Wishlist', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable WooCommerce wishlist icon in header', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'header_side_menu_icon',
    		'title' => esc_html__( 'Side Menu Icon', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose your header side menu icon', 'gillion' ),
    		//'type' => 'icon',
    		//'set' => 'gillion-icons',
            'type' => 'select',
    		'options' => array(
    			'icon-energy' => 'Energy',
    			'icon-menu' => 'Menu',
                'icon-folder' => 'Folder',
                'icon-rocket' => 'Rocket',
                'icon-grid' => 'Grid',
                'icon-bulb' => 'Bulb',
                'icon-info' => 'Info',
                'icon-settings' => 'Settings',
    		),
    		'default' => 'icon-energy',
    	),

    	array(
    		'id' => 'header logo section (for some header styles) and mobile header_divider',
    		'title' => '<h2>' . esc_html__( 'Header Logo Section (for some header styles) and Mobile Header', 'gillion' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'header_logo_background_color',
    		'title' => esc_html__( 'Background Color', 'gillion' ),
    		'subtitle' => esc_html__( 'Select logo section background color', 'gillion' ),
            'type' => 'color_rgba',
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'header_logo_background_image',
    		'title' => esc_html__( 'Background Image', 'gillion' ),
    		'subtitle' => esc_html__( 'Upload a logo section background image', 'gillion' ),
    		'type' => 'media',
    	),

	array(
		'id' => 'header animations_divider',
		'title' => '<h2>' . esc_html__( 'Header Animations', 'gillion' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'header_animation_dropdown_delay',
    		'title' => esc_html__( 'Dropdown Closing Delay', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose header dropdown closing delay speed (seconds)', 'gillion' ),
			'min' => 0,
    		'max' => 4,
            'step' => .1,
			'resolution' => 0.1,
    		'type' => 'slider',
    		'default' => '1',
    	),

    	array(
    		'id' => 'header_animation_dropdown_speed',
    		'title' => esc_html__( 'Dropdown Opening Speed', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose header dropdown opening speed (seconds)', 'gillion' ),
            'min' => 0,
    		'max' => 4,
            'step' => .1,
            'resolution' => 0.1,
    		'type' => 'slider',
    		'default' => '0.3',
    	),

    	array(
    		'id' => 'header_animation_dropdown',
    		'title' => esc_html__( 'Dropdown Animation', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose dropdown animation', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'linear' => esc_html__( 'Linear', 'gillion' ),
    			'easeOutQuint' => esc_html__( 'Fast to slow', 'gillion' ),
    			'easeInExpo' => esc_html__( 'Slow to fast', 'gillion' ),
    			'easeInOutExpo' => esc_html__( 'Slow to fast (2)', 'gillion' ),
    			'easeOutBounce' => esc_html__( 'Bounce', 'gillion' ),
    		),
    		'default' => 'easeOutQuint',
    	),

    )
));





/*
** Topbar
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Header Topbar', 'gillion' ),
    'id'     => 'topbar',
    'icon'   => 'ti-flag-alt',
    'fields' => array(

        array(
    		'id' => 'topbar_status',
    		'title' => esc_html__( 'Topbar', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable header topbar', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'topbar styling_divider',
    		'title' => '<h2>' . esc_html__( 'Topbar Styling', 'gillion' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'header_top_background_color',
    		'title' => esc_html__( 'Background Color', 'gillion' ),
    		'subtitle' => esc_html__( 'Select top bar background color', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#313131',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'header_top_background_image',
    		'title' => esc_html__( 'Background Image', 'gillion' ),
    		'subtitle' => esc_html__( 'Upload a topbar background image', 'gillion' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'header_top_nav_size',
    		'title' => esc_html__( 'Font Size', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your top bar navigation size (in px)', 'gillion' ),
    		'type' => 'text',
    		'default' => '13px',
    	),

    	array(
    		'id' => 'header_top_nav_font_weight',
    		'title' => esc_html__( 'Font Weight', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose custom font weight', 'gillion' ),
    		'type' => 'select',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'gillion' ),
    			'300' => esc_html__( 'Light', 'gillion' ),
    			'400' => esc_html__( 'Regular', 'gillion' ),
    			'500' => esc_html__( 'Medium', 'gillion' ),
    			'700' => esc_html__( 'Bold', 'gillion' ),
    			'800' => esc_html__( 'Extra Bold', 'gillion' ),
    			'900' => esc_html__( 'Black', 'gillion' ),
    		),
    		'default' => 'default',
    	),

    	array(
    		'id' => 'header_top_color',
    		'title' => esc_html__( 'Text Color', 'gillion' ),
    		'subtitle' => esc_html__( 'Select top bar color', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#ffffff',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'header_top_hover_color',
    		'title' => esc_html__( 'Text Hover Color', 'gillion' ),
    		'subtitle' => esc_html__( 'Select top bar hover color', 'gillion' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#b1b1b1',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    )
));






/*
** Titlebar
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Titlebar', 'gillion' ),
    'id'     => 'titlebar',
    'icon'   => 'ti-layout-list-thumb',
    'fields' => array(

        array(
    		'id' => 'titlebar',
    		'title' => esc_html__( 'Titlebar', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable titlebar', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'titlebar_layout',
    		'title' => esc_html__( 'Titlebar Layout', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose titlebar layout', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'side' => esc_html__( 'Side', 'gillion' ),
    			'center' => esc_html__( 'Center', 'gillion' ),
    		),
    		'default' => 'side',
    	),

    	array(
    		'id' => 'titlebar_height',
    		'title' => esc_html__( 'Titlebar Height', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose titlebar height', 'gillion' ),
    		'type' => 'select',
    		'options' => array(
    			'small' => esc_html__( 'Small', 'gillion' ),
    			'medium' => esc_html__( 'Medium', 'gillion' ),
    			'large' => esc_html__( 'Large', 'gillion' ),
    		),
    		'default' => 'small',
    	),

    	array(
    		'id' => 'titlebar_breadcrumbs',
    		'title' => esc_html__( 'Titlebar Breadcrumbs', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable breadcrumbs', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'titlebar_background',
    		'title' => esc_html__( 'Titlebar Background Image', 'gillion' ),
    		'subtitle' => esc_html__( 'Upload a background image for titlebar', 'gillion' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'titlebar_background_parallax',
    		'title' => esc_html__( 'Parallax Background', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable parallax background', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'titlebar-background-color',
    		'title' => esc_html__( 'Titlebar Background Color', 'gillion' ),
    		'subtitle' => esc_html__( 'Select titlebar background color', 'gillion' ),
    		'type' => 'color',
    		'default' => '#fbfbfb',
    	),

    	array(
    		'id' => 'titlebar-title-color',
    		'title' => esc_html__( 'Titlebar Title Color', 'gillion' ),
    		'subtitle' => esc_html__( 'Select titlebar title color', 'gillion' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'titlebar-breadcrumbs-color',
    		'title' => esc_html__( 'Titlebar Breadcrumbs Color', 'gillion' ),
    		'subtitle' => esc_html__( 'Select titlebar breadcrumbs color', 'gillion' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'titlebar-home-title',
    		'title' => esc_html__( 'Home Title', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter main title of home page', 'gillion' ),
    		'type' => 'text',
    		'default' => 'Home',
    	),

    	array(
    		'id' => 'titlebar-post-title',
    		'title' => esc_html__( 'Post Title', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter main title of post pages', 'gillion' ),
    		'type' => 'text',
    		'default' => 'Blog Post',
    	),

    	array(
    		'id' => 'titlebar-readlater-title',
    		'title' => esc_html__( 'Read It Later Page Title', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter read it later page title', 'gillion' ),
    		'type' => 'text',
    		'default' => 'Your read it later bookmarks',
    	),

    	array(
    		'id' => 'titlebar-404-title',
    		'title' => esc_html__( '404 Title', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter main title of 404 page', 'gillion' ),
    		'type' => 'text',
    		'default' => 'Page could not be found',
    	),

    )
));





/*
** Footer
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Footer', 'gillion' ),
    'id'     => 'footer',
    'icon'   => 'ti-anchor',
    'fields' => array(

        array(
    		'id' => 'footer_template',
    		'title' => esc_html__( 'Footer Template', 'gillion' ),
    		'subtitle' => esc_html__( 'Select footer template', 'gillion' ),
    		'type' => 'radio',
    		'default' => 'default',
	        'options' => gillion_get_footers()
    	),

    	array(
    		'id' => 'footer settings_divider',
    		'title' => '<h2>' . esc_html__( 'Footer Settings', 'gillion' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'footer_widgets',
    		'title' => esc_html__( 'Footer Widgets', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable footer widgets', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'footer_width',
    		'title' => esc_html__( 'Footer Width', 'gillion' ),
    		'subtitle' => esc_html__( 'Select footer width', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'gillion' ),
    			'full' => esc_html__( 'Full', 'gillion' ),
    		),
    		'default' => 'default',
    	),

    	array(
    		'id' => 'footer_parallax',
    		'title' => esc_html__( 'Footer Parallax', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable whole footer to act as a parallax element', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'footer instagram settings_divider',
    		'title' => '<h2>' . esc_html__( 'Footer Instagram Settings', 'gillion' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'footer_instagram_widgets',
    		'title' => esc_html__( 'Footer Instagram Section', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable footer Instagram widgets section', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'footer_instagram_title',
    		'title' => esc_html__( 'Footer Instagram Title', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter instagram title above instagram footer widgets', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'copyright footer settings_divider',
    		'title' => '<h2>' . esc_html__( 'Copyright Footer Settings', 'gillion' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'copyright_bar',
    		'title' => esc_html__( 'Copyright Bar', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable copyright bar', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'copyright_logo',
    		'title' => esc_html__( 'Copyright Logo', 'gillion' ),
    		'subtitle' => esc_html__( 'Upload a footer logo image', 'gillion' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'copyright_align',
    		'title' => esc_html__( 'Copyright Alignment', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose main copyright alignment', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'left' => esc_html__( 'Left (logo, copyrights in left and navigation on the right)', 'gillion' ),
    			'left2' => esc_html__( 'Left (logo in left and copyrights, navigation on the right)', 'gillion' ),
    			'center' => esc_html__( 'Center (everything center)', 'gillion' ),
    		),
    		'default' => 'left',
    	),

    	array(
    		'id' => 'copyright_text',
    		'title' => esc_html__( 'Copyright Text', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter some description about copyright for your website', 'gillion' ),
    		'type' => 'editor',
    		'teeny' => '1',
    		'reinit' => '1',
    		'size' => 'large',
    		'editor_height' => '110',
    	),

    	array(
    		'id' => 'copyright_deveveloper',
    		'title' => esc_html__( 'Developer Copyrights', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable theme developers copyright', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'copyright_deveveloper_all',
    		'title' => esc_html__( 'Invisible Developer Copyrights', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable invisible developer copyrights. Say thanks by leaving invisible developer copyrights on', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '1',
    	),

    )
));




/*
** Social Media Icons
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Social Media Icons', 'gillion' ),
    'id'     => 'social-media',
    'icon'   => 'ti-facebook',
    'fields' => array(

        array(
    		'id' => 'social_share',
    		'title' => esc_html__( 'Post Social Share Icons', 'gillion' ),
    		'subtitle' => esc_html__( 'Select social share icons you want to see', 'gillion' ),
    		'type' => 'checkbox',
    		'options' => array(
    			'email' => esc_html__( 'Email', 'gillion' ),
    			'twitter' => esc_html__( 'Twitter', 'gillion' ),
    			'facebook' => esc_html__( 'Facebook', 'gillion' ),
    			'linkedin' => esc_html__( 'Linkedin', 'gillion' ),
    			'pinterest' => esc_html__( 'Pinterest', 'gillion' ),
    			'whatsapp' => esc_html__( 'Whatsapp', 'gillion' ),
    			'viber' => esc_html__( 'Viber', 'gillion' ),
    			'messenger' => esc_html__( 'Messenger', 'gillion' ),
    			'vkontakte' => esc_html__( 'Vkontakte', 'gillion' ),
    			'telegram' => esc_html__( 'Telegram', 'gillion' ),
    			'line' => esc_html__( 'Line', 'gillion' ),
    		),
    		'default' => array(
    			'twitter' => 1,
    			'facebook' => 1,
    			'pinterest' => 1,
    			'messenger' => 1,
    		),
    	),

    	array(
    		'id' => 'social media icons_divider',
    		'title' => '<h2>' . esc_html__( 'Social Media Icons', 'gillion' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'social_newtab',
    		'title' => esc_html__( 'Links in new tab', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable social media link opening in new tab', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'social_twitter',
    		'title' => esc_html__( 'Twitter URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Twitter icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    		'default' => 'https://twitter.com/TheShufflehound',
    	),

    	array(
    		'id' => 'social_facebook',
    		'title' => esc_html__( 'Facebook URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Facebook icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    		'default' => 'https://www.facebook.com/people/@/shufflehound',
    	),

    	array(
    		'id' => 'social_instagram',
    		'title' => esc_html__( 'Instagram URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Instagram icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_youtube',
    		'title' => esc_html__( 'Youtube URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the YouTube icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_pinterest',
    		'title' => esc_html__( 'Pinterest URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Pinterest icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_flickr',
    		'title' => esc_html__( 'Flickr URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Flickr icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_dribbble',
    		'title' => esc_html__( 'Dribbble URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Dribbble icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_linkedIn',
    		'title' => esc_html__( 'LinkedIn URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the LinkedIn icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_skype',
    		'title' => esc_html__( 'Skype Name', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your account name to show the Skype icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_spotify',
    		'title' => esc_html__( 'Spotify', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your account name to show the Spotify icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_soundcloud',
    		'title' => esc_html__( 'SoundCloud', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your account name to show the SoundCloud icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_tumblr',
    		'title' => esc_html__( 'Tumblr URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Tumblr icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_wordpress',
    		'title' => esc_html__( 'WordPress URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the WordPress icon. Leave blank to hide this icon', 'gillion' ),
    		'type' => 'text',
    	),

    )
));




/*
** Blog
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Blog', 'gillion' ),
    'id'     => 'blog',
    'icon'   => 'ti-pencil-alt',
    'fields' => array(

        array(
    		'id' => 'pagination',
    		'title' => esc_html__( 'Pagination', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable pagination', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'blog-items',
    		'title' => esc_html__( 'Posts Per Page', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose how many posts will be displayed per page', 'gillion' ),
    		'min' => '1',
    		'max' => '30',
    		'type' => 'slider',
    		'default' => '12',
    	),

    	array(
    		'id' => 'blog_tag_cloud',
    		'title' => esc_html__( 'Tag Cloud', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose blog tag cloud widget limit', 'gillion' ),
    		'min' => '1',
    		'max' => '40',
    		'type' => 'slider',
    		'default' => '10',
    	),

    	array(
    		'id' => 'blog_bookmarks',
    		'title' => esc_html__( 'Post Bookmarks', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable post bookmarks and change their location', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'disabled' => esc_html__( 'Disabled', 'gillion' ),
    			'style_title' => esc_html__( 'Enabled in title (on hover)', 'gillion' ),
    			'style_meta' => esc_html__( 'Enabled in post meta', 'gillion' ),
    		),
    		'default' => 'style_title',
    	),

    	array(
    		'id' => 'categories-blog-style',
    		'title' => esc_html__( 'Blog Style', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose blog style for category and main posts pages', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'masonry' => esc_html__( 'Masonry', 'gillion' ),
    			'masonry blog-style-masonry-card' => esc_html__( 'Masonry card', 'gillion' ),
    			'grid' => esc_html__( 'Grid', 'gillion' ),
    			'left-small' => esc_html__( 'Left', 'gillion' ),
    			'left' => esc_html__( 'Left (large)', 'gillion' ),
    			'left-right' => esc_html__( 'Left/right mix', 'gillion' ),
    			'left-right blog-style-left-right-small' => esc_html__( 'Left/right mix (small without description)', 'gillion' ),
    			'left-right blog-style-left-right-large' => esc_html__( 'Left/right mix (large)', 'gillion' ),
    			'large' => esc_html__( 'Large (title at the top)', 'gillion' ),
    			'large large-title-bellow' => esc_html__( 'Large (title bellow the image)', 'gillion' ),
    			'large large-centered' => esc_html__( 'Large (centered)', 'gillion' ),
    		),
    		'default' => 'masonry masonry-shadow',
    	),

    	array(
    		'id' => 'post_desc',
    		'title' => esc_html__( 'Description Length', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose post description preview words length (Excerpt)', 'gillion' ),
    		'max' => '200',
    		'type' => 'slider',
    		'default' => '45',
    	),

    	array(
    		'id' => 'global_post_meta_order',
    		'title' => esc_html__( 'Post Meta and Description Order', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose global post meta (information) and description (excerpt) order', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'bottom' => esc_html__( '1. Description 2. Meta data', 'gillion' ),
    			'top' => esc_html__( '1. Meta data 2. Description', 'gillion' ),
    		),
    		'default' => 'bottom',
    	),

	array(
		'id' => 'blog meta details_divider',
		'title' => '<h2>' . esc_html__( 'Blog Meta Details', 'gillion' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'blog_meta_author',
    		'title' => esc_html__( 'Author (without image) + Date', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable meta author (without image) + date in posts where it is used', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'blog_meta_authorfull',
    		'title' => esc_html__( 'Author (with image) + Date', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable meta author (with image) + date in posts where it is used', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'blog_meta_comments',
    		'title' => esc_html__( 'Comments Count', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable meta comments in posts where it is used', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'blog_meta_pageviews',
    		'title' => esc_html__( 'Page Views', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable meta page views in posts where it is used', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'blog_meta_readtime',
    		'title' => esc_html__( 'Read Time', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable read time in posts where it is used', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    )
));




/*
** Post
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Post', 'gillion' ),
    'id'     => 'post',
    'icon'   => 'ti-layout-column3',
    'fields' => array(

        array(
    		'id' => 'post_template',
    		'title' => esc_html__( 'Post Template', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose default post template or template built with WPbakery page builder', 'gillion' ),
    		'type' => 'select',
    		'default' => 'disabled',
	        'options' => gillion_get_page_templates(),
    	),

    	array(
    		'id' => 'post_date_format',
    		'title' => esc_html__( 'Post Date Format', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose post date format', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'standard' => esc_html__( 'Standard (from WordPress settings)', 'gillion' ),
    			'friendly' => esc_html__( 'User Friendly (min, hours ago)', 'gillion' ),
    		),
    		'default' => 'friendly',
    	),

    	array(
    		'id' => 'post_view_count',
    		'title' => esc_html__( 'Post View Count', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose post count option', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'default' => esc_html__( 'On (fast, does not work with cache plugins)', 'gillion' ),
    			'ajax' => esc_html__( 'On (slow, works with cache plugins)', 'gillion' ),
    		),
    		'default' => 'default',
    	),

    	array(
    		'id' => 'post_layout',
    		'title' => esc_html__( 'Post Layout', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose post layout', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'standard' => esc_html__( 'Standard (without sidebar)', 'gillion' ),
    			'standard-mini' => esc_html__( 'Standard mini (without sidebar)', 'gillion' ),
    			'sidebar-left' => esc_html__( 'Sidebar left', 'gillion' ),
    			'sidebar-right' => esc_html__( 'Sidebar right', 'gillion' ),
    		),
    		'default' => 'sidebar-right',
    	),

    	array(
    		'id' => 'post_style',
    		'title' => esc_html__( 'Post Style', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose post style', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'standard' => esc_html__( 'Standard', 'gillion' ),
    			'toptitle' => esc_html__( 'Standard (with title at the top)', 'gillion' ),
    			'slider' => esc_html__( 'Slider (will disable titlebar)', 'gillion' ),
    		),
    		'default' => 'standard',
    	),

    	array(
    		'id' => 'post_elements',
    		'title' => esc_html__( 'Post Elements', 'gillion' ),
    		'subtitle' => esc_html__( 'Select post elements you want to see in blog', 'gillion' ),
    		'type' => 'checkbox',
    		'options' => array(
    			'date' => esc_html__( 'Date', 'gillion' ),
    			'share' => esc_html__( 'Share', 'gillion' ),
    			'prev_next' => esc_html__( 'Prev/Next links', 'gillion' ),
    			'athor_box' => esc_html__( 'Author additional information box', 'gillion' ),
    			'comments' => esc_html__( 'Comments', 'gillion' ),
    		),
    		'default' => array(
    			'date' => 1,
    			'prev_next' => 1,
    			'athor_box' => 1,
    			'share' => 1,
    			'comments' => 1,
    		),
    	),

    	array(
    		'id' => 'post_meta',
    		'title' => esc_html__( 'Post Meta', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose post style', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'enabled' => esc_html__( 'Enabled', 'gillion' ),
    			'enabled_single' => esc_html__( 'Enabled only in single post page ', 'gillion' ),
    			'disabled' => esc_html__( 'Disabled', 'gillion' ),
    		),
    		'default' => 'enabled',
    	),

    	array(
    		'id' => 'blog_meta_single_post',
    		'title' => esc_html__( 'Single Post Meta Data', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose single post meta information (overwrites meta options above)', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'50' => esc_html__( 'Author, Date + Comments + Read time + Page Views', 'gillion' ),
    			'51' => esc_html__( 'Author, Date + Comments + Read time', 'gillion' ),
    			'52' => esc_html__( 'Author, Date + Comments + Page Views', 'gillion' ),
    			'53' => esc_html__( 'Author, Date + Comments', 'gillion' ),
    			'54' => esc_html__( 'Author, Date', 'gillion' ),
    			'55' => esc_html__( 'Author (without image), Date', 'gillion' ),
    			'56' => esc_html__( 'Author (without image), Date + Comments', 'gillion' ),
    			'500' => esc_html__( 'None', 'gillion' ),
    		),
    		'default' => '50',
    	),

    	array(
    		'id' => 'post_switcher_style',
    		'title' => esc_html__( 'Post Switch Style', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose post switcher style', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'style1' => esc_html__( 'With image in background', 'gillion' ),
    			'style2' => esc_html__( 'Without background image', 'gillion' ),
    		),
    		'default' => 'style1',
    	),

    	array(
    		'id' => 'blockquote_style',
    		'title' => esc_html__( 'Blockquote Style', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose blockquote style', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'style1' => esc_html__( 'Standard with icon in background', 'gillion' ),
    			'style2' => esc_html__( 'With icon on the left side', 'gillion' ),
    		),
    		'default' => 'style1',
    	),

    	array(
    		'id' => 'single_related_posts',
    		'title' => esc_html__( 'Related Posts', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable related posts', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'single_image_captions',
    		'title' => esc_html__( 'Image Captions', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable image captions', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'single_image_captions_label',
    		'title' => esc_html__( 'Image Captions Label ', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter image captions label', 'gillion' ),
    		'type' => 'text',
    	),

	array(
		'id' => 'post_categories_divider',
		'title' => '<h2>' . esc_html__( 'Post Categories', 'gillion' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'global_categories',
    		'title' => esc_html__( 'Style', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose global categories style', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'style1' => esc_html__( 'Standard Text', 'gillion' ),
    			'style2' => esc_html__( 'Fancy Button', 'gillion' ),
    			'style3' => esc_html__( 'Fancy Button 2', 'gillion' ),
    		),
    		'default' => 'style1',
    	),

    	array(
    		'id' => 'global_categories_position',
    		'title' => esc_html__( 'Position', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose post categories position', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'title' => esc_html__( 'Above Title ', 'gillion' ),
    			'image' => esc_html__( 'Inside Image', 'gillion' ),
    		),
    		'default' => 'title',
    	),

    )
));




/*
** AMP
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'AMP', 'gillion' ),
    'id'     => 'amp',
    'icon'   => 'ti-bolt',
    'fields' => array(

        array(
    		'id' => 'amp_post_accent_color',
    		'title' => esc_html__( 'Accent Color', 'gillion' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'amp_post_content_color',
    		'title' => esc_html__( 'Content Color', 'gillion' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'amp_post_heading_color',
    		'title' => esc_html__( 'Heading Color', 'gillion' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'amp_post_content_size',
    		'title' => esc_html__( 'Post Content Size', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter post content size with PX', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'amp_logo_size_desktop',
    		'title' => esc_html__( 'Logo Size (desktop)', 'gillion' ),
    		'min' => '1',
    		'max' => '100',
    		'type' => 'slider',
    		'default' => '40',
    	),

    	array(
    		'id' => 'amp_logo_size_mobile',
    		'title' => esc_html__( 'Logo Size (mobile)', 'gillion' ),
    		'min' => '1',
    		'max' => '100',
    		'type' => 'slider',
    		'default' => '22',
    	),

    	array(
    		'id' => 'amp_mode',
    		'title' => esc_html__( 'AMP Mode', 'gillion' ),
    		'subtitle' => esc_html__( 'Advanced: Set to all modes if Standard or Transitional template mode is needed', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'optimised' => esc_html__( 'Optimized mode only', 'gillion' ),
    			'all' => esc_html__( 'All modes', 'gillion' ),
    			'disabled' => esc_html__( 'Disable all Gillion optimizations (not recommended)', 'gillion' ),
    		),
    		'default' => 'optimised',
    	),

    )
));




/*
** Pagination
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Lightbox', 'gillion' ),
    'id'     => 'lightbox',
    'icon'   => 'ti-gallery',
    'fields' => array(

        array(
    		'id' => 'lightbox_transition',
    		'title' => esc_html__( 'Transition', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose lightbox transition', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'none' => esc_html__( 'None', 'gillion' ),
    			'elastic' => esc_html__( 'Elastic', 'gillion' ),
    			'fade' => esc_html__( 'Fade', 'gillion' ),
    			'fadeInline' => esc_html__( 'Fade inline', 'gillion' ),
    		),
    		'default' => 'elastic',
    	),

    	array(
    		'id' => 'lightbox_opacity',
    		'title' => esc_html__( 'Background Opacity', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose lightbox background opacity', 'gillion' ),
    		'min' => '1',
    		'max' => '100',
    		'type' => 'slider',
    		'default' => '88',
    	),

    )
));




/*
** WooCommerce
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'WooCommerce', 'gillion' ),
    'id'     => 'woocommerce',
    'icon'   => 'ti-shopping-cart-full',
    'fields' => array(

        array(
    		'id' => 'wishlist',
    		'title' => esc_html__( 'Wishlist', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable wishlist functionality', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'wc_sort_sale',
    		'title' => esc_html__( 'WooCommerce Sort by Sale', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable opaction to sort by sale', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'wc_columns',
    		'title' => esc_html__( 'WooCommerce Columns', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose WooCommerce product column count', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'2' => esc_html__( '2 columns', 'gillion' ),
    			'3' => esc_html__( '3 columns', 'gillion' ),
    			'4' => esc_html__( '4 columns', 'gillion' ),
    		),
    		'default' => '4',
    	),

    	array(
    		'id' => 'wc_items',
    		'title' => esc_html__( 'Items Per Page', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose WooCommerce products per page', 'gillion' ),
    		'min' => '1',
    		'max' => '40',
    		'type' => 'slider',
    		'default' => '12',
    	),

    	array(
    		'id' => 'wc_related',
    		'title' => esc_html__( 'Related Products', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable "Related Products" in single product page', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'wc_new',
    		'title' => esc_html__( 'New Tag', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable new tag (shows 2 days after publishing)', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'wc_new_duration',
    		'title' => esc_html__( 'New Tag Show Duration', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter duration in days', 'gillion' ),
    		'max' => '100',
    		'type' => 'slider',
    		'default' => '2',
    	),

    	array(
    		'id' => 'wc_sale_percentage',
    		'title' => esc_html__( 'Sale Tag Show Starting Percentage', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable and set starting percentage attribute on sale tag (0 to disable)', 'gillion' ),
    		'max' => '100',
    		'type' => 'slider',
    		'default' => '15',
    	),

    	array(
    		'id' => 'wc_labels',
    		'title' => esc_html__( 'Show Labels', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable to show labels instead of the input placeholder', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => 'off',
    	),

    )
));





/*
** Page Loader
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Page Loader', 'gillion' ),
    'id'     => 'page-loader',
    'icon'   => 'ti-infinite',
    'fields' => array(

        array(
    		'id' => 'page_loader',
    		'title' => esc_html__( 'Enable Page Loader', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose page loader status', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'gillion' ),
    			'on1' => esc_html__( 'On - On every page', 'gillion' ),
    			'on2' => esc_html__( 'On - Only on first load', 'gillion' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'page_loader_style',
    		'title' => esc_html__( 'Page Loader Style', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose page loader style', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'cube-folding' => esc_html__( 'Cube folding', 'gillion' ),
    			'cube-grid' => esc_html__( 'Cube grid', 'gillion' ),
    			'spinner' => esc_html__( 'Dots', 'gillion' ),
    		),
    		'default' => 'cube-folding',
    	),

    	array(
    		'id' => 'page_loader_accent_color',
    		'title' => esc_html__( 'Page Loader Accent Color', 'gillion' ),
    		'subtitle' => esc_html__( 'Select page loader accent color', 'gillion' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'page_loader_background_color',
    		'title' => esc_html__( 'Page Loader Background Color', 'gillion' ),
    		'subtitle' => esc_html__( 'Select page loader background color', 'gillion' ),
    		'type' => 'color',
    		'default' => '#ffffff',
    	),

    )
));



$gillion_get_pages = gillion_get_pages();
$get_page_templates = gillion_get_page_templates();
if( is_array( $get_page_templates ) && isset( $get_page_templates['default'] ) ) :
	unset( $get_page_templates['default'] );
	$gillion_get_pages = array_merge( $gillion_get_pages, $get_page_templates );
endif;
/*
** 404 Page
*/
Redux::setSection( $opt_name, array(
    'title'  => __( '404 Page', 'gillion' ),
    'id'     => 'page-404',
    'icon'   => 'ti-alert',
    'fields' => array(

        array(
    		'id' => '404_status',
    		'title' => esc_html__( 'Enable 404 page', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable 404 page', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => '404_wpbakery_page',
    		'title' => esc_html__( 'Replace with page content', 'gillion' ),
    		'subtitle' => esc_html__( 'Choose any WPbakery page builder page and set it to 404 page', 'gillion' ),
    		'type' => 'select',
    		'default' => 'disabled',
            'options' => $gillion_get_pages,
    	),

    	array(
    		'id' => '404_title',
    		'title' => esc_html__( 'Title', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter 404 page title', 'gillion' ),
    		'type' => 'text',
    		'default' => 'Page not found',
    	),

    	array(
    		'id' => '404_text',
    		'title' => esc_html__( 'Message', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter 404 page message', 'gillion' ),
    		'type' => 'text',
    		'default' => 'OOPS! Page youre looking for doesnt exist. Please use search for help, or go to home page',
    	),

    	array(
    		'id' => '404_image',
    		'title' => esc_html__( 'Image', 'gillion' ),
    		'subtitle' => esc_html__( 'Upload a background image for 404 page', 'gillion' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => '404_background',
    		'title' => esc_html__( 'Background Color', 'gillion' ),
    		'subtitle' => esc_html__( 'Select 404 page background color', 'gillion' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => '404_background2',
    		'title' => esc_html__( 'Background Color 2', 'gillion' ),
    		'subtitle' => esc_html__( 'Select 404 page background color 2 to create a gradient effect', 'gillion' ),
    		'type' => 'color',
    	),

    )
));



/*
** Ads
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Ads', 'gillion' ),
    'id'     => 'ads',
    'icon'   => 'ti-announcement',
    'fields' => array(

        array(
    		'id' => 'header_banner',
    		'title' => esc_html__( 'Header - Banner', 'gillion' ),
    		'subtitle' => esc_html__( 'Upload a header banner', 'gillion' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'header_banner_url',
    		'title' => esc_html__( 'Header - Banner URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your header banner URL', 'gillion' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'header_banner_code',
    		'title' => esc_html__( 'Header - Banner Code', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your header banner code if any. This will replace above set banner image', 'gillion' ),
    		'type' => 'textarea',
    	),

    )
));



/*
** Notice
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Notice', 'gillion' ),
    'id'     => 'notice',
    'icon'   => 'ti-notepad',
    'fields' => array(

        array(
    		'id' => 'notice_status',
    		'title' => esc_html__( 'Notice', 'gillion' ),
    		'subtitle' => esc_html__( 'Enable or disable notice above header', 'gillion' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'gillion' ),
    		),
            'default' => '0',
    	),

    	array(
    		'id' => 'notice_text',
    		'title' => esc_html__( 'Notice Text', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter notice text', 'gillion' ),
    		'type' => 'editor',
    		'default' => 'By using our website, you agree to the use of our cookies.',
    		'teeny' => '1',
    		'reinit' => '1',
    		'size' => 'large',
    		'editor_height' => '110',
    	),

    	array(
    		'id' => 'notice_close',
    		'title' => esc_html__( 'Close Button', 'gillion' ),
    		'subtitle' => esc_html__( 'Select if this notice can be closed', 'gillion' ),
    		'type' => 'radio',
    		'options' => array(
    			'disable' => esc_html__( 'Disable', 'gillion' ),
    			'enable' => esc_html__( 'Enable (remember close action)', 'gillion' ),
    			'enable2' => esc_html__( 'Enable (do not remember close action)', 'gillion' ),
    		),
    		'default' => 'enable',
    	),

    	array(
    		'id' => 'notice_more_url',
    		'title' => esc_html__( 'Learn More URL', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter learn more URL', 'gillion' ),
    		'type' => 'text',
    	),

    )
));





/*
** Custom CSS/JS
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Custom CSS/JS', 'gillion' ),
    'id'     => 'custom-js-css',
    'icon'   => 'ti-reload',
    'fields' => array(

        array(
            'id'       => 'custom_css',
            'type'     => 'ace_editor',
            'title'    => __( 'CSS Code', 'gillion' ),
            'subtitle' => __( 'Paste your CSS code here.', 'gillion' ),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'default'  => "body {\n\t\n}"
        ),

        array(
            'id'       => 'custom_js',
            'type'     => 'ace_editor',
            'title'    => __( 'JavaScript Code', 'gillion' ),
            'subtitle' => __( 'Paste your JS code here.', 'gillion' ),
            'mode'     => 'javascript',
            'theme'    => 'chrome',
            'default'  => "jQuery(document).ready( function($){\n\t\n});"
        ),

        array(
    		'id' => 'google_analytics',
    		'title' => esc_html__( 'Google Analytics ID', 'gillion' ),
    		'subtitle' => esc_html__( 'Enter your Google Analytics ID like UA-XXXXX-Y to enable Google Analytics statistics', 'gillion' ),
    		'type' => 'text',
    	),

    )
));
