<?php get_header();
?>

<main>

<?php $serviceString = get_field('service-page_string') ?? '' ;
      $serviceTitle = get_field('service-page_title') ?? '' ;
      $serviceDescription = get_field('service-page_description') ?? '' ;
      $serviceImg = get_field('service-page_image') ?? '' ;

      if( $serviceString || $serviceTitle  || $serviceDescription || $serviceImg ) : 

?>
  <section class="service-hero">
    <div class="container">
        <div class="service-hero__breadcrumps">
            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<nav class="yoast-breadcrumbs">', '</nav>' );
            }?>
        </div>
      <div class="service-hero__heading">
      <?php if ($serviceTitle) : ?>
        <h1 class="service-hero__title main__title">
           <?= $serviceTitle ;?>
        </h1>
        <?php endif ?>
        <?php if ($serviceDescription) : ?>
        <p class="service-hero__text">
            <?= $serviceDescription ;?>
        </p>
        <?php endif ?>
      </div>
    </div>
    <div class="container container--slider">
      <?php if ($serviceImg) : ?>
      <div class="service-hero__image">
          <img src='<?php echo $serviceImg['url']; ?>' alt='<?php echo $serviceImg['alt']; ?>' />
      </div>
      <?php endif ?>
      <?php get_template_part('template-parts/move-line'); ?>
    </div>
  </section>
  <?php endif ?>

  <?php $informationTitle = get_field('information_title') ?? '' ;
      $informationTopImg = get_field('information_top-image') ?? '' ;
      $informationBottomImg = get_field('information_bottom-image') ?? '' ;
      $informationQuestion = get_field('information_subtitle') ?? '' ;
      $informationMainImg = get_field('information_image') ?? '' ;

      if( $informationTitle || $informationTopImg || $informationBottomImg || $informationQuestion || $informationMainImg ) : 
