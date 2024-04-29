<?php 

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


// Добавление метабокса для выбора предка поста для всех типов записей
function custom_post_parent_metabox_for_all() {
    $post_types = get_post_types(array('_builtin' => false), 'names');
    $post_types[] = 'post'; // Добавляем обработку постов типа post
    foreach ($post_types as $post_type) {
        add_meta_box(
            'post_parent_metabox', // Идентификатор метабокса
            'Выберите предка для ' . ucfirst($post_type), // Заголовок метабокса с учетом типа записи
            'custom_post_parent_metabox_callback', // Функция отображения содержимого метабокса
            $post_type, // Типы записей, для которых добавляется метабокс
            'side', // Местоположение метабокса на странице (side - сбоку от редактора)
            'default' // Приоритет отображения метабокса
        );
    }
}
add_action('add_meta_boxes', 'custom_post_parent_metabox_for_all');

// Функция отображения содержимого метабокса
function custom_post_parent_metabox_callback($post) {
    // Получаем текущего предка записи (если он уже установлен)
    $post_parent = wp_get_post_parent_id($post->ID);

    // Выводим поле выбора предка
    ?>
    <label for="parent_id">Выберите предка:</label>
    <br />
    <?php
    wp_dropdown_pages(array(
        'post_type' => 'page',
        'selected' => $post_parent,
        'name' => 'parent_id',
        'show_option_none' => 'Без предка'
    ));
    ?>
    <?php
}

// Сохранение значения выбранного предка при сохранении записи
function custom_save_post_parent($post_id) {
    if (isset($_POST['parent_id'])) {
        update_post_meta($post_id, '_parent_id', $_POST['parent_id']);
    }
}
add_action('save_post', 'custom_save_post_parent');

