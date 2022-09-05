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

<main id="primary" class="site-main contact-us pb-5 mb-5">
	<div class="container">
		<div class="row top-section justify-content-center ">
			<div class="about-wrapper">
				<h1 class="mb-5 text-center display-1 font-ivy-thin">Get in touch with us for more information</h1>
				<p class="text-center mb-5">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lor</p>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="row ">
						<div class="col-md-6">
							<div class="block-wrap">
								<div class="text-uppercase">
									FOR BOOKINGS:
								</div>
								<h4 class="mb-3">Laura Elizabeth Andonian</h4>
								<div class="btn-container ">
									<a class="btn btn-dark" href="mailto:laura@thejudegroup.com">laura@thejudegroup.com</a>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="block-wrap">
								<div class="text-uppercase">
									FOR BILLING:
								</div>
								<h4 class="mb-3">Meghan Horwitz</h4>
								<div class="btn-container ">
									<a class="btn btn-dark" href="mailto:meghan@thejudegroup.com">meghan@thejudegroup.com</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>


		<div class="mid-section mt-5 pt-3">
			<div class="row justify-content-center">
				<div class="col-md-7 map-wrap">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.869500875516!2d-118.32332229999999!3d34.0984834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf37e4f9f7af%3A0xd759819ef74497a8!2sThe%20JUDE%20Group!5e0!3m2!1sen!2snp!4v1662281851065!5m2!1sen!2snp" frameborder="0" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				<div class="col-md-5 directions-wrap">
					<div class="d-flex align-items-center justify-content-center h-100">
						<div class="directions mt-5 mb-5 mt-lg-0 mb-lg-0">
							<h4 class="font-ivy-bold">Where Are We Located?</h4>
							<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut</p>

							<ul class="pt-3">
								<h5 class="pb-2"> <a href="https://goo.gl/maps/gkZdX3Juo6J2">Get Directions</a> </h5>
								<li class="location">
									<span> 6121 Sunset Blvd, Los Angeles, CA 90028, Estados Unidos</span>
								</li>
								<li class="mailid">
									<a href="mailto:info@thejudegroup.com">info@thejudegroup.com</a>
								</li>
								<li class="phoneno">
									<a href="tel:323.490.1288"> 323.490.1288</a>
								</li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bottom-section mt-5">
			<div class="row">
				<div class="col-12">
					<h1 class="font-ivy-bold">
						Follow Us on Instagram
					</h1>
					<?php echo do_shortcode('[insta-gallery id="1"]');  ?>
				</div>
			</div>
		</div>

	</div>
</main><!-- #main -->

<?php
get_footer();
