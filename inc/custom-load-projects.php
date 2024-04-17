
<?php

function my_custom_scripts_projects()
{
  wp_enqueue_script('my-custom-scripts-projects', get_template_directory_uri() . '/src/js/load-more-projects.js', array('jquery'), null, true);
  wp_localize_script('my-custom-scripts-projects', 'MyAjaxProjects', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'my_custom_scripts_projects');

function load_more_projects()
{
  $args = array(
    'post_type' => 'projects',
    'posts_per_page' => 6,
    'paged' => $_POST['page'],
  );
  $projects_query = new WP_Query($args);
  if ($projects_query->have_posts()) :
    while ($projects_query->have_posts()) : $projects_query->the_post();
      get_template_part('template-parts/project-card');
    endwhile;
    wp_reset_postdata();
  endif;
  wp_die();
}

add_action('wp_ajax_load_more_projects', 'load_more_projects');
add_action('wp_ajax_nopriv_load_more_projects', 'load_more_projects');
