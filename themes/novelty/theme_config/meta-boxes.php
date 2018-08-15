<?php return array(
	'metaboxes'	=>	array(
		array(
			'id'             => 'post_metabox',            // meta box id, unique per meta box
			'title'          => _x('Novelty Post Options','meta boxes','novelty'),   // meta box title
			'post_type'      => array('post'),		// post types, accept custom post types as well, default is array('post'); optional
			'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			'context'		 => 'side',						// where the meta box appear: normal (default), advanced, side; optional
			'priority'		 => 'low',						// order of meta box: high (default), low; optional
			'input_fields'   => array(          			// list of meta fields 
				'featured_video'=>array(
					'name'=> _x('Featured Video','meta boxes','novelty'),
					'type'=>'textarea',
				),
			)
		),
		array(
			'id'             => 'page_metabox',            // meta box id, unique per meta box
			'title'          => _x('Novelty Page Options','meta boxes','novelty'),   // meta box title
			'post_type'      => array('page'),		// post types, accept custom post types as well, default is array('post'); optional
			'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			'priority'		 => 'low',						// order of meta box: high (default), low; optional
			'input_fields'   => array(          			// list of meta fields 
				'sidebar_position'=>array(
			    		'name'=> _x('Sidebar Selection','meta boxes','novelty'),
			    		'type'=>'select',
			    		'values'=>array(
			    				'full_width'=>_x('No Sidebar/Full Width','meta boxes','novelty'),
			    				'sidebar'=>_x('With Sidebar','meta boxes','novelty'),
				    			),
			    		'std'=>'right'  //default value selected
		    	),
			)
		)
	)
);