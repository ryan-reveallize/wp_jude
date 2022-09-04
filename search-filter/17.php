<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */
$count=0;
if ( $query->have_posts() ){
	?>
	<div class="row gutters-110">
		<?php
			while ($query->have_posts()){
			$query->the_post();
		?>
		<div class="col-xl-3 col-md-4 col-6 product-item">
			<div class="image-holder">
				<a class="anim-image-hover d-block" href="<?php echo the_permalink(); ?>">
					<?php if( has_post_thumbnail() ) {?>

					<?php  
							if (class_exists('MultiPostThumbnails')) : 
							
							MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL,  'hover-image');
							
								endif;
								?> 
							<?php the_post_thumbnail('square-400',array('class' => 'default-image hover-image listing-gallery w-100')); ?>
					<?php } else { ?>			
						<img src="<?php bloginfo('template_directory') ?>/images/place-holder.png" alt="" />
					<? } ?>
				</a>
			</div>
			<div class="content-holder">
				<h6 class="title mb-3">
					<a href="<?php echo the_permalink(); ?>"><?php the_title();?></a>
				</h6>
				<div class="sizes-status">
					<?php 
			$total = 0;
				while ( have_rows('tabs_repeater') ) : the_row();
					while ( have_rows('tab_header') ) : the_row();
							$sizes=get_sub_field('size');
							$total++;
					endwhile;
			endwhile;
			if($total>0){
			echo 'Avaiable in '.$total. ' sizes';
		}else{
			echo 'Avaiable in 1 size';
		}
			?>
				</div>
			</div>
		</div>
		<?php  $count++; ?>
		<?php
			}
		?>
	</div>

	<?php
}

?>