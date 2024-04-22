<!-- <?php
        $projectsTitle = get_field('slider_title');
        ?> -->

<section class="projects-slider">
    <div class="projects-slider__wrapper">
        
        <div class="projects-slider__swiper swiper">
            <?php
            $args = array(
                'post_type' => 'projects',
                'posts_per_page' => -1,
            );
            $projects_query = new WP_Query($args);
            if ($projects_query->have_posts()) :
            ?>
                <div class="projects-slider__list swiper-wrapper">
                    <?php
                    while ($projects_query->have_posts()) : $projects_query->the_post();
                    ?>
                        <?php
                        $subtitle = get_field('project_subtitle');
                        $location = get_field('project_location');
                        $default_picture = get_field('default_picture', 'options');
                        ?>

                        <a href="<?php the_permalink() ?>" class="projects-card swiper-slide" aria-label="<?php the_title_attribute(); ?>">
                            <div class="projects-card__img ">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                <?php else : ?>
                                    <img src="<?php echo esc_url($default_picture); ?>" alt="<?php the_title(); ?>" class="projects-card__img--error">
                                <?php endif; ?>
                            </div>

                            <div class="projects-card__categories">
                                <?php
                                $categories = get_the_terms(get_the_ID(), 'project-type');
                                if ($categories && !is_wp_error($categories)) {
                                    foreach ($categories as $category) {
                                        echo '<span class="projects-card__category">' . esc_html($category->name) . '</span>';
                                    }
                                }
                                ?>
                            </div>

                            <div class="projects-card__content">
                                <div class="projects-card__heading">
                                    <h3 class="projects-card__title">
                                        <?= get_the_title() . '.' ?>
                                    </h3>

                                    <?php if ($subtitle) : ?>
                                        <span class="projects-card__subtitle">
                                            <?= $subtitle ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <?php if ($location) : ?>
                                    <span class="projects-card__location">
                                        <?= $location ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </a>

                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php endif; ?>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <a href="<?php echo esc_url(get_home_url() . '/projects/'); ?>" class="projects-slider__button button">
            <div class="button__wrapper">
                <p> <?php pll_e('more_projects'); ?></p>
            </div>
        </a>
    </div>

</section>