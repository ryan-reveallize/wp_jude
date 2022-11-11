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
                                <h1 class="h3 font-ivy-bold mb-4 mb-lg-5">We support<br/> creative artists & give form to vision.</h1>
                                <p class="mb-4 mb-lg-5">We do not take cues, we follow the guidance of inspiration and instinct. In a time of oversharing, JUDE embraces the understated and unspoken. We embrace anomalies and contradictions and believe in what is true, real, and original.</p>
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
    <section class="our-artist-section" id="our-artist">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

<script type="text/javascript">

const cursor = jQuery('#cursor');
const cursor_text = jQuery('#cursor-text');
const hoverable = $('.hoverable-menu');
const expandable = jQuery('.hoverable-expand');

let cursor_is_hover = false
let standBy;

function checkIfStandBy() {
  standBy = setTimeout(function() {
    if(!cursor_is_hover) {
      cursor.css({ opacity: '0' })
    }
  }, 3000)
}

jQuery(document).mousemove(function(evt) {
  if(standBy) clearTimeout(standBy)
  cursor.css({ opacity: '1' })
  if(!cursor_is_hover) {
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
  
  if($el.data('cursorColor')) {
      cursor.css({
        borderColor: $el.data('cursorColor')
    }) 
  }
})

expandable.mouseleave(function() {
  cursorReset()
})

function setCursorText(el) {
  if(el.data('cursorText')) {
    cursor_text.text(el.data('cursorText'))
  }
  
  if(el.data('cursorColor')) {
    cursor_text.css({color: el.data('cursorColor')})
  }
}

function cursorReset() {
  cursor_text.text('')
  cursor_text.css({ color: '' })
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
<?php
get_footer();