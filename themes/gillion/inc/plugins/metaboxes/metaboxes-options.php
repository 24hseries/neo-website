<?php
function sh_metaboxes_options( $id = '' ) {
    // Declare your sections
    $page_sections = $post_sections = [];

    $post_sections[] = array(
        'title'         => __( 'Post', 'gillion' ),
        'icon'          => 'ti-layout-column3',
        'fields'        => array(

            /*
            ** Post Format - Standard
            */
            array(
        		'id' => 'hide-image',
        		'title' => esc_html__( 'Hide Featured Image', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable this if you want to hide featured image inside the blog post', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'0' => 'Off',
        			'1' => esc_html__( 'On', 'gillion' ),
        		),
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-0',
        	),


            /*
            ** Post Format - Gallery
            */
        	array(
        		'id' => 'post-gallery',
        		'title' => esc_html__( 'Gallery', 'gillion' ),
        		'subtitle' => esc_html__( 'Upload images to your gallery', 'gillion' ),
        		'type' => 'gallery',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-gallery',
        	),


            /*
            ** Post Format - Quote
            */
        	array(
        		'id' => 'post-quote',
        		'title' => esc_html__( 'Quote', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter quote', 'gillion' ),
        		'type' => 'textarea',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-quote',
        	),

        	array(
        		'id' => 'post-quote-author',
        		'title' => esc_html__( 'Quote Author', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter quote author', 'gillion' ),
        		'type' => 'text',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-quote',
        	),


            /*
            ** Post Format - Link
            */
        	array(
        		'id' => 'post-url-title',
        		'title' => esc_html__( 'URL Title', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter URL title', 'gillion' ),
        		'type' => 'text',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-link',
        	),

        	array(
        		'id' => 'post-url',
        		'title' => esc_html__( 'URL', 'gillion' ),
        		'subtitle' => esc_html__( 'Dont forget to add http://', 'gillion' ),
        		'type' => 'text',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-link',
        	),


            /*
            ** Post Format - Video
            */
        	array(
        		'id' => 'post-video',
        		'title' => esc_html__( 'Video URL', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter WordPress supported link (like Youtube or Vimeo)', 'gillion' ),
        		'type' => 'text',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-video',
        	),

        	array(
        		'id' => 'post-video-file',
        		'title' => esc_html__( 'Video File URL', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter video file URL (MP4 or WebM)', 'gillion' ),
        		'url' => '1',
        		'type' => 'media',
                'images_only' => false,
        		'help' => 'Please note that not all WordPress installation supports media file upload by default',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-video',
        	),


            /*
            ** Post Format - Audio
            */
        	array(
        		'id' => 'post-audio',
        		'title' => esc_html__( 'Audio URL', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter WordPress supported link (like Soundcloud)', 'gillion' ),
        		'type' => 'text',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-audio',
        	),

        	array(
        		'id' => 'post-audio-file',
        		'title' => esc_html__( 'Audio File URL', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter audio file URL (MP3 or OGG)', 'gillion' ),
        		'url' => '1',
        		'type' => 'media',
                'images_only' => false,
        		'help' => 'Please note that not all WordPress installation supports media file upload by default',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-audio',
        	),




        	array(
        		'id' => 'post-copyrights',
        		'title' => esc_html__( 'Copyrights Text', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter copyrights text for your main featured image, video or media', 'gillion' ),
        		'type' => 'textarea',
        	),

            array(
        		'id' => 'source',
        		'title' => esc_html__( 'Source', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter your source (will appear in single post page)', 'gillion' ),
        		'type' => 'repeater',
        		'fields' => [
                    array(
                        'id' => 'name',
                        'title' => esc_html__( 'Name', 'gillion' ),
                    ),
                    array(
                        'id' => 'url',
                        'title' => esc_html__( 'URL', 'gillion' ),
                    ),
                ],
        		'template' => '{{- name }} ({{- url }})',
        		'limit' => '0',
        		'add-button-text' => 'Add a New Source',
        		'sortable' => '1',
        	),

        	array(
        		'id' => 'via',
        		'title' => esc_html__( 'Via', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter your via (will appear in single post page)', 'gillion' ),
        		'type' => 'repeater',
                'fields' => [
                    array(
                        'id' => 'name',
                        'title' => esc_html__( 'Name', 'gillion' ),
                    ),
                    array(
                        'id' => 'url',
                        'title' => esc_html__( 'URL', 'gillion' ),
                    ),
                ],
        		'template' => '{{- name }} ({{- url }})',
        		'limit' => '0',
        		'add-button-text' => 'Add a New Via',
        		'sortable' => '1',
        	),

        	array(
        		'id' => 'blockquote_style',
        		'title' => esc_html__( 'Blockquote Style', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose blockquote style', 'gillion' ),
        		'type' => 'radio',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme settings)', 'gillion' ),
        			'style1' => esc_html__( 'Standard with icon in background', 'gillion' ),
        			'style2' => esc_html__( 'With icon in left side', 'gillion' ),
        		),
        		'default' => 'default',
        	),

        ),
    );




    $post_sections[] = array(
        'title'         => __( 'Review', 'gillion' ),
        'icon'          => 'ti-star',
        'fields'        => array(

            array(
        		'id' => 'review_score',
        		'title' => esc_html__( 'Review Average Score', 'gillion' ),
        		'subtitle' => esc_html__( 'Add a average score of your review', 'gillion' ),
        		'type' => 'text',
        		'fw-storage' => 'post-meta',
        	),

        	array(
        		'id' => 'review_color',
        		'title' => esc_html__( 'Review Score Color', 'gillion' ),
        		'subtitle' => esc_html__( 'Add custom review color', 'gillion' ),
        		'type' => 'color',
        		'validate' => 'color',
        	),

        	array(
        		'id' => 'review_color2',
        		'title' => esc_html__( 'Review Score Color 2', 'gillion' ),
        		'subtitle' => esc_html__( 'Add custom review second color to create a gradient', 'gillion' ),
        		'type' => 'color',
        		'validate' => 'color',
        	),

        	array(
        		'id' => 'review_pros',
        		'title' => esc_html__( 'Review Pros', 'gillion' ),
        		'subtitle' => esc_html__( 'Add multiple pros', 'gillion' ),
        		'type' => 'multi_text',
        		'add_text' => 'Add pros',
        	),

        	array(
        		'id' => 'review_cons',
        		'title' => esc_html__( 'Review Cons', 'gillion' ),
        		'subtitle' => esc_html__( 'Add multiple cons', 'gillion' ),
        		'type' => 'multi_text',
        		'add_text' => 'Add cons',
        	),

            array(
        		'id' => 'review_criteria',
        		'title' => esc_html__( 'Review Criteria', 'gillion' ),
        		'subtitle' => esc_html__( 'Add multiple review criteria', 'gillion' ),
        		'type' => 'repeater',
                'fields' => [
                    array(
                        'id' => 'name',
                        'title' => esc_html__( 'Name', 'gillion' ),
                    ),
                    array(
                        'id' => 'score',
                        'title' => esc_html__( 'Score (0-10)', 'gillion' ),
                    ),
                ],
        		'add-text' => 'Add a Criteria',
        	),

        	array(
        		'id' => 'review_verdict',
        		'title' => esc_html__( 'Review Final Verdict', 'gillion' ),
        		'subtitle' => esc_html__( 'Add review final verdict', 'gillion' ),
        		'type' => 'textarea',
        	),

        	array(
        		'id' => 'review_layout',
        		'title' => esc_html__( 'Review Box', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose review layout', 'gillion' ),
        		'type' => 'radio',
        		'options' => array(
        			'hidden' => esc_html__( 'Hidden', 'gillion' ),
        			'left' => esc_html__( 'Left', 'gillion' ),
        			'right' => esc_html__( 'Right', 'gillion' ),
        			'full' => esc_html__( 'Full', 'gillion' ),
        			'full bottom' => esc_html__( 'Full (bottom position)', 'gillion' ),
        		),
        		'default' => 'left',
        	),

        ),
    );






    $post_sections[] = array(
        'title'         => __( 'General', 'gillion' ),
        'icon'          => 'ti-crown',
        'fields'        => array(

            array(
        		'id' => 'post_layout',
        		'title' => esc_html__( 'Post Layout', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose post layout', 'gillion' ),
        		'type' => 'radio',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme settings)', 'gillion' ),
        			'standard' => esc_html__( 'Standard (without sidebar)', 'gillion' ),
        			'standard-mini' => esc_html__( 'Standard Mini (without sidebar)', 'gillion' ),
        			'sidebar-left' => esc_html__( 'Sidebar Left', 'gillion' ),
        			'sidebar-right' => esc_html__( 'Sidebar Right', 'gillion' ),
        		),
        		'default' => 'default',
        	),

        	array(
        		'id' => 'post_style',
        		'title' => esc_html__( 'Post Style', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose post style', 'gillion' ),
        		'type' => 'radio',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme settings)', 'gillion' ),
        			'standard' => esc_html__( 'Standard', 'gillion' ),
        			'toptitle' => esc_html__( 'Standard (with title in the top)', 'gillion' ),
        			'slider' => esc_html__( 'Slider (will disable titlebar)', 'gillion' ),
        		),
        		'default' => 'default',
        	),

        ),
    );







    $page_sections[] = array(
        'title'         => __( 'General', 'gillion' ),
        'icon'          => 'ti-crown',
        'fields'        => array(

            array(
        		'id' => 'page_layout',
        		'title' => esc_html__( 'Page Layout', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose main page layout', 'gillion' ),
        		'type' => 'radio',
        		'options' => array(
        			'global_default' => esc_html__( 'Global Default (from theme settings)', 'gillion' ),
        			'default' => esc_html__( 'Default (without sidebar)', 'gillion' ),
        			'default default-nopadding' => esc_html__( 'Default (without sidebar and extra padding)', 'gillion' ),
        			'default default-content-after-posts' => esc_html__( 'Default Inversed (without sidebar and content at the bottom)', 'gillion' ),
        			'full' => esc_html__( 'Full Width (without sidebar)', 'gillion' ),
        			'sidebar-left' => esc_html__( 'Sidebar Left', 'gillion' ),
        			'sidebar-right' => esc_html__( 'Sidebar Right', 'gillion' ),
        		),
        		'default' => 'global_default',
        	),

        ),
    );






    $page_sections[] = $post_sections[] = array(
        'title'         => __( 'Header', 'gillion' ),
        'icon'          => 'ti-flag-alt-2',
        'fields'        => array(

            array(
        		'id' => 'header',
        		'title' => esc_html__( 'Header', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable header', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'off' => esc_html__( 'Off', 'gillion' ),
        			'on' => esc_html__( 'On', 'gillion' ),
        		),
        		'default' => 'on',
        	),

        	array(
        		'id' => 'header_sticky',
        		'title' => esc_html__( 'Header Sticky', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable sticky header', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'gillion' ),
        			'on' => esc_html__( 'On', 'gillion' ),
        			'off' => esc_html__( 'Off', 'gillion' ),
        		),
        		'default' => 'default',
        	),

        	array(
        		'id' => 'header_bottom_border',
        		'title' => esc_html__( 'Header Bottom Border', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable header bottom border', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'off' => esc_html__( 'Off', 'gillion' ),
        			'on' => esc_html__( 'On', 'gillion' ),
        		),
        		'default' => 'on',
        	),

        	array(
        		'id' => 'topbar_status',
        		'title' => esc_html__( 'Header Topbar', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable header topbar', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'gillion' ),
        			'on' => esc_html__( 'On', 'gillion' ),
        			'off' => esc_html__( 'Off', 'gillion' ),
        		),
        		'default' => 'default',
        	),

        	array(
        		'id' => 'header_layout',
        		'title' => esc_html__( 'Header Layout', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose main header layout', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'gillion' ),
        			'2' => esc_html__( 'Standard', 'gillion' ),
        			'1' => esc_html__( 'Menu Center', 'gillion' ),
        			'4' => esc_html__( 'Logo/menu center (icons in menu area)', 'gillion' ),
        			'5' => esc_html__( 'Logo/menu center (icons in logo area)', 'gillion' ),
        			'3' => esc_html__( 'With Ad place', 'gillion' ),
        		),
        		'default' => 'default',
        	),





            array(
        		'id' => 'header_style',
        		'title' => esc_html__( 'Above Content', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable header above content', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default', 'gillion' ),
        			'light' => esc_html__( 'Light Text Large', 'gillion' ),
        			'light_mobile_off' => esc_html__( 'Light Text Large (default mobile version)', 'gillion' ),
        			'dark' => esc_html__( 'Dark Text Large', 'gillion' ),
        			'dark_mobile_off' => esc_html__( 'Dark Text Large (default mobile version)', 'gillion' ),
        		),
        		'default' => '1',
        	),

        	array(
        		'id' => 'header_style_description',
        		'title' => esc_html__( 'Above Content - Description', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter this page description', 'gillion' ),
        		'type' => 'text',
        		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
        	),

        	array(
        		'id' => 'header_style_breadcrumbs',
        		'title' => esc_html__( 'Above Content - Breadcrumbs', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable dreadcrumbs', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'0' => 'Off',
        			'1' => esc_html__( 'On', 'gillion' ),
        		),
        	),

        	array(
        		'id' => 'header_style_scroll_button',
        		'title' => esc_html__( 'Above Content - Scroll Down Button', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable scroll down button', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'0' => 'Off',
        			'1' => esc_html__( 'On', 'gillion' ),
        		),
        	),







        	array(
        		'id' => 'titlebar',
        		'title' => esc_html__( 'Titlebar', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable titlebar', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'gillion' ),
        			'on' => esc_html__( 'On', 'gillion' ),
        			'off' => esc_html__( 'Off', 'gillion' ),
        		),
                'default' => 'default',
        	),

        	array(
        		'id' => 'titlebar_background',
        		'title' => esc_html__( 'Titlebar Background Image', 'gillion' ),
        		'subtitle' => esc_html__( 'Upload titlebar background image', 'gillion' ),
        		'url' => '1',
        		'type' => 'media',
        	),

        	array(
        		'id' => 'titlebar_background_parallax',
        		'title' => esc_html__( 'Titlebar Parallax Background', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable parallax background', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'gillion' ),
        			'on' => esc_html__( 'On', 'gillion' ),
        			'off' => esc_html__( 'Off', 'gillion' ),
        		),
                'default' => 'default',
        	),

        	array(
        		'id' => 'transparent_everything',
        		'title' => esc_html__( 'Transparent body/header/titlebar', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable transparent body/header/titlebar', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'off' => esc_html__( 'Off', 'gillion' ),
        			'on' => esc_html__( 'On', 'gillion' ),
        		),
        		'default' => 'off',
        	),




            array(
                'id'       => 'header-overlay',
                'type'     => 'button_set',
                'title'    => __( 'Overlay', 'gillion' ),
                'subtitle' => __( 'Make header appear above page content', 'gillion' ),
                'options'  => array(
                    'on' => 'On',
                    '' => 'Default',
                    'off' => 'Off'
                ),
                'default'  => 'off'
            ),

        ),
    );


    $page_sections[] = $post_sections[] = array(
        'title'         => __( 'Footer', 'gillion' ),
        'icon'          => 'ti-anchor',
        'fields'        => array(

            array(
        		'id' => 'instagram_widgets',
        		'title' => esc_html__( 'Instagram Widget', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable footer widgets', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'on' => esc_html__( 'On', 'gillion' ),
        			'off' => esc_html__( 'Off', 'gillion' ),
        		),
        		'default' => 'on',
        	),

        	array(
        		'id' => 'footer_widgets',
        		'title' => esc_html__( 'Footer Widgets', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable footer widgets', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'gillion' ),
        			'on' => esc_html__( 'On', 'gillion' ),
        			'off' => esc_html__( 'Off', 'gillion' ),
        		),
                'default' => 'default',
        	),

        	array(
        		'id' => 'copyright_bar',
        		'title' => esc_html__( 'FooterCopyrights', 'gillion' ),
        		'subtitle' => esc_html__( 'Enable or disable footer copyrights', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'gillion' ),
        			'on' => esc_html__( 'On', 'gillion' ),
        			'off' => esc_html__( 'Off', 'gillion' ),
        		),
                'default' => 'default',
        	),


        ),
    );

    $page_sections[] = array(
        'title'         => __( 'Blog', 'gillion' ),
        'icon'          => 'ti-pencil-alt',
        'fields'        => array(

            array(
        		'id' => 'use only if page template is set to blog_divider',
        		'title' => '<h2>' . esc_html__( 'Use only if page template is set to Blog', 'gillion' ) . '</h2>',
        		'type' => 'raw',
        	),

        	array(
        		'id' => 'page_blog_title',
        		'title' => esc_html__( 'Blog Custom Title', 'gillion' ),
        		'type' => 'text',
        	),

        	array(
        		'id' => 'page-blog-style',
        		'title' => esc_html__( 'Blog Style', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose blog style', 'gillion' ),
        		'type' => 'radio',
        		'options' => array(
        			'masonry' => esc_html__( 'Masonry', 'gillion' ),
        			'masonry blog-style-masonry-card' => esc_html__( 'Masonry Card', 'gillion' ),
        			'grid' => esc_html__( 'Grid', 'gillion' ),
        			'left-small' => esc_html__( 'Left', 'gillion' ),
        			'left-mini' => esc_html__( 'Left (mini)', 'gillion' ),
        			'left' => esc_html__( 'Left (large)', 'gillion' ),
        			'left-right' => esc_html__( 'Left/Right Mix', 'gillion' ),
        			'left-right blog-style-left-right-small' => esc_html__( 'Left/Right Mix (small without description)', 'gillion' ),
        			'left-right blog-style-left-right-large' => esc_html__( 'Left/Right Mix (large)', 'gillion' ),
        			'large' => esc_html__( 'Large (title at the top)', 'gillion' ),
        			'large large-title-bellow' => esc_html__( 'Large (title bellow the image)', 'gillion' ),
        			'large large-centered' => esc_html__( 'Large (centered)', 'gillion' ),
        		),
        		'default' => 'masonry masonry-shadow',
        	),

        	array(
        		'id' => 'page_blog_featured',
        		'title' => esc_html__( 'Blog Featured Post', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'0' => 'Off',
        			'1' => esc_html__( 'On', 'gillion' ),
        		),
        	),

        	array(
        		'id' => 'page_blog_featured_style',
        		'title' => esc_html__( 'Blog Featured Post Style', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose blog featured post style', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'large' => esc_html__( 'Large (title at the top)', 'gillion' ),
        			'large large-title-bellow' => esc_html__( 'Large (title bellow the image)', 'gillion' ),
        			'large large-centered' => esc_html__( 'Large (centered)', 'gillion' ),
        		),
        		'default' => 'large',
        	),

        	array(
        		'id' => 'page_blog_pagination_alignment',
        		'title' => esc_html__( 'Blog Pagination Alignment', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose blog pagination alignment', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'left' => esc_html__( 'Left', 'gillion' ),
        			'center' => esc_html__( 'Center', 'gillion' ),
        			'right' => esc_html__( 'Right', 'gillion' ),
        		),
        		'default' => 'left',
        	),

        	array(
        		'id' => 'page_blog_order',
        		'title' => esc_html__( 'Blog Posts Order', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose blog posts order', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'DESC' => esc_html__( 'Latest posts', 'gillion' ),
        			'ASC' => esc_html__( 'Oldest posts', 'gillion' ),
        			'rand' => esc_html__( 'Random posts', 'gillion' ),
        		),
        		'default' => 'DESC',
        	),

        	array(
        		'id' => 'page_blog_offset',
        		'title' => esc_html__( 'Blog Posts Offset', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose blog posts offset', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'0' => 'No offset',
        			'1' => '1 posts',
        			'2' => '2 posts',
        			'3' => '3 posts',
        			'4' => '4 posts',
        			'5' => '5 posts',
        			'6' => '6 posts',
        			'7' => '7 posts',
        			'8' => '8 posts',
        			'9' => '9 posts',
        			'10' => '10 posts',
        			'11' => '11 posts',
        			'12' => '12 posts',
        			'13' => '13 posts',
        			'14' => '14 posts',
        			'15' => '15 posts',
        			'16' => '16 posts',
        		),
        		'default' => 'default',
        	),

        	array(
        		'id' => 'page_blog_category',
        		'title' => esc_html__( 'Blog Category', 'gillion' ),
        		'subtitle' => esc_html__( 'Enter one category per line (seperated with enter) either by name or slug', 'gillion' ),
        		'type' => 'textarea',
        		'population' => 'taxonomy',
        		'source' => 'category',
        		'prepopulate' => '200',
        		'limit' => '50',
        	),

        	array(
        		'id' => 'page_blog_posts_per_page',
        		'title' => esc_html__( 'Blog Posts Per Page', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose how many posts will be disaplayed per page', 'gillion' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'gillion' ),
        			'3' => '3 posts',
        			'4' => '4 posts',
        			'5' => '5 posts',
        			'6' => '6 posts',
        			'7' => '7 posts',
        			'8' => '8 posts',
        			'9' => '9 posts',
        			'10' => '10 posts',
        			'11' => '11 posts',
        			'12' => '12 posts',
        			'13' => '13 posts',
        			'14' => '14 posts',
        			'15' => '15 posts',
        			'16' => '16 posts',
        		),
        		'default' => 'default',
        	),

        	array(
        		'id' => 'page_blog_pagination_type',
        		'title' => esc_html__( 'Blog Pagination Type', 'gillion' ),
        		'subtitle' => esc_html__( 'Choose blog pagination type', 'gillion' ),
        		'type' => 'radio',
        		'options' => array(
        			'default' => esc_html__( 'Default per page', 'gillion' ),
        			'button' => esc_html__( 'Load More button (on click)', 'gillion' ),
        			'infinite' => esc_html__( 'Infinite loading (on scroll)', 'gillion' ),
        		),
        		'default' => 'default',
        	),

        	array(
        		'id' => 'page_blog_dividing_line',
        		'title' => esc_html__( 'Blog Dividing Line', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'off' => esc_html__( 'Off', 'gillion' ),
        			'on' => esc_html__( 'On', 'gillion' ),
        		),
        		'default' => 'on',
        	),

        	array(
        		'id' => 'page_blog_description',
        		'title' => esc_html__( 'Blog Posts Description', 'gillion' ),
        		'type' => 'button_set',
        		'options' => array(
        			'default' => esc_html__( 'Default', 'gillion' ),
        			'off' => esc_html__( 'Off', 'gillion' ),
        		),
        		'default' => 'default',
        	),

        ),
    );

    $page_sections[] = $post_sections[] = array(
        'title'         => __( 'Colors', 'gillion' ),
        'icon'          => 'ti-palette',
        'fields'        => array(

            array(
        		'id' => 'accent_color',
        		'title' => esc_html__( 'Accent Color', 'gillion' ),
        		'subtitle' => esc_html__( 'Set custom accent color for this page or leave blank for default', 'gillion' ),
        		'type' => 'color',
        		'validate' => 'color',
        	),

        	array(
        		'id' => 'accent_hover_color',
        		'title' => esc_html__( 'Accent Hover Color', 'gillion' ),
        		'subtitle' => esc_html__( 'Select page accent color on hover or leave blank for default', 'gillion' ),
        		'type' => 'color',
        		'validate' => 'color',
        	),

        	array(
        		'id' => 'header_nav_active_color',
        		'title' => esc_html__( 'Active Navigation Color', 'gillion' ),
        		'subtitle' => esc_html__( 'Select active navigation color or leave blank for default', 'gillion' ),
        		'type' => 'color',
        		'validate' => 'color',
        	),

        	array(
        		'id' => 'footer_hover_color',
        		'title' => esc_html__( 'Footer Hover Color', 'gillion' ),
        		'subtitle' => esc_html__( 'Select footer color on hover', 'gillion' ),
        		'type' => 'color',
        		'validate' => 'color',
        	),


        ),
    );




    // Declare your metaboxes
    $metaboxes = array();
    $metaboxes[] = array(
        'id'            => 'page-settings',
        'title'         => __( 'Page Settings', 'gillion' ),
        'post_type'     => 'page',
        //'page_template' => array('page-test.php'), // Visibility of box based on page template selector
        //'post_format' => array('image'), // Visibility of box based on post format
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low - Priorities of placement
        'sections'      => $page_sections,
    );

    $metaboxes[] = array(
        'id'            => 'post-settings',
        'title'         => __( 'Post Settings', 'gillion' ),
        'post_type'     => 'post',
        'position'      => 'normal',
        'priority'      => 'high',
        'sections'      => $post_sections,
    );

    return $metaboxes;
}
