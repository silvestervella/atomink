	<!-- right sidebar -->
	<section id="right-sidebar-outer" class="">
		<div id="right-sidebar">
			<?php if ( is_active_sidebar( 'right_sidebar' ) ) : ?>
					<div class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'right_sidebar' ); ?>
					</div><!-- #primary-sidebar -->
			<?php endif; ?>
			<div id="sb-pag-outer">

				<?php atominktheme_generate_rightnav_drops(); ?>

			</div>
			<div class="buttons">
					<button class="prev-article"><i class="fa fa-chevron-up"></i></button>
					<button class="next-article"><i class="fa fa-chevron-down"></i></button>
			</div>
		</div>
	</section>
	<!-- /right sidebar -->
