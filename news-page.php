<?php
/*
Template Name: Новини
*/

get_header(); ?>

<main>
  <section class="news">
    <div class="container">
      <div class="news__wrapper">

        <div class="news__top">
          <?php if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<nav class="yoast-breadcrumbs">', '</nav>');
          } ?>
          <h1 class="title anim-title _anim-items"><?php the_content(); ?></h1>
        </div>

        <div class="news__category">
          <ul id="category-filter">
            <li data-category="all" class="active">
              <?php pll_e('all_articles'); ?>
            </li>

            <?php
            $categories = get_categories(array(
              'taxonomy' => 'category',
              'hide_empty' => false,
              'exclude' => get_category_by_slug('other')->term_id,
            ));

            foreach ($categories as $category) {
              echo '<li data-category="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</li>';
            }
            ?>
          </ul>

          <div class="news__select-filters blog-select">
            <select id="news__select-filters" class="tabs-select">
              <option value="">Placeholder</option>
              <option value="all">
                <?php pll_e('all_articles'); ?>
              </option>

              <?php
              $categories = get_categories(array(
                'taxonomy' => 'category',
                'hide_empty' => false,
                'count' => true,
                'exclude' => get_category_by_slug('other')->term_id,
              ));
              foreach ($categories as $category) {
                echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="news__select news-select">
            <select id="blogs__select" class="tabs-select">
              <option value="new">
                <?php pll_e('newest'); ?>
              </option>
              <option value="popular">
                <?php pll_e('popular'); ?>
              </option>
              <option value="az">
                <?php pll_e('від А-Я'); ?>
              </option>
            </select>
          </div>

        </div>

        <div class="news__inner" id="blog__inner"></div>

        <div class="ajax-preloader">
          <img src="/wp-content/themes/pointer-theme/src/img/preloader.gif" alt="preloader">
        </div>

      </div>

    </div>
  </section>

  <?php get_template_part('template-parts/contact-us'); ?>

</main>

<?php get_footer(); ?>