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
<!-- About Panel -->
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
        <div class="col-md-6">
          <?php echo get_the_post_thumbnail( $page->ID, 'full', ['class' => 'img-responsive front-about-image']); ?>
        </div>
        <div class="col-md-6 front-about-text">
          <?php echo $content; ?>
        </div>
      </div>
    	<?php
    	}
    ?>
<!-- Merch Panel -->
  </div>
<div class="row">
  <h2><a href="<?php echo get_site_url(); ?>/shop">Merchandise</a></h2>
</div>
<div class="row">
  <?php
    $myposts = get_posts( array( 'post_type' => 'product') );
    foreach( $myposts as $post ) {
    ?>
        <div class="col-md-4">
  <a href="
    <?php
      echo get_permalink( $post->ID );?>"><?php
      the_post_thumbnail( 'small', ['class' => 'front-merch-image'] );
  ?></a>
        </div>
  <?php
  }
  wp_reset_postdata();?>
</div><!-- end -->
<!-- Show Panel -->
<div class="row">
  <h2>Shows</h2>
</div>
<div class="show-box">
</div>
  <?php
    $num = 1;
    $showposts = get_posts( array(
      'category_name' => 'Shows',
      'posts_per_page' => 10,
	     'offset' => 0,
      'orderby' => 'date',
      'order' => 'ASC'));
    foreach( $showposts as $show ) {
      setup_postdata( $show );

  ?>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading<?php echo $num ?>">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $num ?>" aria-expanded="true" aria-controls="collapse<?php echo $num ?>">
            <?php echo $show->post_title?> | <?php echo get_post_meta($show->ID, 'show_location', true); ?>
          </a>
        </h4>
      </div>
      <div id="collapse<?php echo $num ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $num ?>">
        <div class="panel-body">
          <?php the_content(); ?>
        </div>
       </div>
     </div>
  <?php
    $num++;
    }
    wp_reset_postdata();
   ?>

</div>

<?php get_footer();
