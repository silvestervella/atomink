<?php 
/*
 * Template Name: Checkout Page
 * Template Post Type: page
 */
get_header(); 
?>
<!-- wrapper -->
<div id="wrapper" >

  <main role="main" id="checkout-page" class="shop-pages">
    <div id="shop-page-outer" style="background-image: url(<?php  echo get_the_post_thumbnail_url(); ?>)">

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; ?>

      <?php else: ?>

        <!-- article -->
        <article>

        <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

        </article>
        <!-- /article -->

        <?php endif; ?>

    </div>
  </main>

<?php get_footer(); ?>