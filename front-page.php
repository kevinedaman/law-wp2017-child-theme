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
	<main id="main" class="front-wrapper" role="main">

    <?php
    	$mypages = get_pages( array( 'child_of' => $post->ID ) );

    	foreach( $mypages as $page ) {
    		$content = $page->post_content;
    		if ( ! $content ) // Check for empty page
    			continue;
    		$content = apply_filters( 'the_content', $content );
    	?>
      <div class="panel-header">
        <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
      </div>
        <div class="row align-items-center">
        <div class="col-sm-6">
          <?php echo get_the_post_thumbnail( $page->ID, 'full', ['class' => 'img-responsive front-about-image']); ?>
        </div>
        <div class="col-sm-6 front-about-text">
          <?php echo $content; ?>
        </div>
      </div>
    	<?php
    	}
    ?>


	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
