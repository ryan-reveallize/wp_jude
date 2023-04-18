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

<style>
    .top-logo-container {
        display: none;
    }

    @media screen and (min-width: 992px) {

        .site-main,
        .site-footer,
        .top-logo-container {
            width: 100%;
            margin-left: 0;
        }
    }
</style>
<main id="primary" class="site-main">
    <div class="hero-section ">
        <div class="container-fluid">
            <div class="row justify-content-lg-end">
                <div class="col-lg-11 hero-section-wrapper">
                    <div class="row align-items-start">
                        <div class="col-md-7 col-lg-8 order-md-2 pe-md-0 position-relative">
                            <?php include('inc/home-hero-scroll.php') ?>
                        </div>
                        <div class="col-md-5 col-lg-4 col-xxl-4 pe-xxl-5 order-md-1">
                            <div class="logo-container mb-4 mb-lg-5">
                                <?php the_custom_logo(); ?>
                                <img src="<?php bloginfo('template_directory') ?>/assets/logo-outline.png" alt="Logo Outline" class="logo_outline" />
                            </div>
                            <div class="col-lg-10  animate__animated" data-animate="fadeIn">
                                <h1 class="h3 mb-4 mb-lg-5 font-glam-extended">We support<br /> creative artists & give form
                                    to vision.</h1>
                                <p class="mb-4 mb-lg-5 font-small">We do not take cues, we follow the guidance of inspiration and
                                    instinct. In a time of oversharing, JUDE embraces the understated and unspoken. We
                                    embrace anomalies and contradictions and believe in what is true, real, and
                                    original.</p>
                            </div>
                            <div class="mb-5">
                                <a href="<?php echo get_site_url(); ?>/artists/" class="hoverable-expand btn-explore-artist" data-cursor-text="EXPLORE ARTISTS" data-cursor-color="#4FC3F7"><small>EXPLORE ARTISTS</small></a>
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
    <section class="our-artist-section home-our-artist" id="our-artist">
        <img src="<?php bloginfo('template_directory') ?>/assets/side-mask.svg" alt="" class="artist-side animate__animated" data-animate="fadeIn" />
        <div class="container-fluid">
            <div class="col-lg-11 offset-lg-1">
                <h3 class="mb-4 mb-lg-5 font-glam-extended">Our Artist</h3>
            </div>
        </div>
        <?php include('inc/home-artist.php') ?>
    </section>
    <section class="pb-5">
        <div class="container">
            <?php include('inc/insta-section.php') ?>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
