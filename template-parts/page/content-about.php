<?php
/**
 * Template part for displaying about page content in page-template-about.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage twentyseventeen-child-LAW
 * @since 1.0
 * @version 1.0
 */

?>
<header class="about-header">
  <?php the_title( '<h1>', '</h1>' ); ?>
  <?php twentyseventeen_edit_link( get_the_ID() ); ?>
</header><!-- .entry-header -->

<div class="about-image">
  <?php echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );?>
</div><!-- .single-featured-image-header -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="about-content">

    <?php
      the_content();

      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
        'after'  => '</div>',
      ) );
    ?>

  </div><!-- .entry-content -->
</article><!-- #post-## -->
