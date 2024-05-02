<?php
/**
 * Template Name: Privacy Policy
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pointer_theme
 */

get_header();
?>

<main>
	<?php $policyBg = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
	      $mainInfo = get_field('main_info') ?? '' ?>
	<section class="policy" >
		<div class="container">
			<?php if($policyBg) : ?>
			<div class="policy__bg" style="background-image: url('<?php echo esc_url($policyBg); ?>');"></div>
			<?php endif ?>
			
			<div class="policy__wrapper">
				<div class="policy__content">
						<h1 class="policy__title">
							<?php	the_title(); ?>
						</h1>
						<?php if($policyBg) : ?>
							<p class="policy__info">
								<?= $mainInfo ;?>
							</p>
						<?php endif ?>
						<div class="policy__text">
							<?php the_content();	?>
						</div>			
				</div>
			
			</div>
		</div>
	</section>
	<?php get_template_part('template-parts/contact-us'); ?>
</main>

<?php
get_footer();
