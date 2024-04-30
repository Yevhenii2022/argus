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
          <h1 class="title"><?php the_content(); ?></h1>
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

          <div class="news__select blog-select">
            <select id="blogs__select" class="tabs-select">
              <option value="">Placeholder</option>
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

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="shape-rendering: auto; display: block; background: rgba(255, 255, 255, 0);" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g>
              <rect x="19" y="19" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0s" calcMode="discrete"></animate>
              </rect>
              <rect x="36" y="19" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.07936507936507936s" calcMode="discrete"></animate>
              </rect>
              <rect x="53" y="19" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.15873015873015872s" calcMode="discrete"></animate>
              </rect>
              <rect x="70" y="19" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.23809523809523808s" calcMode="discrete"></animate>
              </rect>
              <rect x="19" y="36" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.8730158730158729s" calcMode="discrete"></animate>
              </rect>
              <rect x="70" y="36" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.31746031746031744s" calcMode="discrete"></animate>
              </rect>
              <rect x="19" y="53" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.7936507936507936s" calcMode="discrete"></animate>
              </rect>
              <rect x="70" y="53" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.3968253968253968s" calcMode="discrete"></animate>
              </rect>
              <rect x="19" y="70" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.7142857142857142s" calcMode="discrete"></animate>
              </rect>
              <rect x="36" y="70" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.6349206349206349s" calcMode="discrete"></animate>
              </rect>
              <rect x="53" y="70" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.5555555555555555s" calcMode="discrete"></animate>
              </rect>
              <rect x="70" y="70" width="11" height="11" fill="#181818">
                <animate attributeName="fill" values="#f41b1b;#181818;#181818" keyTimes="0;0.08333333333333333;1" dur="0.9523809523809523s" repeatCount="indefinite" begin="0.47619047619047616s" calcMode="discrete"></animate>
              </rect>
              <g></g>
            </g>
          </svg>
        </div>

      </div>

    </div>
  </section>

  <?php get_template_part('template-parts/contact-us'); ?>

</main>

<?php get_footer(); ?>