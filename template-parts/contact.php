<?php
$title = get_field('contact_title');
$desc = get_field('contact_desc');
$text = get_field('contact_text');
$img = get_field('contact_img');
?>

<div class="image-container" cursor-class="arrow">
    <a href="#contact-us" id="contact-link">
        <section class="contact">

            <div class="contact__bg">
                <?php if ($img) : ?>
                    <img class="thumbnail" src="<?= $img ?>" alt="фонове зображення">
                <?php endif; ?>
            </div>

            <div class="container">
                <div class="contact__wrapper">
                    <div>
                        <div class="contact__top">
                            <?php if ($desc) : ?>
                                <p class="contact__desc anim-title _anim-items">
                                    <?= $desc ?>
                                </p>
                            <?php endif; ?>

                            <div class="contact__counter"></div>

                        </div>

                        <div class="contact__middle">
                            <?php if ($title) : ?>
                                <h2 class="contact__title anim-title _anim-items">
                                    <?= $title ?>
                                </h2>
                            <?php endif; ?>
                        </div>

                        <div class="anim-title _anim-items">
                            <div class="contact__button button">
                                <div class="button__wrapper">
                                    <p> <?php pll_e('contact_with_us'); ?></p>
                                </div>
                            </div>
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
                            <div class="anim-title _anim-items">
                                <?php echo $svg_content; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($text) : ?>
                            <div class="contact__text anim-title _anim-items">
                                <?= $text ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </a>

</div>