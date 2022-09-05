<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Jude
 */

get_header();
?>
<main id="primary" class="site-main mb-5 pb-5 single-artist">
	<div class="container">

		<div class="row mb-5 pb-5">
			<div class="col-md-6">
				<div class="about-wrapper">
					<h1 class="artist-title font-ivy-thin display-2"><?php the_title(); ?></h1>
					<p><?php echo get_the_content(); ?></p>


					<div class="btn-container">
						<a class="btn btn-dark" href="<?php echo get_the_permalink(); ?>">Work with <?php echo the_title(); ?></a>
					</div>
				</div>
			</div>
			<div class="col-md-6 pt-5 mt-lg-5">
				<?php the_post_thumbnail('', array('class' => 'w-100 height-auto')) ?>
			</div>
		</div>


		<div class="row section-heading">
			<div class="col-12">
				<h2 class="pb-5 font-ivy-bold">Gallery</h2>
			</div>
		</div>
		<ul class="nav nav-tabs mb-5" id="myTab" role="tablist">

			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="All-tab" data-bs-toggle="tab" data-bs-target="#All" type="button" role="tab" aria-controls="All" aria-selected="true">All</button>
			</li>
			<?php

			// Check rows exists.
			if (have_rows('gallery_options')) :
				$count = 0;
				// Loop through rows.
				while (have_rows('gallery_options')) : the_row();
			?>


					<li class="nav-item" role="presentation">
						<button class="nav-link" id="<?php echo get_sub_field('title'); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo get_sub_field('title'); ?>" type="button" role="tab" aria-controls="<?php echo get_sub_field('title'); ?>" aria-selected="true"><?php echo get_sub_field('title'); ?></button>
					</li>


			<?php
					$count++;
				// End loop.
				endwhile;

			// No value.
			else :
			// Do something...
			endif;
			?>

		</ul>

		<div class="tab-content" id="myTabContent">


			<div class="tab-pane fade show active" id="<?php echo get_sub_field('title'); ?>" role="tabpanel" aria-labelledby="All-tab">
				<div class="gallery-wrap row">



					<?php

					// Check rows exists.
					if (have_rows('gallery_options')) :
						$count = 0;
						// Loop through rows.
						while (have_rows('gallery_options')) : the_row();

					?>

							<?php
							$images = get_sub_field('images');

							if ($images) : ?>

								<?php foreach ($images as $image) : ?>
									<div class="col-md-4 mb-5">
										<div class="c-card bg-img" style="background-image:url('<?php echo esc_url($image['url']); ?>')">

											<a href="<?php echo esc_url($image['url']); ?>">
												<img class="w-100" src="" alt="<?php echo esc_attr($image['alt']); ?>" />
											</a>

										</div>

									</div>
								<?php endforeach; ?>

							<?php endif; ?>


					<?php
							// End loop.
							$count++;
						endwhile;

					// No value.
					else :
					// Do something...
					endif;
					?>

				</div>
			</div>





			<?php

			// Check rows exists.
			if (have_rows('gallery_options')) :
				$count = 0;
				// Loop through rows.
				while (have_rows('gallery_options')) : the_row();

			?>

					<div class="tab-pane fade" id="<?php echo get_sub_field('title'); ?>" role="tabpanel" aria-labelledby="<?php echo get_sub_field('title'); ?>-tab">
						<div class="gallery-wrap row">


							<?php
							$images = get_sub_field('images');

							if ($images) : ?>

								<?php foreach ($images as $image) : ?>
									<div class="col-md-4 mb-5">
										<div class="c-card bg-img" style="background-image:url('<?php echo esc_url($image['url']); ?>')">

											<a href="<?php echo esc_url($image['url']); ?>">
												<img class="w-100" src="" alt="<?php echo esc_attr($image['alt']); ?>" />
											</a>

										</div>
									</div>
								<?php endforeach; ?>

							<?php endif; ?>




						</div>
					</div>


			<?php
					// End loop.
					$count++;
				endwhile;

			// No value.
			else :
			// Do something...
			endif;
			?>
		</div>



		<div class="row justify-content-center mt-5 pt-5 gallery-load-more">
			<div class="col-12 text-center">
				<div class="btn-container text-center">
					<a class="btn btn-dark">Load More</a>
				</div>
			</div>
		</div>
	</div>

</main><!-- #main -->
<script>
	jQuery(document).ready(function() {
		jQuery(".nav-tabs li:not(:first-child)").click(function() {
			jQuery('.tab-content>div:first-child').removeClass('active');
			jQuery('.tab-content>div:first-child').removeClass('show');
		});
		jQuery(".nav-tabs li:first-child").click(function() {
			jQuery('.tab-content>div:first-child').addClass('active');
			jQuery('.tab-content>div:first-child').addClass('show');
		});

		jQuery('.gallery-wrap>div').hide();
		jQuery(".gallery-wrap>div:nth-child(1)").show();
		jQuery(".gallery-wrap>div:nth-child(2)").show();
		jQuery(".gallery-wrap>div:nth-child(3)").show();
		jQuery(".gallery-wrap>div:nth-child(4)").show();
		jQuery(".gallery-wrap>div:nth-child(5)").show();
		jQuery(".gallery-wrap>div:nth-child(6)").show();
		jQuery(".gallery-wrap>div:nth-child(7)").show();
		jQuery(".gallery-wrap>div:nth-child(8)").show();
		jQuery(".gallery-wrap>div:nth-child(9)").show();

		jQuery('.gallery-load-more').click(function() {
			jQuery(".gallery-wrap>div").show('slide');
			jQuery(this).hide();
		});
	});
</script>
<?php
get_footer();
