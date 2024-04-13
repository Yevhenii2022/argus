<?php
$title = get_field('services_title');
$desc = get_field('services_desc');
?>

<section class="services">
    <div class="services__wrapper">
        <div class="services__cover">
            <div class="container">
                <?php if ($title): ?>
                    <div class="services__title title">
                        <?= $title ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <?php if (have_rows('services_list')): ?>
            <div class='services__swipper swiper'>
                <div class="swiper-wrapper">
                    <?php while (have_rows('services_list')):
                        the_row(); ?>
                        <?php $post_object = get_sub_field('item'); ?>
                        <?php if ($post_object): ?>
                            <?php
                            $post = $post_object;
                            setup_postdata($post);
                            $services_description = get_the_content();
                            $service_title = get_the_title();
                            ?>
                            <div class="swiper-slide services__item">
                                <div class="services__bg" style="background-image: url('<?php the_post_thumbnail_url() ?>')">
                                    <div class="services__item-inner">
                                        <h2>
                                            <?= $service_title ?>
                                        </h2>
                                        <div class="services__item-text">
                                            <?php
                                            echo mb_strlen($services_description, 'UTF-8') > 300 ? mb_substr($services_description, 0, 300, 'UTF-8') . '...' : $services_description;
                                            ?>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="services__item-link link">
                                            <?php pll_e('services_post_link') ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
                <div class="services__navigation">
                    <div class="services__arrow services__arrow--prev"></div>
                    <div class="services__arrow services__arrow--next"></div>
                </div>
            </div>
        <?php endif; ?>
    </div>

</section>