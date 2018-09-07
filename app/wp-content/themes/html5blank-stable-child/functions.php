<?php
/**
 * 1. Register and enqueue script and styles
 * 2. Register our sidebars and widgetized areas.
 * 3. Set post featured image as background.
 * 4. Set post position order
 * 5. Add posts excerpt
 * 6. Allow html in post excerpt
 * 7. Add custom css to admin area
 * 8. Add custom metaboxes to posts
 * 9. Add custom post type
 * 10. Add custom logo
 * 11. Enable Shortcodes in WordPress Excerpts and Text Widgets
 * 12. Create albums taxonomy
 * 13. Post generator
 * 14. Enable post thumbnail
 * 15. Right navigation drops generator
 * 16. Gallery posts generator
 * 17. Show featured image column in post list admin page
 * 18. Home page ink post
 */

 
/**
 * 1. Register and enqueue script and styles
 *
 */
    // De-register HTML5 Blank styles
    function atominktheme_styles_make_child_active()
    {
    wp_deregister_style('atominktheme'); // Enqueue it!
    }
    add_action('wp_enqueue_scripts', 'atominktheme_styles_make_child_active', 100); // Add Theme Child Stylesheet

    // Load HTML5 Blank Child styles
    function atominktheme_styles_child()
    {
    // Register Child Styles
    wp_register_style('child-fontawesome', get_stylesheet_directory_uri() . '/css/web-fonts-with-css/css/fontawesome-all.css', array(), '1.0', 'all');
    wp_register_style('atominktheme-child', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_register_style('child-all', get_stylesheet_directory_uri() . '/css/all.css', array(), '1.0', 'all');
    //wp_register_style('child-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
    
    // Enqueue Child Styles
    wp_enqueue_style('child-fontawesome'); 
    wp_enqueue_style('atominktheme-child'); 
    wp_enqueue_style('child-bootstrap'); 
    wp_enqueue_style('child-all');

    //Register Child Scripts
    wp_register_script( 'theme-script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ) );
    wp_register_script( 'masonry-script', get_stylesheet_directory_uri() . '/js/jquery.masonry.min.js', array( 'jquery' ) );
    
    // Enqueue Child Scripts
    wp_enqueue_script( 'theme-script' );
    wp_enqueue_script( 'masonry-script' );   

}
    add_action('wp_enqueue_scripts', 'atominktheme_styles_child', 20); // Add Theme Child Stylesheet
    

/**
 * 2. Register our sidebars and widgetized areas.
 *
 */
function atominktheme_widgets_init() {

	register_sidebar( array(
		'name'          => 'Left Sidebar',
		'id'            => 'left_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
		'name'          => 'Right Sidebar',
		'id'            => 'right_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
		'name'          => 'Menu Search',
		'id'            => 'menu_search',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'atominktheme_widgets_init' );


/**
 * 3. Set post featured image as background.
 */
$thumb = get_the_post_thumbnail_url();




/**
* 4. Set post position order
*/
/* Create custom meta data box to the post edit screen */
function atominktheme_custom_post_sort( $post ){
    add_meta_box( 
        'custom_post_sort_box', 
        'Position in List of Posts', 
        'atominktheme_custom_post_order', 
        'post' ,
        'side'
        );
    }
    add_action( 'add_meta_boxes', 'atominktheme_custom_post_sort' );
  
    /* Add a field to the metabox */
  function atominktheme_custom_post_order( $post ) {
      wp_nonce_field( basename( __FILE__ ), 'atominktheme_custom_post_order_nonce' );
      $current_pos = get_post_meta( $post->ID, '_custom_post_order', true); ?>
      <p>Enter the position at which you would like the post to appear. For exampe, post "1" will appear first, post "2" second, and so forth.</p>
      <p><input type="number" name="pos" value="<?php echo $current_pos; ?>" /></p>
      <?php
    }
  
    /* Save the input to post_meta_data */
  function atominktheme_save_custom_post_order( $post_id ){
      if ( !isset( $_POST['atominktheme_custom_post_order_nonce'] ) || !wp_verify_nonce( $_POST['atominktheme_custom_post_order_nonce'], basename( __FILE__ ) ) ){
        return;
      } 
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
        return;
      }
      if ( ! current_user_can( 'edit_post', $post_id ) ){
        return;
      }
      if ( isset( $_REQUEST['pos'] ) ) {
        update_post_meta( $post_id, '_custom_post_order', sanitize_text_field( $_POST['pos'] ) );
      }
    }
    add_action( 'save_post', 'atominktheme_save_custom_post_order' );
  
    /* Add custom post order column to post list */
  function atominktheme_add_custom_post_order_column( $columns ){
      return array_merge ( $columns,
        array( 'pos' => 'Position', ));
    }
    add_filter('manage_posts_columns' , 'atominktheme_add_custom_post_order_column');
  
    /* Display custom post order in the post list */
  function atominktheme_custom_post_order_value( $column, $post_id ){
      if ($column == 'pos' ){
        echo '<p>' . get_post_meta( $post_id, '_custom_post_order', true) . '</p>';
      }
  }
  add_action( 'manage_posts_custom_column' , 'atominktheme_custom_post_order_value' , 10 , 2 );



  /**
   * 5. Add posts excerpt
   */
  add_post_type_support( 'page', 'excerpt' );


  /**
   * 6. Allow html in post excerpt
   */
  function atominktheme_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>';
    }

if ( ! function_exists( 'atominktheme_custom_wp_trim_excerpt' ) ) : 

    function atominktheme_custom_wp_trim_excerpt($atominktheme_excerpt) {
    global $post;
    $raw_excerpt = $atominktheme_excerpt;
        if ( '' == $atominktheme_excerpt ) {

            $atominktheme_excerpt = get_the_content('');
            $atominktheme_excerpt = strip_shortcodes( $atominktheme_excerpt );
            $atominktheme_excerpt = apply_filters('the_content', $atominktheme_excerpt);
            $atominktheme_excerpt = str_replace(']]>', ']]>', $atominktheme_excerpt);
            $atominktheme_excerpt = strip_tags($atominktheme_excerpt, atominktheme_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
                $excerpt_word_count = 75;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $atominktheme_excerpt, $tokens);

                foreach ($tokens[0] as $token) { 

                    if ($count >= $excerpt_word_count && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) {
                    // Limit reached, continue until , ; ? . or ! occur at the end
                        $excerptOutput .= trim($token);
                        break;
                    }

                    // Add words to complete sentence
                    $count++;

                    // Append what's left of the token
                    $excerptOutput .= $token;
                }

            $atominktheme_excerpt = trim(force_balance_tags($excerptOutput));

                $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'atominktheme' ), get_the_title()) . '</a>';
                $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 

                //$pos = strrpos($atominktheme_excerpt, '</');
                //if ($pos !== false)
                // Inside last HTML tag
                //$atominktheme_excerpt = substr_replace($atominktheme_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
                //else
                // After the content
                $atominktheme_excerpt .= $excerpt_end; /*Add read more in new paragraph */

            return $atominktheme_excerpt;   

        }
        return apply_filters('atominktheme_custom_wp_trim_excerpt', $atominktheme_excerpt, $raw_excerpt);
    }

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'atominktheme_custom_wp_trim_excerpt');


