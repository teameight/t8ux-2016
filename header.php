<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<svg style="display: none;">
		<symbol id="arrow-icon" viewBox="0 0 14 40">
			<polygon id="arrow-line" points="7 36.1 0 32 7 49.3 14 32"/>
			<polygon id="arrow-point" points="6 36.4 8 36.4 8 0 6 0"/>
		</symbol>

		<symbol id="dribbble-icon" viewBox="0 0 32 32">
			<path d="M16 32c-8.8 0-16-7.2-16-16s7.2-16 16-16c8.8 0 16 7.2 16 16s-7.2 16-16 16v0zM29.5 18.2c-0.5-0.1-4.2-1.3-8.5-0.6 1.8 4.9 2.5 8.9 2.7 9.7 3.1-2.1 5.3-5.4 5.9-9.2v0zM21.3 28.6c-0.2-1.2-1-5.4-2.9-10.4 0 0-0.1 0-0.1 0-7.7 2.7-10.5 8-10.7 8.5 2.3 1.8 5.2 2.9 8.4 2.9 1.9 0 3.7-0.4 5.3-1.1v0zM5.8 25.2c0.3-0.5 4.1-6.7 11.1-9 0.2-0.1 0.4-0.1 0.5-0.2-0.3-0.8-0.7-1.6-1.1-2.3-6.8 2-13.4 2-14 2 0 0.1 0 0.3 0 0.4 0 3.5 1.3 6.7 3.5 9.1v0zM2.6 13.2c0.6 0 6.2 0 12.6-1.7-2.3-4-4.7-7.4-5.1-7.9-3.8 1.8-6.7 5.3-7.6 9.6v0zM12.8 2.7c0.4 0.5 2.9 3.9 5.1 8 4.9-1.8 6.9-4.6 7.2-4.9-2.4-2.1-5.6-3.4-9.1-3.4-1.1 0-2.2 0.1-3.2 0.4v0zM26.6 7.4c-0.3 0.4-2.6 3.3-7.6 5.4 0.3 0.7 0.6 1.3 0.9 2 0.1 0.2 0.2 0.5 0.3 0.7 4.6-0.6 9.1 0.3 9.5 0.4 0-3.2-1.2-6.2-3.1-8.5v0z"/>
		</symbol>

		<symbol id="facebook-icon" viewBox="0 0 32 32">
			<path d="M19 6h5v-6h-5c-3.9 0-7 3.1-7 7v3h-4v6h4v16h6v-16h5l1-6h-6v-3c0-0.5 0.5-1 1-1z"/>
		</symbol>

		<symbol id="instagram-icon" viewBox="0 0 32 32">
			<path d="M16 2.9c4.3 0 4.8 0 6.5 0.1 1.6 0.1 2.4 0.3 3 0.6 0.7 0.3 1.3 0.6 1.8 1.2 0.6 0.6 0.9 1.1 1.2 1.8 0.2 0.6 0.5 1.4 0.6 3 0.1 1.7 0.1 2.2 0.1 6.5s0 4.8-0.1 6.5c-0.1 1.6-0.3 2.4-0.5 3-0.3 0.7-0.6 1.3-1.2 1.8-0.6 0.6-1.1 0.9-1.8 1.2-0.6 0.2-1.4 0.5-3 0.6-1.7 0.1-2.2 0.1-6.5 0.1s-4.8 0-6.5-0.1c-1.6-0.1-2.4-0.3-3-0.5-0.7-0.3-1.3-0.6-1.8-1.2-0.6-0.6-0.9-1.1-1.2-1.8-0.2-0.6-0.5-1.4-0.5-3-0.1-1.7-0.1-2.2-0.1-6.5s0-4.8 0.1-6.5c0.1-1.6 0.3-2.4 0.6-3 0.3-0.7 0.6-1.3 1.2-1.8 0.6-0.6 1.1-0.9 1.8-1.2 0.6-0.2 1.4-0.5 3-0.5 1.7-0.1 2.2-0.1 6.5-0.1zM16 0c-4.3 0-4.9 0-6.6 0.1-1.7 0.1-2.9 0.4-3.9 0.7-1.1 0.4-1.9 1-2.8 1.9-0.9 0.9-1.4 1.8-1.8 2.8-0.4 1-0.7 2.2-0.7 3.9-0.1 1.7-0.1 2.3-0.1 6.6s0 4.9 0.1 6.6c0.1 1.7 0.4 2.9 0.7 3.9 0.4 1.1 1 2 1.9 2.8 0.9 0.9 1.8 1.4 2.8 1.8 1 0.4 2.2 0.7 3.9 0.7 1.7 0.1 2.3 0.1 6.6 0.1s4.9 0 6.6-0.1c1.7-0.1 2.9-0.3 3.9-0.7 1.1-0.4 1.9-1 2.8-1.8s1.4-1.8 1.8-2.8c0.4-1 0.7-2.2 0.7-3.9 0.1-1.7 0.1-2.2 0.1-6.6s0-4.9-0.1-6.6c-0.1-1.7-0.3-2.9-0.7-3.9-0.4-1.1-0.9-2-1.8-2.8-0.9-0.9-1.8-1.4-2.8-1.8-1-0.4-2.2-0.7-3.9-0.7-1.7-0.1-2.3-0.1-6.6-0.1v0z"/><path d="M16 7.8c-4.5 0-8.2 3.7-8.2 8.2s3.7 8.2 8.2 8.2 8.2-3.7 8.2-8.2c0-4.5-3.7-8.2-8.2-8.2zM16 21.3c-2.9 0-5.3-2.4-5.3-5.3s2.4-5.3 5.3-5.3c2.9 0 5.3 2.4 5.3 5.3s-2.4 5.3-5.3 5.3z"/><path d="M26.5 7.5c0 1.1-0.9 1.9-1.9 1.9s-1.9-0.9-1.9-1.9c0-1.1 0.9-1.9 1.9-1.9s1.9 0.9 1.9 1.9z"/>
		</symbol>

		<symbol id="linkedin-icon" viewBox="0 0 32 32">
			<path d="M12 12h5.5v2.8h0.1c0.8-1.4 2.7-2.8 5.5-2.8 5.8 0 6.9 3.6 6.9 8.4v9.6h-5.8v-8.5c0-2 0-4.7-3-4.7-3 0-3.5 2.2-3.5 4.5v8.7h-5.8v-18z"/>
			<path d="M2 12h6v18h-6v-18z"/>
			<path d="M8 7c0 1.7-1.3 3-3 3s-3-1.3-3-3c0-1.7 1.3-3 3-3s3 1.3 3 3z"/>
		</symbol>

		<symbol id="twitter-icon" viewBox="0 0 32 32">
			<path d="M32 7.1c-1.2 0.5-2.4 0.9-3.8 1 1.4-0.8 2.4-2.1 2.9-3.6-1.3 0.8-2.7 1.3-4.2 1.6-1.2-1.3-2.9-2.1-4.8-2.1-3.6 0-6.6 2.9-6.6 6.6 0 0.5 0.1 1 0.2 1.5-5.5-0.3-10.3-2.9-13.5-6.9-0.6 1-0.9 2.1-0.9 3.3 0 2.3 1.2 4.3 2.9 5.5-1.1 0-2.1-0.3-3-0.8 0 0 0 0.1 0 0.1 0 3.2 2.3 5.8 5.3 6.4-0.5 0.2-1.1 0.2-1.7 0.2-0.4 0-0.8 0-1.2-0.1 0.8 2.6 3.3 4.5 6.1 4.6-2.2 1.8-5.1 2.8-8.2 2.8-0.5 0-1 0-1.6-0.1 2.9 1.9 6.4 3 10.1 3 12.1 0 18.7-10 18.7-18.7 0-0.3 0-0.6 0-0.8 1.3-0.9 2.4-2.1 3.3-3.4z"/>
		</symbol>
	</svg>

	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/images/favi/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/images/favi/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/images/favi/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/images/favi/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/images/favi/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/images/favi/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/images/favi/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/images/favi/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favi/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favi/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favi/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favi/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favi/favicon-128.png" sizes="128x128" />
	<meta name="application-name" content="&nbsp;"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/images/favi/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="<?php bloginfo('template_directory'); ?>/images/favi/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="<?php bloginfo('template_directory'); ?>/images/favi/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="<?php bloginfo('template_directory'); ?>/images/favi/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="<?php bloginfo('template_directory'); ?>/images/favi/mstile-310x310.png" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="header cf" role="banner">
		<div class="wrap">
			<a href="/" class="t8-home-link">Team Eight</a>
			<a href="<?php echo home_url(); ?>" class="logolink"><img src="<?php bloginfo('template_directory'); ?>/images/micro-block-01.svg" class="logo" alt="Team Eight" /></a>
<!--				<a href="#nav" class="nav-toggle nav-toggle-menu icon-menu"><span class="is-vishidden">Menu</span></a>-->
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			<div class="mobile-menu-toggle"><span class="icon-menu"></span></div>
		</div>
	</header>
		<!-- End .header -->