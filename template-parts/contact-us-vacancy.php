<section class="contact-us" id="contact-us-vacancies">
  <?php $sectionTitle = get_field('contact-us-vacancy_title', 'options') ?? '' ;
        $sectionVideo = get_field('contact-us-vacancy_video', 'options') ?? '' ; 
        $sectionHeading = get_field('contact-us-vacancy_heading', 'options') ?? '' ;
        $sectionName = get_field('contact-vacancy_name', 'options') ?? '' ;
        $sectionPosition = get_field('contact-vacancy_position', 'options') ?? '' ;

        if ($sectionTitle || $sectionImage || $sectionVideo || $sectionHeading || $sectionName || $sectionPosition) :
        ?>
  <div class="container">
    <div class="contact-us__wrapper">
    <?php if ($sectionTitle): ?>
      <div class="contact-us__title contact-us__title--vacancy main__title anim-title _anim-items">
        <?= $sectionTitle ;?>
      </div>
      <?php endif ?>
      <div class="contact-us__content contact-us__content--vacancy">
      <?php if ($sectionHeading): ?>
      <h2 class="contact-us__heading-mobile anim-title _anim-items">
          <?= $sectionHeading ;?>
      </h2>
      <?php endif ?>
        <div class="contact-us__left">
           <?php if ($sectionVideo) : ?>
            <div class="contact-us__video">
              <video preload="auto" no-controls autoplay loop playsinline muted>
                <source src="<?php echo $sectionVideo['url']; ?>" type="<?php echo $sectionVideo['mime_type']; ?>">
                Your browser does not support the video tag.
              </video>
            </div>
          <?php endif ?>
          <div class="contact-us__text">
          <?php if ($sectionHeading): ?>
            <h2 class="contact-us__heading contact-us__heading--vacancy anim-title _anim-items">
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
          <?php get_template_part('template-parts/form-vacancy'); ?>
        </div>
      </div>

    </div>
  </div>
  <?php endif ?>
</section>
