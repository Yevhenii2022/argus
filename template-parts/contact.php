<?php
$title = get_field('contact_title');
$desc = get_field('contact_desc');
$text = get_field('contact_text');
$img = get_field('contact_img');
?>

<section class="contact">
    <?php if ($img) : ?>
        <style>
            .contact {
                background-image: url('<?= $img ?>');
            }
        </style>
    <?php endif; ?>

    <div class="container">
        <div class="contact__wrapper">

            <div>
                <div class="contact__top">
                    <?php if ($desc) : ?>
                        <p class="contact__desc">
                            <?= $desc ?>
                        </p>
                    <?php endif; ?>

                    <div class="contact__counter"></div>

                </div>

                <div class="contact__middle">
                    <?php if ($title) : ?>
                        <div class="contact__title">
                            <?= $title ?>
                        </div>
                    <?php endif; ?>

                    <a href='#' class="contact__button">
                        <div class="contact__link link">
                            <span>
                                <?php pll_e('contact_with_us'); ?>
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="contact__bottom">
                <?php
                $icon = get_field('contact_icon');
                $file_path = get_attached_file($icon);

                if ($file_path && file_exists($file_path)) {
                    $svg_content = file_get_contents($file_path);
                } else {
                    $svg_content = false;
                }
                ?>
                <?php if ($svg_content !== false) : ?>
                    <?php echo $svg_content; ?>
                <?php endif; ?>

                <?php if ($text) : ?>
                    <div class="contact__text">
                        <?= $text ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>