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
    .top-logo-container{
        display: none;
    }
</style>
<main id="primary" class="site-main">
    <div class="hero-section">
        <div class="container-fluid">
            <div class="row justify-content-lg-end">
                <div class="col-lg-11 hero-section-wrapper">
                    <div class="row align-items-start">
                        <div class="col-md-7 col-lg-8 order-md-2 pe-md-0">
                            <?php include('inc/home-hero-scroll.php') ?>
                        </div>
                        <div class="col-md-5 col-lg-4 order-md-1">
                            <div class="logo-container mb-4 mb-lg-5">
                                <?php the_custom_logo(); ?>
                                <img src="<?php bloginfo('template_directory') ?>/assets/logo-outline.png" alt="Logo Outline" class="logo_outline" />
                            </div>
                            <div class="col-lg-10  animate__animated" data-animate="fadeIn">
                                <h1 class="h3 font-ivy-bold mb-4 mb-lg-5">We support creative artists & give form to vision.</h1>
                                <p class="mb-4 mb-lg-5"><small>We do not take cues, we follow the guidance of inspiration and instinct. In a time of oversharing, JUDE embraces the understated and unspoken. We embrace anomalies and contradictions and believe in what is true, real, and original.</small></p>
                            </div>
                            <div class="mb-5">
                                <a href="#explore-artist" class="btn-explore-artist"><small>EXPLORE ARTISTS</small></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section class="our-artist-section">
        <div class="container">
            <h3 class="font-ivy-bold mb-4 mb-lg-5">Our Artist</h3>
            <?php include('inc/home-artist.php') ?>
        </div>
    </section>
    <section class="pb-5">
        <div class="container">
            <?php include('inc/insta-section.php') ?>
        </div>
    </section>
</main><!-- #main -->
<script>
    jQuery(window).load(function($) {
        jQuery('.hero-images-wrapper .hero-images').addClass('animate-hero');
    });
</script>
<?php
get_footer();
