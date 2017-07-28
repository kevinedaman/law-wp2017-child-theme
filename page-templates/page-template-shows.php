<?php
/*
 * Template Name: Shows Page
*/

?>

<?php get_header(); ?>

<div class="row panel">
  <div class="col-md-12">
    <h2 class="shows-header">Upcoming Shows</h2>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
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
    <div class="row">
      <div class="col-md-12 show-box">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $num ?>" aria-expanded="true" aria-controls="collapse<?php echo $num ?>">
            <div class="row">
              <div class="col-md-4 show-title"><?php echo $show->post_title?></div>
              <div class="col-md-8 show-location"><?php echo get_post_meta($show->ID, 'show_location', true); ?></div>
            </div>
          </a>
      <div id="collapse<?php echo $num ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $num ?>">
        <div class="panel-body">
          <?php the_content(); ?>
        </div>
       </div>
     </div>
     </div>
  <?php
    $num++;
    }
    wp_reset_postdata();
   ?>
 </div>
</div>

<?php get_footer();
