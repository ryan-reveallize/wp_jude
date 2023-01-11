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
                                <h1 class="display-1 font-ivy-thin mb-4">ABOUT US</h1>
                            <div class="col-lg-8  animate__animated" data-animate="fadeIn">
                                <p class="h3 font-ivy-bold mb-4 mb-lg-5">We support <br/> creative artists & give<br/>  form to vision.</p>
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
            <div class="row">
                <div class="col-xl-5 col-md-6">
                    <div class="our-story-img animate__animated" data-animate="fadeInUp">
                        <?= the_post_thumbnail()?>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 offset-lg-1">
                    <h3 class="mb-4 font-ivy-bold animate__animated" data-animate="fadeInRight">Our Story</h3>
                    <p class="animate__animated" data-animate="fadeInRight">Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla quis lorem ut libero malesuada feugiat. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada feugiat. Nulla porttitor accumsan tincidunt.Nulla quis lorem ut libero malesuada feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                    <p class="animate__animated" data-animate="fadeInRight">Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Proin eget tortor risus. Vestibulum ac diam.</p>
                    
                    <img src="<?php bloginfo('template_directory') ?>/assets/sign.png" alt="old Happy Couple" class="our-story-sign animate__animated" data-animate="fadeInRight" />
                    <p class="mb-0 animate__animated" data-animate="fadeInRight">Jaime Lannister</p>
                    <small class="text-muted animate__animated" data-animate="fadeInRight">CO-FOUNDER</small>
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