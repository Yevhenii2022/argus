<?php
$title = get_field('contact_title');
$desc = get_field('contact_desc');
$text = get_field('contact_text');
$img = get_field('contact_img');
?>

<section class="contact">
    <?php if ($img): ?>
        <style>
            .contact {
                background-image: url('<?= $img ?>');
            }
        </style>
    <?php endif; ?>

    <div class="container">
        <div class="contact__wrapper">
            <div class="contact__top">
                <?php if ($desc): ?>
                    <p class="contact__desc">
                        <?= $desc ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="contact__middle">
                <?php if ($title): ?>
                    <div class="contact__title">
                        <?= $title ?>
                    </div>
                <?php endif; ?>

                <div class="contact__button">
                    <div class="contact__link link">
                        <span>
                            <?php pll_e('contact_with_us'); ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="contact__bottom">
                <?php if ($text): ?>
                    <div class="contact__text">
                        <?= $text ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>