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

<?php
$career_post_type = 'artists';
$args = array(
    'post_type'                => $career_post_type,
    'posts_per_page'           => -1,
    'caller_get_posts'         => -1,
    'orderby'                  => 'name',
    'order'                    => 'ASC',
);

$the_query = new WP_Query( $args );
$dataTitle = [];

if( $the_query->have_posts() )
{
    while ($the_query->have_posts()) : $the_query->the_post(); 
        foreach(get_field('gallery_options') as $data){
            array_push($dataTitle, $data['title']);
        }

    endwhile;
}
?>

<main id="primary" class="site-main pb-5 mb-5">

       
     
        <div class="container">
		<div class="row justify-content-lg-end artist-top">
                <div class="col-lg-12 hero-section-wrapper artists-section-wrapper artists-section-wrapper">
                    <div class="row">
                        <div class="col-md-6 col-xl-7 order-md-2 pe-md-0 m-display-none">
							<div class="hero-images-wrapper artists-images-wrapper">
                           <img src="<?php bloginfo('template_directory') ?>/assets/artist-fade.png" alt="" class="w-100"></div>
                        </div>
                        <div class="col-md-6 col-xl-5 order-md-1 artists-wrapper mb-0">
                            <div class="col-lg-10 mt-md-5 pt-md-5 animate__animated" data-animate="fadeIn">
                                <h1 class="display-1 font-ivy-thin mb-3 mt-lg-5 pt-md-5">Our Artists</h1>
                                <div class="artists-filter mb-5" style="position:relative;z-index:9999;">

        <div class="artists-filter mb-5">
		<form class="searchandfilter" id="search-filter-form-37"><ul><li class="sf-field-taxonomy-artists-category" data-sf-field-name="_sft_artists-category" data-sf-field-type="taxonomy" data-sf-field-input-type="select">		<label>
				<select name="_sft_artists-category[]" class="sf-input-select" title="">
			
						<option class="sf-level-0 sf-item-0 sf-option-active" selected="selected" data-sf-count="0" data-sf-depth="0" value="">Select Artist By Category</option>
                        
                 <?php foreach(array_unique($dataTitle) as $data){ ?>
						<option <?php if($data === $_GET['filter']){ echo 'selected'; } ?>  class="sf-level-0 sf-item-2" value="<?php echo $data; ?>"><?php echo $data; ?></option>
         		<?php } ?>
					</select>
		</label>		</li></ul></form>		</div>
		</div>
                       </div>
                        </div>
                    </div>

                </div>
            </div>

		<div class="artists-result">
        
		<?php echo do_shortcode('[searchandfilter id="37" show="results"]'); ?>
		</div>
       </div>
	</main><!-- #main -->
    
<?php echo "<script>" ?>

	jQuery(document).on('change', '.sf-input-select', function(e){
    	window.location.href = window.location.origin+ window.location.pathname + '?filter=' +jQuery(e.currentTarget).val()
    })
<?php echo "</script>" ?>

<?php get_footer(); ?>