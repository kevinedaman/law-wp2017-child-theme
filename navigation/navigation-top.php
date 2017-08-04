<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage twentyseventeen-child-LAW
 * @since 1.0
 * @version 1.2
 */

?>

<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
		echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'twentyseventeen' );
		?>
	</button>
<div class="row">
	<div class="col">
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>
</div>
	<?php
	$post   = get_post( 305 );
	$output =  apply_filters( 'the_content', $post->post_content );
	?>
	<div id="social-list" class="col">
		<?php
		echo $output
		?>
	</div>
</div>


</nav><!-- #site-navigation -->
