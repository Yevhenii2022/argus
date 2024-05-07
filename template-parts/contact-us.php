<section class="contact-us" id="contact-us">
  <?php $sectionTitle = get_field('contact-us_title', 'options') ?? '';
  $sectionImage = get_field('contact-us_img', 'options') ?? '';
  $sectionVideo = get_field('contact-us_video', 'options') ?? '';
  $sectionHeading = get_field('contact-us_heading', 'options') ?? '';
  $sectionName = get_field('contact_name', 'options') ?? '';
  $sectionPosition = get_field('contact_position', 'options') ?? '';

  if ($sectionTitle || $sectionImage || $sectionVideo || $sectionHeading || $sectionName || $sectionPosition) :
  ?>
    <div class="container">
      <div class="contact-us__wrapper">
        <?php if ($sectionTitle) : ?>
          <div class="contact-us__title main__title anim-title _anim-items">
            <?= $sectionTitle; ?>
          </div>
        <?php endif ?>
        <div class="contact-us__content">
          <?php if ($sectionHeading) : ?>
            <h2 class="contact-us__heading-mobile anim-title _anim-items">
              <?= $sectionHeading; ?>
            </h2>
          <?php endif ?>
          <div class="contact-us__left">
            <?php if ($sectionVideo) : ?>
              <div class="contact-us__video">
                <video id="form-video" preload="auto" no-controls playsinline muted>
                  <source src="<?php echo $sectionVideo['url']; ?>" type="<?php echo $sectionVideo['mime_type']; ?>">
                  Your browser does not support the video tag.
                </video>
                <svg id="form-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 33" fill="none">
                  <path fill="#fff" fill-rule="evenodd" d="M16.5 33C25.613 33 33 25.613 33 16.5S25.613 0 16.5 0 0 7.387 0 16.5 7.387 33 16.5 33ZM22 16.5 14 11v11l8-5.5Z" clip-rule="evenodd" />
                </svg>
              </div>
            <?php endif ?>
            <div class="contact-us__text">
              <?php if ($sectionHeading) : ?>
                <h2 class="contact-us__heading anim-title _anim-items">
                  <?= $sectionHeading; ?>
                </h2>
              <?php endif ?>
              <div class="contact-us__manager anim-title _anim-items">
                <?php if ($sectionName) : ?>
                  <p class="contact-us__manager-name">
                    <?= $sectionName; ?>
                  </p>
                <?php endif ?>
                <?php if ($sectionPosition) : ?>
                  <p class="contact-us__manager-position">
                    <?= $sectionPosition; ?>
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
  <?php get_template_part('template-parts/popup'); ?>
</section>