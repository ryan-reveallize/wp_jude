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
	<div class="form-row member-items">
		<?php
			while ($query->have_posts()){
			$query->the_post();
		?>
		<div class="col-lg-4 col-sm-6 member-item">
			<div class="form-row align-items-center">
				<div class="col-auto image-holder">
					<a data-fancybox data-src="#modal<?php echo $count;?>" href="javascript:void(0);">
						<?php the_post_thumbnail('square-400',array('class'=>'w-100'))?>
					</a>
				</div>
				<div class="col content-holder">
					<h4 class="title"><a data-fancybox data-src="#modal<?php echo $count;?>"
							href="javascript:void(0);"><?php the_title();?></a></h4>
					<?php $terms = get_the_terms( get_the_ID(), 'team-position' ); ?>
					<p><?php the_field('title');?></p>
					<a class="read-more" data-fancybox data-src="#modal<?php echo $count;?>"
						href="javascript:void(0);">More Info</a>
				</div>
			</div>
			<div style="display: none;" id="modal<?php echo $count;?>">
				<div class="tanya-popup">
					<div class="form-row">
						<div class="col-md-4 left">
							<div class="img-holder">
								<?php the_post_thumbnail('square-400',array('class'=>'w-100'))?>
							</div>
							<div class="title-wrapper">
								<h3 class="name"><?php the_title();?></h3>
								<p class="position"><?php echo $terms[0]->name; ?></p>
							</div>
							<ul class="list">
								<li class="location">
									<a class="form-row align-items-center" href="">
										<div class="col-auto"><img class="ico-holder" src="<?php bloginfo('template_directory')?>/images/location.svg" alt=""></div>
										<div class="col text-holder"><?php the_field('location')?></div>
									</a>
								</li>
								<li class="email">
									<a class="form-row align-items-center" href="mailto:<?php the_field('email');?>">
										<div class="col-auto"><img class="ico-holder" src="<?php bloginfo('template_directory')?>/images/email.svg" alt=""></div>
										<div class="col text-holder"><?php the_field('email');?></div>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-md-8 right d-md-flex flex-column">
							<div class="content popupOverlayScrollbars">
								<?php the_content(); ?>
							</div>
<!-- 
							<div class="personal-icons mt-auto">
								<a href="<?php the_field('email');?>" target="_blank" title="facebook">
									<span class="icon-facebook"></span>
								</a>
								<a href="<?php the_field('email');?>" target="_blank" title="twitter">
									<span class="icon-twitter"></span>
								</a>
								<a href="<?php the_field('email');?>" target="_blank" title="venmo">
									<span class="icon-venmo"></span>
								</a>
							</div> -->
						</div>
					</div>
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
else
{
	echo "No Results Found";
}
?>