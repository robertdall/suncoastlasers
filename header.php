<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section, header and top navigation areas
 *
 * @package blm_basic
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'blm_basic' ); ?></a>
	
	<header id="masthead" class="site-header" role="banner">
		<div class="wrap">
			<div id="branding">
				<h2 id="logo"><a href="<?php echo home_url() ?>/"><?php bloginfo( 'name' ); ?></a></h2>
				<h3 id="tagline"><?php bloginfo( 'description' ); ?></h3>
			</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Menu', 'blm_basic' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</div> <!-- #wrap -->	
	</header>