/**
 * 7. Add custom css to admin area
 */
add_action( 'admin_enqueue_scripts', 'atominktheme_custom_admin_css' );
function atominktheme_custom_admin_css() {
	wp_enqueue_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
}


/**
 * 
 * 8. Add custom metaboxes to posts
 */
/**
 * Adds a meta box to the post editing screen
 */
function atominktheme_custom_meta() {
    add_meta_box( 'atominktheme_meta', __( 'Post Tagline', 'atominktheme-textdomain' ), 'atominktheme_meta_callback', 'post' );
    add_meta_box( 'atominktheme_meta_two', __( 'Post Link', 'atominktheme-linktext' ), 'atominktheme_metatwo_callback', 'post' );
}
add_action( 'add_meta_boxes', 'atominktheme_custom_meta' );

/**
 * Outputs the content of the meta box
 */
function atominktheme_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'atominktheme_nonce' );
    $atominktheme_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
        <label for="top-text" class="atominktheme-row-title"><?php _e( 'Top Text', 'atominktheme-textdomain' )?></label>
        <input type="text" name="top-text" id="top-text" value="<?php if ( isset ( $atominktheme_stored_meta['top-text'] ) ) echo $atominktheme_stored_meta['top-text'][0]; ?>" /><br>
        <label for="bottom-tex" class="atominktheme-row-title"><?php _e( 'Bottom Text', 'atominktheme-textdomain' )?></label>
        <input type="text" name="bottom-text" id="bottom-text" value="<?php if ( isset ( $atominktheme_stored_meta['bottom-text'] ) ) echo $atominktheme_stored_meta['bottom-text'][0]; ?>" />

    </p>
 
    <?php
}
function atominktheme_metatwo_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'atominktheme_nonce' );
    $atominktheme_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
        <label for="link-text" class="atominktheme-row-title"><?php _e( 'LInk Text', 'atominktheme-linktext' )?></label>
        <input type="text" name="link-text" id="link-text" value="<?php if ( isset ( $atominktheme_stored_meta['link-text'] ) ) echo $atominktheme_stored_meta['link-text'][0]; ?>" /><br>
    </p>
 
    <?php
}

