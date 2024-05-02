<?php
/**
 * The template for displaying 404 pages (not found)
 * Template Name: 404
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pointer_theme
 */

get_header();
?>

<main>
	<section class="not-found">
		<div class="container">
			<div class="not-found__wrapper">
				<div class="not-found__title">
						<?php pll_e('сторінку не знайдено'); ?>
				</div>
				<a href="<?php echo esc_url(get_home_url()); ?>" class="not-found__button button">
        <div class="button__wrapper">
          <p> <?php pll_e('на головну сторінку'); ?></p>
        </div>
      </a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
