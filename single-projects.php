<?php
get_header();

$project_subtitle = get_field('project_subtitle') ?? '';
$location = get_field('project_location') ?? '';
$default_picture = get_field('default_picture', 'options');
?>

<main id="primary">
  <section class="project">
    <div class="container">
      <div class="project__wrapper">

        <div class="project__breadcrumps">
          <?php if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<nav class="yoast-breadcrumbs">', '</nav>');
          } ?>
        </div>

        <div class="project__top">
          <div class="project__title">
            <h1 class="main__title main__title--italic"><?php echo $project_subtitle ?></h1>
            <h1 class="main__title"><?php echo the_title() ?></h1>
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
            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
          <?php else : ?>
            <img src="<?php echo esc_url($default_picture); ?>" alt="<?php the_title(); ?>" class="project__img--error">
          <?php endif; ?>
        </div>

        <?php
        $info = get_field('info') ?? '';
        ?>
        <?php if ($info) : ?>
          <h2 class="project__info title"><?= $info; ?></h2>
        <?php endif; ?>



      </div>
    </div>
  </section>
</main>

<?php
get_footer();
