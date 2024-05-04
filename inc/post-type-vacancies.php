<?php

function vacancies_custom_post()
{
  $labels = array(
    'name' => esc_html__('Вакансії', 'pointer_theme'),
    'singular_name' => esc_html__('Вакансія', 'pointer_theme'),
    'add_new' => esc_html__('Додати нову вакансію', 'pointer_theme'),
    'add_new_item' => esc_html__('Додати нову вакансію', 'pointer_theme'),
    'edit_item' => esc_html__('Редагувати вакансію', 'pointer_theme'),
    'new_item' => esc_html__('Нова вакансія', 'pointer_theme'),
    'all_items' => esc_html__('Всі вакансії', 'pointer_theme'),
    'view_item' => esc_html__('Переглянути вакансію', 'pointer_theme'),
    'search_items' => esc_html__('Знайти вакансію', 'pointer_theme'),
    'not_found' => esc_html__('Вакансій не знайдено', 'pointer_theme'),
    'featured_image' => esc_html__('Зображення', 'pointer_theme'),
    'set_featured_image' => esc_html__('Додати зображення', 'pointer_theme')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'Вакансії',
    'public' => true,
    'menu_position' => 16,
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'has_archive' => false,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'rewrite' => array('slug' => 'vacancies'),
    'menu_icon' => 'dashicons-portfolio',
    'query_var' => true,
  );

  register_post_type('vacancies', $args);
}

add_action('init', 'vacancies_custom_post');
