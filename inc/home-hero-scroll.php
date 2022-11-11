<?php
if (have_rows('hero_scroll_images', 'options')) :
    $i = 0;
    while (have_rows('hero_scroll_images', 'options')) : the_row();
        $artist = get_sub_field('artist');
        $image = get_sub_field('image');
        $heroScrollImages[$i]['image'] = $image;
        $heroScrollImages[$i]['artist'] = $artist->post_title;
        $i++;
    endwhile;
endif;
?>
<div class="hero-images-wrapper">
    <div class="hero-images">
        <div class="row">
            <div class="col-6 col-sm-4 hero-image-col first-col">
                <?php
                shuffle($heroScrollImages);
                foreach ($heroScrollImages as $scroll) :
                ?>
                    <div class="hero-image-container">
                        <img src="<?= $scroll['image'] ?>" alt="Gallery" class="hero-image" />
                        <p class="font-ivy mb-0"><?= $scroll['artist'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-6 col-sm-4 hero-image-col mid-col">
                <?php
                shuffle($heroScrollImages);
                foreach ($heroScrollImages as $scroll) :
                ?>
                    <div class="hero-image-container">
                        <img src="<?= $scroll['image'] ?>" alt="Gallery" class="hero-image" />
                        <p class="font-ivy mb-0"><?= $scroll['artist'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="d-none d-sm-block col-sm-4 hero-image-col last-col">
                <?php
                shuffle($heroScrollImages);
                foreach ($heroScrollImages as $scroll) :
                ?>
                    <div class="hero-image-container">
                        <img src="<?= $scroll['image'] ?>" alt="Gallery" class="hero-image" />
                        <p class="font-ivy mb-0"><?= $scroll['artist'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>