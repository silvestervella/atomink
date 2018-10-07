<?php 
/*
 * Template Name: Care Page
 * Template Post Type: post
 */
get_header(); 
?>
<!-- wrapper -->
<div id="wrapper" >

  <main role="main" id="care-page">

                    <?php atominktheme_products_post_gen(array(
                          'post_type' => 'product',
                          'meta_key' => '_custom_post_order',
                          'orderby' => 'meta_value',
                          'order' => 'ASC'
                    )); ?>

  </main>


<?php get_footer(); ?>