<?php
$title = get_field('services-part_title');
?>

<section class="services">
    <div class="services__wrapper">
        <div class="services__cover">
            <div class="container">
                <?php if ($title) : ?>
                    <h3 class="services__title title anim-title _anim-items">
                        <?= $title ?>
                    </h3>
                <?php endif; ?>
            </div>
        </div>

        <?php
        $args = array(
            'post_type' => 'services',
            'posts_per_page' => -1,
        );
        $services_query = new WP_Query($args);
        if ($services_query->have_posts()) :
        ?>

            <div class='services__swipper swiper'>
                <div class="swiper-wrapper">
                    <?php
                    while ($services_query->have_posts()) : $services_query->the_post();
                    ?>
                        <div class="swiper-slide services__item">
                            <div class="services__bg" style="background-image: url('<?php the_post_thumbnail_url() ?>')">
                                <div class="services__item-inner">
                                    <h2>
                                        <?php the_title(); ?>
                                    </h2>
                                    <div class="services__item-text">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="services__item-link link">
                                        <?php pll_e('services_post_link') ?>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                    ?>

                </div>
                <div class="services__navigation">
                    <div class="services__arrow services__arrow--prev"></div>
                    <div class="services__arrow services__arrow--next"></div>
                </div>
                <div class="services-pagination"></div>
            </div>
        <?php endif; ?>

        <div class="anim-title _anim-items">
            <a href="<?php echo esc_url(get_home_url() . '/services/'); ?>" class="services__button button">
                <div class="button__wrapper">
                    <p><?php pll_e('look_services_button') ?></p>
                </div>
            </a>
        </div>

    </div>

    <?php get_template_part('template-parts/move-line'); ?>

</section>