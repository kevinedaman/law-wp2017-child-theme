<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage twentyseventeen-child-LAW
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="container">
	<main id="main" class="site-main" role="main">

    <?php
    	$mypages = get_pages( array( 'child_of' => $post->ID ) );

    	foreach( $mypages as $page ) {
    		$content = $page->post_content;
    		if ( ! $content ) // Check for empty page
    			continue;
    		$content = apply_filters( 'the_content', $content );
    	?>
    		<h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
        <div class="row">
        <div class="col-sm-6">
          <?php echo get_the_post_thumbnail( $page->ID, 'medium_large', ['class' => 'img-responsive']); ?>
        </div>
        <div class="col-sm-6">
          <?php echo $content; ?>
        </div>
      </div>
    	<?php
    	}
    ?>


	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