?>
   <section class="service-information">
    <div class="container">
      <div class="service-information__heading">
      <?php if ($informationTitle) : ?>
        <h2 class="service-information__title main__title">
            <?= $informationTitle ;?>
        </h2>
        <?php endif ?>
        <?php if ($informationTopImg) : ?>
        <div class="service-information__top-image">
            <img src='<?php echo $informationTopImg['url']; ?>' alt='<?php echo $informationTopImg['alt']; ?>' />
        </div>
        <?php endif ?>
      </div>
      <div class="service-information__content">
        <div class="service-information__text">
        <?php if ($informationQuestion) : ?>
          <p class="service-information__question">
            <?= $informationQuestion ;?>
          </p>
          <?php endif ?>
          <ul class="service-information__answers">
          <?php while (have_rows('information_main')):
                            the_row();
              $informationParagraph = get_sub_field('information_paragraph'); ?>
         
            <li>
              <?= $informationParagraph ;?>
            </li>
          <?php endwhile ?>
          </ul>
          <?php if ($informationBottomImg) : ?>
          <div class="service-information__bottom-image">
            <img src='<?php echo $informationBottomImg['url']; ?>' alt='<?php echo $informationBottomImg['alt']; ?>' />
          </div>
          <?php endif ?>
        </div>
        <?php if ($informationMainImg) : ?>
        <div class="service-information__img">
            <img src='<?php echo $informationMainImg['url']; ?>' alt='<?php echo $informationMainImg['alt']; ?>' />
        </div>
        <?php endif ?>
      </div>
    </div>    
   </section>
  <?php endif ?>

  <?php $bannerBg = get_field('banner_background') ?? '' ; 
        $bannerTitle = get_field('banner_title') ?? '' ;
        $bannerDescription = get_field('banner_description') ?? '' ;
        $icon = get_field('default_picture', 'options') ?? '';
     if( $bannerBg || $bannerTitle || $bannerDescription || $icon ): ?>

  <section class="service-banner">
     <div class="service-banner__bg" style=" background-image: url('<?php echo esc_url($bannerBg); ?>');"></div>
     <div class="container">
        <div class="service-banner__wrapper">
          <div class="service-banner__string">
              <?php for ($i = 0; $i < 18; $i++) { ?>
                <?php if ($bannerTitle) : ?>
                  <span class="service-banner__title main__title main__title--sm">
                    <?= $bannerTitle ;?>
                  </span> 
                  <?php endif?>
              <?php } ?>
          </div>
          <div class="service-banner__main">
              <div class="service-banner__logo">
                <?php if ($icon) :
                      echo '<img src="' . esc_url($icon) . '" alt="logo">';
                endif ;?> 
              </div>
          
              <?php if ($bannerDescription) : ?>
              <div class="service-banner__description">
                <?= $bannerDescription ;?>
              </div>
              <?php endif ?>   
          </div>
       </div>
    </div>
  </section>
  <?php endif ?>

   <?php $advantagesTitle = get_field('advantages_title') ?? '' ;
         $advantagesImage = get_field('advantages_img') ?? '' ;
    if( $advantagesTitle || $advantagesImage ): ?>
    <section class="service-advantages">
    <div class="container container--slider">
      <div class="service-advantages__wrapper">
      <?php if( $advantagesTitle): ?> 
        <div class="service-advantages__title main__title main__title--sm">
          <?= $advantagesTitle?>
        </div>
        <?php endif ?>
        <?php if( $advantagesImage): ?> 
        <div class="service-advantages__image">
          <img src='<?php echo $advantagesImage['url']; ?>' alt='<?php echo $advantagesImage['alt']; ?>' />
        </div>
        <?php endif ?>
        <div class="service-advantages__slider swiper">
          <div class="service-advantages__list swiper-wrapper">
            
            <?php while (have_rows('advantages_list')):
                the_row();
                $advantagesHeading = get_sub_field('advantages_card_heading') ?? '' ;
                $advantagesDescription = get_sub_field('advantages_card_desc') ?? '' ; ?>
            <div class="service-advantages__item swiper-slide">
              <div class="service-advantages__text">
              <?php if( $advantagesHeading): ?> 
                <div class="service-advantages__heading">
                    <?= $advantagesHeading?>
                </div>
                <?php endif ?>
                <?php if( $advantagesDescription): ?> 
                <div class="service-advantages__description">
                    <?= $advantagesDescription?>
                </div>
                <?php endif ?>
              </div>
            </div>
            <?php endwhile?>
          </div>
          <div class="service-advantages__navigation">
                <div class="service-advantages__arrow service-advantages__arrow--prev"></div>
                <div class="service-advantages__arrow service-advantages__arrow--next"></div>
          </div>
          <div class="service-advantages__pagination"></div>
        </div>
      </div>
    </div>
  </section>
  <?php endif ?>

  <?php $projectsTitle = get_field('slider_title_s') ?? '' ; ?>
    <section class="service-projects">
        <div class="container">
        <?php if ($projectsTitle) : ?>
            <div class="service-projects__title main__title main__title--sm">
                <?= $projectsTitle ;?>
            </div>
        <?php endif; ?>
        </div>
      <?php get_template_part('template-parts/project-slider'); ?>
  </section>

  <?php $workTitle = get_field('work_title') ?? '';
        $workBackground = get_field('work_bg') ?? '';
        if( $workTitle || $workBackground ): ?>
 <section class="service-work" style=" background-image: url('<?php echo esc_url($workBackground); ?>');">
    <div class="container container--slider">
      <div class="service-work__wrapper">
      <?php if ($workTitle) : ?>
        <h2 class="service-work__title main__title main__title--sm">
          <?= $workTitle ;?>
        </h2>
        <?php endif; ?>
        <div class="service-work__swiper swiper">
          <div class="service-work__inner swiper-wrapper">
            <?php while (have_rows('cards')):
                the_row(); ?>
            <div class="service-work__card swiper-slide">
            
          <?php $cardTitle = get_sub_field('card_title') ?? '' ;
                $cardImage = get_sub_field('card_image') ?? '' ;
                $cardText= get_sub_field('card_text') ?? '' ; ?>
              <?php if ($cardTitle) : ?>
              <h3 class="service-work__heading">
                <?= $cardTitle ;?>
              </h3>
              <?php endif; ?>
                <div class="service-work__card-bottom">
                  <?php if ($cardImage) : ?>
                  <div class="service-work__image">
                    <img src='<?php echo $cardImage['url']; ?>' alt='<?php echo $cardImage['alt']; ?>' />
                  </div>
                  <?php endif; ?>
                  <?php if ($cardText) : ?>
                  <p class="service-work__text">
                    <?= $cardText?>
                  </p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php get_template_part('template-parts/contact-us'); ?>
</main>

<?php
get_footer();