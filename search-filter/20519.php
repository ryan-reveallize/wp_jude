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

if ( $query->have_posts() ){
	?>
	<div class="blogs-wrap row no-gutters">
		<?php
			while ($query->have_posts()){
			$query->the_post();
		?>
		<article class="col-md-12 post library-block moreless-cnt-wrap-js">
            <div class="post__outer">
                <div class="post__header">
                    <h2 class="post__title">
                        <a><?php the_title(); ?></a>
                    </h2>
                    <div class="post__meta">
					<?php if(get_field('author_first')):?>
                    <div class="meta-author"><span class="font-weight-bold">Author: </span><?php the_field('author_first'); the_field('author_last')?></div>
					<?php endif;?>
						<?php 
							$categories = get_the_terms( $post->ID, 'book-category' );
							$genres = get_the_terms( $post->ID, 'book-genre' );
						?>
						<?php if($categories):?>
                        <div class="meta-date"><span class="font-weight-bold">Category: </span>
                            <?php
                            // now you can view your category in array:
                            foreach( $categories as $category ) {
                                echo '<a href="'.esc_url( get_category_link( $category->term_id ) ) .'">'.$category->name.'</a>';
                            } ?>
                        </div>
						<?php endif;?>

						<?php if($genres):?>
						<div class="meta-date"><span class="font-weight-bold">Genre: </span>
                            <?php
                            // now you can view your category in array:
                            foreach( $genres as $genre ) {
                                echo '<a href="'.esc_url( get_category_link( $genre->term_id ) ) .'">'.$genre->name.'</a>';
                            } ?>
                        </div>
						<?php endif;?>
                    </div>
                </div>
                <div class="post__details library-details text content moreless-cnt-js">
                        <?php echo get_the_content();?>
                </div>
                <?php if( '' !== get_post()->post_content ) { ?>
                    <a class="more">Read More</a>
                <?php } ?>
            </div>
        </article>
		<?php
			}
		?>
	</div>
	<div class="row">
		<div class="pagination mx-auto">
			<?php 
				echo paginate_links( array(
					'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
					'total'        => $query->max_num_pages,
					'current'      => max( 1, get_query_var( 'paged' ) ),
					'format'       => '?paged=%#%',
					'show_all'     => false,
					'type'         => 'plain',
					'end_size'     => 2,
					'mid_size'     => 1,
					'prev_next'    => true,
					'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous', 'text-domain' ) ),
					'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
					'add_args'     => false,
					'add_fragment' => '',
				) );
			?>
		</div>
	</div>
	<?php
}
else
{
	echo "No Results Found";
}
?>