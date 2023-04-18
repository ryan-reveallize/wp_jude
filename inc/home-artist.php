<?php $query = new WP_Query([
    'post_type'      => 'artists',
    'posts_per_page' => '50',
]); ?>

<?php if ($query->have_posts()) : ?>
    <?php $i = 0; ?>
    <div class="container-fluid">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="row mb-5 pb-lg-5 align-items-center position-relative <?= ($i % 2 != 0) ? 'artist-even' : 'artist-odd' ?>">
                <div class="d-none d-lg-block animate__animated" data-animate="fadeIn">
                    <?php if ($i == 1) : ?>
                        <img src="<?php bloginfo('template_directory') ?>/assets/home-mask-2.png" alt="" class="artist-mask animate__animated" data-animate="fadeIn" />
                    <?php elseif ($i == 2) : ?>
                        <img src="<?php bloginfo('template_directory') ?>/assets/home-mask-3.png" alt="" class="artist-mask animate__animated" data-animate="fadeIn" />
                    <?php elseif ($i == 3) : ?>
                        <img src="<?php bloginfo('template_directory') ?>/assets/home-mask-4.png" alt="" class="artist-mask animate__animated" data-animate="fadeIn" />
                    <?php else : ?>
                        <img src="<?php bloginfo('template_directory') ?>/assets/home-mask.png" alt="" class="artist-mask animate__animated" data-animate="fadeIn" />
                    <?php endif; ?>
                </div>
                <?php if ($i % 2 == 0) : ?>
                    <div class="col-md-6 col-lg-6 col-xxl-6 h-artist-img py-md-5 mb-4 mb-md-0">
                        <div class="our-artist">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid animate__animated" data-animate="fadeIn" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 col-xxl-4 ps-xxl-5 h-artist-detail offset-lg-1">
                        <h4 class="display-3 mb-3 mb-lg-5 font-glam-extended animate__animated" data-animate="fadeIn"><?php the_title(); ?></h4>
                        <p class="mb-4 mb-lg-5 animate__animated" data-animate="fadeIn"><?php echo excerpt(50); ?></p>
                        <a href="<?php echo get_the_permalink(); ?>" class="btn btn-white font-athiti-medium animate__animated" data-animate="fadeIn" style="--bs-btn-font-size: calc(1rem + 0.3vw)">Portfolio</a>
                    </div>
                <?php else : ?>
                    <div class="col-md-6 col-lg-6 col-xxl-6 h-artist-img py-md-5 mb-4 mb-md-0 order-md-2 offset-xxl-1">
                        <div class="our-artist">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid animate__animated" data-animate="fadeIn" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 col-xxl-4 ps-xxl-5 h-artist-detail order-md-1 offset-lg-1">
                        <h4 class="display-3 mb-3 mb-lg-5 font-glam-extended animate__animated" data-animate="fadeIn"><?php the_title(); ?></h4>
                        <p class="mb-4 mb-lg-5 animate__animated" data-animate="fadeIn"><?php echo excerpt(50); ?></p>
                        <a href="<?php echo get_the_permalink(); ?>" class="btn btn-white font-athiti-medium animate__animated" data-animate="fadeIn" style="--bs-btn-font-size: calc(1rem + 0.3vw)">Portfolio</a>
                    </div>
                <?php endif; ?>
            </div>
            <?php $i++; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>