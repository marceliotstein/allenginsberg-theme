<?php
	/**
 * @package Apostrophe
 *
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
                <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
                <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
                <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
                <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
                <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
                <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
                <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
                <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
                <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
                <link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
                <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
                <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
                <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
                <link rel="manifest" href="/favicons/manifest.json">
                <meta name="msapplication-TileColor" content="#ffffff">
                <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
                <meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">

			<header id="masthead" class="site-header" role="banner">
				<a href="/"><div class="site-branding">
					<?php
					if ( function_exists( 'jetpack_the_site_logo' ) ) :
					 	jetpack_the_site_logo();
					endif;
					?>
					<!--<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></h1>-->
					<!--<h2 class="site-description"><?php //bloginfo( 'description' ); ?></h2>-->
				</div></a>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<a class="menu-toggle"><?php esc_html_e( '', 'apostrophe' ); ?></a>
					<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'apostrophe' ); ?></a>

					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'apostrophe-navigation',
					) ); ?>

					<?php wp_nav_menu( array(
						'theme_location' => 'social',
						'menu_class'     => 'apostrophe-social',
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => '',
						'depth'          => 1,
					) ); ?>

				</nav><!-- #site-navigation -->

			</header><!-- #masthead -->
                        <div style="clear: both;"></div>

			<div id="content" class="site-content">
