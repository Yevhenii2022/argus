<?php
$title = get_field('hero_title');
$subtitle = get_field('hero_subtitle') ?? '';
$desc = get_field('hero_desc');
$text = get_field('hero_text');
$bg = get_field('hero_bg');
?>

<section class="hero">
    <?php if ($bg) : ?>
        <style>
            .hero__wrapper {
                background-image: url(<?= $bg ?>);
            }
        </style>
    <?php endif; ?>

    <div class="container">
        <div class="hero__wrapper">
            <?php if ($title || $subtitle) : ?>
                <h1 class="main__title main__title--sm"><?= $title ?></h1>
                <?php if ($subtitle) : ?>
                    <h1 class="main__title main__title--sm main__title--italic"><?= $subtitle ?></h1>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($desc) : ?>
                <p class="hero__desc">
                    <?= $desc ?>
                </p>
            <?php endif; ?>


            <a href="<?= get_home_url() . '/services' ?>" class="hero__button button">
                <p><?php pll_e('look_services_button') ?></p>
            </a>

            <div class="hero__content">
                <?php if ($text) : ?>
                    <p class="hero__text">
                        <?= $text ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="hero__more">
                <?php get_template_part('template-parts/scroll') ?>
            </div>
        </div>
    </div>
</section>