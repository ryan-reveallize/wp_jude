<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jude
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header>
			<nav id="site-navigation" class="main-navigation">
				<div class="d-flex d-md-none justify-content-between align-items-center py-2 px-3">
					<?php the_custom_logo(); ?>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
				</div>
				<div class="nav-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'	 => 'side-menu',
						)
					);
					?>
					<ul class="nav-social">
						<li>
							<a href="#" class="icon-facebook">
								<?php include get_template_directory() . '/assets/facebook.svg'; ?>
							</a>
						</li>
						<li>
							<a href="#" class="icon-instagram">
								<?php include get_template_directory() . '/assets/instagram.svg'; ?>
							</a>
						</li>
						<li>
							<a href="#" class="icon-paperplane">
								<?php include get_template_directory() . '/assets/paperplane.svg'; ?>
							</a>
						</li>
					</ul>

				</div>
			</nav><!-- #site-navigation -->
		</header>