<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Hemingway Metro
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-header-image">
			<div class="site-branding-wrapper">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<nav id="site-navigation" class="main-navigation clear" role="navigation">
		<h1 class="menu-toggle" title="<?php esc_attr_e( 'Menu', 'hemingway-metro' ); ?>"><span class="screen-reader-text"><?php _e( 'Menu', 'hemingway-metro' ); ?></span></h1>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'hemingway-metro' ); ?></a>

		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		<div id="header-search-toggle">
			<span class="screen-reader-text"><?php _e( 'Search', 'hemingway-metro' ); ?></span>
		</div>
		<div id="header-search">
			<?php get_search_form(); ?>
		</div>
	</nav><!-- #site-navigation -->
	<div id="content" class="site-content">
