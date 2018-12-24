<?php
/**
 * Theme functions file
 */

/**
 * Enqueue parent theme styles first
 * Replaces previous method using @import
 * <http://codex.wordpress.org/Child_Themes>
 */

add_action( 'wp_enqueue_scripts', 'gillion_child_enqueue', 99 );

function gillion_child_enqueue() {
	wp_enqueue_style( 'gillion-child-style', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_script( 'gillion-child-scripts', get_stylesheet_directory_uri() . '/js/scripts.js' );
}

/**
 * Add your custom functions below
 */

add_action('wp_enqueue_scripts', 'loadEntryList');
add_action('wp_enqueue_scripts', 'loadPQEntryList');
add_action('wp_enqueue_scripts', 'loadStandings');
add_action('wp_enqueue_scripts', 'loadResults');

/**
 * Load entry list JavaScript file on the right page.
 */
function loadEntryList(){
	if(is_page('769')){
		wp_register_script('show-registrations', get_stylesheet_directory_uri().'/js/nes5_entrylist.js', array('jquery'), null, true);
		wp_enqueue_script('show-registrations');
	}
}

/**
 * Load pre-qualifying entry list JavaScript file on the right page.
 */
function loadPQEntryList(){
	if(is_page('2875')){
		wp_register_script('show-pq-registrations', get_stylesheet_directory_uri().'/js/nes5_pq_entrylist.js', array('jquery'), null, true);
		wp_enqueue_script('show-pq-registrations');
	}
}

/**
 * Load standings JavaScript file on the right page.
 */
function loadStandings(){
	if(is_page('1072')){
		wp_enqueue_script('show-standings', get_stylesheet_directory_uri().'/js/show_standings.js', array('jquery'), null, true);
	}
}

/**
 * Load JavaScript file that loads the results on the right page.
 */
function loadResults(){
	if(is_page('1090')){
		wp_enqueue_script('show-results', get_stylesheet_directory_uri().'/js/show_results.js', array('jquery'), null, true);
	}
}
