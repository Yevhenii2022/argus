<?php 
// Функция для вывода кастомных хлебных крошек
// Функция для вывода кастомных хлебных крошек
// Функция для вывода кастомных хлебных крошек
// Функция для вывода кастомных хлебных крошек
function custom_breadcrumbs() {
    // Получаем информацию о текущей странице
    $current_page_title = get_the_title();
    $current_page_url = get_permalink();
    $breadcrumbs = '<ul class="breadcrumbs">';

    // Получаем перевод строки "Главная"
    $home_text = pll__('Головна');

    // Добавляем ссылку на главную страницу
    $home_url = home_url();
    $separator = '<li class="breadcrumbs__separator"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="2" fill="none" viewBox="0 0 16 2">
    <path stroke="#BDBDBD" d="M.27.83h15"/>
  </svg></li>'; // Сепаратор
    $breadcrumbs .= '<li><a href="' . $home_url . ' " class="breadcrumbs__home">' . $home_text . '</a></li>' . $separator;

    // Получаем информацию о родительских страницах
    $parent_ids = array_reverse(get_post_ancestors(get_the_ID()));
    foreach ($parent_ids as $parent_id) {
        $parent_page_title = get_the_title($parent_id);
        $parent_page_url = get_permalink($parent_id);
        $breadcrumbs .= '<li><a href="' . $parent_page_url . '">' . $parent_page_title . '</a></li>' . $separator;
    }

    // Добавляем ссылку на текущую страницу
    $breadcrumbs .= '<li><span class="breadcrumbs__current">' . $current_page_title . '</span></li>';

    // Завершаем формирование хлебных крошек
    $breadcrumbs .= '</ul>';

    return $breadcrumbs; // Возвращаем HTML код хлебных крошек
}

// Регистрируем шорткод с названием 'pointer_breadcrumbs'
add_shortcode('pointer_breadcrumbs', 'custom_breadcrumbs');
