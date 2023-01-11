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
<style>
.gallery-wrap>div {
    line-height: 0;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
</script>

<main id="primary" class="site-main mb-5 pb-5 single-artist">
    <div class="container">
        <div class="single-artist-fix">
            <div class="row align-items-center mb-5 pb-5">
                <div class="col-lg-6 offset-lg-1 order-lg-2 mb-5 mb-lg-5">
                    <div class="artist-img">
                        <?php the_post_thumbnail('', array('class' => 'w-100 height-auto')) ?>

                        <div class="img-wrap">
                            <div class="linkwrap ">
                                <div class="weblink">
                                    <a href="<?php echo get_field('website'); ?>"><img
                                            src="<?php bloginfo('template_directory') ?>/assets/feather-link.svg"
                                            alt=""></a>
                                </div>
                                <div class="instalink">
                                    <a href="<?php echo get_field('instagram'); ?>">
                                        <img src="<?php bloginfo('template_directory') ?>/assets/feather-instagram.svg"
                                            alt=""></a>
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
                                        <a href="mailto:INFO@THEJUDEGROUP.COM"
                                            class="hoverable-expand btn-explore-artist"
                                            data-cursor-text="Work With <?php echo the_title(); ?>"
                                            data-cursor-color="#4FC3F7"><small>Work with
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
                <button class="nav-link active" id="All-tab" data-bs-toggle="tab" data-bs-target="#All" type="button"
                    role="tab" aria-controls="All" aria-selected="true">All</button>
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
                <button class="nav-link" id="<?php echo  $spaceremoved; ?>-tab" data-bs-toggle="tab"
                    data-bs-target="#<?php echo  $spaceremoved; ?>" type="button" role="tab"
                    aria-controls="<?php echo  $spaceremoved; ?>"
                    aria-selected="true"><?php echo get_sub_field('title'); ?></button>
            </li>
            <?php $count++;
                endwhile;
            endif;
            ?>
        </ul>

        <div class="tab-content" id="myTabContent">
            <?php
            $count = 0;
            $numbersremoved = preg_replace('/[0-9]+/', '', get_sub_field('title'));
            $spaceremoved = str_replace(' ', '', $numbersremoved);
            ?>
            <div class="tab-pane fade show active" id="<?php echo $spaceremoved; ?>" role="tabpanel"
                aria-labelledby="All-tab">
                <div class="gallery-wrap gallery-<?= $count ?> row" data-masonary-trigger="gallery-<?= $count ?>">
                    <?php
                    // Check rows exists.
                    if (have_rows('gallery_options')) :
                        // Loop through rows.
                        while (have_rows('gallery_options')) : the_row();
                    ?>

                    <?php
                            $images = get_sub_field('images');

                            if ($images) :
                            ?>
                    <?php $i = 0; ?>
                    <?php foreach ($images as $image) : ?>




                    <?php if ($i <=5) { ?>
                    <div sss class="col-lg-4 col-sm-6 gallery-item mb-4">
                        <a href="<?php echo esc_url($image['url']); ?>">
                            <img class="w-100" src="<?php echo esc_url($image['url']) ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a>
                    </div>
                    <?php } else { ?>
                    <div class="col-lg-4 col-sm-6 gallery-item mb-0 opacity-0">
                        <a href="<?php echo esc_url($image['url']); ?>">
                            <img class="w-100" src="" data-src="<?php echo esc_url($image['url']) ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a>
                    </div>
                    <?php } ?>


                    <?php $i++; ?>
                    <?php endforeach; ?>

                    <?php endif; ?>
                    <?php
                            $count++;
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>

            <?php
            // Check rows exists.
            if (have_rows('gallery_options')) :
                // Loop through rows.
                while (have_rows('gallery_options')) : the_row();
                    $numbersremoved = preg_replace('/[0-9]+/', '', get_sub_field('title'));
                    $spaceremoved = str_replace(' ', '', $numbersremoved);
            ?>
            <div class="tab-pane fade" id="<?php echo $spaceremoved; ?>" role="tabpanel"
                aria-labelledby="<?php echo $spaceremoved; ?>-tab">
                <div class="gallery-wrap row gallery-<?= $count ?>" data-masonary-trigger="gallery-<?= $count ?>">
                    <?php
                            $images = get_sub_field('images');

                            if ($images) : ?>
                    <?php $j = 0; ?>
                    <?php foreach ($images as $image) : ?>

                    <?php if ($j <= 5) { ?>
                    <div class="col-lg-4 col-sm-6 gallery-item mb-4">
                        <a href="<?php echo esc_url($image['url']); ?>">
                            <img class="w-100" src="<?php echo esc_url($image['url']) ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a>
                    </div>

                    <?php } else { ?>
                    <div class="col-lg-4 col-sm-6 gallery-item mb-0 opacity-0">
                        <a href="<?php echo esc_url($image['url']); ?>">
                            <img class="w-100" src="" data-src="<?php echo esc_url($image['url']) ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a>
                    </div>
                    <?php } ?>

                    <?php $j++; ?>
                    <?php endforeach; ?>

                    <?php endif; ?>
                </div>
            </div>
            <?php
                    $count++;
                endwhile;
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
    integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
    integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
jQuery(document).ready(function() {

    jQuery('.gallery-wrap').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        }
    });

    jQuery(".nav-tabs li:not(:first-child)").click(function() {
        jQuery('.tab-content>div:first-child').removeClass('active');
        jQuery('.tab-content>div:first-child').removeClass('show');
        initMasonry();
    });
    jQuery(".nav-tabs li:first-child").click(function() {
        jQuery('.tab-content>div:first-child').addClass('active');
        jQuery('.tab-content>div:first-child').addClass('show');
        initMasonry();
    });

    // jQuery('.gallery-wrap>div').hide();
    // jQuery(".gallery-wrap>div:nth-child(1)").show();
    // jQuery(".gallery-wrap>div:nth-child(2)").show();
    // jQuery(".gallery-wrap>div:nth-child(3)").show();
    // jQuery(".gallery-wrap>div:nth-child(4)").show();
    // jQuery(".gallery-wrap>div:nth-child(5)").show();
    // jQuery(".gallery-wrap>div:nth-child(6)").show();
    // jQuery(".gallery-wrap>div:nth-child(7)").show();
    // jQuery(".gallery-wrap>div:nth-child(8)").show();
    // jQuery(".gallery-wrap>div:nth-child(9)").show();

    // jQuery('.gallery-load-more').click(function() {
    //     jQuery(".gallery-wrap>div").show('slide');
    //     jQuery(this).hide();
    // });

    size_li = jQuery(".gallery-wrap>div").size();
    console.log(size_li);
    x = 3;

    jQuery('.tab-pane.active .gallery-wrap>div:lt(' + x + ')').show();

    jQuery('.gallery-load-more a').click(function() {
        console.log(x);
        jQuery('.tab-pane.active .gallery-wrap>div').each(function(index) {

            datasrc = jQuery(this).find('img').attr('data-src');

            jQuery(this).find(":lt(4)").find('img').attr('src', datasrc);

            jQuery(this).removeClass('opacity-0');
            jQuery(this).removeClass('mb-0');
            jQuery(this).addClass('mb-4');
        });
        setTimeout(function() {
            var $container = jQuery('.gallery-wrap');
            $container.masonry('reloadItems');
            $container.masonry();
        }, 3000);
        x + 5;
    });





});
jQuery(window).load(function() {
    initMasonry();
});

function initMasonry() {
    var getGalleryClass = jQuery('.tab-pane.active').find('.gallery-wrap').attr('data-masonary-trigger');
    var masonaryTrigger = '.' + getGalleryClass;
    var msnry = new Masonry(masonaryTrigger);
    if (jQuery(masonaryTrigger).hasClass('masonry-initiated')) {
        jQuery(masonaryTrigger).masonry('destroy'); // destroy
        jQuery(masonaryTrigger).masonry(); //reinitiate
        jQuery(masonaryTrigger).addClass('masonry-initiated');
    } else {
        jQuery(masonaryTrigger).masonry();
        jQuery(masonaryTrigger).addClass('masonry-initiated');
    }
}
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