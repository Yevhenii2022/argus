<?php
/*
Template Name: Головна сторінка
*/

get_header();
?>

<main>
  <?php get_template_part('template-parts/hero'); ?>

  <?php get_template_part('template-parts/about'); ?>

  <?php get_template_part('template-parts/services-part'); ?>

  <?php get_template_part('template-parts/projects-part'); ?>

  <?php get_template_part('template-parts/contact'); ?>

  <div class="single-news__container container">
    <div class="single-news__box">
      <?php
      $slider_title = get_field('news_title');
      ?>
      <?php if ($slider_title) : ?>
        <h3 class="single-news__title title anim-title _anim-items">
          <?= $slider_title ?>
          <div class="single-news__counter"></div>
        </h3>
      <?php endif; ?>

      <div class="single-news__button--show anim-title _anim-items">
        <a href="<?php echo esc_url(get_home_url() . '/news/'); ?>" class="button">
          <div class="button__wrapper">
            <p> <?php pll_e('all_news'); ?></p>
          </div>
        </a>
      </div>
    </div>

    <?php get_template_part('template-parts/news-slider'); ?>



    <div class="anim-title _anim-items">
      <a href="<?php echo esc_url(get_home_url() . '/news/'); ?>" class="single-news__button--hide button">
        <div class="button__wrapper">
          <p> <?php pll_e('all_news'); ?></p>
        </div>
      </a>
    </div>


  </div>

  <?php get_template_part('template-parts/contact-us'); ?>

</main>

<?php get_footer(); ?>