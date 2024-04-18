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
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
    </section>

    <?php get_template_part('template-parts/project-slider'); ?>

    <?php $stageBackground = get_field('stage_bg') ?? '' ;
          $stageTitle = get_field('stage_heading') ?? '' ;
          $stageSubtitle = get_field('stage_subtitle') ?? '' ; ?>
    <section class="about-stages">
        <!-- <div class="container"> -->
            <div class="about-stages__wrapper">
                <?php if( $stageBackground || $stageTitle || $stageSubtitle): ?>
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

    <?php $missionBackground = get_field('mission_bg') ?? '' ;
          $missionTitle = get_field('mission_title') ?? '' ;
          $missionText = get_field('mission_text') ?? '' ;
          $missionSubText = get_field('mission_subtext') ?? '' ;
          $missionVid = get_field('mission_video') ?? '' ;

          if( $missionBackground  || $missionTitle || $missionText || $missionSubText || $missionVid): 
    ?>
    <section class="about-mission" style=" background-image: url('<?php echo esc_url($missionBackground); ?>');">
        <div class="container">
            <div class="about-mission__wrapper">
                <?php if ($missionTitle): ?>
                <h2 class="about-mission__title main__title">
                    <?= $missionTitle ;?>
                </h2>
                <?php endif ?>
                <div class="about-mission__text">
                    <?php if ($missionText): ?>
                    <div class="about-mission__description">
                        <?= $missionText ;?>
                    </div>
                    <?php endif ?>
                    <?php if ($missionSubText): ?>
                    <p class="about-mission__paragraph">
                        <?= $missionSubText ;?>
                    </p>
                    <?php endif ?>
                    <div class="about-mission__icon">
                        <svg  viewBox="0 0 75 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g clip-path="url(#clip0_136_6782)">
                            <mask id="mask0_136_6782" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="1" y="0" width="173" height="57">
                            <path d="M1.77344 0H173.795V56.7189H1.77344V0Z" fill="white"/>
                            </mask>
                            <g mask="url(#mask0_136_6782)">
                            <mask id="mask1_136_6782" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="-3" y="-49" width="177" height="170">
                            <rect x="-2.06055" y="-48.5659" width="175.885" height="169.187" fill="url(#pattern0_136_6782)"/>
                            </mask>
                            <g mask="url(#mask1_136_6782)">
                            <rect x="-2.06055" y="-48.5659" width="175.885" height="169.187" fill="url(#pattern1_136_6782)"/>
                            </g>
                            </g>
                            </g>
                            <defs>
                            <pattern id="pattern0_136_6782" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_136_6782" transform="scale(0.00146843)"/>
                            </pattern>
                            <pattern id="pattern1_136_6782" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image1_136_6782" transform="scale(0.00146843)"/>
                            </pattern>
                            <clipPath id="clip0_136_6782">
                            <rect width="75" height="58" fill="white"/>
                            </clipPath>
                            <image id="image0_136_6782" width="681" height="681" xlink:href="data:image/png;base64,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"/>
                            <image id="image1_136_6782" width="681" height="681" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-mission__video">
        <?php if( $missionVid ): ?>
            <video preload="auto" no-controls autoplay loop playsinline muted>
                <source src="<?php echo $missionVid['url']; ?>" type="<?php echo $missionVid['mime_type']; ?>">
                Your browser does not support the video tag.
            </video>
        <?php endif; ?>
        </div>
        
    </section>
    <?php endif ?>


    <?php $valuesHeading = get_field('values_title') ?? '' ;?>
    <section class="about-values">
        <div class="container">
            <div class="about-values__wrapper">
                <div class="about-values__left">
                    <?php if( $valuesHeading ): ?>
                <h2 class="about-values__heading main__title" id="stiky">
                    <?= $valuesHeading ;?>
                </h2>
                <?php endif ?>
                </div>
                <div class="about-values__right">
                     <ul class="about-values__list">
                    <?php while (have_rows('values_list')):
                            the_row();
                            $valuesItemTitle = get_sub_field('value_heading') ?? '' ;
                            $valuesItemDescription = get_sub_field('value_description') ?? '' ; ?>
                    <li class="about-values__item">
                    
                        <?php if( $valuesItemTitle ): ?>
                        <h3 class="about-values__title">
                            <?= $valuesItemTitle ;?>
                        </h3>
                        <?php endif ?>
                        <?php if( $valuesItemDescription): ?>
                        <p class="about-values__description">
                            <?= $valuesItemDescription ;?>
                        </p>
                        <?php endif ?>
                        
                    </li>
                    <? endwhile ?>
                </ul>
                </div>
               
            </div>
        </div>
    </section>

<?php $teamImg = get_field('team_photo') ?? '' ;
      $teamTitle = get_field('section_title') ?? '' ;
      $teamName = get_field('section_name') ?? '' ;
      $teamDescription = get_field('section_text') ?? '' ;

      if( $teamImg || $teamTitle || $teamName || $teamDescription): 
    ?>
    <section class="about-team">
        <div class="container">
            <div class="about-team__wrapper">
                <div class="about-team__content">
                    <?php if( $teamImg ): ?>
                    <div class="about-team__image">
                        <img src='<?php echo $teamImg['url']; ?>' alt='<?php echo $teamImg['alt']; ?>' />
                    </div>
                    <?php endif ?>
                    <div class="about-team__text">
                        <div class="about-team__top">
                            <?php if( $teamName ): ?>
                            <div class="about-team__name">
                                <?= $teamName ;?>
                            </div>
                            <?php endif ?>
                            <div class="about-team__description">
                                <?php if( $teamDescription): ?>
                                <div class="about-team__paragraph">
                                    <?= $teamDescription ;?>
                                </div>
                                <?php endif ?>
                                <div class="about-team__logo">
                                    <svg  viewBox="0 0 75 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g clip-path="url(#clip0_136_6782)">
                                        <mask id="mask0_136_6782" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="1" y="0" width="173" height="57">
                                        <path d="M1.77344 0H173.795V56.7189H1.77344V0Z" fill="white"/>
                                        </mask>
                                        <g mask="url(#mask0_136_6782)">
                                        <mask id="mask1_136_6782" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="-3" y="-49" width="177" height="170">
                                        <rect x="-2.06055" y="-48.5659" width="175.885" height="169.187" fill="url(#pattern0_136_6782)"/>
                                        </mask>
                                        <g mask="url(#mask1_136_6782)">
                                        <rect x="-2.06055" y="-48.5659" width="175.885" height="169.187" fill="url(#pattern1_136_6782)"/>
                                        </g>
                                        </g>
                                        </g>
                                        <defs>
                                        <pattern id="pattern0_136_6782" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_136_6782" transform="scale(0.00146843)"/>
                                        </pattern>
                                        <pattern id="pattern1_136_6782" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image1_136_6782" transform="scale(0.00146843)"/>
                                        </pattern>
                                        <clipPath id="clip0_136_6782">
                                        <rect width="75" height="58" fill="white"/>
                                        </clipPath>
                                        <image id="image0_136_6782" width="681" height="681" xlink:href="data:image/png;base64,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"/>
                                        <image id="image1_136_6782" width="681" height="681" xlink:href="data:image/png;base64,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"/>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="about-team__bottom">
                            
                                <a href="<?= get_home_url() . '/career' ?>" class="about-team__link link">
                                    <span>
                                        <?php pll_e('you_can_become_part_of_the_team_view_vacancies') ?>
                                    </span>
                                </a>
                                                  
                        </div>
                    </div>
                </div>
                <?php if( $teamDescription): ?>
                <h2 class="about-team__title main__title">
                    <?= $teamTitle ;?>
                </h2>
                <?php endif ?>
            </div>
        </div>

    </section>
    <?php endif ?>
</main>


<?php get_footer(); ?>