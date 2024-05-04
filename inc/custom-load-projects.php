
<?php

function my_custom_scripts_projects()
{
  wp_enqueue_script('my-custom-scripts-projects', get_template_directory_uri() . '/src/js/load-more-projects.js', array('jquery'), null, true);
  wp_localize_script('my-custom-scripts-projects', 'MyAjaxProjects', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'my_custom_scripts_projects');

function load_more_projects()
{
  $category = isset($_POST['category']) ? $_POST['category'] : 'all';
  $option = isset($_POST['option']) ? $_POST['option'] : 'all';
  $paged = isset($_POST['page']) ? $_POST['page'] : 1;
  $posts_per_page = 6;

  $args = array(
    'post_type' => 'projects',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
  );

  if ($category !== 'all') {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'project-type',
        'field' => 'slug',
        'terms' => $category,
      ),
    );
  }

  if ($option !== 'all') {
    $args['tax_query'][] = array(
      'taxonomy' => 'project-type',
      'field' => 'slug',
      'terms' => $option,
    );
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) :
    while ($query->have_posts()) :
      $query->the_post();
      get_template_part('template-parts/project-card');
    endwhile;
  else :
    error_log('No posts found');
    echo '<span class="projects__nothing">';
    pll_e('nothing_found');
    echo '</span>';
  endif;

  wp_reset_postdata();
  die();
}

add_action('wp_ajax_load_more_projects', 'load_more_projects');
add_action('wp_ajax_nopriv_load_more_projects', 'load_more_projects');
