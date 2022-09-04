<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jude
 */

?>

<footer class="site-footer bg-white py-3 py-lg-4">
	<div class="container">
		<div class="d-lg-flex flex-wrap justify-content-lg-between align-items-center">
			<div class="order-lg-1">
				<?php the_custom_logo(); ?>
			</div>
			<span class="order-lg-3 opacity-75">
				© The Jude Group2022
			</span>

			<ul class="list-unstyled ps-0 px-lg-3 mb-0 d-flex flex-wrap order-lg-2">
				<?php if (get_field('email', 'option')) : ?>
					<li>
						<a href="mailto:<?= the_field('email', 'option') ?>" target="_blank" rel="noopener noreferrer" class="text-uppercase"><?= the_field('email', 'option') ?></a>
					</li>
				<?php endif; ?>
				<?php if (get_field('phone', 'option')) : ?>
					<li>
						<a href="tel:<?= the_field('phone', 'option') ?>" target="_blank" rel="noopener noreferrer" class="text-uppercase"><?= the_field('phone', 'option') ?></a>
					</li>
				<?php endif; ?>

				<?php if (get_field('facebook', 'option')) : ?>
					<li>
						<a href="<?= the_field('facebook', 'option') ?>" target="_blank" rel="noopener noreferrer" class="text-uppercase">FACEBOOK</a>
					</li>
				<?php endif; ?>

				<?php if (get_field('instagram', 'option')) : ?>
					<li>
						<a href="<?= the_field('instagram', 'option') ?>" target="_blank" rel="noopener noreferrer" class="text-uppercase">INSTAGRAM</a>
					</li>
				<?php endif; ?>
				<li>
					<a href="https://goo.gl/maps/EL6wtH2BgKcA5xkh7" target="_blank" rel="noopener noreferrer">6121 Sunset Blvd, Los Angeles, CA 90028</a>
				</li>
			</ul>
		</div>
	</div>

</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>