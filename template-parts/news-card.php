<?php
$default_picture = get_field('default_picture', 'options');
?>

<a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>" class="anim-card _anim-items">
  <article class="news-card">
    <div class="news-card__image">
      <?php if (has_post_thumbnail()) : ?>
        <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
      <?php else : ?>
        <img src="<?php echo esc_url($default_picture); ?>" alt="<?php the_title(); ?>" class="projects-card__img--error">
      <?php endif; ?>
    </div>

    <div class="news-card__bottom">
      <div>
        <div class="news-card__categories">
          <?php
          $categories = get_the_category();
          if ($categories) {
            foreach ($categories as $category) {
              $translated_category = get_term_by('id', pll_get_term($category->term_id), 'category');
              echo '<span class="news-card__category">' . esc_html($translated_category->name) . '</span>';
            }
          }
          ?>
        </div>
        <span class="news-card__time">
          <?php the_time('d.m.Y'); ?>
        </span>
        <h3 class="news-card__title">
          <?php the_title(); ?>
        </h3>

        <?php the_excerpt(); ?>

      </div>

      <div class="news-card__link link">
        <?php pll_e('read') ?>
      </div>

    </div>
  </article>
</a>