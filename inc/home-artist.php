

<?php $query = new WP_Query( [
    'post_type'      => 'artists',
    'posts_per_page' => '5',
] ); ?>

<?php if ( $query->have_posts() ) : ?>


                <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                 

                    
<div class="row mb-5 pb-lg-5">
    <div class="col-md-6 col-lg-6 col-xxl-7">
        <div class="our-artist">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="G L Askew II" class="img-fluid animate__animated" data-animate="fadeIn" />
        </div>
    </div>
    <div class="col-md-6 col-lg-5 col-xxl-4 ps-md-5">
        <h4 class="display-1 font-ivy-thin mb-3 mb-lg-5"><?php the_title(); ?></h4>
        <p class="mb-4 animate__animated" data-animate="fadeIn"><?php echo excerpt(35); ?></p>
        <a href="<?php echo get_the_permalink(); ?>" class="btn btn-dark animate__animated" data-animate="fadeIn">Portfolio</a>
    </div>
</div>
                <?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>
