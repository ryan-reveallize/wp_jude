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
    .header-mask {
        position: absolute;
        top: 0;
        right: 0;
        max-height: 90vh;
        z-index: -1;
    }

    .contact-us .top-section {
        background: none;
    }
</style>
<main id="primary" class="site-main contact-us pb-5 mb-5 position-relative">
    <img src="<?php bloginfo('template_directory') ?>/assets/header-mask.png" alt="Header Mask" class="header-mask" />
    <div class="container">
        <div class="row top-section justify-content-center pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="about-wrapper">
                        <h1 class="mb-5 text-center display-1 font-glam-extended"><?php echo get_field('title', false); ?></h1>
                        <p class="text-center mb-5"><?php echo get_field('subtitle', false, false); ?></p>
                    </div>
                </div>
                <div class="col-lg-10 col-md-12">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="block-wrap">
                                <?php if (have_rows('for_bookings')) : ?>
                                    <?php while (have_rows('for_bookings')) : the_row();
                                    ?>
                                        <div class="text-uppercase">
                                            FOR BOOKINGS:
                                        </div>
                                        <h4 class="mb-3 font-glam-extended"><?php echo get_sub_field('name'); ?></h4>
                                        <div class="btn-container ">
                                            <a class="btn btn-dark" href="mailto:<?php echo get_sub_field('email'); ?>"><?php echo get_sub_field('email'); ?></a>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="block-wrap">
                                <?php if (have_rows('for_billing')) : ?>
                                    <?php while (have_rows('for_billing')) : the_row();
                                    ?>
                                        <div class="text-uppercase">
                                            FOR BILLING:
                                        </div>
                                        <h4 class="mb-3 font-glam-extended"><?php echo get_sub_field('name'); ?></h4>
                                        <div class="btn-container ">
                                            <a class="btn btn-dark" href="mailto:<?php echo get_sub_field('email'); ?>"><?php echo get_sub_field('email'); ?></a>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="mid-section">
            <div class="row justify-content-center">
                <div class="col-md-7 p-0 map-wrap">
                    <?php echo get_field('map', false); ?>
                </div>
                <div class="col-md-5 directions-wrap">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="directions mt-5 mb-5 mt-lg-0 mb-lg-0">
                            <h4 class=" font-glam-extended">Where Are We Located?</h4>
                            <p> <?php echo get_field('where_are_we_located', false); ?></p>

                            <ul class="pt-3">
                                <h5 class="pb-2"> <a href="https://goo.gl/maps/gkZdX3Juo6J2"><strong> Get Directions</strong></a> </h5>
                                <li class="location">
                                    <span> <?php echo get_field('our_location', false); ?></span>
                                </li>
                                <li class="mailid">
                                    <a href="mailto:<?php echo get_field('our_email'); ?>"><?php echo get_field('our_email'); ?></a>
                                </li>
                                <li class="phoneno">
                                    <a href="tel:<?php echo get_field('our_phone_number'); ?>">
                                        <?php echo get_field('our_phone_number'); ?></a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('inc/insta-section.php') ?>


    </div>
</main><!-- #main -->

<?php
get_footer();
