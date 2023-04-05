<style>
    * {
        margin: 0;
        width: 100% !important;
        height: auto;
    }

    a {
        pointer-events: none;
    }
</style>
<div class="media-container" style="display: block !important;">
    <?php
    //echo '<pre>';
    //print_r(get_post());
    the_content();
    ?>
</div>
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

/*get_header('white-logo');
    ?>
    <style>
        * {
            margin: 0;
            width: 100% !important;
            height: auto;
        }

        html {
            margin-top: 0 !important;
        }

        #wpadminbar,
        header,
        .top-logo-container,
        footer {
            display: none;
        }
    </style>
    <?php jude_post_thumbnail(); ?>

    <div class="media-container" style="display: block !important;">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'jude'),
                'after'  => '</div>',
            )
        );
        ?>


        <?php get_footer(); */ ?>