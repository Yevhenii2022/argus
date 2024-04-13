<?php
// SERVICES POST TYPE
function create_services_posttype()
{

    register_post_type(
        'services',
        array(
            'labels' => array(
                'name' => ('Послуги'),
                'singular_name' => ('Послуга')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'services'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-info',
            'supports' => array('title', 'except', 'thumbnail', 'editor', 'custom-fields')
        )
    );
}
add_action('init', 'create_services_posttype');


// PROJECTS POST TYPE

function create_projects_posttype()
{

    register_post_type(
        'projects',
        array(
            'labels' => array(
                'name' => ('Проєкти'),
                'singular_name' => ('Проєкт')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'projects'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array('title', 'except', 'thumbnail', 'editor', 'custom-fields')
        )
    );
}
add_action('init', 'create_projects_posttype');

// PROJECTS POST TYPE

function create_news_posttype()
{

    register_post_type(
        'news',
        array(
            'labels' => array(
                'name' => ('Новини'),
                'singular_name' => ('Новина')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'news'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-testimonial',
            'supports' => array('title', 'except', 'thumbnail', 'editor', 'custom-fields')
        )
    );
}
add_action('init', 'create_news_posttype');