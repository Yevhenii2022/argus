<?php get_header();
?>
<main>
 <section class="vacancy">
      <?php $vacancyBackground = get_field('vacancy_bg') ?? '' ;
                $vacancyTitle = get_field('vacancy_title') ?? '' ;
                $vacancyDescription = get_field('vacancy_description') ?? '' ;
                $vacancyImage = get_field('vacancy_image') ?? '' ;
                $vacancyText = get_field('vacancy_date-text') ?? '' ;

              if($vacancyBackground || $vacancyTitle || $vacancyDescription || $vacancyImage || $vacancyText) : 
              ?>
       <div class="vacancy__bg" style=" background-image: url('<?php echo esc_url($vacancyBackground); ?>');"></div>
       <div class="container container--slider">
          <div class="vacancy__wrapper">
          
            <div class="vacancy__baner">
              <div class="vacancy__left">
                  <div class="vacancy__breadcrumps">
                      <?php if ( function_exists('yoast_breadcrumb') ) {
                          yoast_breadcrumb( '<nav class="yoast-breadcrumbs">', '</nav>' );
                      }?>
                  </div>
                  <div class="vacancy__content">
                      <?php if ($vacancyTitle): ?>
                      <h1 class="vacancy__title main__title main__title--sm anim-title _anim-items">
                          <?= $vacancyTitle ;?>
                      </h1>
                      <?php endif ?>
                      <?php if ($vacancyDescription): ?>
                      <p class="vacancy__description anim-title _anim-items">
                          <?= $vacancyDescription ;?>
                      </p>
                      <?php endif ?>
                      <div class="vacancy__bottom">
                          <?php if ($vacancyText): ?>
                          <p class="vacancy__date">
                              <?= $vacancyText ;?><?= ' ' . get_the_date('j F Y') ?>
                          </p>
                          <?php endif ?>
                          <div class="vacancy__arrow">
                              <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8871 4.50895C10.8871 4.17528 11.1576 3.90479 11.4913 3.90479C11.825 3.90479 12.0955 4.17528 12.0955 4.50895L12.0955 10.9534C12.0955 11.2871 11.825 11.5576 11.4913 11.5576L5.04685 11.5576C4.71318 11.5576 4.44268 11.2871 4.44268 10.9534C4.44268 10.6197 4.71318 10.3492 5.04685 10.3492L10.0327 10.3492L4.61964 4.93616C4.3837 4.70022 4.3837 4.31768 4.61964 4.08174C4.85558 3.8458 5.23812 3.8458 5.47406 4.08174L10.8871 9.49481L10.8871 4.50895Z" fill="#181818" />
                              </svg>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="vacancy__right">
                  <?php if ($vacancyImage): ?>
                    <img src='<?php echo $vacancyImage['url']; ?>' alt='<?php echo $vacancyImage['alt']; ?>' />
                  <?php endif ?>
                  <div class="vacancy__block">
                    
                      <?php while (have_rows('vacancy_characteristics')) :
                        the_row();
                        $vacancyFieldName = get_sub_field('vacancy_field-name');
                        $vacancyFieldInfo = get_sub_field('vacancy_information'); ?>
                        <div class="vacancy__info">
                        <?php if ($vacancyFieldInfo): ?>
                        <p class="vacancy__characteristic">
                          <?= $vacancyFieldInfo?>
                        </p>
                        <?php endif ?>
                        <?php if ($vacancyFieldName): ?>
                        <p class="vacancy__field-name">
                          <?= $vacancyFieldName?>
                        </p>
                        <?php endif ?>
                      </div>
                      <?php endwhile ;?>
                    
                      <a href="<?php echo esc_url(get_home_url() . '/contacts/'); ?>" class="vacancy__button button">
                        <div class="button__wrapper">
                            <p><?php pll_e('відгукнутися') ?></p>
                        </div>
                      </a>
                  </div>
              </div>    
            </div>
            <?php endif ?>
          

          <?php $vacancyMainHeading = get_field('vacancy_main-heading') ?? '' ;
                $vacancyMainImg = get_field('vacancy_main-img') ?? '' ;
            if($vacancyMainHeading || $vacancyMainImg ) : ?>
            <div class="vacancy__main">
              <div class="vacancy__heading">
                <?php if ($vacancyMainHeading): ?>
                <h2 class="vacancy__heading-title main__title anim-title _anim-items">
                  <?= $vacancyMainHeading ;?>
                </h2>
                <?php endif ?>
                <?php if ($vacancyMainImg): ?>
                <div class="vacancy__heading-image">
                  <img class="thumbnail" src='<?php echo $vacancyMainImg['url']; ?>' alt='<?php echo $vacancyMainImg['alt']; ?>' />
                </div>
                <?php endif ?>
              </div>
              <div class="vacancy__advantages">
                <?php while (have_rows('advantages')) :
                        the_row();
                        $advantagesTitle = get_sub_field('advantages_title');
                        $advantagesText = get_sub_field('advantages_text'); 
                        $advantagesImg = get_sub_field('advantages_img'); ?>
                <div class="vacancy__advantages-item">
                  <div class="vacancy__advantages-text">
                  
                    <h3 class="vacancy__advantages-title main__title main__title--sm anim-title _anim-items">
                      <?= $advantagesTitle?>
                    </h3>
                   <div class="vacancy__advantages-inner">
                      <?php if ($advantagesText): ?>
                      <div class="vacancy__advantages-description">
                        <?= $advantagesText?>
                      </div>
                      <?php endif ?>
                    </div>
                  </div>
                  <?php if ($advantagesImg): ?>
                  <div class="vacancy__advantages-image">
                    <img src='<?php echo $advantagesImg['url']; ?>' alt='<?php echo $advantagesImg['alt']; ?>' />
                  </div>
                  <?php endif ?>
                </div>
                <?php endwhile ;?>
               </div>
            </div>
          <?php endif ?>
       

       <?php $candidateHeading = get_field('requirements_heading') ?? '' ;
             $requirementsFirstTitle = get_field('requirements_prof_title');
             $requirementsSecondTitle = get_field('requirements_soft_title');?>
        <div class="vacancy__candidate">
          <?php if ($candidateHeading): ?>
          <h2 class="vacancy__candidate-title main__title main__title--sm anim-title _anim-items">
            <?= $candidateHeading ;?>
          </h2>
          <?php endif ?>
          <div class="vacancy__candidate-block">
             <div class="vacancy__candidate-inner">
                 <div class="vacancy__line">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 43" fill="none">
                      <path fill="#F41B1B" d="M16.981 43H0l19.019-21.5L0 0h16.981L36 21.5 16.981 43Z" />
                    </svg>
                    <div></div>
                  </div>
                  <?php if ($requirementsFirstTitle): ?>
                  <h3 class="vacancy__candidate-heading">
                    <?= $requirementsFirstTitle ;?>
                  </h3>
                  <?php endif ?>
                  <ul class="vacancy__candidate-list">
                       <?php while (have_rows('prof_requirements')) :
                       the_row();
                       $firstItem = get_sub_field('prof_item');
                    if ($firstItem): ?>
                    <li class="vacancy__candidate-item">
                      <?= $firstItem ;?>
                    </li>
                    <?php endif ?>
                  <?php endwhile?>
                 </ul>     
             </div>
             <div class="vacancy__candidate-inner">
              <div class="vacancy__line">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 43" fill="none">
                  <path fill="#F41B1B" d="M16.981 43H0l19.019-21.5L0 0h16.981L36 21.5 16.981 43Z" />
                </svg>
                <div></div>
              </div>
              <?php if ($requirementsSecondTitle): ?>
              <h3 class="vacancy__candidate-heading">
                <?= $requirementsSecondTitle ;?>
              </h3>
              <?php endif ?>
              <ul class="vacancy__candidate-list">
                    <?php while (have_rows('soft_requirements')) :
                    the_row();
                    $secondItem = get_sub_field('soft_item');
                if ($secondItem): ?>
                <li>
                  <?= $secondItem ;?>
                </li>
                <?php endif ?>
                <?php endwhile?>     
              </ul>
                
            </div>
          </div>  
        </div>


        <?php $responsibilitiesTitle = get_field('responsibilities_title') ?? '';
              $responsibilitiesSubTitle = get_field('responsibilities_subtitle') ?? ''; ?>
        <div class="vacancy__responsibilities">
              <div class="vacancy__responsibilities-wrapper">
                <div class="vacancy__responsibilities-left">
                    <?php if ($responsibilitiesTitle) : ?>
                    <h2 class="vacancy__responsibilities-heading main__title">
                        <?= $responsibilitiesTitle; ?>
                    </h2>
                    <?php endif ?>
                    <?php if ($responsibilitiesSubTitle) : ?>
                    <p class="vacancy__responsibilities-subtitle">
                        <?= $responsibilitiesSubTitle; ?>
                    </p>
                    <?php endif ?>
                </div>
                <div class="vacancy__responsibilities-right swiper">
                  <ul class="vacancy__responsibilities-list swiper-wrapper">
                    <?php while (have_rows('responsibilities_list')) :
                        the_row();
                            
                  $responsibilitiesItem = get_sub_field('responsibilities_item') ?? ''; ?>
                    <li class="vacancy__responsibilities-item swiper-slide">
                      <?php if ($responsibilitiesItem) : ?>
                          <p class="vacancy__responsibilities-description">
                            <?= $responsibilitiesItem; ?>
                          </p>
                        <?php endif ?>
                    </li>
                    <? endwhile ?>
                  </ul>
                        <div class="vacancy__responsibilities-pagination">
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                </div>
              </div>
        </div>   
          
          <?php
            $proposition_list = get_field('proposition_list') ?? '';
            if ($proposition_list) : ?>
              <div class="vacancy__proposition">
                <?php
                $proposition_title = get_field('vacancy_proposition_title') ?? '';
                $proposition_image =  get_field('proposition_img') ?? '';
                ?>
                <div class="vacancy__proposition-heading">
                  <?php if ($proposition_title) : ?>
                  <h3 class="vacancy__proposition-title main__title main__title-sm anim-title _anim-items">
                    <?= $proposition_title; ?>
                  </h3>
                  <?php endif; ?>
                  <div class="vacancy__proposition-image">
                    <img src='<?php echo $proposition_image['url']; ?>' alt='<?php echo $proposition_image['alt']; ?>' />
                  </div>
                </div>
                <ul>
                  <?php
                  while (have_rows('proposition_list')) : the_row();
                      $proposition_text = get_sub_field('proposition_text') ?? '';
                  ?>
                    <?php if ($proposition_text) : ?>
                      <li>
                        <div class="vacancy__line">
                          <svg viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.71698 12H0L5.28302 6L0 0H4.71698L10 6L4.71698 12Z" fill="white" />
                          </svg>
                            <div></div>
                          </div>
                          <p><?= $proposition_text; ?></p>
                      </li>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </ul>
              </div>
            <?php endif; ?>
      </div>
    </div>  
  </section>
      <?php get_template_part('template-parts/contact-us'); ?>
</main>
<?php get_footer(); ?>