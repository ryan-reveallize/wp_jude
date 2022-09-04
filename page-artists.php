<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jude
 */

get_header();
?>

<main id="primary" class="site-main pb-5 mb-5">
        <div class="container">

			<h1 class="mb-5">Our Artists</h1>
<div class="artists-filter mb-5">
		<?php echo do_shortcode('[searchandfilter id="37"]'); ?>
		</div>
		<div class="artists-result">
		<?php echo do_shortcode('[searchandfilter id="37" show="results"]'); ?>
		</div>
       </div>
	</main><!-- #main -->

<?php
get_footer();
