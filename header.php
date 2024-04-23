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
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
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
							<div class="header__contacts">
								<?php $whatsapp = get_field('whatsapp', 'options') ;?>

								<?php
								$numberWhatsapp = $whatsapp['whatsapp_number'] ?? '';
															$whatsappIcon  = $whatsapp['whatsapp_icon'] ?? '';
								$cleanedNumberWhatsapp = preg_replace('/\s+/', '', $numberWhatsapp);
								$cleanedNumberWhatsapp = preg_replace('/\D/', '', $cleanedNumberWhatsapp);
								?>
								<?php if ($numberWhatsapp) : ?>
								<a href="https://wa.me/+<?= $cleanedNumberWhatsapp ?>" class="header__whatsapp" target="_blank">
									<div class="header__whatsapp-img">
										<img src='<?php echo $whatsappIcon['url']; ?>' alt='<?php echo $whatsappIcon['alt']; ?>' />
									</div>
								</a>
								<?php endif ?>

								<?php
								$phone = get_field('phone', 'options');
								$number = $phone['phone_number'] ?? '';
								$cleanedNumber = preg_replace('/\s+/', '', $number);
								$cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
								?>
								<?php if ($number) : ?>
									<a href="tel:+<?= $cleanedNumber ?>" class="header__phone">
										<!-- <div class="header__phone-img">
											<img src="<?= get_template_directory_uri() . '/src/img/call.svg' ?>" alt="Phone">
										</div> -->

										<span>
											<?= $number ?>
										</span>
									</a>
								<?php endif; ?>
								</div>
							

							


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
							<span></span>
						</div>
					</div>

				</div>
			</div>
		</header>