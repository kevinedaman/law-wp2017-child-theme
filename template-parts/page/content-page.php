<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage twentyseventeen-child-LAW
 * @since 1.0
 * @version 1.0
 */

?>
<div class="container-fluid">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<header class="">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php twentyseventeen_edit_link( get_the_ID() ); ?>
			</header><!-- .entry-header -->
		</div>

		<div class="row">
			<div class="col-md-12">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</div><!-- .entry-content -->


	</article><!-- #post-## -->
</div>
