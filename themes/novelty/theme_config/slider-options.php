<?php

return array(
	'novelty_team' => array(
		'name' => 'Team',
		'term' => 'team member',
		'term_plural' => 'team members',
		'order' => 'ASC',
		'options' => array(
			'image' => array(
				'type' => 'image',
				'description' => 'Image of the team member',
				'title' => 'Image',
				'default' => 'holder.js/220x220/auto'
			),
			'position' => array(
				'type' => 'line',
				'description' => 'Position of the team member',
				'title' => 'Position'
			),
			'description' => array(
				'type' => 'text',
				'description' => 'Description of the team member',
				'title' => 'Description'
			),
			'facebook' => array(
				'type' => 'line',
				'description' => 'Facebook URL of the team member',
				'title' => 'Facebook'
			),
			'twitter' => array(
				'type' => 'line',
				'description' => 'Twitter URL of the team member',
				'title' => 'Twitter'
			),
			'url' => array(
				'type' => 'line',
				'description' => 'This URL will be applied to the image of the team member.',
				'title' => 'URL (optional)'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'view' => 'views/team_view',
				'shortcode' => 'novelty_team',
				'shortcode_defaults' => array(
					'nr' => 0,
					'columns' => 3,
					'wide' => true
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'novelty_skills' => array(
		'name' => 'Skills',
		'term' => 'skill',
		'term_plural' => 'skills',
		'order' => 'ASC',
		'options' => array(
			'value' => array(
				'type' => 'line',
				'description' => 'Value of the skill',
				'title' => 'Value'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'novelty_skills',
				'view' => 'views/skills_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'title' => ''
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'novelty_toggle' => array(
		'name' => 'Toggle List',
		'term' => 'item',
		'term_plural' => 'items',
		'order' => 'ASC',
		'options' => array(
			'description' => array(
				'type' => 'text',
				'description' => 'Description of the item',
				'title' => 'Description'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'novelty_toggle',
				'view' => 'views/toggle_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'title' => ''
				)
			)
		),
		'icon' => '../images/favicon.png'
	)
);
