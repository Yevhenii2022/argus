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
    <section class="about-stages">
        
    </section>
    
</main>


<?php get_footer(); ?>