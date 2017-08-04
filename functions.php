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
 * These are the features that the original theme didn't set up
 */
function twentyseventeen_child_LAW_setup (){
  //translation and stuff
  load_theme_textdomain( 'twentyseventeen_child' );

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus( array(
    'top'    => __( 'Top Menu', 'twentyseventeen_child' ),
    'social' => __( 'Social Links Menu', 'twentyseventeen_child' ),
    'socialfooter' => __( 'footer Social Links Menu', 'twentyseventeen_child' )
  ) );

}

add_action( 'after_setup_theme', 'twentyseventeen_child_LAW_setup' );

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

  wp_enqueue_script( 'global', get_theme_file_uri() . '/includes/js/global.js', array('jquery2'), true);

  $twentyseventeen_l10n = array(
    'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
  );

  if ( has_nav_menu( 'top' ) ) {
    wp_enqueue_script( 'navigation', get_theme_file_uri() . '/includes/js/navigation.js' , array( 'jquery2' ), '1.0', true );
    $twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
    $twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
    $twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
  }

wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

}

add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_LAW_scripts' );

/**
 * Create a nav menu with very basic markup.
 *
 * @author Thomas Scholz http://toscho.de
 * @version 1.0
 */
class Bootstrap_Walker extends Walker_Nav_Menu {
  public function start_lvl( &$output, $depth = 0, $args = array() ) {
     $indent = str_repeat("\t", $depth);

     // add the dropdown CSS class
     $output .= "\n$indent<ul class=\"sub-menu dropdown\">\n";
  }
  public function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

     // add 'not-click' class to the list item
     $element->classes[] = 'not-click';

     // if element is current or is an ancestor of the current element, add 'active' class to the list item
     $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';

     // if it is a root element and the menu is not flat, add 'has-dropdown' class
     // from https://core.trac.wordpress.org/browser/trunk/src/wp-includes/class-wp-walker.php#L140
     $element->has_children = ! empty( $children_elements[ $element->ID ] );
     $element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-dropdown' : '';

     // call parent method
     parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }
}



?>
