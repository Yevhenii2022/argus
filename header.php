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

$phone = get_field('phone', 'option');
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://unpkg.com/imask"></script>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page">
		<header class="header">
			<div class="container">
				<div class="header__wrapper">
					<div class="header__left">
						<div class="header__logo">
							<?= get_custom_logo(); ?>
						</div>

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
						<?php if ($phone): ?>
							<a href="tel:<?= $phone ?>" class="header__phone">
								<div class="header__phone-img">
									<img src="<?= get_template_directory_uri() . '/src/img/call.svg' ?>" alt="Phone">
								</div>

								<span>
									<?= $phone ?>
								</span>
							</a>
						<?php endif; ?>

						<?php if (function_exists('custom_polylang_language_switcher')) {
							custom_polylang_language_switcher();
						} ?>
					</div>
				</div>
			</div>
		</header>