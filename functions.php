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

  // load parent stylesheet
  wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');


	// Import the necessary Bootstrap WP CSS additions
	wp_enqueue_style( 'bootstrap-wp', get_theme_file_uri() . '/includes/css/bootstrap-wp.css' );

	// load bootstrap css
	wp_enqueue_style( 'bootstrap', get_theme_file_uri() . '/includes/resources/bootstrap/css/bootstrap.min.css' );

  wp_enqueue_style( 'bootstrap-grid', get_theme_file_uri() . '/includes/resources/bootstrap/css/bootstrap-grid.min.css');

  wp_enqueue_style( 'bootstrap-reboot', get_theme_file_uri() . '/includes/resources/bootstrap/css/bootstrap-reboot.min.css');

	// load Font Awesome css
	wp_enqueue_style( 'font-awesome', get_theme_file_uri() . '/includes/css/font-awesome.min.css', false, '4.1.0' );

	// load styleshet
	wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/style.css', array(), rand(111,9999));

  wp_deregister_script( 'jquery' );

  wp_enqueue_script( 'jquery2', get_theme_file_uri() . '/includes/resources/jquery/jquery-3.2.1.min.js' );
	// load bootstrap js
	wp_enqueue_script('bootstrapjs', get_theme_file_uri() . '/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery2') );

	// load bootstrap wp js
	wp_enqueue_script( 'bootstrapwp', get_theme_file_uri() . '/includes/js/bootstrap-wp.js', array('jquery2') );


}

add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_LAW_scripts' );

/**
 * Create a nav menu with very basic markup.
 *
 * @author Thomas Scholz http://toscho.de
 * @version 1.0
 */
class T5_Nav_Menu_Walker_Simple extends Walker_Nav_Menu
{
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	public function start_el( &$output, $item, $depth, $args )
	{
		$output     .= '<li>';
		$attributes  = '';
		! empty ( $item->attr_title )
			// Avoid redundant titles
			and $item->attr_title !== $item->title
			and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
		! empty ( $item->url )
			and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
		$attributes  = trim( $attributes );
		$title       = apply_filters( 'the_title', $item->title, $item->ID );
		$item_output = "$args->before<a $attributes>$args->link_before$title</a>"
						. "$args->link_after$args->after";
		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters(
			'walker_nav_menu_start_el'
			,   $item_output
			,   $item
			,   $depth
			,   $args
		);
	}
	/**
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function start_lvl( &$output )
	{
		$output .= '<ul class="sub-menu">';
	}
	/**
	 * @see Walker::end_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function end_lvl( &$output )
	{
		$output .= '</ul>';
	}
	/**
	 * @see Walker::end_el()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	function end_el( &$output )
	{
		$output .= '</li>';
	}
}

?>
