<?php
/*
Template Name: Про нас
*/

get_header();
?>

<main class="main">
    <?php $backgroundImage = get_field('banner_img') ?? ''; ?>
    <section class="about-banner">
        <div class="about-banner__bg" style=" background-image: url('<?php echo esc_url($backgroundImage); ?>');"></div>
        <div class="container">
            <div class="about-banner__wrapper">
                <div class="about-banner__breadcrumps">
                    <?php if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<nav class="yoast-breadcrumbs">', '</nav>');
                    } ?>
                </div>
                <?php
                $title = get_field('about-us_title') ?? '';
                $description = get_field('about-us_description') ?? '';

                if ($title || $subTitle || $description) : ?>
                    <div class="about-banner__content">
                        <?php if ($title) : ?>
                            <h1 class="about-banner__title main__title main__title--sm anim-title _anim-items">
                                <?= $title; ?>
                            </h1>
                        <?php endif ?>
                        <?php if ($description) : ?>
                            <p class="about-banner__description">
                                <?= $description; ?>
                            </p>
                        <?php endif ?>
                        <div class="about-banner__slider swiper">
                            <div class="about-banner__slides swiper-wrapper">
                                <?php while (have_rows('about-us_list')) :
                                    the_row();
                                    $number = get_sub_field('number');
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text'); ?>
                                    <div class="about-banner__item swiper-slide anim-title _anim-items">
                                        <?php if ($number) : ?>
                                            <p class="about-banner__item-number">
                                                <?= $number; ?>
                                            </p>
                                        <?php endif ?>
                                        <?php if ($title) : ?>
                                            <h3 class="about-banner__item-title">
                                                <?= $title; ?>
                                            </h3>
                                        <?php endif ?>
                                        <?php if ($text) : ?>
                                            <div class="about-banner__item-text">
                                                <?= $text; ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                <?php endwhile ?>
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    <?php endif ?>
                    </div>
            </div>
    </section>

    <?php $projectsTitle = get_field('slider_title') ?? ''; ?>
    <section class="about-projects">
        <div class="container">
            <?php if ($projectsTitle) : ?>
                <div class="about-projects__title main__title main__title--sm anim-title _anim-items">
                    <?= $projectsTitle; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php get_template_part('template-parts/project-slider'); ?>
    </section>


    <?php $stageBackground = get_field('stage_bg') ?? '';
    $stageTitle = get_field('stage_heading') ?? '';
    $stageSubtitle = get_field('stage_subtitle') ?? ''; ?>
    <section class="about-stages">
        <div class="container container--slider">
            <div class="about-stages__wrapper">
                <?php if ($stageBackground || $stageTitle || $stageSubtitle) : ?>
                    <div class="about-stages__heading">
                        <?php if ($stageTitle) : ?>
                            <h2 class="about-stages__section-title main__title main__title--sm anim-title _anim-items">
                                <?= $stageTitle; ?>
                            </h2>
                        <?php endif ?>
                        <?php if ($stageSubtitle) : ?>
                            <p class="about-stages__subtitle">
                                <svg viewBox="0 0 9 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.24528 11H0L4.75472 5.5L0 0H4.24528L9 5.5L4.24528 11Z" fill="#F41B1B" />
                                </svg>
                                <?= $stageSubtitle; ?>
                            </p>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <!-- scroll -->
                <div class="about-stage__item">
                    <?php while (have_rows('stages')) :
                        the_row();
                        $startDate = get_sub_field('start_date');
                        $endDate = get_sub_field('end_date');
                        $stageHeading = get_sub_field('stage_title');
                        $stageDescription = get_sub_field('stage_description');
                        $stageImg = get_sub_field('stage_img'); ?>

                        <div class="content--sticky">

                            <div class="about-stages__item-inner">
                                <div class="about-stages__bg" style="background-image: url('<?php echo esc_url($stageBackground); ?>')">
                                </div>

                                <div class="about-stages__box">
                                    <div class="about-stages__flex">
                                        <div class="about-stages__text">
                                            <?php if ($stageHeading) : ?>
                                                <div class="about-stages__title">
                                                    <?= $stageHeading; ?>
                                                </div>
                                            <?php endif ?>
                                            <?php if ($stageDescription) : ?>
                                                <div class="about-stages__description">
                                                    <?= $stageDescription; ?>
                                                </div>
                                            <?php endif ?>
                                        </div>

                                        <?php if ($stageImg) : ?>
                                            <div class="about-stages__img" data-image-wrap>
                                                <img src='<?php echo $stageImg['url']; ?>' alt='<?php echo $stageImg['alt']; ?>' />
                                                <?php if ($startDate) : ?>
                                                    <div class="about-stages__year-first">
                                                        <?= $startDate; ?>
                                                    </div>
                                                <?php endif ?>
                                                <?php if ($endDate) : ?>
                                                    <div class="about-stages__year-last">
                                                        <?= $endDate; ?>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        <?php endif ?>
                                    </div>

                                    <?php
                                    $stages = get_field('stages');
                                    ?>
                                    <div class="years">
                                        <?php
                                        if ($stages) {
                                            foreach ($stages as $stage) {
                                                $end_date = $stage['end_date'];
                                        ?>
                                                <div>
                                                    <p>20<?= $end_date; ?></p>

                                                    <?php
                                                    if ($end_date == $endDate) {
                                                    ?>
                                                        <div class="line"></div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <? endwhile; ?>

                </div>
                <!-- scroll -->
            </div>
        </div>
    </section>

    <?php $missionBackground = get_field('mission_bg') ?? '';
    $missionTitle = get_field('mission_title') ?? '';
    $missionText = get_field('mission_text') ?? '';
    $missionSubText = get_field('mission_subtext') ?? '';
    $missionVid = get_field('mission_video') ?? '';
    $missionIcon = get_field('default_picture', 'options') ?? '';

    if ($missionBackground  || $missionTitle || $missionText || $missionSubText || $missionVid || $missionIcon) :
    ?>
        <section class="about-mission" style=" background-image: url('<?php echo esc_url($missionBackground); ?>');">
            <div class="container">
                <div class="about-mission__wrapper">
                    <?php if ($missionTitle) : ?>
                        <h2 class="about-mission__title main__title anim-title _anim-items">
                            <?= $missionTitle; ?>
                        </h2>
                    <?php endif ?>
                    <div class="about-mission__text anim-title _anim-items">
                        <?php if ($missionText) : ?>
                            <div class="about-mission__description">
                                <?= $missionText; ?>
                            </div>
                        <?php endif ?>
                        <?php if ($missionSubText) : ?>
                            <p class="about-mission__paragraph">
                                <?= $missionSubText; ?>
                            </p>
                        <?php endif ?>
                        <div class="about-mission__icon">
                            <?php if ($missionIcon) :
                                echo '<img src="' . esc_url($missionIcon) . '" alt="logo">';
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-mission__video">
                <?php if ($missionVid) : ?>
                    <video loop id="custom-video" preload="auto" muted playsinline preload="metadata">
                        <source src="<?php echo $missionVid['url']; ?>#t=0.001" type="video/mp4">
                        <source src="<?php echo $missionVid['url']; ?>#t=0.001" type="video/webm">
                        <source src="<?php echo $missionVid['url']; ?>#t=0.001" type="video/ogg">
                        <source src="<?php echo $missionVid['url']; ?>#t=0.001" type="video/quicktime">
                        <source src="<?php echo $missionVid['url']; ?>#t=0.001" type="video/x-flv">
                        <source src="<?php echo $missionVid['url']; ?>#t=0.001" type="video/x-msvideo">
                    </video>
                    <button class="video__play">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 19" fill="none">
                            <path fill="#fff" d="M0 0v19l15-9.5L0 0Z" />
                        </svg>
                        <?php pll_e('video') ?>
                    </button>
                <?php endif; ?>
            </div>

        </section>
    <?php endif ?>


    <?php $valuesHeading = get_field('values_title') ?? ''; ?>
    <section class="about-values">
        <div class="container container--slider">
            <div class="about-values__wrapper">
                <div class="about-values__left">
                    <?php if ($valuesHeading) : ?>
                        <h2 class="about-values__heading main__title">
                            <?= $valuesHeading; ?>
                        </h2>
                    <?php endif ?>
                </div>
                <div class="about-values__right swiper">
                    <ul class="about-values__list swiper-wrapper">
                        <?php while (have_rows('values_list')) :
                            the_row();
                            $valuesItemTitle = get_sub_field('value_heading') ?? '';
                            $valuesItemDescription = get_sub_field('value_description') ?? ''; ?>
                            <li class="about-values__item swiper-slide">

                                <?php if ($valuesItemTitle) : ?>
                                    <h3 class="about-values__title">
                                        <?= $valuesItemTitle; ?>
                                    </h3>
                                <?php endif ?>
                                <?php if ($valuesItemDescription) : ?>
                                    <p class="about-values__description">
                                        <?= $valuesItemDescription; ?>
                                    </p>
                                <?php endif ?>

                            </li>
                        <? endwhile ?>
                    </ul>
                    <div class="about-values__pagination">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <?php $teamImg = get_field('team_photo') ?? '';
    $teamTitle = get_field('section_title') ?? '';
    $teamName = get_field('section_name') ?? '';
    $teamDescription = get_field('section_text') ?? '';
    $teamIcon = get_field('default_picture', 'options') ?? '';

    if ($teamImg || $teamTitle || $teamName || $teamDescription) :
    ?>
        <section class="about-team">
            <div class="container">
                <div class="about-team__wrapper">
                    <div class="about-team__content">
                        <?php if ($teamImg) : ?>
                            <div class="about-team__image">
                                <img src='<?php echo $teamImg['url']; ?>' alt='<?php echo $teamImg['alt']; ?>' />
                            </div>
                        <?php endif ?>
                        <div class="about-team__text">
                            <div class="about-team__top">
                                <?php if ($teamName) : ?>
                                    <div class="about-team__name">
                                        <?= $teamName; ?>
                                    </div>
                                <?php endif ?>
                                <div class="about-team__description">
                                    <?php if ($teamDescription) : ?>
                                        <div class="about-team__paragraph">
                                            <?= $teamDescription; ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="about-team__logo">
                                        <?php if ($teamIcon) :
                                            echo '<img src="' . esc_url($teamIcon) . '" alt="logo">';
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="about-team__bottom">

                                <a href="<?= get_home_url() . '/vacancies' ?>" class="about-team__link link">
                                    <span>
                                        <?php pll_e('view_vacancies_link') ?>
                                    </span>
                                </a>

                            </div>
                        </div>
                    </div>
                    <?php if ($teamDescription) : ?>
                        <h2 class="about-team__title main__title anim-title _anim-items">
                            <?= $teamTitle; ?>
                        </h2>
                    <?php endif ?>
                </div>
            </div>

        </section>
    <?php endif ?>
</main>


<?php get_footer(); ?>