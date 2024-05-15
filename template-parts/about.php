<?php
$video = get_field('about_video');
$desc = get_field('about_desc') ?? '';
$title = get_field('about_title') ?? '';
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
            <div class="about--hide">
                <div class="about__top-counter"></div>
            </div>
            <div class="about__box">
                <div class="about__top">
                    <?php if ($video) : ?>
                        <div class="about__top-video anim-title _anim-items">
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

                        <div class="about--show">
                            <div class="about__top-inner">
                                <div class="about__top-counter"></div>

                                <?php
                                $small_logo = get_field('small_logo');
                                if ($small_logo) {
                                    $file_path = get_attached_file($small_logo);
                                    $svg_content = file_get_contents($file_path);
                                    if ($svg_content !== false) :
                                ?>
                                        <?= $svg_content; ?>
                                <?php
                                    endif;
                                }
                                ?>
                            </div>
                        </div>

                        <?php if ($desc) : ?>
                            <p class="about__top-desc anim-title _anim-items"><?= $desc ?></p>
                        <?php endif; ?>

                        <a href="<?php echo esc_url(get_home_url() . '/about/'); ?>" class="about__top-link link anim-title _anim-items" style="width: <?php echo (pll_current_language() === 'en') ? '3.97rem' : '3.571rem'; ?>">
                            <span>
                                <?php pll_e('more_about_us') ?>
                            </span>
                        </a>
                    </div>
                </div>

                <?php if ($title) : ?>
                    <h2 class="about__title title anim-title _anim-items"><?= $title ?></h2>
                <?php endif; ?>
            </div>

            <?php if (have_rows('about_list')) : ?>
                <div class="about__bottom">
                    <?php while (have_rows('about_list')) :
                        the_row();
                        $number = get_sub_field('number');
                        $title = get_sub_field('title');
                        $text = get_sub_field('text'); ?>

                        <div class="about__bottom-item anim-title _anim-items">
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
</section>

<div id='bcg'></div>
<div class="about__bcg">
    <svg id='about-svg2' viewBox="0 0 375 731" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g opacity="0.08">
            <path d="M-15.3439 129.889L-75.9414 1H216.466C330.928 1 456.933 71.216 456.933 241.466C456.933 377.667 359.464 449.55 310.729 468.467L462.704 728.171H317.462L102.004 362.662H216.466C249.17 362.662 330.928 345.348 330.928 241.466C330.928 158.361 254.62 132.455 216.466 129.889H-15.3439Z" stroke="#181818" />
            <path d="M11.5455 478.611L-230.176 10.1909L-603 727.161H-448.681L-230.176 291.516L-137.311 478.611H11.5455Z" stroke="#181818" />
            <path d="M71.6299 602.918H-71.9531L-9.7003 730.436H138.903L71.6299 602.918Z" stroke="#181818" />
        </g>
    </svg>
</div>