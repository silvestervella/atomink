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
				<div id="header-social-icons">
					<div class="svg-outer">
						<a href="http://facebook.com/Atomink-Tattoo-Studio-1691126397798916" target="_blank">
							<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
							<svg id="facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 430.113 430.114" style="enable-background:new 0 0 430.113 430.114;" xml:space="preserve">
								<!-- facebook -->
								<g>
									<path id="Facebook" d="M158.081,83.3c0,10.839,0,59.218,0,59.218h-43.385v72.412h43.385v215.183h89.122V214.936h59.805   c0,0,5.601-34.721,8.316-72.685c-7.784,0-67.784,0-67.784,0s0-42.127,0-49.511c0-7.4,9.717-17.354,19.321-17.354   c9.586,0,29.818,0,48.557,0c0-9.859,0-43.924,0-75.385c-25.016,0-53.476,0-66.021,0C155.878-0.004,158.081,72.48,158.081,83.3z" fill="#FFFFFF"/>
								</g>
							</svg>
						</a>
					</div>
					<div class="svg-outer">
						<a href="http://instagram.com/atomink_malta" target="_blank">
							<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
							<svg id="instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px">
							<!-- instagram -->	
								<g>
									<path d="M352,0H160C71.648,0,0,71.648,0,160v192c0,88.352,71.648,160,160,160h192c88.352,0,160-71.648,160-160V160    C512,71.648,440.352,0,352,0z M464,352c0,61.76-50.24,112-112,112H160c-61.76,0-112-50.24-112-112V160C48,98.24,98.24,48,160,48    h192c61.76,0,112,50.24,112,112V352z" fill="#FFFFFF"/>
								</g>
								<g>
									<path d="M256,128c-70.688,0-128,57.312-128,128s57.312,128,128,128s128-57.312,128-128S326.688,128,256,128z M256,336    c-44.096,0-80-35.904-80-80c0-44.128,35.904-80,80-80s80,35.872,80,80C336,300.096,300.096,336,256,336z" fill="#FFFFFF"/>
								</g>
								<g>
									<circle cx="393.6" cy="118.4" r="17.056" fill="#FFFFFF"/>
								</g>
							</svg>
						</a>
					</div>
				</div>
			</header>
			<!-- /header -->
