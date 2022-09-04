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
<main id="primary" class="site-main mb-5 pb-5">
        <div class="container">
			
			<div class="row mb-5 pb-5">
				<div class="col-md-6">
					<h1><?php the_title(); ?></h1>
					<p><?php echo get_the_content(); ?></p>

				
					<div class="btn-container">
					<a class="btn btn-dark" href="<?php echo get_the_permalink(); ?>">Work with <?php echo the_title(); ?></a>
					</div>
				</div>
				<div class="col-md-6">
				<?php the_post_thumbnail('',array('class'=>'w-100 height-auto'))?>
				</div>
			</div>


			<div class="row section-heading">
				<div class="col-12">	<h2  class="pb-5">Gallery</h2></div>
			</div>
			<div class="row gallery-wrap">

	
			<?php 
$images = get_field('gallery');
if( $images ): ?>

        <?php foreach( $images as $image ): ?>
			<div class="col-md-4">
                <a href="<?php echo esc_url($image['url']); ?>">
                     <img class="w-100" src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
                <p><?php echo esc_html($image['caption']); ?></p>
				</div>
        <?php endforeach; ?>
	
<?php endif; ?>

			
			</div>
<div class="row justify-content-center mt-5 pt-5 gallery-load-more">
	<div class="col-12 text-center">
	<div class="btn-container text-center">
		<a class="btn btn-dark" >Load More</a>
	</div>
	</div>
</div>
			</div>
	
	</main><!-- #main -->
<script>
	jQuery( document ).ready(function() {
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

jQuery('.gallery-load-more').click(function(){
    jQuery(".gallery-wrap>div").show('slide');
jQuery(this).hide();
});
	});
</script>
<?php
get_footer();
