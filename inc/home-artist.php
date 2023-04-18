<?php $query = new WP_Query([
    'post_type'      => 'artists',
    'posts_per_page' => '50',
]); ?>

<?php if ($query->have_posts()) : ?>
    <?php $i = 0; ?>
    <div class="container-fluid">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="row mb-5 pb-lg-5 align-items-center position-relative <?= ($i % 2 != 0) ? 'artist-even' : 'artist-odd' ?>">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1200" height="833" viewBox="0 0 1200 833" class="artist-mask animate__animated" data-animate="fadeIn">
                    <defs>
                        <clipPath id="clip-path">
                            <rect id="Rectangle_749" data-name="Rectangle 749" width="1200" height="833" transform="translate(377 1110)" fill="#fff" stroke="#707070" stroke-width="1" />
                        </clipPath>
                    </defs>
                    <g id="Mask_Group_8" data-name="Mask Group 8" transform="translate(-377 -1110)" clip-path="url(#clip-path)">
                        <g id="Group_6438" data-name="Group 6438" transform="translate(376.739 821)">
                            <path id="Path_2623" data-name="Path 2623" d="M638.59,4.807C740.648-22.7,709.138,70.224,679.906,222.78c-33.329,151.71,22.5,379.065,68.752,539.123,20.8,81.132,25.472,142.9,23.089,201.519-3.811,58.078-14.678,113-57.907,168.012-73.318,103.046-362.881,213.825-499.5,184.393C70.335,1294.482,1.792,1054.394,0,866.005,4.208,669.746,61.842,561.3,103.881,508.237c45.825-54.065,132.054-105.336,234.878-222.29C436.46,176.923,546.5,28.012,638.59,4.807" transform="matrix(0.407, 0.914, -0.914, 0.407, 1206.472, 0)" fill="#9b432b" />
                        </g>
                    </g>
                </svg>
                <div class="col-lg-6 col-xxl-6 h-artist-img <?= ($i % 2 != 0) ? 'order-lg-2 offset-xxl-1' : '' ?>">
                    <div class="our-artist">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid animate__animated" data-animate="fadeIn" />
                    </div>
                </div>
                <div class="col-lg-4 col-xxl-3 ps-xxl-5 h-artist-detail <?= ($i % 2 != 0) ? 'order-lg-1 offset-lg-2' : ' offset-lg-1' ?>">
                    <h4 class="display-3 mb-3 mb-lg-5 font-glam-extended animate__animated" data-animate="fadeIn"><?php the_title(); ?></h4>
                    <p class="mb-5 animate__animated" data-animate="fadeIn"><?php echo excerpt(35); ?></p>
                    <a href="<?php echo get_the_permalink(); ?>" class="btn btn-white font-athiti-medium animate__animated" data-animate="fadeIn" style="--bs-btn-font-size: calc(1rem + 0.3vw)">Portfolio</a>
                </div>
            </div>
            <?php $i++; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>