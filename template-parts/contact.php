<?php
$title = get_field('contact_title');
$desc = get_field('contact_desc');
$text = get_field('contact_text');
$img = get_field('contact_img');
?>

<div class="image-container" cursor-class="arrow">
    <a href='#contact-us'>
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

                    <div id="cursor">
                        <div class="cursor__circle"></div>
                    </div>

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
                                <h2 class="contact__title anim-title _anim-items">
                                    <?= $title ?>
                                </h2>
                            <?php endif; ?>
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
    </a>
</div>