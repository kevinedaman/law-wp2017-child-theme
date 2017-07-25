<?php
/**
 * twentyseventeen-child-LAW functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage twentyseventeen-child-LAW
 * @since 1.0
 */

/**
 * Twenty Seventeen and it's children only work in WordPress 4.7 or later.
 */

/**
 * Scripts and styles needed for the child theme
 */

function twentyseventeen_child_LAW_scripts () {

	// Import the necessary Bootstrap WP CSS additions
	wp_enqueue_style( 'bootstrap-wp', get_theme_file_uri() . '/includes/css/bootstrap-wp.css' );

	// load bootstrap css
	wp_enqueue_style( 'bootstrap', get_theme_file_uri() . '/includes/resources/bootstrap/css/bootstrap.min.css' );

	// load Font Awesome css
	wp_enqueue_style( 'font-awesome', get_theme_file_uri() . '/includes/css/font-awesome.min.css', false, '4.1.0' );

	// load _tk styles
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// load bootstrap js
	wp_enqueue_script('bootstrapjs', get_theme_file_uri() . '/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery') );

	// load bootstrap wp js
	wp_enqueue_script( 'bootstrapwp', get_theme_file_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );


}

add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_LAW_scripts' );

?>
