
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
	<div class="row gutters-80">
		<?php
			while ($query->have_posts()){
			$query->the_post();
		?>
		<div class="col-lg-4 col-6 project-item">
			<div class="image-holder">
				<a class="anim-image-hover" href="<?php echo the_permalink(); ?>">
					<?php the_post_thumbnail('square-400',array('class'=>'listing-gallery'))?>
				</a>
			</div>
			<div class="content-holder">
				<h6 class="title mb-4">
					<a href="<?php echo the_permalink(); ?>"><?php the_title();?></a>
				</h6>
			
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