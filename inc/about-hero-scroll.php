<?php
if (have_rows('images')) :
    $i = 0;
    if (get_field('scroll_timing')) {
        $timing = get_field('scroll_timing');
    } else {
        $timing = 4;
    }
    $gallery = get_field('images');
    $i = count($gallery);
endif;
?>
<div class="hero-images-wrapper about-images-wrapper">
    <div class="hero-images">
        <div class="row">
            <div class="col-6 hero-image-col first-col scroll scroll-large scroll-up" style="--imageCount: <?php echo $i; ?>;--animate-duration: <?php echo $timing; ?>s;">
                <?php
                shuffle($gallery);
                foreach ($gallery as $scroll) :
                ?>
                    <div class="hero-image-container">
                        <img src="<?= $scroll ?>" alt="Gallery" class="hero-image" />
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-6 hero-image-col mid-col scroll scroll-large scroll-down" style="--imageCount: <?php echo $i; ?>;--animate-duration: <?php echo $timing; ?>s;">
                <?php
                shuffle($gallery);
                foreach ($gallery as $scroll) :
                ?>
                    <div class="hero-image-container">
                        <img src="<?= $scroll ?>" alt="Gallery" class="hero-image" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>