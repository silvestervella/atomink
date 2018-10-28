<?php 
/*
 * Template Name: Care Page
 * Template Post Type: post , page
 */
get_header(); 
?>
<!-- wrapper -->
<div id="wrapper" >

    <div class="page-title"><h1><?php the_title(); ?></h1></div>

  <main role="main" id="care-page" style="background-image: url(<?php  echo get_the_post_thumbnail_url(); ?>)">

    <div id="care-back-overlay"></div>

<div class="prod-post-outer">
<div> 

                    <?php atominktheme_products_post_gen(array(
                          'post_type' => 'product',
                          'meta_key' => '_custom_post_order',
                          'orderby' => 'meta_value',
                          'order' => 'ASC'
                    )); ?>
                    </div> 
                

                <div id="control-share">
                    <div id="controls">
                        <div id="prev-prod"><i class="fa fa-chevron-left"></i></div>
                        <div id="next-prod"><i class="fa fa-chevron-right"></i></div>
                    </div>
                    <div id="share">
                    <a href="" target="_blank">Share</a>
                    </div>
                </div>


    </div>
  </main>


<?php get_footer(); ?>