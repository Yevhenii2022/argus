<?php

function services_custom_post()
{
  $labels = array(
    'name' => esc_html__('Послуги', 'pointer_theme'),
    'singular_name' => esc_html__('Послуга', 'pointer_theme'),
    'add_new' => esc_html__('Додати нову послугу', 'pointer_theme'),
    'add_new_item' => esc_html__('Додати нову послугу', 'pointer_theme'),
    'edit_item' => esc_html__('Редагувати послугу', 'pointer_theme'),
    'new_item' => esc_html__('Нова послуга', 'pointer_theme'),
    'all_items' => esc_html__('Всі послуги', 'pointer_theme'),
    'view_item' => esc_html__('Переглянути послугу', 'pointer_theme'),
    'search_items' => esc_html__('Знайти послугу', 'pointer_theme'),
    'not_found' => esc_html__('Послуг не знайдено', 'pointer_theme'),
    'featured_image' => esc_html__('Зображення', 'pointer_theme'),
    'set_featured_image' => esc_html__('Додати зображення', 'pointer_theme')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'Послуги',
    'public' => true,
    'menu_position' => 15,
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'has_archive' => false,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'rewrite' => array('slug' => 'services'),
    'menu_icon' => 'dashicons-info',
    'query_var' => true,
  );

  register_post_type('services', $args);
}

add_action('init', 'services_custom_post');
