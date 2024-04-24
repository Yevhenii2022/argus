<?php
/*
Template Name: Про нас
*/

get_header();
?>

<main>
    <?php $backgroundImage = get_field('banner_img') ?? '' ;?>
        <section class="about-banner">
            <div class="about-banner__bg" style=" background-image: url('<?php echo esc_url($backgroundImage); ?>');"></div>
            <div class="container">
                <div class="about-banner__wrapper">
                    <div class="about-banner__breadcrumps">
                        <?php if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb( '<nav class="yoast-breadcrumbs">', '</nav>' );
                        }?>
                    </div>
                    <?php
                    $title = get_field('about-us_title') ?? '';
                    $description = get_field('about-us_description') ?? '';
                    
                    if( $title || $subTitle || $description): ?>
                    <div class="about-banner__content">
                    <?php if ($title) : ?>
                        <h1 class="about-banner__title main__title main__title--sm anim-title _anim-items
">
                            <?=$title ;?>
                        </h1>
                    <?php endif ?>
                    <?php if ($description) : ?>
                        <p class="about-banner__description">
                            <?=$description ;?>
                        </p>
                    <?php endif ?>
                        <div class="about-banner__slider swiper anim-title     _anim-items">
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
                    <?php endif ?>
                </div>
            </div>
    </section>

    <?php $projectsTitle = get_field('slider_title') ?? '' ;?>
    <section class="about-projects">
        <div class="container">
        <?php if ($projectsTitle) : ?>
            <div class="about-projects__title main__title main__title--sm anim-title _anim-items">
                <?= $projectsTitle ;?>
            </div>
        <?php endif; ?>
        </div>
       <?php get_template_part('template-parts/project-slider'); ?>
    </section> 


   

    <?php $stageBackground = get_field('stage_bg') ?? '' ;
          $stageTitle = get_field('stage_heading') ?? '' ;
          $stageSubtitle = get_field('stage_subtitle') ?? '' ; ?>
    <section class="about-stages">
        <div class="container">
            <div class="about-stages__wrapper">
                <?php if( $stageBackground || $stageTitle || $stageSubtitle): ?>
                <div class="about-stages__heading">
                    <?php if ($stageTitle): ?>
                    <h2 class="about-stages__section-title main__title main__title--sm anim-title _anim-items">
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
        </div>
        
    </section>

    <?php $missionBackground = get_field('mission_bg') ?? '' ;
          $missionTitle = get_field('mission_title') ?? '' ;
          $missionText = get_field('mission_text') ?? '' ;
          $missionSubText = get_field('mission_subtext') ?? '' ;
          $missionVid = get_field('mission_video') ?? '' ;
          $missionIcon = get_field('default_picture', 'options') ?? '';

          if( $missionBackground  || $missionTitle || $missionText || $missionSubText || $missionVid || $missionIcon): 
    ?>
    <section class="about-mission" style=" background-image: url('<?php echo esc_url($missionBackground); ?>');">
        <div class="container">
            <div class="about-mission__wrapper">
                <?php if ($missionTitle): ?>
                <h2 class="about-mission__title main__title anim-title _anim-items">
                    <?= $missionTitle ;?>
                </h2>
                <?php endif ?>
                <div class="about-mission__text anim-title _anim-items">
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
                    <?php if ($missionIcon) :
                      echo '<img src="' . esc_url($missionIcon) . '" alt="logo">';
                    endif ;?> 
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
                <h2 class="about-values__heading main__title anim-title _anim-items">
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
      $teamIcon = get_field('default_picture', 'options') ?? '';

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
                                <?php if ($teamIcon) :
                                    echo '<img src="' . esc_url($teamIcon) . '" alt="logo">';
                                endif ;?> 
                                </div>
                            </div>
                        </div>
                        <div class="about-team__bottom">
                            
                                <a href="<?= get_home_url() . '/career' ?>" class="about-team__link link">
                                    <span>
                                        <?php pll_e('view_vacancies_link') ?>
                                    </span>
                                </a>
                                                  
                        </div>
                    </div>
                </div>
                <?php if( $teamDescription): ?>
                <h2 class="about-team__title main__title anim-title _anim-items">
                    <?= $teamTitle ;?>
                </h2>
                <?php endif ?>
            </div>
        </div>

    </section>
    <?php endif ?>
</main>


<?php get_footer(); ?>