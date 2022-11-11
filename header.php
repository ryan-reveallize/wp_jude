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
    <style>
    .contact-us .top-section{
    background:url(../wp-content/themes/jude/assets/images/contact-back.png);
    background-size:contain;    background-repeat: no-repeat;
    background-position:top right;
    }
    @media screen and (min-width: 768px){
.main-navigation .nav-wrapper {
 
    width: 100vh;
    justify-content: center;
}
}
#cursor {
  opacity: 0;
  width: 0;
  height: 0;
  border-radius: 50%;
  background: #fff;
  border: 0;
  position: fixed;
  left: 0;
  top: 0;
  pointer-events: none;
  transform-origin: center;
  transition: width 0.15s cubic-bezier(0, 1.07, 1, 2.05),
    height 0.15s cubic-bezier(0, 1.07, 1, 2.05), border-radius 0.15s ease-in-out,
    border-color 0.15s ease-in-out, opacity 0.5s ease-in-out;
  border-color: #212529 !important;
}
#cursor span {
  color: #212529 !important;    font-size: 0.9rem !important;
    line-height: 1.5rem;
}

#cursor-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  /*transition: font-size .3s ease-in-out;*/
}

#cursor.expand {
  height: 125px;
  width: 125px;background:#fff;
}

#cursor.expand #cursor-text {
  font-size: 1.25rem;
}

@keyframes underline {
  from {
    width: 0;
  }
  to {
    width: 70%;
  }
}
footer ul a{font-size:12px;}

</style>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script>
		window.onload = function() {
			var myOptions = {
				center: new google.maps.LatLng(40.744556, -73.987378),
				zoom: 18,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				disableDefaultUI: true
			};

			var map = new google.maps.Map(document.getElementById("map"), myOptions);
		}
	</script>
    
    
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
						<?php if (get_field('facebook', 'option')) : ?>
							<li>
								<a href="<?= the_field('facebook', 'option') ?>" class="icon-facebook" target="_blank">
									<?php include get_template_directory() . '/assets/facebook-dark.svg'; ?>
								</a>
							</li>
						<?php endif; ?>

						<?php if (get_field('instagram', 'option')) : ?>
							<li>
								<a href="<?= the_field('instagram', 'option') ?>" class="icon-instagram" target="_blank">
									<?php include get_template_directory() . '/assets/instagram-dark.svg'; ?>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_field('email', 'option')) : ?>
							<li>
								<a href="mailto:<?= the_field('email', 'option') ?>" class="icon-paperplane" target="_blank">
									<?php include get_template_directory() . '/assets/paperplane-dark.svg'; ?>
								</a>
							</li>
						<?php endif; ?>
					</ul>

				</div>
			</nav><!-- #site-navigation -->
		</header>
		<div class="top-logo-container">
			<div class="container">
				<?php the_custom_logo(); ?>
			</div>
		</div>