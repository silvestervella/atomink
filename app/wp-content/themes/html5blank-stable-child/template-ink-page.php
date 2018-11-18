<?php 
/*
 * Template Name: Ink Page
 * Template Post Type: post
 */
get_header(); 
?>
<!-- wrapper -->
<div id="wrapper" >

  <main role="main" id="ink-page">
    <div id="active-post">
      <div id="active-post-blur"></div>
      <div id="img-outer">
        <img src="" alt="tattoo image" />
      </div>
      <div class="control-share">
        <div class="controls">
            <div id="home-prev-img"><i class="fa fa-chevron-left"></i></div>
            <div id="home-next-img"><i class="fa fa-chevron-right"></i></div>
        </div>
        <div id="share">
          <a href="" target="_blank">Share</a>
        </div>
      </div>
    </div>
    
    <div class="page-title"><h1><?php the_title(); ?></h1></div>

    <div id="gallery-posts-outer">
      <?php atominktheme_generate_gallery_posts(array(
        'post_type' =>"images" , 
        'post_order_by'=>"date",
        'post_order'=>"ASC",
        'post_meta_key'=>"",
        'num_of_posts'=>"-1",
        'post_metabox_value'=>"gallery-images"
      )); ?>
    </div>
  </main>


<?php get_footer(); ?>