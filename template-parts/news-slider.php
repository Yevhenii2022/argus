<section class="news-slider">
  <div class="news-slider__wrapper">

    <div class="news-slider__swiper swiper">
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
      );
      $news_query = new WP_Query($args);
      if ($news_query->have_posts()) :
      ?>
        <div class="news-slider__list swiper-wrapper">
          <?php
          while ($news_query->have_posts()) : $news_query->the_post();
          ?>

            <?php
            $default_picture = get_field('default_picture', 'options');
            ?>

            <a href="<?php the_permalink(); ?>" class="news-slider__card swiper-slide" rel="nofollow noopener" aria-label="<?php the_title_attribute(); ?>">
              <article>
                <span class="news-slider__time">
                  <?php the_time('d.m.Y'); ?>
                </span>
                <h3 class="news-slider__title">
                  <?php the_title(); ?>
                </h3>

                <div class="news-slider__image">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                  <?php else : ?>
                    <img src="<?php echo esc_url($default_picture); ?>" alt="<?php the_title(); ?>" class="projects-card__img--error">
                  <?php endif; ?>
                </div>
              </article>
            </a>
          <?php endwhile;
          wp_reset_postdata();
          ?>
        </div>
      <?php endif; ?>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
</section>