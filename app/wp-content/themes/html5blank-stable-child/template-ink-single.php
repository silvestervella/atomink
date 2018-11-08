<?php 
/*
 * Template Name: Ink Page Single
 * Template Post Type: images
 */
get_header(); 
?>
<!-- wrapper -->
<div id="wrapper">

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <main role="main" class="ink-single-pages" style="background-image: url(<?php  echo get_the_post_thumbnail_url(); ?>)">
        <?php get_the_post_thumbnail() ?>

        <?php endwhile; ?>

      <?php else: ?>

        <!-- article -->
        <article>

        <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

        </article>
        <!-- /article -->
        <?php endif; ?>

  </main>

<?php get_footer(); ?>