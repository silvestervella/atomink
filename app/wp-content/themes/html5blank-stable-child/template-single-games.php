<?php 
/*
 * Template Name: Games Page - Single
 * Template Post Type: post
 */
get_header(); 
?>
<!-- wrapper -->
<div id="wrapper" >

  <main role="main" id="home">
    <div id="active-post"><img src="" alt="tattoo image" /></div>
    <div class="page-title"><span><?php the_title(); ?></span></div>

    <div id="controls">
      <button id="prev-post">Prev</button>
      <button id="next-post">Next</button>
    </div>

    <div id="gallery-posts-outer">
      <?php atominktheme_generate_gallery_posts('images' , 'date' , 'ASC' , '' , '' , 'header-back-images' , 'gallery-images' ); ?>
    </div>
  </main>


<?php get_footer(); ?>