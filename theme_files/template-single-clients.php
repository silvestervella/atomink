<?php 
/*
 * Template Name: Client Area Page - Single
 * Template Post Type: page
 */
get_header(); 
?>

	<main role="main">

	<div class="main-wrap">
	<!-- section -->
	<section class="post-outer">

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post title -->

			<!-- /post title -->

			<div class="post-content">
				<?php the_content(); // Dynamic Content ?>
			</div>

			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

			</section>
			<!-- /post-outer -->

		</div>
		<!-- /main-wrap -->
	</main>

<?php get_footer(); ?>
