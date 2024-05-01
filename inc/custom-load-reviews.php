<?php
function my_custom_scripts_reviews()
{
  wp_enqueue_script('my-custom-scripts-reviews', get_template_directory_uri() . '/src/js/load-more-reviews.js', array('jquery'), null, true);
  wp_localize_script('my-custom-scripts-reviews', 'MyAjaxReviews', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'my_custom_scripts_reviews');

function load_more_reviews()
{
  $paged = isset($_POST['page']) ? $_POST['page'] : 1;
  $lang = sanitize_text_field($_POST['lang']);
  $posts_per_page = 1;

  $args = array(
    'post_type' => 'reviews',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
  );

  $reviews_query = new WP_Query($args);

  if ($reviews_query->have_posts()) : ?>

    <ul class="reviews__list">
      <?php
      while ($reviews_query->have_posts()) : $reviews_query->the_post();
        $text    = get_field('review_text') ?? '';
        $author  = get_field('review_author') ?? '';
        $position = get_field('review_position') ?? '';
        $image   = get_field('review_img');
      ?>

        <li>
          <div class="reviews__line">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 43" fill="none">
              <path fill="#F41B1B" d="M16.981 43H0l19.019-21.5L0 0h16.981L36 21.5 16.981 43Z" />
            </svg>
            <div></div>
          </div>
          <h4><?php the_title(); ?></h4>
          <p><?php echo $text; ?></p>
          <div class="reviews__flex">
            <?php if ($image) : ?>
              <img src='<?php echo $image['url']; ?>' alt='<?php echo $image['alt']; ?>' />
            <?php endif ?>
            <div>
              <p><?php echo $author; ?></p>
              <p class="reviews__position"><?php echo $position; ?></p>
            </div>
          </div>
        </li>
      <?php endwhile; ?>
    </ul>

  <?php
    wp_reset_postdata();
  else :
  ?>
    <h3 class="reviews__nothing">
      <?php pll_e('reviews_nothing') ?>
    </h3>
<?php endif;

  $total_posts = $reviews_query->found_posts;
  $total_pages = ceil($total_posts / $posts_per_page);

  $pagination_html = '';
  if ($total_pages > 1) {
    $pagination_html .= '<div class="pagination">';

    if ($paged > 1) {
      $pagination_html .= '<span data-page="' . ($paged - 1) . '"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.4"><path d="M7.15056 1.86345L3.51401 5.5L7.15056 9.13655" stroke="#202020" stroke-linecap="round" stroke-linejoin="round"/></g></svg></span>';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
      $pagination_html .= '<span  data-page="' . $i . '"' . ($paged == $i ? ' class="pagination_active"' : '') . '>' . $i . '</span>';
    }
    if ($paged < $total_pages) {
      $pagination_html .= '<span href="#" data-page="' . ($paged + 1) . '"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M3.84749 9.13655L7.48404 5.5L3.84749 1.86345" stroke="#202020" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      </span>';
    }
    $pagination_html .= '</div>';
  }

  echo $pagination_html;

  wp_reset_postdata();
  die();
}

add_action('wp_ajax_load_more_reviews', 'load_more_reviews');
add_action('wp_ajax_nopriv_load_more_reviews', 'load_more_reviews');
