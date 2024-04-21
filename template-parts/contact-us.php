<section class="contact-us">
  <?php $sectionTitle = get_field('contact-us_title', 'options') ?? '' ;
        $sectionImage = get_field('contact-us_img', 'options') ?? '' ; 
        $sectionVideo = get_field('contact-us_video', 'options') ?? '' ; 
        $sectionHeading = get_field('contact-us_heading', 'options') ?? '' ;
        $sectionName = get_field('contact_name', 'options') ?? '' ;
        $sectionPosition = get_field('contact_position', 'options') ?? '' ;

        if ($sectionTitle || $sectionImage || $sectionVideo || $sectionHeading || $sectionName || $sectionPosition) :
        ?>
  <div class="container">
    <div class="contact-us__wrapper">
    <?php if ($sectionTitle): ?>
      <div class="contact-us__title main__title title ">
        <?= $sectionTitle ;?>
      </div>
      <?php endif ?>
      <div class="contact-us__content">
        <div class="contact-us__right">
           <?php if ($sectionImage) : ?>
            <a href="<?= $sectionVideo; ?>" data-fancybox="video"  data-width="90%" data-height="70%"    class="contact-us__content-block" style=" background-image: url('<?php echo esc_url($sectionImage); ?>');">
           </a>
          <?php endif ?>
          <div class="contact-us__text">
          <?php if ($sectionHeading): ?>
            <h2 class="contact-us__heading">
              <?= $sectionHeading ;?>
            </h2>
            <?php endif ?>
            <div class="contact-us__manager">
            <?php if ($sectionName): ?>
              <p class="contact-us__manager-name">
                <?= $sectionName ;?>
              </p>
              <?php endif ?>
              <?php if ($sectionPosition): ?>
              <p class="contact-us__manager-position">
                <?= $sectionPosition ;?>
              </p>
              <?php endif ?>
            </div>
          </div>
        </div>
        <div class="contact-us__form">
          <?php get_template_part('template-parts/form'); ?>
        </div>
      </div>

    </div>
  </div>
  <?php endif ?>
</section>
