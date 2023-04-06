<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jude
 */

?>

<footer class="site-footer bg-white py-3 py-lg-4">
    <div class="container">
        <div class="d-lg-flex flex-wrap justify-content-lg-between align-items-center">
            <div class="order-lg-1">
                <?php the_custom_logo(); ?>
            </div>
            <span class="order-lg-3 opacity-75">
                Designed & Developed by <a href="https://revealize.com/" style="    font-weight: bold;    color: #000;">Revealize</a>
            </span>

            <ul class="list-unstyled ps-0 px-lg-3 mb-0 d-flex flex-wrap order-lg-2">
                <?php if (get_field('email', 'option')) : ?>
                    <li>
                        <a href="mailto:<?= the_field('email', 'option') ?>" target="_blank" rel="noopener noreferrer" class="text-uppercase"><?= the_field('email', 'option') ?></a>
                    </li>
                <?php endif; ?>
                <?php if (get_field('phone', 'option')) : ?>
                    <li>
                        <a href="tel:<?= the_field('phone', 'option') ?>" target="_blank" rel="noopener noreferrer" class="text-uppercase"><?= the_field('phone', 'option') ?></a>
                    </li>
                <?php endif; ?>

                <?php if (get_field('facebook', 'option')) : ?>
                    <li>
                        <a href="<?= the_field('facebook', 'option') ?>" target="_blank" rel="noopener noreferrer" class="text-uppercase">FACEBOOK</a>
                    </li>
                <?php endif; ?>

                <?php if (get_field('instagram', 'option')) : ?>
                    <li>
                        <a href="<?= the_field('instagram', 'option') ?>" target="_blank" rel="noopener noreferrer" class="text-uppercase">INSTAGRAM</a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="https://goo.gl/maps/EL6wtH2BgKcA5xkh7" target="_blank" rel="noopener noreferrer">6121
                        Sunset Blvd, Los Angeles, CA 90028</a>
                </li>
            </ul>
        </div>
    </div>

</footer>
</div><!-- #page -->

<script>
    jQuery(window).load(function($) {
        jQuery('.hero-images-wrapper .hero-images').addClass('animate-hero');
    });
</script>



<script type="text/javascript">
    const cursor = jQuery('#cursor');
    const cursor_text = jQuery('#cursor-text');
    const hoverable = jQuery('.hoverable-menu');
    const expandable = jQuery('.hoverable-expand');

    let cursor_is_hover = false
    let standBy;

    function checkIfStandBy() {
        standBy = setTimeout(function() {
            if (!cursor_is_hover) {
                cursor.css({
                    opacity: '0'
                })
            }
        }, 3000)
    }

    jQuery(document).mousemove(function(evt) {
        if (standBy) clearTimeout(standBy)
        cursor.css({
            opacity: '1'
        })
        if (!cursor_is_hover) {
            let x = evt.clientX
            let y = evt.clientY
            cursor.css({
                left: x - (cursor.width() / 2),
                top: y - (cursor.height() / 2)
            })
            checkIfStandBy()
        }
    })

    hoverable.mouseenter(function() {
        const $el = jQuery(this)
        let info = $el.get(0).getBoundingClientRect()
        setCursorText($el)
        cursor_is_hover = true
        cursor.css({
            width: info.width + 'px',
            height: info.height + 'px',
            top: info.top + 'px',
            left: info.left + 'px',
            borderRadius: '0%',
            borderColor: $el.data('cursorColor') ? $el.data('cursorColor') : ''
        })
    })

    hoverable.mouseleave(function() {
        cursor_is_hover = false
        cursorReset()
    })

    expandable.mouseenter(function(evt) {
        let $el = jQuery(this)
        let x = evt.clientX
        let y = evt.clientY

        setCursorText($el)

        cursor.addClass('expand')
        setTimeout(function() {
            cursor.css({
                left: x - (cursor.width() / 2) + "px",
                top: y - (cursor.height() / 2) + "px",
            })
        }, 50)

        if ($el.data('cursorColor')) {
            cursor.css({
                borderColor: $el.data('cursorColor')
            })
        }
    })

    expandable.mouseleave(function() {
        cursorReset()
    })

    function setCursorText(el) {
        if (el.data('cursorText')) {
            cursor_text.text(el.data('cursorText'))
        }

        if (el.data('cursorColor')) {
            cursor_text.css({
                color: el.data('cursorColor')
            })
        }
    }

    function cursorReset() {
        cursor_text.text('')
        cursor_text.css({
            color: ''
        })
        cursor.removeClass('expand')
        cursor.css({
            width: '',
            height: '',
            top: '',
            left: '',
            borderRadius: '',
            borderColor: ''
        })
    }
</script>
<?php wp_footer(); ?>

</body>

</html>