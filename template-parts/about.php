<?php
$video = get_field('about_video');
$desc = get_field('about_desc');
$title = get_field('about_title');
$small_logo = get_field('small_logo', 'option');
?>

<section id="about" class="about">
    <div class="container">
        <div class="about__wrapper">
            <!-- <div class="about__bg"> -->
            <!-- <svg viewBox="0 0 1151 1187" fill="none" xmlns="http://www.w3.org/2000/svg" id="about-svg">
                    <g opacity="0.15">
                        <path
                            d="M370.51 211.163L271.701 1H748.492C935.131 1 1140.59 115.492 1140.59 393.097C1140.59 615.182 981.659 732.393 902.194 763.238L1150 1186.7H913.173L561.853 590.715H748.492C801.817 590.715 935.13 562.484 935.13 393.097C935.13 257.588 810.705 215.346 748.492 211.163H370.51Z"
                            stroke="black" />
                        <path
                            d="M414.356 779.778L20.213 15.9863L-587.703 1185.06H-336.075L20.213 474.707L171.635 779.778H414.356Z"
                            stroke="black" />
                        <path d="M512.327 982.47H278.205L379.712 1190.4H622.02L512.327 982.47Z" stroke="black" />
                    </g>
                </svg> -->
            <!-- </div> -->

            <div class="about__top">
                <?php if ($video) : ?>
                    <div class="about__top-video">
                        <video loop id="custom-video" preload="auto" muted playsinline preload="metadata">
                            <source src="<?php echo $video; ?>#t=0.001" type="video/mp4">
                            <source src="<?php echo $video; ?>#t=0.001" type="video/webm">
                            <source src="<?php echo $video; ?>#t=0.001" type="video/ogg">
                            <source src="<?php echo $video; ?>#t=0.001" type="video/quicktime">
                            <source src="<?php echo $video; ?>#t=0.001" type="video/x-flv">
                            <source src="<?php echo $video; ?>#t=0.001" type="video/x-msvideo">
                        </video>
                        <button class="video__play">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 19" fill="none">
                                <path fill="#fff" d="M0 0v19l15-9.5L0 0Z" />
                            </svg>
                            <?php pll_e('video') ?>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="about__top-content">
                    <?php if ($desc) : ?>
                        <p class="about__top-desc">
                            <?= $desc ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($small_logo) : ?>
                        <div class="about__top-logo">
                            <img src="<?= $small_logo ?>" alt="<?php pll_e('site_name') ?>">
                        </div>
                    <?php endif; ?>

                    <a href="<?= get_home_url() . '/about' ?>" class="about__top-link link">
                        <span>
                            <?php pll_e('more_about_us') ?>
                        </span>
                    </a>
                </div>
            </div>

            <?php if ($title) : ?>
                <div class="about__middle">
                    <div class="about__middle-title">
                        <?= $title ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (have_rows('about_list')) : ?>
                <div class="about__bottom">
                    <?php while (have_rows('about_list')) :
                        the_row();
                        $number = get_sub_field('number');
                        $title = get_sub_field('title');
                        $text = get_sub_field('text'); ?>

                        <div class="about__bottom-item">
                            <?php if ($number) : ?>
                                <span class="about__bottom-number">
                                    <?= $number ?>
                                </span>
                            <?php endif; ?>

                            <?php if ($title) : ?>
                                <span class="about__bottom-title">
                                    <?= $title ?>
                                </span>
                            <?php endif; ?>

                            <?php if ($text) : ?>
                                <span class="about__bottom-text">
                                    <?= $text ?>
                                </span>
                            <?php endif; ?>
                        </div>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- <div class="popup popup-video">
    <div class="container">
        <div class="popup__wrapper">
        </div>
    </div>
</div> -->
</section>