/**
 * Saves the custom meta input
 */
function atominktheme_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'atominktheme_nonce' ] ) && wp_verify_nonce( $_POST[ 'atominktheme_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'top-text' ] ) ) {
        update_post_meta( $post_id, 'top-text', sanitize_text_field( $_POST[ 'top-text' ] ) );
    }
    if( isset( $_POST[ 'bottom-text' ] ) ) {
        update_post_meta( $post_id, 'bottom-text', sanitize_text_field( $_POST[ 'bottom-text' ] ) );
    }
    if( isset( $_POST[ 'link-text' ] ) ) {
        update_post_meta( $post_id, 'link-text', sanitize_text_field( $_POST[ 'link-text' ] ) );
    }
 
}
add_action( 'save_post', 'atominktheme_meta_save' );

/**
 * 9. Add custom post type
 */
function atominktheme_post_types() {
    register_post_type( 'blog_post',
      array(
        'labels' => array(
          'name' => __( 'Blog' ),
          'singular_name' => __( 'Blog' )
        ),
        'public' => true,
        'has_archive' => true,
      )
    );
    register_post_type( 'images',
    array(
      'labels' => array(
        'name' => __( 'The Ink' ),
        'singular_name' => __( 'The Ink' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  }
  add_action( 'init', 'atominktheme_post_types' );

  /**
   * 10. Add custom logo
   */
  function atominktheme_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );

}
function atominktheme_get_logo_url() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    echo $image[0];
}
add_action( 'after_setup_theme', 'atominktheme_setup' );


  /**
   * 11. Enable Shortcodes in WordPress Excerpts and Text Widgets
   */
add_filter('the_excerpt', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');


/**
 * 12. Create albums taxonomy
 */
function atominktheme_custom_taxonomy() {
    // create a new taxonomy
    register_taxonomy(
        'header-back-images',
        'images',
        array(
            'label' => __( 'Albums' ),
            'rewrite' => array( 'slug' => 'header-back-images' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'atominktheme_custom_taxonomy' );



/**
 * 13. Post generator
 */
function atominktheme_generate_posts($atts) { 
    
    $args = array(
        'post_type' => $atts['post_type'],
        'orderby'   => $atts['post_order_by'],
        'order' => $atts['post_order'],
        'meta_key' => $atts['post_meta_key'],
        'posts_per_page' => $atts['num_of_posts'],

        // $p_meta_box is the taxonomy we registered (instead of categories) for cpt
        'header-back-images' => $atts['post_metabox_value'],
        'category-name' => $atts['post_metabox_value2']
    );
    
     $query1 = new WP_query ( $args );
     if ( $query1->have_posts() ) :
         while ($query1->have_posts() ) :
         $query1->the_post(); 

         // check if $p_meta_key "_custom_post_order" exists
         if (in_array("_custom_post_order", $args)) { ?>
        <section class="post-outer">
            <div class="post-excerpt">
            <?php the_excerpt(); ?>
            </div>

                <?php };

                if (in_array("header-top-images", $args)) {
            ?>

            <div class="image-outer"><?php the_post_thumbnail()  ?></div>
                
                <?php }; ?>
                            
        </section>

                <?php
    endwhile; // End looping through custom sorted posts
    endif; // End loop 1
}
add_shortcode('getposts','atominktheme_generate_posts');

    /**
     * 14. Enable post thumbnail
     */
    add_theme_support('post-thumbnails');
    add_post_type_support( 'images', 'thumbnail' );  



    /**
     * 15. Right navigation drops generator
     */
    function atominktheme_generate_rightnav_drops() { 
        $args = array(
			'post_type' => '',
			'meta_key' => '_custom_post_order',
			'orderby' => 'meta_value',
            'order' => 'ASC',
            'category_name' => 'front-page-post'
         );
         $query1 = new WP_query ( $args );
         if ( $query1->have_posts() ) :
             while ($query1->have_posts() ) :
             $query1->the_post(); 
            ?>
          
				<div class="drop">

                <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 109.5 204.8" style="enable-background:new 0 0 109.5 204.8;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill:#55A8C1;}
                </style>
                <path class="st0" d="M102.7,134.1c0,33.9-21.5,61.4-47.9,61.4S6.9,168,6.9,134.1S54.8,9.3,54.8,9.3S102.7,100.2,102.7,134.1z"/>
                </svg>

                </div>
    
                    <?php
        endwhile; // End looping through custom sorted posts
        endif; // End loop 1
    }




    /**
     * 16. Gallery posts generator
     */
    function atominktheme_generate_gallery_posts($atts) { 


        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => $atts['post_type'],
            'orderby'   => $atts['post_order_by'],
            'order' => $atts['post_order'],
            'meta_key' => $atts['post_meta_key'],
            'posts_per_page' => $atts['num_of_posts'],
    
            // $p_meta_box is the taxonomy we registered (instead of categories) for cpt
            'header-back-images' => $atts['post_metabox_value']
         );
         $query1 = new WP_query ( $args );
         if ( $query1->have_posts() ) :
             while ($query1->have_posts() ) :
             $query1->the_post();  ?>

                <div class="gallery-post">
                    <?php the_post_thumbnail()  ?>
                    <input type="hidden" value="<?php echo the_permalink(); ?>" />
                </div>                
    
            <?php
                endwhile; // End looping through custom sorted posts
                endif; // End loop 1
            }



    /**
     * 17. Show featured image column in post list admin page
     */
    add_filter('manage_images_posts_columns', 'atominktheme_add_thumbnail_column', 5);
 
        function atominktheme_add_thumbnail_column($columns){
        $columns['new_post_thumb'] = __('Featured Image');
        return $columns;
        }
        
        add_action('manage_posts_custom_column', 'display_thumbnail_column', 5, 2);
        
        function display_thumbnail_column($column_name, $post_id){
        switch($column_name){
            case 'new_post_thumb':
            $post_thumbnail_id = get_post_thumbnail_id($post_id);
            if ($post_thumbnail_id) {
                $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
                echo '<img width="180" src="' . $post_thumbnail_img[0] . '" />';
            }
            break;
        }
        }


        add_filter( 'the_excerpt', 'shortcode_unautop');
        add_filter( 'the_excerpt', 'do_shortcode');


        /**
         * 18. Home page ink post
         */
        function atominktheme_homeInkPost() {
            ?>
            <div id="active-post">
            <div id="img-outer">
              <img src="" alt="tattoo image" />
              <div id="controls">
                <div id="prev-post">Prev</div>
                <div id="next-post">Next</div>
              </div>
              <div id="share">
                <a href="" target="_blank">Share</a>
            </div>
            </div>
          </div>
          <?php
            atominktheme_generate_gallery_posts(array(
                'post_type' =>"images" , 
                'post_order_by'=>"date",
                'post_order'=>"ASC",
                'post_meta_key'=>"",
                'num_of_posts'=>"",
                'post_metabox_value'=>"gallery-images"
              ));
        }
        add_shortcode('getgallery','atominktheme_homeInkPost');


        ?>