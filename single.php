<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pointer_theme
 */

get_header();
?>

<main id="primary">
	<section class="single-news">
		<div class="single-news__wrapper">
			<div class="container">

				<?php if (function_exists('yoast_breadcrumb')) {
					yoast_breadcrumb('<nav class="yoast-breadcrumbs">', '</nav>');
				} ?>

				<div class="single-news__top">
					<?php
					$title = get_field('single_news_title');
					?>
					<?php if ($title) : ?>
						<h1 class="single-news__title title">
							<?= $title; ?>
						</h1>
					<?php endif; ?>

					<span class="single-news__time"><?php the_time('d.m.Y'); ?></span>
				</div>

				<div class="single-news__image">
					<?php
					$default_picture = get_field('default_picture', 'options');

					if (has_post_thumbnail()) : ?>
						<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
					<?php else : ?>
						<img src="<?php echo esc_url($default_picture); ?>" alt="<?php the_title(); ?>" class="single-news__img--error">
					<?php endif; ?>
				</div>

				<div class="single-news__content">
					<?php the_content(); ?>
				</div>

				<div class="single-news__box">
					<?php
					$slider_title = get_field('single_news_slider_title');
					?>
					<?php if ($title) : ?>
						<h2 class="single-news__title title">
							<?= $slider_title; ?>
						</h2>
					<?php endif; ?>

					<a href="<?php echo esc_url(get_home_url() . '/news/'); ?>" class="single-news__button button">
						<div class="button__wrapper">
							<p> <?php pll_e('all_news'); ?></p>
						</div>
					</a>
				</div>




				<?php get_template_part('template-parts/news-slider'); ?>



				<?php get_template_part('template-parts/form'); ?>


				<!-- <ul class="post__inner">
					<?php
					$current_post_id = get_the_ID();
					$popular_posts_query = new WP_Query(array(
						'posts_per_page' => 3,
						'post__not_in' => array($current_post_id),
						'orderby' => 'comment_count',
						'order' => 'DESC'
					));

					if ($popular_posts_query->have_posts()) {
						while ($popular_posts_query->have_posts()) {
							$popular_posts_query->the_post();
							get_template_part('template-parts/blog-card');
						}
						wp_reset_postdata();
					}
					?>
				</ul> -->


			</div>
		</div>
	</section>
</main>

<?php
get_footer();
