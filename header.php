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