<?php
/*
 * Template Name: Відгуки клієнтів
 */

get_header();

$title = get_field('reviews_title') ?? '';
$subtitle = get_field('reviews_subtitle') ?? '';
$gallery = get_field('reviews_gallery');
$slider = get_field('reviews_slider');
$title_section = get_field('reviews_title_section') ?? '';
?>

<main>
  <section class="reviews">
    <div class="container">

      <?php if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<nav class="yoast-breadcrumbs">', '</nav>');
      } ?>

      <div class="reviews__top">
        <h1 class="reviews__title title"><?= $title; ?></h1>
        <div class="reviews__box">
          <ul>
            <?php if ($gallery) {
              foreach ($gallery as $image) {
                $image_url = wp_get_attachment_url($image);
                echo '<li>';
                echo wp_get_attachment_image($image, "thumbnail", '', ['alt' => 'картинка галереї']);
                echo '</li>';
              }
            }
            ?>
          </ul>
          <p class="reviews__subtitle"><?= $subtitle; ?></p>
        </div>
      </div>

      <?php if ($slider) : ?>
        <div class="reviews__slider swiper">
          <div class="swiper-wrapper">
            <?php while (have_rows('reviews_slider')) :
              the_row();
              $text = get_sub_field('reviews_slider_text') ?? '';
              $author = get_sub_field('reviews_slider_author') ?? '';
              $position = get_sub_field('reviews_slider_position') ?? '';
              $image = get_sub_field('reviews_slider_img'); ?>

              <div class="swiper-slide">
                <div class="reviews__slider-item">
                  <h3 class="title">
                    <?= $text; ?>
                  </h3>
                  <?php if ($image) : ?>
                    <img src='<?php echo $image['url']; ?>' alt='<?php echo $image['alt']; ?>' />
                  <?php endif ?>
                  <p>
                    <?= $author; ?>
                  </p>
                  <p class="reviews__slider-position">
                    <?= $position; ?>
                  </p>
                </div>
              </div>
            <?php endwhile ?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      <?php endif ?>
    </div>

    <div class="reviews__wrapper">
      <h2 class="reviews__title-section title">
        <?= $title_section; ?>
      </h2>

      <div class="ajax-preloader">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70" preserveAspectRatio="xMidYMid" style="shape-rendering: auto; display: block; background: rgba(255, 255, 255, 0);" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g>
            <circle cx="50" cy="50" fill="none" stroke="#f41b1b" stroke-width="3" r="18" stroke-dasharray="84.82300164692441 30.274333882308138">
              <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.1764705882352942s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
            </circle>
            <g></g>
          </g>
        </svg>
      </div>

      <div class="reviews__inner">

      </div>
  </section>
</main>

<?php get_footer(); ?>