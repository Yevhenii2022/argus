<?php


// Добавление метабокса для выбора предка поста для всех типов записей
function custom_post_parent_metabox_for_all()
{
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
function custom_post_parent_metabox_callback($post)
{
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
function custom_save_post_parent($post_id)
{
  if (isset($_POST['parent_id'])) {
    update_post_meta($post_id, '_parent_id', $_POST['parent_id']);
  }
}
add_action('save_post', 'custom_save_post_parent');
