<?php
function my_custom_scripts_blogs()
{
  wp_enqueue_script('my-custom-scripts-blogs', get_template_directory_uri() . '/src/js/load-more-news.js', array('jquery'), null, true);
  wp_localize_script('my-custom-scripts-blogs', 'MyAjaxBlogs', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'my_custom_scripts_blogs');

function load_more_blogs()
{
  $category = isset($_POST['category']) ? $_POST['category'] : 'all';
  $option = isset($_POST['option']) ? $_POST['option'] : 'all';
  $paged = isset($_POST['page']) ? $_POST['page'] : 1;
  $posts_per_page = 9;

  if ($category === 'all') {
    $tax_query = null;
  } else {
    $tax_query = array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $category,
      ),
    );
  }
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => $tax_query,
  );

  if ($option === 'post_popularity') {
    $args['meta_key'] = 'post_popularity';
    $args['orderby'] = 'meta_value_num';
    $args['order'] = 'DESC';
  } elseif ($option === 'az') {
    $args['orderby'] = 'title';
    $args['order'] = 'ASC';
  } elseif ($option === 'new') {
    $args['orderby'] = 'date';
    $args['order'] = 'DESC';
  }
  $query = new WP_Query($args);
  if ($category !== 'all') {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $category,
      ),
    );
  }

  if ($query->have_posts()) :
    while ($query->have_posts()) :
      $query->the_post();
      get_template_part('template-parts/news-card');
    endwhile;
  else :
    error_log('No posts found');
    echo '<span class="blog__nothing">';
    pll_e('nothing_found');
    echo '</span>';
  endif;

  $paginate_args = array(
    'base' => '%_%',
    'format' => '?page=%#%',
    'current' => $paged,
    'total' => $query->max_num_pages,
    'prev_text' => '&laquo;',
    'next_text' => '&raquo;',
    'type' => 'array',
  );

  $total_posts = $query->found_posts;

  $total_pages = ceil($total_posts / $posts_per_page);

  $pagination_html = '';
  if ($total_pages > 1) {
    $pagination_html .= '<div class="pagination">';
    if ($paged > 1) {
      $pagination_html .= '<span data-page="' . ($paged - 1) . '"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M7.15056 1.86345L3.51401 5.5L7.15056 9.13655" stroke="#181818" stroke-linecap="round" stroke-linejoin="round"/></g></svg></span>';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
      $pagination_html .= '<span  data-page="' . $i . '"' . ($paged == $i ? ' class="pagination_active"' : '') . '>' . $i . '</span>';
    }
    if ($paged < $total_pages) {
      $pagination_html .= '<span href="#" data-page="' . ($paged + 1) . '"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3.84749 9.13655L7.48404 5.5L3.84749 1.86345" stroke="#181818" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        </span>';
    }
    $pagination_html .= '</div>';
  }

  echo $pagination_html;

  wp_reset_postdata();
  die();
}

add_action('wp_ajax_load_more_blogs', 'load_more_blogs');
add_action('wp_ajax_nopriv_load_more_blogs', 'load_more_blogs');
