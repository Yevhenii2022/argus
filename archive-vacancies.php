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
        <div class="vacancies__breadcrumps">
          <?php if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<nav class="yoast-breadcrumbs">', '</nav>');
          } ?>
        </div>
        <div class="vacancies__banner">
          <?php if ($vacanciesTitle) : ?>
            <h1 class="vacancies__title main__title anim-title _anim-items">
              <?= $vacanciesTitle; ?>
            </h1>
          <?php endif ?>
          <?php if ($vacanciesDescription) : ?>
            <p class="vacancies__text">
              <?= $vacanciesDescription; ?>
            </p>
          <?php endif ?>
        </div>
    </div>
        <?php get_template_part('template-parts/move-line'); ?>
    <div class="container">    
      <div class="vacancies__content">
      <?php if ($vacanciesBlockTitle) : ?>
        <h1 class="vacancies__heading main__title main__title--sm">
            <?= $vacanciesBlockTitle ;?>
        </h1>
        <?php endif ?>
       <?php
            $args = array(
              'post_type' => 'vacancies',
              'posts_per_page' => -1,
          );
          $vacancies_query = new WP_Query($args);
          if ($vacancies_query->have_posts()) :
            $total_posts = $vacancies_query->found_posts;
          ?>
        <p class="vacancies__number">
          <?php
           if ($total_posts === 0) {
              echo pll_e('Немає доступних вакансій');
          } else if ($total_posts === 1) {
              echo pll_e('1 позиція');
            } else if ($total_posts < 5) {
              echo $total_posts . ' ' . pll_e('позиції');
          } else {
              echo $total_posts . ' ' . pll_e('позицій');
          }
          ?>
        </p>

        <div class="vacancies__list"> 
                
          <?php
              while ($vacancies_query->have_posts()) : $vacancies_query->the_post();
              $vacancyName = get_field('vacancy_name') ?? '';
              $vacancyLocation = get_field('vacancy_location') ?? '';
             
              ?>
                          
            <a href="<?php the_permalink() ?>" class="vacancies__item">
            <?php if ($vacancyLocation) : ?>
              <p class="vacancies__location">
                <?= $vacancyLocation ;?>
              </p>
              <?php endif; ?>
              <?php if ($vacancyName) : ?>
              <h2 class="vacancies__name main__title main__title--sm">
                 <?= $vacancyName ;?>
              </h2>
              <?php endif; ?>
              </a>
              <?php endwhile;
              wp_reset_postdata();
           ?>
           </div>

          <?php endif; ?>
        
      </div>
    </div>
  </section>
  <?php endif ?>

<?php get_template_part('template-parts/contact-us-vacancy'); ?>
</main>

<?php get_footer(); ?>