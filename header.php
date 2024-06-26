<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pointer_theme
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://unpkg.com/imask"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
	<script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page">
		<header class="header">
			<div class="container">
				<div class="header__wrapper">

					<div class="header__logo">
						<?= get_custom_logo(); ?>
					</div>
					<div class="header__content">
						<div class="header__left">
							<nav class="header__nav nav">
								<?php
								wp_nav_menu(
									array(
										'container' => 'ul',
										'theme_location' => 'header-menu',
										'menu_class' => 'nav__list',
									)
								);
								?>
							</nav>
						</div>

						<div class="header__right">

							<?php

							$phone = get_field('phone', 'options');
							$number = $phone['phone_number'] ?? '';
							$phoneIcon = $phone['phone_icon_header'] ?? '';
							$file_path = get_attached_file($phoneIcon);
							$cleanedNumber = preg_replace('/\s+/', '', $number);
							$cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);

							?>
							<?php if ($number) : ?>
								<a href="tel:+<?= $cleanedNumber ?>" class="header__phone">

									<?php if ($file_path && file_exists($file_path)) {
										$svg_content = file_get_contents($file_path);
									} else {
										$svg_content = false;
									}
									?>
									<div class="header__phone-img">
										<?php echo $svg_content; ?>
									</div>

									<span>
										<?= $number ?>
									</span>
								</a>
							<?php endif; ?>


							<?php if (function_exists('custom_polylang_language_switcher')) {
								custom_polylang_language_switcher();
							} ?>
						</div>
					</div>

					<div class="header__mobile-menu">
						<span>
							<?php pll_e('menu') ?>
						</span>
						<div class="header__burger">
							<span class="header__burger-top"></span>
							<span class="header__burger-middle"></span>
							<span class="header__burger-bottom"></span>
						</div>
					</div>

				</div>
			</div>
		</header>