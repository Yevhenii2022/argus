<?php
get_header();

$project_subtitle = get_field('project_subtitle') ?? '';
$location = get_field('project_location') ?? '';
$default_picture = get_field('default_picture', 'options');
$video = get_field('project_video');
?>

<main id="primary">
  <section class="project">
    <div class="container">
      <div class="project__wrapper">

        <div class="project__breadcrumps">
        <?php echo do_shortcode('[pointer_breadcrumbs]'); ?>
        </div>

        <div class="project__top">
          <div class="project__title">
            <h1 class="main__title  anim-title _anim-items"><span class="main__title--italic"><?php echo $project_subtitle ?></span> </br><?php echo the_title() ?></h1>
            
          </div>

          <?php
          $site = get_field('site');
          $link = $site['site_link'] ?? '';
          $text = $site['site_text'] ?? '';
          ?>
          <div class="project__link" style="align-self: <?php echo $link ? 'auto' : 'flex-end'; ?>">
            <?php if ($link) : ?>
              <a href="<?= $link; ?>" class="link" rel="nofollow noopener" target="_blank">
                <span>
                  <?php if ($text) {
                    echo $text;
                  } else {
                    pll_e('go_to_page');
                  }
                  ?>
                </span>
              </a>
            <?php endif; ?>
            <p><?= $location ?></p>
          </div>
        </div>

        <div class="project__image">
          <?php
          if (has_post_thumbnail()) : ?>
            <img class="thumbnail" src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
          <?php else : ?>
            <img src="<?php echo esc_url($default_picture); ?>" alt="<?php the_title(); ?>" class="project__img--error">
          <?php endif; ?>
        </div>


        <div class="project__box">
          <?php
          $info = get_field('info') ?? '';
          ?>
          <?php if ($info) : ?>
            <h2 class="project__info title anim-title _anim-items"><?= $info ?></h2>
          <?php endif; ?>

          <?php
          $characteristics = get_field('characteristics') ?? '';
          if ($characteristics) : ?>
            <ul>
              <?php
              while (have_rows('characteristics')) : the_row();
                $parameter = get_sub_field('characteristics_parameter') ?? '';
                $category = get_sub_field('characteristics_category') ?? '';
              ?>

                <?php if ($parameter) : ?>
                  <li class="project__characteristics anim-title _anim-items">
                    <h3 class="project__parameter"><?= $parameter ?></h3>
                    <p class="project__category"><?= $category; ?></p>
                  </li>
                <?php endif; ?>

              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
        </div>

        <?php $images = get_field('project_gallery');
        if ($images) : ?>
          <div class="project__slider swiper">
            <div class="swiper-wrapper">
              <?php
              if ($images) {
                foreach ($images as $image) {
                  $image_url = wp_get_attachment_url($image);
                  echo '<a class="swiper-slide" href="' . esc_url($image_url) . '" data-fancybox="gallery">';
                  echo wp_get_attachment_image($image, "full", '', ['alt' => 'картинка галереї']);
                  echo '</a>';
                }
              }
              ?>
            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        <?php endif; ?>

        <div class="project__start">
          <?php
          $project_start = get_field('project_start') ?? '';
          ?>
          <?php if ($project_start) : ?>
            <h3 class="title anim-title _anim-items">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 43" fill="none">
                <path fill="#F41B1B" d="M16.981 43H0l19.019-21.5L0 0h16.981L36 21.5 16.981 43Z" />
              </svg>
              <?= $project_start ?>
            </h3>
          <?php endif; ?>

          <div class="project__start-text anim-title _anim-items">
            <?php
            $project_text = get_field('project_text') ?? '';
            ?>
            <?php if ($project_text) : ?>
              <?= $project_text; ?>
            <?php endif; ?>
          </div>
        </div>

        <?php if ($video) : ?>
          <div class="project__video">
            <video loop id="custom-video" preload="auto" muted playsinline preload="metadata">
              <source src="<?php echo $video; ?>#t=0.001" type="video/mp4">
              <source src="<?php echo $video; ?>#t=0.001" type="video/webm">
              <source src="<?php echo $video; ?>#t=0.001" type="video/ogg">
              <source src="<?php echo $video; ?>#t=0.001" type="video/quicktime">
              <source src="<?php echo $video; ?>#t=0.001" type="video/x-flv">
              <source src="<?php echo $video; ?>#t=0.001" type="video/x-msvideo">
            </video>
            <button class="video__play">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 19" fill="none">
                <path fill="#fff" d="M0 0v19l15-9.5L0 0Z" />
              </svg>
              <?php pll_e('video') ?>
            </button>
          </div>
        <?php endif; ?>

        <?php
        $advantages_list = get_field('advantages_list') ?? '';
        if ($advantages_list) : ?>
          <div class="project__advantages">
            <?php
            $advantages_title = get_field('project_advantages_title') ?? '';
            ?>
            <?php if ($advantages_title) : ?>
              <h3 class="title anim-title _anim-items">
                <?= $advantages_title ?>
              </h3>
            <?php endif; ?>
            <ul>
              <?php
              while (have_rows('advantages_list')) : the_row();
                $advantages_title = get_sub_field('advantages_title') ?? '';
                $advantages_text = get_sub_field('advantages_text') ?? '';
              ?>
                <?php if ($advantages_title) : ?>
                  <li class="anim-title _anim-items">
                    <div class="project__line">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 43" fill="none">
                        <path fill="#F41B1B" d="M16.981 43H0l19.019-21.5L0 0h16.981L36 21.5 16.981 43Z" />
                      </svg>
                      <div></div>
                    </div>

                    <h4><?= $advantages_title ?></h4>
                    <p><?= $advantages_text; ?></p>
                  </li>
                <?php endif; ?>
              <?php endwhile; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php
        $project_others = get_field('project_others') ?? '';
        ?>
        <?php if ($project_others) : ?>
          <h2 class="project__others title anim-title _anim-items"><?= $project_others ?></h3>
          <?php endif; ?>

      </div>
    </div>

    <div class="project__inner">
      <?php get_template_part('template-parts/project-slider'); ?>
    </div>

  </section>

  <?php get_template_part('template-parts/contact-us'); ?>

</main>

<?php
get_footer();
