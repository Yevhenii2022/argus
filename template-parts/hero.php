<?php
$title = get_field('hero_title') ?? '';
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
                <?php if ($title) : ?>
                    <h1 class="hero__title title anim-title _anim-items"><?= $title ?></h1>
                <?php endif; ?>

                <?php if ($desc) : ?>
                    <p class="hero__desc anim-title _anim-items"><?= $desc ?></p>
                <?php endif; ?>

                <a href="<?php echo esc_url(get_home_url() . '/services/'); ?>" class="hero__button button">
                    <div class="button__wrapper">
                        <p><?php pll_e('look_services_button') ?></p>
                    </div>
                </a>
            </div>

            <div>
                <div class="hero__inner">
                    <?php if ($text) : ?>
                        <p class="hero__text anim-title _anim-items"><?= $text ?></p>
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