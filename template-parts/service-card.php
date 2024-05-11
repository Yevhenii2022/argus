<a href="<?php the_permalink(); ?>" class="service-card__item anim-card _anim-items">
    <div class="service-card__image">
    <?php if (has_post_thumbnail()) : ?>
        <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
    <?php endif; ?>
    </div>
    <h2>
        <?php the_title(); ?>
    </h2>
    <div class="service-card__item-text">
        <?php the_excerpt(); ?>
    </div>
    <span class="service-card__item-link link">
        <?php pll_e('services_post_link') ?>
    </span>
</a>