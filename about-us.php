<?php
/*
Template Name: Про нас
*/

get_header();
?>

<main>
    <?php $background_image = get_field('banner_img') ?? '' ;?>
        <section class="about-banner">
            <div class="container">
                <div class="about-banner__wrapper">
                    <div class="about-banner__bg" style=" background-image: url('<?php echo esc_url($background_image); ?>');"></div>
                    <div class="about-banner__breadcrumps">
                        <?php if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb( '<nav class="yoast-breadcrumbs">', '</nav>' );
                        }?>
                    </div>
                    <?php
                    $title = get_field('about-us_title') ?? '';
                    $subTitle = get_field('about-us_subtitle') ?? '';
                    $description = get_field('about-us_description') ?? '';
                    
                    if( $title || $subTitle || $description): ?>
                    <div class="about-banner__banner">
                    <?php if ($title) : ?>
                        <h1 class="about-banner__title main__title main__title--sm">
                            <?=$title ;?>
                        </h1>
                    <?php endif ?>
                    <?php if ($subTitle) : ?>
                        <h2 class="about-banner__subtitle main__title main__title--sm main__title--italic">
                            <?=$subTitle ;?>
                        </h2>
                    <?php endif ?>
                    <?php if ($description) : ?>
                        <p class="about-banner__description">
                            <?=$description ;?>
                        </p>
                    <?php endif ?>
                    </div>
                    <?php endif ?>
                    <div class="about-banner__slider swiper">
                        <div class="about-banner__slides swiper-wrapper ">
                        <?php while (have_rows('about-us_list')):
                            the_row();
                            $number = get_sub_field('number');
                            $title = get_sub_field('title');
                            $text = get_sub_field('text'); ?>
                            <div class="about-banner__item swiper-slide">
                                <?php if ($number): ?>
                                <div class="about-banner__item-number">
                                    <?= $number ;?>
                                </div>
                                <?php endif ?>
                                <?php if ($title): ?>
                                <div class="about-banner__item-title">
                                    <?= $title ;?>
                                </div>
                                <?php endif ?>
                                <?php if ($text): ?>
                                <div class="about-banner__item-text">
                                    <?= $text ;?>
                                </div>
                                <?php endif ?>
                            </div>
                            <?php endwhile ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php $stageBackground = get_field('stage_bg') ?? '' ;
          $stageTitle = get_field('stage_heading') ?? '' ;
          $stageSubtitle = get_field('stage_subtitle') ?? '' ;?>
    <section class="about-stages">
        <!-- <div class="container"> -->
            <div class="about-stages__wrapper">
                <?php if( $stageBackground || $stageTitle|| $stageSubtitle): ?>
                <div class="about-stages__heading">
                    <?php if ($stageTitle): ?>
                    <h2 class="about-stages__section-title main__title main__title--sm">
                        <?= $stageTitle ;?>
                    </h2>
                    <?php endif ?>
                    <?php if ($stageSubtitle): ?>
                    <p class="about-stages__subtitle">
                        <svg viewBox="0 0 9 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.24528 11H0L4.75472 5.5L0 0H4.24528L9 5.5L4.24528 11Z" fill="#F41B1B" />
                        </svg>
                        <?= $stageSubtitle ;?>
                    </p>
                    <?php endif ?>
                </div>
                <?php endif ?>

                <div class="about-stage__item">
                    <?php while (have_rows('stages')):
                            the_row();
                            $startDate = get_sub_field('start_date');
                            $endDate = get_sub_field('end_date');
                            $stageHeading= get_sub_field('stage_title'); 
                            $stageDescription = get_sub_field('stage_description');
                            $stageImg = get_sub_field('stage_img'); ?>
                    <div class="about-stages__item-inner">
                        <div
                            class="about-stages__bg"
                            style="background-image: url('<?php echo esc_url($stageBackground); ?>')">
                        </div>
                        <?php if ($startDate): ?>
                        <div class="about-stages__year-first">
                            <?= $startDate ;?>
                        </div>
                        <?php endif ?>
                        <?php if ($endDate): ?>
                        <div class="about-stages__year-last">
                            <?= $endDate ;?>
                        </div>
                        <?php endif ?>

                        <div class="about-stages__text">
                            <?php if ($stageHeading): ?>
                            <div class="about-stages__title">
                                <?= $stageHeading ;?>
                            </div>
                            <?php endif ?>
                            <?php if ($stageDescription): ?>
                            <div class="about-stages__description">
                               <?= $stageDescription ;?>
                            </div>
                            <?php endif ?>
                        </div>
                        <?php if ($stageImg): ?>
                        <div class="about-stages__img" data-image-wrap>
                            <img src='<?php echo $stageImg['url']; ?>' alt='<?php echo $stageImg['alt']; ?>' />
                        </div>
                        <?php endif ?>
                    </div>
                    <? endwhile ;?>
                </div>
                
            </div>
        <!-- </div> -->
        
    </section>

    <?php $missionBackground = get_field('mission_bg') ?? '' ;?>
    <section class="about-mission" style=" background-image: url('<?php echo esc_url($missionBackground); ?>');">
        <div class="container">
            <div class="about-mission__wrapper">
                <h2 class="about-mission__title"></h2>
                <div class="about-mission__text">
                    <p class="about-mission__description"></p>
                    <p class="about-mission__paragraph"></p>
                    <div class="about-mission__icon"></div>
                </div>
            </div>
        </div>
        <div class="about-mission__image"></div>
    </section>
    
</main>


<?php get_footer(); ?>