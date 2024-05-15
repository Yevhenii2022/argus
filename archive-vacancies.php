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
        <?php echo do_shortcode('[pointer_breadcrumbs]'); ?>
        </div>
        <div class="vacancies__banner">
          <?php if ($vacanciesTitle) : ?>
            <h1 class="vacancies__title main__title anim-title _anim-items">
             <?= $vacanciesTitle ?>
            </h1>
          <?php endif ?>
          <?php if ($vacanciesDescription) : ?>
            <p class="vacancies__text anim-title _anim-items">
              <?= $vacanciesDescription; ?>
            </p>
          <?php endif ?>
        </div>
    </div>
        <?php get_template_part('template-parts/move-line'); ?>
    <div class="container">    
      <div class="vacancies__content">
      <?php if ($vacanciesBlockTitle) : ?>
        <h1 class="vacancies__heading main__title main__title--sm anim-title _anim-items">
            <?= $vacanciesBlockTitle ?>
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
                echo pll__('Немає доступних вакансій');
            } else if ($total_posts === 1) {
                echo $total_posts . ' ' . pll__('Позиція');
            } else if ($total_posts < 5) {
                echo $total_posts . ' ' . pll__('Позиції');
            } else {
                echo $total_posts . ' ' . pll__('Позицій');
            }
    ?>
        </p>

        <div class="vacancies__list"> 
                
          <?php
              while ($vacancies_query->have_posts()) : $vacancies_query->the_post();
              $vacancyName = get_field('vacancy_name') ?? '';
              $vacancyLocation = get_field('vacancy_location') ?? '';
             
              ?>
                          
            <a href="<?php the_permalink() ?>" class="vacancies__item anim-title _anim-items">
            <?php if ($vacancyLocation) : ?>
              <p class="vacancies__location">
                <?= $vacancyLocation ;?>
              </p>
              <?php endif; ?>
              <?php if ($vacancyName) : ?>
              <h2 class="vacancies__name main__title main__title--sm">
                 <?= $vacancyName ?>
              </h2>
              <?php endif; ?>
              </a>
              <?php endwhile;
              wp_reset_postdata();
           ?>
           </div>
           <?php else: ?>
            <p class="vacancies__number">
                <?php echo pll__('Немає доступних вакансій'); ?>
            </p>
          <?php endif; ?>
        
      </div>
    </div>
  </section>
  <?php endif ?>

<?php get_template_part('template-parts/contact-us-vacancy'); ?>
</main>

<?php get_footer(); ?>