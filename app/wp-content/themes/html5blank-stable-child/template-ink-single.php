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
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 140.3 136.3" style="enable-background:new 0 0 140.3 136.3;" xml:space="preserve">
            <style type="text/css">
              .st0{fill:#DAD7CD;}
            </style>
            <g>
              <g>
                <rect class="st0" width="41.7" height="41.7"/>
                <rect x="49.3" class="st0" width="41.7" height="41.7"/>
                <rect x="98.7" class="st0" width="41.7" height="41.7"/>
              </g>
              <g>
                <rect y="47.3" class="st0" width="41.7" height="41.7"/>
                <rect x="49.3" y="47.3" class="st0" width="41.7" height="41.7"/>
                <rect x="98.7" y="47.3" class="st0" width="41.7" height="41.7"/>
              </g>
              <g>
                <rect y="94.7" class="st0" width="41.7" height="41.7"/>
                <rect x="49.3" y="94.7" class="st0" width="41.7" height="41.7"/>
                <rect x="98.7" y="94.7" class="st0" width="41.7" height="41.7"/>
              </g>
            </g>
            </svg>
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