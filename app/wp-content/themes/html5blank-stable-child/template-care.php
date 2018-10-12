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

                    <?php atominktheme_products_post_gen(array(
                          'post_type' => 'product',
                          'meta_key' => '_custom_post_order',
                          'orderby' => 'meta_value',
                          'order' => 'ASC'
                    )); ?>

                    <div class="buttons">
					<button class="prev-article"><i class="fa fa-chevron-up"></i></button>
					<button class="next-article"><i class="fa fa-chevron-down"></i></button>
			</div>

  </main>


<?php get_footer(); ?>