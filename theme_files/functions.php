<?php
/**
 * 1. Register and enqueue script and styles
 * 2. Register our sidebars and widgetized areas.
 * 5. Add posts excerpt
 * 6. Allow html in post excerpt
 * 7. Add custom css to admin area
 * 8. Get file
 * 10. Add custom logo
 * 11. Enable Shortcodes in WordPress Excerpts and Text Widgets
 * 12. Create albums taxonomy
 * 13. Post generator
 * 16. Gallery posts generator
 * 21. Show post page ID in admin
 * 23. Get post thumbnail outside loop
 * 27. Set Ink CPT title to post Id
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
    wp_register_script( 'slimscroll-script', get_stylesheet_directory_uri() . '/js/jquery.slimscroll.min.js', array( 'jquery' ) );

    // Enqueue Child Scripts
    wp_enqueue_script( 'theme-script' );
    wp_enqueue_script( 'masonry-script' );  
    wp_enqueue_script( 'slimscroll-script' );   

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
 * 8. Get file
 */
function atominktheme_get_file($file_path) {
    readfile(get_stylesheet_directory_uri() . $file_path);
}
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
add_filter( 'the_excerpt', 'shortcode_unautop');
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
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type' => $atts['post_type'],
        'orderby'   => $atts['post_order_by'],
        'order' => $atts['post_order'],
        'meta_key' => $atts['post_meta_key'],
        'posts_per_page' => $atts['num_of_posts'],
        'category-name' => $atts['post_metabox_value2'],
    );
     $query1 = new WP_query ( $args );
     if ( $query1->have_posts() ) :
         while ($query1->have_posts() ) :
         $query1->the_post();  ?>
        <section class="post-outer <?php echo 'post'.get_the_ID(); ?>" id="<?php echo 'post'.get_the_ID(); ?>">
            <div class="page-title"><h1><?php the_title(); ?></h1></div>
            <div class="post-excerpt">
            <?php 
            the_excerpt();
            ?>
            </div>
        </section>
    <?php 
    endwhile; // End looping through custom sorted posts
    wp_reset_postdata();
    endif; // End loop 1
};
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
                wp_reset_postdata();
                endif; // End loop 1
            }
            /**
             * 21. Show post page ID in admin
             */
            add_filter( 'manage_posts_columns', 'atominktheme_revealid_add_id_column', 5 );
            add_action( 'manage_posts_custom_column', 'atominktheme_revealid_id_column_content', 5, 2 );
            function atominktheme_revealid_add_id_column( $columns ) {
            $columns['revealid_id'] = 'ID';
            return $columns;
            }
            function atominktheme_revealid_id_column_content( $column, $id ) {
            if( 'revealid_id' == $column ) {
                echo $id;
            }
            }
            /**
             * 23. Get post thumbnail outside loop
             */
            function atominktheme_get_post_page_thumb_url($id) {
                $post = get_post($id);
                $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
                return $featured_img_url;
            }
            /**
             * 27. Set Ink CPT title to post Id
             */
            function atominktheme_default_title( $post_title, $post ) {
                if( 'images' == $post->post_type ) {
                    return $post->ID;
                }
                return $post_title;
            }
            add_filter( 'default_title', 'atominktheme_default_title', 20, 2 ); ?>