<?php
$title = get_field('projects-part_title');
?>
<section class="projects-part">
    <div class="container">
        <div class="projects-part__wrapper">
            <?php if ($title) : ?>
                <h3 class="projects-part__title title">
                    <?= $title ?>
                    <div class="projects-part__counter"></div>
                </h3>
            <?php endif; ?>

            <?php
            $args = array(
                'post_type' => 'projects',
                'posts_per_page' => 6,
            );
            $projects_query = new WP_Query($args);
            if ($projects_query->have_posts()) :
            ?>
                <div class="projects-part__list">
                    <?php
                    while ($projects_query->have_posts()) : $projects_query->the_post();
                    ?>

                        <?php get_template_part('template-parts/project-card'); ?>

                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php endif; ?>

            <a href="<?php echo esc_url(get_home_url() . '/projects/'); ?>" class="projects-part__button button">
                <div class="button__wrapper">
                    <p> <?php pll_e('more_projects'); ?></p>
                </div>
            </a>

        </div>
    </div>
</section>