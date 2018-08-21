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
    <div id="active-post">
      <div id="active-post-blur"></div>
      <img src="" alt="tattoo image" />
    </div>
    
    <div class="page-title"><span><?php the_title(); ?></span></div>
      <div id="controls">
        <div id="prev-post">Prev</div>
        <div id="next-post">Next</div>
      </div>

    <div id="gallery-posts-outer">
      <?php atominktheme_generate_gallery_posts(array(
        'post_type' =>"images" , 
        'post_order_by'=>"date",
        'post_order'=>"ASC",
        'post_meta_key'=>"",
        'num_of_posts'=>"",
        'post_metabox_value'=>"gallery-images"
      )); ?>
    </div>
  </main>


<?php get_footer(); ?>