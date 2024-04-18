<?php
$subtitle = get_field('project_subtitle');
$location = get_field('project_location');
$default_picture = get_field('default_picture', 'options');
?>

<a href="<?php the_permalink() ?>" class="projects-card" aria-label="<?php the_title_attribute(); ?>">
    <div class="projects-card__img">
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
                // $translated_category = get_term_by('id', pll_get_term($category->term_id), 'project-type');
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