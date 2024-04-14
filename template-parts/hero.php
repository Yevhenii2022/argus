<?php
$title = get_field('hero_title') ?? '';
$subtitle = get_field('hero_subtitle') ?? '';
$desc = get_field('hero_desc') ?? '';
$text = get_field('hero_text') ?? '';
$bg = get_field('hero_bg');
?>

<section class="hero">
    <div class="container">
        <?php if ($bg) : ?>
            <div class="hero__wrapper" style=" background-image: url('<?php echo $bg; ?>');">
            <?php endif; ?>

            <div>
                <?php if ($title || $subtitle) : ?>
                    <div class="hero__title">
                        <h1 class="main__title main__title--sm"><?= $title ?></h1>
                        <?php if ($subtitle) : ?>
                            <h1 class="main__title main__title--sm main__title--italic"><?= $subtitle ?></h1>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($desc) : ?>
                    <p class="hero__desc"><?= $desc ?></p>
                <?php endif; ?>

                <a href="<?= get_home_url() . '/services' ?>" class="hero__button button">
                    <p><?php pll_e('look_services_button') ?></p>
                </a>
            </div>

            <div>

                <div class="hero__inner">
                    <?php if ($text) : ?>
                        <p class="hero__text"><?= $text ?></p>
                    <?php endif; ?>

                    <?php
                    $phone = get_field('phone', 'options');
                    $number =  $phone['phone_number'] ?? '';
                    $icon =  $phone['phone_icon'];
                    $cleanedNumber = preg_replace('/\s+/', '', $number);
                    $cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
                    $file_path = get_attached_file($icon);

                    if ($file_path && file_exists($file_path)) {
                        $svg_content = file_get_contents($file_path);
                    } else {
                        $svg_content = false;
                    }
                    ?>
                    <?php if ($number && $svg_content !== false) : ?>
                        <a class="hero__phone" href="tel:+<?php echo $cleanedNumber ?>">
                            <?php echo $svg_content; ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="hero__more">
                    <?php get_template_part('template-parts/scroll') ?>
                </div>
            </div>

            </div>
    </div>
</section>