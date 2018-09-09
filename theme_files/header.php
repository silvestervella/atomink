<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

	<!-- Main navigation outer -->
	<section id="main-nav-outer" class="">
		<nav class="nav">
			<?php if ( is_active_sidebar( 'left_sidebar' ) ) : ?>
				<div class="primary-sidebar widget-area" role="complementary">
					<?php dynamic_sidebar( 'left_sidebar' ); ?>
				</div>
			<?php endif; ?>
		</nav>
		<div id="menu-close">X</div>
	</section>
	<!-- /Main navigation -->

	<!-- Left sidebar -->
	<section id="left-sidebar-outer" class="">
		<div id="left-sidebar">
			<!-- logo -->
			<div class="logo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php atominktheme_get_logo_url() ?>" alt="logo" />
				</a>
			</div>
			<!-- /logo -->
			<button class="menu-button" type="button">
				MENU
			</button>
			<span id="copyright">&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?></span>
		</div>
	</section>
	<!-- /Left sidebar -->
			<!-- header -->
			<header class="header clear" role="banner">

			</header>
			<!-- /header -->
