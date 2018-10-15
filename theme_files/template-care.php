<?php 
/*
 * Template Name: Care Page
 * Template Post Type: post
 */
get_header(); 
?>
<!-- wrapper -->
<div id="wrapper" >

  <main role="main" id="care-page" style="background-image: url(<?php  echo get_the_post_thumbnail_url(); ?>)">

    <div id="care-back-overlay"></div>
    <div id="post-wrapper">

                    <?php atominktheme_products_post_gen(array(
                          'post_type' => 'product',
                          'meta_key' => '_custom_post_order',
                          'orderby' => 'meta_value',
                          'order' => 'ASC'
                    )); ?>

                <div id="control-share">
                    <div id="controls">
                        <div id="prev-post"><i class="fa fa-chevron-left"></i></div>
                        <div id="next-post"><i class="fa fa-chevron-right"></i></div>
                    </div>
                    <div id="share">
                    <a href="" target="_blank">Share</a>
                    </div>
                </div>
    </div>
  </main>


<?php get_footer(); ?>