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

  <main role="main" class="ink-single-pages">
        <?php echo get_the_post_thumbnail() ?>

        <!-- view all svg -->
        <div id="gallery-link">
          <a href="<?php echo esc_url( get_permalink( get_post(212) ) ); ?>">
            <?php atominktheme_get_file('/includes/svg-view-all.html'); ?>
            VIEW<br/>ALL
          </a>
        </div>

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