<?php
get_header();

$project_subtitle = get_field('project_subtitle') ?? '';
$location = get_field('project_location') ?? '';
$default_picture = get_field('default_picture', 'options');
$video = get_field('project_video');
?>

<main id="primary">




  <section class="projects-slider">

    <div class="activities__wrapper">





      <?php
      $args = array(
        'post_type' => 'projects',
        'posts_per_page' => -1,
      );
      $projects_query = new WP_Query($args);
      if ($projects_query->have_posts()) :
      ?>


        <?php
        while ($projects_query->have_posts()) : $projects_query->the_post();
        ?>
          <?php
          $subtitle = get_field('project_subtitle');
          $location = get_field('project_location');
          $default_picture = get_field('default_picture', 'options');
          ?>


          <div class="content--sticky">
            <div class="projects-card__img ">
              <?php if (has_post_thumbnail()) : ?>
                <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
              <?php else : ?>
                <img src="<?php echo esc_url($default_picture); ?>" alt="<?php the_title(); ?>" class="projects-card__img--error">
              <?php endif; ?>
            </div>

            <div class="projects-card__categories">
              <?php
              $categories = get_the_terms(get_the_ID(), 'project-type');
              if ($categories && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                  echo '<span class="projects-card__category">' . esc_html($category->name) . '</span>';
                }
              }
              ?>
            </div>

            <div class="projects-card__content">
              <div class="projects-card__heading">
                <h3 class="projects-card__title">
                  <?= get_the_title() . '.' ?>
                </h3>

                <?php if ($subtitle) : ?>
                  <span class="projects-card__subtitle">
                    <?= $subtitle ?>
                  </span>
                <?php endif; ?>
              </div>

              <?php if ($location) : ?>
                <span class="projects-card__location">
                  <?= $location ?>
                </span>
              <?php endif; ?>
            </div>
          </div>

        <?php endwhile;
        wp_reset_postdata();
        ?>

      <?php endif; ?>


    </div>





    <script src="/wp-content/themes/pointer-theme/src/js/parts/scroll-trigger/imagesloaded.pkgd.min.js"></script>
    <script src="/wp-content/themes/pointer-theme/src/js/parts/scroll-trigger/ScrollTrigger.min.js"></script>
    <script src="/wp-content/themes/pointer-theme/src/js/parts/scroll-trigger/lenis.min.js"></script>
    <script src="/wp-content/themes/pointer-theme/src/js/parts/scroll-trigger/imagesloaded.pkgd.min.js"></script>

  </section>






</main>

<?php
get_footer();
