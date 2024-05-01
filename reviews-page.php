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
      <div class="reviews__wrapper">

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
    </div>



    <div class="reviews__inner">
      <h2 class="reviews__title-section title">
        <?= $title_section; ?>
      </h2>




      <?php
      $posts_per_page = 1;
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'post_type'      => 'reviews',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
      );
      $reviews_query = new WP_Query($args);
      if ($reviews_query->have_posts()) :
      ?>
        <ul class="reviews__list">
          <?php
          while ($reviews_query->have_posts()) : $reviews_query->the_post();
            $text    = get_field('review_text') ?? '';
            $author  = get_field('review_author') ?? '';
            $position = get_field('review_position') ?? '';
            $image   = get_field('review_img');
          ?>
            <li>
              <div class="reviews__line">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 43" fill="none">
                  <path fill="#F41B1B" d="M16.981 43H0l19.019-21.5L0 0h16.981L36 21.5 16.981 43Z" />
                </svg>
                <div></div>
              </div>
              <h4><?php the_title(); ?></h4>
              <p><?php echo $text; ?></p>
              <div class="reviews__flex">
                <?php if ($image) : ?>
                  <img src='<?php echo $image['url']; ?>' alt='<?php echo $image['alt']; ?>' />
                <?php endif ?>
                <div>
                  <p><?php echo $author; ?></p>
                  <p class="reviews__position"><?php echo $position; ?></p>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>

        <?php
        $paginate_args = array(
          'base' => '%_%',
          'format' => '?page=%#%',
          'current' => $paged,
          'total' => $reviews_query->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;',
          'type' => 'array',
        );

        $total_posts = $reviews_query->found_posts;

        $total_pages = ceil($total_posts / $posts_per_page);

        $pagination_html = '';
        if ($total_pages > 1) {
          $pagination_html .= '<div class="pagination">';
          if ($paged > 1) {
            $pagination_html .= '<span data-page="' . ($paged - 1) . '"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.4"><path d="M7.15056 1.86345L3.51401 5.5L7.15056 9.13655" stroke="#202020" stroke-linecap="round" stroke-linejoin="round"/></g></svg></span>';
          }
          for ($i = 1; $i <= $total_pages; $i++) {
            $pagination_html .= '<span  data-page="' . $i . '"' . ($paged == $i ? ' class="pagination_active"' : '') . '>' . $i . '</span>';
          }
          if ($paged < $total_pages) {
            $pagination_html .= '<span href="#" data-page="' . ($paged + 1) . '"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3.84749 9.13655L7.48404 5.5L3.84749 1.86345" stroke="#202020" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        </span>';
          }
          $pagination_html .= '</div>';
        }

        echo $pagination_html;

        wp_reset_postdata();
        ?>
      <?php endif; ?>







    </div>





  </section>
</main>

<?php get_footer(); ?>