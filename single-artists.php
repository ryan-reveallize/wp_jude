<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Jude
 */


get_header();

$cat = @$_GET['cat'];
$imageAll = [];

foreach (get_field('gallery_options') as $gallery) {
    if ($cat && strtolower($gallery['title']) == strtolower($cat)) {
        $imageAll = is_array($gallery['images']) ? $gallery['images'] : [];

        break;
    } else {
        if (is_array($gallery['images'])) {
            foreach ($gallery['images'] as $images) {
                array_push($imageAll, $images);
            }
        }
    }
}

?>
<style>
    .gallery-wrap>div {
        line-height: 0;
    }

    /* .card { width: 30%; } */
    /* .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        -webkit-column-gap: 1.25rem;
        -moz-column-gap: 1.25rem;
        column-gap: 1.25rem;
    }

     .card-columns .card {
        display: inline-block;
        width: 100%;
        border: unset;
        border-radius: 0
    } */
    .single-artist .nav-tabs .nav-link:not(.underline) {
        text-decoration: unset !important
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
</script>



<main id="primary" class="site-main mb-5 pb-5 single-artist">
    <div class="container">
        <div class="single-artist-fix">
            <div class="row align-items-center mb-5 pb-5">
                <div class="col-lg-6 offset-lg-1 order-lg-2 mb-5 mb-lg-5">
                    <div class="artist-img">
                        <?php the_post_thumbnail('large', array('class' => 'w-100 height-auto')) ?>

                        <div class="img-wrap">
                            <div class="linkwrap ">
                                <div class="weblink">
                                    <a href="<?php echo get_field('website'); ?>"><img src="<?php bloginfo('template_directory') ?>/assets/feather-link.svg" alt=""></a>
                                </div>
                                <div class="instalink">
                                    <a href="<?php echo get_field('instagram'); ?>">
                                        <img src="<?php bloginfo('template_directory') ?>/assets/feather-instagram.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-lg-1">
                    <div class="block-wrap mb-5">
                        <div class="about-content">
                            <h1 class="artist-title font-ivy-thin display-2"><?php the_title(); ?></h1>
                            <p><?php echo get_the_content(); ?></p>
                            <div class="d-flex gap-4 mt-5 align-items-center ">
                                <div class="btn-container">
                                    <div class="mb-5">
                                        <a href="mailto:INFO@THEJUDEGROUP.COM" class="hoverable-expand btn-explore-artist" data-cursor-text="Work With <?php echo the_title(); ?>" data-cursor-color="#4FC3F7"><small>Work with
                                                <?php echo the_title(); ?></small></a>
                                    </div>

                                    <div id="cursor">
                                        <span id="cursor-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">

            <li class="nav-item" role="presentation">
                <a href="<?php echo home_url($wp->request) ?>"><button class="nav-link active <?php if (!isset($_GET['cat'])) echo 'underline'; ?>" type="button">All</button></a>
            </li>
            <?php
            // Check rows exists.
            if (have_rows('gallery_options')) :
                $count = 0;
                // Loop through rows.
                while (have_rows('gallery_options')) : the_row();
            ?>
                    <li class="nav-item" role="presentation">
                        <?php
                        $numbersremoved = preg_replace('/[0-9]+/', '', get_sub_field('title'));
                        $spaceremoved = str_replace(' ', '', $numbersremoved);
                        ?>
                        <a href='<?php echo home_url($wp->request) . '?cat=' . get_sub_field('title') ?>'><button class="nav-link <?php if (get_sub_field('title') == $_GET['cat'])  echo 'underline'; ?>" type="button"><?php echo get_sub_field('title'); ?></button></a>
                    </li>
            <?php $count++;
                endwhile;
            endif;
            ?>
        </ul>

        <div class="tab-content">
            <?php
            $count = 0;
            $numbersremoved = preg_replace('/[0-9]+/', '', get_sub_field('title'));
            $spaceremoved = str_replace(' ', '', $numbersremoved);
            ?>
            <div class="tab-pane fade show active">
                <div class="gallery-wrapper gallery-<?= $count ?>">

                    <div class="row card-columns">
                        <?php
                        foreach (@$imageAll as $image) :
                            /* echo '<pre>';
                            print_r($image);
                            echo '</pre>'; */
                        ?>
                            <div class="gallery-item col-md-4 mb-4 animate__animated" data-animate="fadeIn">
                                <div>
                                    <?php //if ($image['type'] == 'image') : 
                                    ?>
                                    <a target="_blank" class=" <?php echo ($image['alt']) ? 'video' : 'image-popup'; ?>" href="<?php if ($image['alt']) echo $image['alt'];
                                                                                                                            else echo esc_url($image['url']); ?>">
                                        <img class="img-fluid" load="lazy" srcset="<?php echo esc_url($image['sizes']['medium_large']) ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </a>
                                    <?php /* elseif ($image['type'] == 'video') : ?>
                                        <a target="_blank" class="<?php if ($image['alt']) echo 'video'; ?>" href="<?php if ($image['alt']) echo $image['link'];
                                                                                                                    else echo esc_url($image['url']); ?>">
                                            <?php if (!empty($image['sizes'])) : ?>
                                                <img class="img-fluid" load="lazy" srcset="<?php echo esc_url($image['sizes']['medium_large']) ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php else : ?>
                                                <video src="<?php echo $image['url'] ?>" controls class="img-fluid w-100"></video>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; */ ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main><!-- #main -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    jQuery(document).ready(function() {
        setTimeout(() => {
            jQuery('.card-columns').masonry({
                itemSelector: '.gallery-item',
                // columnWidth: 200 
            });
        }, 600)

        jQuery('.gallery-wrapper').magnificPopup({
            delegate: 'a.image-popup',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            }
        });

        jQuery('.video').on('click', function(e) {
            e.stopPropagation();
            e.preventDefault();
            window.open(jQuery(this).attr('href'), '_blank');
        });

        // jQuery('.card-columns>div').hide();
        // size_li = jQuery(".card-columns>div").size();
        // x = 10;

        // jQuery('.card-columns>div:lt(' + x + ')').show();

        // jQuery(window).on('scroll', function() {
        //     if(jQuery('.gallery-item:visible').length == <?php echo count($imageAll); ?>)
        //         return;

        //     if(jQuery(window).scrollTop() >= jQuery('.card-columns').offset().top + jQuery('.card-columns').outerHeight() - window.innerHeight) {
        //         x= (x+10 <= size_li) ? x+10 : size_li;
        //         jQuery('.card-columns>div:lt('+x+')').show();
        //     }
        // });
    });

    jQuery(window).load(function() {
        jQuery('.tab-pane.active .card-columns>div').each(function(index) {
            datasrc = jQuery(this).find('img').attr('data-src');
            if (datasrc) {
                jQuery(this).find(":lt(4)").find('img').attr('src', datasrc);
            }
        });
    });
</script>
<style>
    .gallery-all {
        opacity: 0;
        height: 0px;
        transition: all 0.3s ease;
    }

    .gallery-all.show {
        opacity: 1;
        height: auto;
    }
</style>
<?php
get_footer();
