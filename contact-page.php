<?php
/*
Template Name: Контакти
*/

get_header();
?>
<?php $contactsTitle = get_field('contacts_title') ?? '' ;
      $phone = get_field('phones');
      $contactsText = get_field('contacts_text') ?? '' ;
      $contactsfirstPhone = $phone['first_phone_number'] ?? ''; ;
      $contactsSecondPhone =$phone['phone_second_number'] ?? '';
      $contactsImage =  get_field('contact_image') ;
      $cleanedNumber = preg_replace('/\s+/', '', $contactsfirstPhone);
			$cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
      $cleanedSecondNumber = preg_replace('/\s+/', '', $contactsSecondPhone);
			$cleanedSecondNumber = preg_replace('/\D/', '', $cleanedSecondNumber);
      $email = get_field('emails');
      $emailFirst = $email['first_email'] ?? '';
      $emailSecond = $email['second_email'] ?? '';
      $phoneBlockName = get_field('phone_title') ?? '' ;
      $emailBlockName = get_field('email_title') ?? '' ;
      
													
      ?>
<main class="main">
  <section class="contacts">
    <div class="container container--slider">
      <div class="contacts__wrapper">
        <div class="contacts___heading contacts__grid">
          <div class="contacts__breadcrumps">
              <?php if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<nav class="yoast-breadcrumbs">', '</nav>' );
              }?>
          </div>
          <?php if ($contactsTitle) : ?>
          <h1 class="contacts__title main__title main__title--sm">
              <?= $contactsTitle ;?>
          </h1>
          <?php endif; ?>
          <?php if ($contactsText) : ?>
          <p class="contacts__text contacts__red-arrow">
            <?= $contactsText?>
          </p>
          <?php endif; ?>
        </div>
        <?php if ($contactsImage) : ?>
        <div class="contacts__image">
            <img src='<?php echo $contactsImage['url']; ?>' alt='<?php echo $contactsImage['alt']; ?>' />
        </div>
        <?php endif; ?>
        <div class="contacts__grid">
              <div class="contacts__phone-inner">
            <?php if ($phoneBlockName) : ?>
              <p class="contacts__block-name contacts__red-arrow">
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
            <div class="contacts__email-inner">
            <?php if ($emailBlockName) : ?>
              <p class="contacts__block-name contacts__red-arrow">
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
        </div>
       
       </div>
        
        <div class="contacts__address-inner">
        <?php while (have_rows('address')):
                            the_row();
                $addressName =  get_sub_field('address_type') ?? '' ;
                $addressContent = get_sub_field('address_text') ?? '' ;
                $addressButtonLink =  get_sub_field('address_link') ?? '' ; ?>
          <div class="contacts__address-item">
            <?php if ($addressName) : ?>   
            <p class="contacts__address-type contacts__red-arrow">
              <?= $addressName ;?>
            </p>
            <?php endif; ?>
            <?php if ($addressContent) : ?>   
            <div class="contacts__address-text">
              <?= $addressContent ;?>
            </div>
            <?php endif; ?>
            <a href="<?= $addressButtonLink ?>" target="_blank" class="contacts__address-button button">
                <div class="button__wrapper">
                    <p><?php pll_e('Показати на карті') ?></p>
                </div>
            </a>
          </div>               
         <? endwhile ?>
        </div>
    </div>
  </section>
  <?php get_template_part('template-parts/contact-us'); ?>
</main>

<?php get_footer(); ?>