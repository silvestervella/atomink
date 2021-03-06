<?php 
/*
 * Template Name: Cart&Checkout Page
 * Template Post Type: page
 */
get_header(); 
?>
<!-- wrapper -->
<div id="wrapper" >

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <div class="page-title"><h1><?php the_title(); ?></h1></div>

  <main role="main" id="checkout-page" class="shop-pages" style="background-image: url(<?php  echo get_the_post_thumbnail_url(); ?>)">
    <div id="shop-page-outer">
    <div id="shop-booking-wrap">
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
		</div>
  </main>

<?php get_footer(); ?>