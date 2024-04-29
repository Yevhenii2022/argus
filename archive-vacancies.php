<?php
/*
Template Name: Вакансії
*/

get_header(); ?>

<main>
<?php 
  $vacanciesTitle = get_field('vacancies-page_title') ?? '';
  $vacanciesDescription = get_field('vacancies-page_description') ?? '';
  $vacanciesBlockTitle = get_field('vacancies-block_title') ?? '';

  if ($vacanciesBlockTitle || $vacanciesTitle  || $vacanciesDescription ) :

  ?>
  <section class="vacancies">
    <div class="container">
        <div class="service-hero__breadcrumps">
          <?php if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<nav class="yoast-breadcrumbs">', '</nav>');
          } ?>
        </div>
        <div class="service-hero__heading">
          <?php if ($vacanciesTitle) : ?>
            <h1 class="service-hero__title main__title anim-title _anim-items">
              <?= $vacanciesTitle; ?>
            </h1>
          <?php endif ?>
          <?php if ($vacanciesDescription) : ?>
            <p class="service-hero__text">
              <?= $vacanciesDescription; ?>
            </p>
          <?php endif ?>
        </div>
        <?php get_template_part('template-parts/move-line'); ?>
        
      <div class="vacancies__content">
      <?php if ($vacanciesBlockTitle) : ?>
        <h1 class="vacancies__title main__title main__title--sm">
            <?= $vacanciesBlockTitle ;?>
        </h1>
        <?php endif ?>
        <p class="vacancies__number"></p>
        <ul class="vacancies__list"> 
          <li class="vacancies__item">
        <?php
            

          $args = array(
              'post_type' => 'vacancies',
              'posts_per_page' => -1,
          );
          $vacancies_query = new WP_Query($args);
          if ($vacancies_query->have_posts()) :
          ?>
          <?php
              while ($vacancies_query->have_posts()) : $vacancies_query->the_post();
              $vacancyName = get_field('vacancy_name') ?? '';
              $vacancyLocation = get_field('vacancy_location') ?? '';
              ?>
           
            <?php if ($vacancyLocation) : ?>
              <p class="vacancies__location">
                <?= $vacancyLocation ;?>
              </p>
              <?php endif; ?>
              <?php if ($vacancyName) : ?>
              <h2 class="vacancies__name">
                 <?= $vacancyName ;?>
              </h2>
              <?php endif; ?>
            
            <?php endwhile;
            wp_reset_postdata();
            ?>
          <?php endif; ?>
        </li>
        </ul>
      </div>
    </div>
  </section>
  <?php endif ?>



<?php get_template_part('template-parts/contact-us-vacancy'); ?>
</main>

<?php get_footer(); ?>