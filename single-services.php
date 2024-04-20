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
        $icon = get_field('small_logo', 'options') ?? '';
     if( $bannerBg || $bannerTitle || $bannerDescription || $icon ): ?>
  <section class="service-banner">
     <div class="service-banner_bg" style=" background-image: url('<?php echo esc_url($bannerBg); ?>');"></div>
     <div class="container">
      <div class="services-banner__string">
         <?php if ($bannerTitle) : ?>
         <h2 class="services-banner__title">
            <?= $bannerTitle ;?>
         </h2>
         <?php endif ?>   
      </div>
      <div class="services-banner__main">
         <?php if ($icon) : ?>
        <div class="services-banner__logo">
            <?= $icon ;?>
        </div>
         <?php endif ?> 
        <?php if ($bannerDescription) : ?>
        <div class="services-banner__description">
            <?= $bannerDescription ;?>
        </div>
        <?php endif ?>   
      </div>
    </div>
  </section>
  <?php endif ?>
</main>

<?php
get_footer();