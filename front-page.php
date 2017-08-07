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
  <div class="">
  </div>
<!-- About Panel -->
      <!-- page header and content -->
      <div class="row">
        <div id="social-list">
          <?php
            $socialPosts = get_posts( array( 'category_name' => 'social'));
            foreach  ( $socialPosts as $social ) {
              setup_postdata( $social );
              the_content();
            }
            wp_reset_postdata();
           ?>
        </div>
      </div>
    <div class="panel-top">
      <div class="row panel-header">
        <div class="col panel-right">
          <?php
            $mypages = get_pages( array( 'child_of' => $post->ID ) );
            //get's pages that are children of the home page
            foreach( $mypages as $page ) {
              $content = $page->post_content;
                if ( ! $content ) // Check for empty page
                  continue;
                $content = apply_filters( 'the_content', $content );
          ?>

          <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
        </div>
      </div>
        <div class="row align-items-center panel-content">
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
  </div>

<!-- Merch Panel -->
  <div class="panel">
    <div class="panel-header panel-left">
      <h2><a href="<?php echo get_site_url(); ?>/shop">Merchandise</a></h2>
    </div>
    <div class="row">
      <?php
        $myposts = get_posts( array( 'post_type' => 'product') );
        foreach( $myposts as $post ) {
        ?>
            <div class="col-lg">
      <a href="
        <?php
          echo get_permalink( $post->ID );?>"><?php
          the_post_thumbnail( 'small', ['class' => 'front-merch-image'] );
      ?></a>
            </div>
      <?php
      }
      wp_reset_postdata();?>
    </div>
  </div> <!-- end -->

<!-- Show Panel -->
  <div class="panel">
    <div class="panel-header panel-center">
        <h2 class="shows-header"><a href="<?php echo get_site_url(); ?>/shows">Upcoming Shows</a></h2>
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
  </div> <!-- end -->

</div> <!-- end container -->

<?php get_footer();
