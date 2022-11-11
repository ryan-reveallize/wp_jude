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
	<div class="row gutters-70 member-items">
		<?php
			while ($query->have_posts()){
			$query->the_post();
		?>
        <div class="col-md-4 col-6">
            <div class="product-card" data-caption="<?php the_title(); ?>" data-fancybox="catGallery" href="<?php the_post_thumbnail_url ('catalog-thumb',array('class'=>'w-100')); ?>">
                <div class="image-holder">
                    <a href="javascript:void(0)">
                        <?php the_post_thumbnail('catalog-thumb',array('class'=>'w-100')) ?>
                        <?php $term_list = get_the_terms($post->ID, 'product_cat_meal'); 
                        $types ='';
                        foreach($term_list as $term_single) {
                            $types .= ucfirst($term_single->slug).', ';
                        }
                        $typesz = rtrim($types, ', ');
                        if($term_list){
                        ?>
                        <div class="counts-as">Counts as: <span><?php echo $typesz; ?></span></div>
                    <?php } ?>                        
                    </a>
                </div>
                <div class="content-holder">
                    <h4 class="title">
                        <a href="javascript:void(0)">
                        <strong class="title__brand">
                            <?php 
                             $terms = get_the_terms( $post->ID, 'brands' );
                             echo $terms[0]->name;
                            ?>
                        </strong>
                        <?php the_title();?>
                    </a></h4>

                </div>
            </div>
        </div>
		<?php  $count++; ?>
		<?php
			}

            
		?>
    
	</div>
    <div class="pagination-wrapper">
        <?php  wp_pagenavi( array( 'query' => $query , 'echo'=>true) ); ?>
        </div>
	<?php
}
else
{
	echo "No Results Found";
}
?>