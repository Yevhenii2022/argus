<?php

function projects_custom_post()
{
  $labels = array(
    'name' => esc_html__('Проєкти', 'pointer_theme'),
    'singular_name' => esc_html__('Проєкт', 'pointer_theme'),
    'add_new' => esc_html__('Додати новий проєкт', 'pointer_theme'),
    'add_new_item' => esc_html__('Додати новий проєкт', 'pointer_theme'),
    'edit_item' => esc_html__('Редагувати проєкт', 'pointer_theme'),
    'new_item' => esc_html__('Новий проєкт', 'pointer_theme'),
    'all_items' => esc_html__('Всі проєкти', 'pointer_theme'),
    'view_item' => esc_html__('Переглянути проєкт', 'pointer_theme'),
    'search_items' => esc_html__('Знайти проєкт', 'pointer_theme'),
    'not_found' => esc_html__('Проєктів не знайдено', 'pointer_theme'),
    'featured_image' => esc_html__('Зображення', 'pointer_theme'),
    'set_featured_image' => esc_html__('Додати зображення', 'pointer_theme')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'Проєкти',
    'public' => true,
    'menu_position' => 19,
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'has_archive' => false,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'rewrite' => array('slug' => 'projects'),
    'menu_icon' => 'dashicons-admin-multisite',
    // 'publicly_queryable' => false,
    'query_var' => true,
    'taxonomies' => array('category')
  );

  register_post_type('projects', $args);
}

add_action('init', 'projects_custom_post');
