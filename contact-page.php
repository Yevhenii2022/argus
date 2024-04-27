<?php
/*
Template Name: Контакти
*/

get_header();
?>
<?php $contactsTitle = get_field('contact_title') ?? '' ;
      $phone = get_field('phone', 'options');
      $contactsText = get_field('contact_text') ?? '' ;
      $contactsfirstPhone = $phone['phone_number'] ?? ''; ;
      $contactsSecondPhone =$phone['phone_second_number'] ?? '';
      $contactsImage =  get_field('contact_image') ;
      $cleanedNumber = preg_replace('/\s+/', '', $contactsfirstPhone);
			$cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
      $cleanedSecondNumber = preg_replace('/\s+/', '', $contactsSecondPhone);
			$cleanedSecondNumber = preg_replace('/\D/', '', $cleanedSecondNumber);
      $email = get_field('email', 'options');
      $emailFirst = $email['second_email'] ?? '';
      $emailSecond = $email['third_email'] ?? '';
      $phoneBlockName = get_field('phone_title') ?? '' ;
      $emailBlockName = get_field('email_title') ?? '' ;
      
													
      ?>
<main class="main">
  <section class="contacts">
    <div class="container container--slider">
      <div class="contacts__wrapper">
        <div class="contacts___heading">
          <div class="contacts__breadcrumps">
              <?php if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<nav class="yoast-breadcrumbs">', '</nav>' );
              }?>
          </div>
          <?php if ($contactsTitle) : ?>
          <h1 class="contacts__title">
              <?= $contactsTitle ;?>
          </h1>
          <?php endif; ?>
          <?php if ($contactsText) : ?>
          <p class="contacts__text">
            <?= $contactsText?>
          </p>
          <?php endif; ?>
        </div>

        <div class="contacts__contacts">
        <?php if ($phoneBlockName) : ?>
          <p class="contacts__block-name">
             <?= $phoneBlockName ;?>
          </p>
        <?php endif; ?>
        <?php if ($contactsfirstPhone) : ?>
					  <a href="tel:+<?= $cleanedNumber ?>" class="contacts__phone">
               <span>
									<?= $contactsfirstPhone ;?>
								</span>
            </a>
            <?php endif; ?>
            <?php if ($contactsSecondPhone) : ?>
            <a href="tel:+<?=($cleanedSecondNumber) ?>" class="contacts__phone">
               <span>
									<?= $contactsSecondPhone ;?>
								</span>
            </a>
            <?php endif; ?>
        </div>
        <div class="contacts__email">
        <?php if ($emailBlockName) : ?>
          <p class="contacts__block-name">
             <?= $emailBlockName ;?>
          </p>
        <?php endif; ?>
        <?php if ($emailFirst) : ?>
          <a href="mailto:<?= $emailFirst ;?>" class="contacts__email">
              <span>
                  <?= $emailFirst; ?>
              </span>
          </a>
        <?php endif; ?>
        <?php if ($emailSecond) : ?>
          <a href="mailto:<?= $emailSecond?>" class="contacts__email">
              <span>
                  <?= $emailSecond; ?>
              </span>
          </a>
      <?php endif; ?>
        </div>
        <?php if ($contactsImage) : ?>
        <div class="contacts__image">
            <img src='<?php echo $contactsImage['url']; ?>' alt='<?php echo $contactsImage['alt']; ?>' />
        </div>
        <?php endif; ?>
        <div class="contacts__information">


        <div class="contacts__address"></div>
            <div></div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>