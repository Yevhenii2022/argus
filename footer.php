<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pointer_theme
 */

?>

<?php $facebook = get_field('facebook', 'options');
$whatsapp = get_field('whatsapp', 'options');
$telegram = get_field('telegram', 'options');
$email = get_field('email', 'options');
$emailItem = $email['email'] ?? '';
$phone = get_field('phone', 'options');

?>
<div class="footer--additional"></div>

<div id="cursor">
    <div class="cursor__circle"></div>
</div>

<?php
$phone = get_field('phone', 'options');
$number = $phone['phone_number'] ?? '';
$icon = $phone['phone_icon'];
$cleanedNumber = preg_replace('/\s+/', '', $number);
$cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
$file_path = get_attached_file($icon);

if ($file_path && file_exists($file_path)) {
    $svg_content = file_get_contents($file_path);
} else {
    $svg_content = false;
}
?>
<?php if ($number && $svg_content !== false) : ?>
    <a class="hero__phone" href="tel:+<?php echo $cleanedNumber ?>">
        <?php echo $svg_content; ?>
    </a>
<?php endif; ?>




<footer class="footer">
    <div></div>
    <div class="footer__block">
         <div class="container">
            <div class="footer__wrapper">
                <div class="footer__top">
                    <div class="footer__items">
                        <div class="footer__logo">
                            <?= get_custom_logo(); ?>
                        </div>
                        <div class="footer__socials">
                            <?php
                            $facebookIcon = $facebook['facebook_icon'] ?? '';
                            $facebookLink = $facebook['facebook_link'] ?? '';
                            if ($facebookLink && $facebookIcon) : ?>
                                <a href="<?= $facebookLink ?>" class="footer__icon" target="_blank">
                                    <img src='<?php echo $facebookIcon['url']; ?>' alt='<?php echo $facebookIcon['alt']; ?>' />
                                </a>
                            <?php endif ?>
                            <?php
                            $numberWhatsapp = $whatsapp['whatsapp_number'] ?? '';
                            $whatsappIcon  = $whatsapp['whatsapp_icon'] ?? '';
                            $cleanedNumberWhatsapp = preg_replace('/\s+/', '', $numberWhatsapp);
                            $cleanedNumberWhatsapp = preg_replace('/\D/', '', $cleanedNumberWhatsapp);
                            ?>
                            <?php if ($numberWhatsapp) : ?>
                                <a href="https://wa.me/+<?= $cleanedNumberWhatsapp ?>" class="footer__icon" target="_blank">
                                    <img src='<?php echo $whatsappIcon['url']; ?>' alt='<?php echo $whatsappIcon['alt']; ?>' />
                                </a>
                            <?php endif ?>
                            <?php
                            $numberTelegram = $telegram['telegram_number'] ?? '';
                            $telegramIcon  = $telegram['telegram_icon'] ?? '';
                            $cleanedNumberTelegram = preg_replace('/\s+/', '', $numberTelegram);
                            $cleanedNumberTelegram = preg_replace('/\D/', '', $cleanedNumberTelegram);
                            ?>
                            <?php if ($numberTelegram) : ?>
                                <a href="https://t.me/+<?= $cleanedNumberTelegram ?>" class="footer__icon" target="_blank">
                                    <img src='<?php echo $telegramIcon['url']; ?>' alt='<?php echo $telegramIcon['alt']; ?>' />
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="footer__menu">
                        <nav class="footer__menu-services">
                            <?php
                            wp_nav_menu(
                                array(
                                    'container' => 'ul',
                                    'theme_location' => 'footer-services',
                                    'menu_class' => 'footer__nav-list',
                                )
                            );
                            ?>
                        </nav>
                        <nav class="footer__menu-about">
                            <?php
                            wp_nav_menu(
                                array(
                                    'container' => 'ul',
                                    'theme_location' => 'footer-about',
                                    'menu_class' => 'footer__nav-list',
                                )
                            );
                            ?>
                        </nav>
                        </nav>
                        <nav class="footer__menu-menu">
                            <span class="footer__menu-name">
                                <?php pll_e('menu') ?>
                            </span>
                            <?php
                            wp_nav_menu(
                                array(
                                    'container' => 'ul',
                                    'theme_location' => 'footer-menu',
                                    'menu_class' => 'footer__nav-list',
                                )
                            );
                            ?>
                        </nav>
                        </nav>
                    </div>
                </div>
                <div class="footer__bottom">
                    <div class="footer__left">
                        <p class="footer__date">©<?php echo date('Y'); ?></p>
                        <p class="footer__rights">All Rights Reserved</p>
                    </div>
                    <div class="footer__right">
                        <nav class="footer__menu-privacy-policy">
                            <?php
                            wp_nav_menu(
                                array(
                                    'container' => 'ul',
                                    'theme_location' => 'footer-privacy-policy',
                                    'menu_class' => 'footer__nav-list',
                                )
                            );
                            ?>
                        </nav>
                        <div class="footer__contacts">
                            <?php
                            $number = $phone['phone_number'] ?? '';
                            $cleanedNumber = preg_replace('/\s+/', '', $number);
                            $cleanedNumber = preg_replace('/\D/', '', $cleanedNumber);
                            ?>
                            <?php if ($number) : ?>
                                <a href="tel:+<?= $cleanedNumber ?>" class="footer__phone">
                                    <span>
                                        <?= $number; ?>
                                    </span>
                                </a>
                            <?php endif; ?>
                            <?php if ($email) : ?>
                                <a href="mailto:<?= $emailItem ?>" class="footer__email">
                                    <span>
                                        <?= $emailItem; ?>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php get_template_part('template-parts/move-line'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js" integrity="sha512-EZI2cBcGPnmR89wTgVnN3602Yyi7muWo8y1B3a8WmIv1J9tYG+udH4LvmYjLiGp37yHB7FfaPBo8ly178m9g4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/ScrollTrigger.min.js" integrity="sha512-OzC82YiH3UmMMs6Ydd9f2i7mS+UFL5f977iIoJ6oy07AJT+ePds9QOEtqXztSH29Nzua59fYS36knmMcv79GOg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</footer>

</div>
<?php wp_footer(); ?>
</body>

</html>