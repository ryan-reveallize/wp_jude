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

$args = array(
    'post_type'                => 'artists',
    'posts_per_page'           => 9,
    'orderby'                  => 'name',
    'order'                    => 'ASC',
    'meta_key'        => '',
    'meta_value'    => $_GET['filter']
);

$query = new WP_Query($args);


$count = 0;
if ($query->have_posts()) {
    $total_posts = $query->found_posts;
?>

<?php

    $current_page = $query->query_vars['paged'];
    $current_post_count = $query->post_count - 1;
    $posts_per_page = $query->query_vars['posts_per_page'];
    $total_posts = $query->found_posts;

    $posts_start = ($current_page - 1) * $posts_per_page + 1;
    if ($posts_per_page > $total_posts) {
        $posts_start = 1;
    }
    $posts_end = $posts_start + $current_post_count;

    ?>

<div class="row gutters-40_ artists-wrap mb-5">
    <?php
        while ($query->have_posts()) {
            $query->the_post();
        ?>

    <div class="col-lg-4 col-md-6 mb-5 animate__animated" data-animate="fadeInUp">
        <div class="block-wrap">
            <div class="img-wrap">
                <?php /*?>
                <div class="linkwrap">
                    <div class="weblink">
                        <a href="<?php echo get_field('website'); ?>"><img
                                src="<?php bloginfo('template_directory')?>/assets/feather-link.svg" alt=""></a>
                    </div>
                    <div class="instalink">
                        <a href="<?php echo get_field('instagram'); ?>">
                            <img src="<?php bloginfo('template_directory')?>/assets/feather-instagram.svg" alt=""></a>
                    </div>
                </div>

                <?php */ ?>

                <?php if (has_post_thumbnail()) { ?> <a class="anim-image-hover d-block weblink"
                    href="<?php echo the_permalink(); ?>">
                    <div class="c-card bg-img"
                        style="background-image:url(<?php the_post_thumbnail_url('', array('class' => 'listing-artists w-100')) ?>);">

                        <?php } else {
                                ?> <a class="anim-image-hover d-block weblink" href="<?php echo the_permalink(); ?>">
                            <div class="c-card bg-img "
                                style="background-image:url(<?php bloginfo('template_directory') ?>/assets/placeholder.jpg);">

                                <?php } ?>


                            </div>
                        </a>

                    </div>
                    <h3 class="mt-4 mb-3"> <a href="<?php echo the_permalink(); ?>"
                            style="color:#1f2227;"><?php the_title(); ?></a></h3>

                    <?php /*?>
                    <ul class="img-categories">

                        <?php

// Check rows exists.
if( have_rows('gallery_options') ):
$count=0;
	// Loop through rows.
	while( have_rows('gallery_options') ) : the_row();

?>

                        <?php 
$title = get_sub_field('title');
?>
                        <li><?php echo $title;  ?></li>

                        <?php
					// End loop.
					$count++;
					endwhile;

				// No value.
				else :
					// Do something...
				endif;
				?>

                        <li>
                            <?php	
				$i=1;
					while( have_rows('gallery_options') ) : the_row();

					$i++;
				endwhile;
				if($i>4){echo '+3'; }
				
				?>
                        </li>


                    </ul>

                    <?php */ ?>
                    <div class="btn-container">
                        <a class="btn btn-blue btn-dark" href="<?php echo get_the_permalink(); ?>">Portfolio</a>
                    </div>

            </div>
        </div>
        <?php $count++; ?>
        <?php
        }
            ?>

    </div>
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <?php // Pagination
                    $total = $query->max_num_pages;

                    // only bother with pagination if we have more than 1 page
                    if ($total > 1) : ?>
            <nav class="pagination text-center">
                <?php
                            // Set up pagination to use later on
                            $big = 999999999; // need an unlikely integer
                            $pagination = paginate_links(array(
                                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format'    => '?paged=%#%',
                                'current'   => $current_page,
                                'total'     => $total,
                                'type'      => 'plain',
                                'prev_next' => true,
                                'prev_text' => __('', 'visceral'),
                                'next_text' => __('', 'visceral')
                            ));

                            echo $pagination; ?>
            </nav>
            <?php endif; ?>
        </div>
    </div>
    <?php
    } else {
        echo "No Results Found";
    }
        ?>

    <script>
    jQuery(document).ready(function() {

        jQuery('.img-categories>li').hide();
        jQuery(".img-categories>li:nth-child(1)").show();
        jQuery(".img-categories>li:nth-child(2)").show();
        jQuery(".img-categories>li:nth-child(3)").show();
        jQuery(".img-categories>li:nth-child(4)").show();
        jQuery(".img-categories>li:last-child").show();


    });
    </script>