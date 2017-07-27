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
  <div class="front-panel-white">
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
  </div>
<div class="row">
  <h2>Merchandise</a></h2>
</div>
<div class="row">
  <?php
    $myposts = get_posts( array( 'post_type' => 'product') );
    $num = 0;
    foreach( $myposts as $post ) {
      if ($num == 0) {
  ?>
        <div class="row">'
  <?php
      }
  ?>
        <div class="col-sm-4">
  <?php
      the_post_thumbnail( 'thumbnail' );
      $num ++;
  ?>
        </div>
  <?php
      if ($num == 3) {
  ?>
        </div>
  <?php
      $num = 0;
    }
  }
  ?>
</div>
</div><!-- end front-panel -->

<?php get_footer();
