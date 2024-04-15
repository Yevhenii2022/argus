<?php get_template_part('inc/post-type-projects'); ?>

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
