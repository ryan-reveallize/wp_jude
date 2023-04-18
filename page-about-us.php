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
    .our-story-img>img {
        width: 100%;
    }
</style>
<main id="primary" class="site-main">
    <div class="hero-section">
        <div class="container-fluid">
            <div class="row justify-content-lg-end">
                <div class="col-lg-11 hero-section-wrapper about-section-wrapper">
                    <div class="row">
                        <div class="col-md-7 order-md-2 pe-md-0 position-relative">
                            <?php include('inc/about-hero-scroll.php') ?>
                        </div>
                        <div class="col-md-5 order-md-1 about-wrapper">
                            <h1 class="display-1 mb-4">ABOUT US</h1>
                            <div class="col-lg-8  animate__animated" data-animate="fadeIn">
                                <p class="h3 mb-4 mb-lg-5">We support <br /> creative artists & give<br /> form to vision.</p>
                                <p class="mb-4 mb-lg-5">We do not take cues, we follow the guidance of inspiration and instinct. In a time of oversharing, JUDE embraces the understated and unspoken. We embrace anomalies and contradictions and believe in what is true, real, and original.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section class="py-5 mb-lg-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-md-6 mb-lg-0 mb-3">
                    <div class="our-story-img animate__animated" data-animate="fadeIn">
                        <?= the_post_thumbnail() ?>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 offset-lg-1">
                    <h3 class="mb-4 animate__animated" data-animate="fadeIn">Our Story</h3>
                    <div class="animate__animated" data-animate="fadeIn">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
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
