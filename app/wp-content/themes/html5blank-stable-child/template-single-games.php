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

    <div id="gallery-posts-outer">
      <div class="page-title"><span><?php the_title(); ?></span></div>
      <div id="controls">
        <div id="prev-post">Prev</div>
        <div id="next-post">Next</div>
      </div>


      <?php atominktheme_generate_gallery_posts('images' , 'date' , 'ASC' , '' , '' , '' , 'gallery-images' ); ?>
    </div>
  </main>


<?php get_footer(); ?>