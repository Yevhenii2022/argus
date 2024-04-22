<?php
/* Add nav locations */
register_nav_menus([
    'header-menu' => esc_html__('Header', 'pointer_theme'),
    'footer-services' => esc_html__('Footer Services', 'pointer_theme'),
    'footer-about' => esc_html__('Footer About', 'pointer_theme'),
    'footer-menu' => esc_html__('Footer Menu', 'pointer_theme'),
    'footer-privacy-policy' => esc_html__('Privacy Policy', 'pointer_theme'),
]);