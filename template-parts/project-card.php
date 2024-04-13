<?php
$subtitle = get_field('project_subtitle');
$location = get_field('project_location');
$small_logo = get_field('small_logo', 'option');
?>

<a href="<?php the_permalink() ?>" class="projects-card">
    <div class="projects-card__img">
        <?php if (has_post_thumbnail()): ?>
            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        <?php else: ?>
            <img src="<?= $small_logo ?>" alt="<?php the_title(); ?>" class="projects-card__img--error">
        <?php endif; ?>
    </div>

    <div class="projects-card__content">
        <div class="projects-card__heading">
            <h3 class="projects-card__title">
                <?= get_the_title() . '.' ?>
            </h3>

            <?php if ($subtitle): ?>
                <span class="projects-card__subtitle">
                    <?= $subtitle ?>
                </span>
            <?php endif; ?>
        </div>

        <?php if ($location): ?>
            <span class="projects-card__location">
                <?= $location ?>
            </span>
        <?php endif; ?>
    </div>
</a>