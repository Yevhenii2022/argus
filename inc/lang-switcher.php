<?php
function custom_polylang_language_switcher()
{
    $languages = pll_the_languages(array('raw' => 1));
    $current_language = pll_current_language('slug');

    echo '<div class="lang-switcher">';
    echo '<div class="lang-switcher__current">';
    echo esc_html($languages[$current_language]['name']);
    echo '</div>';

    echo '<ul class="lang-switcher__list">';
    foreach ($languages as $language) {
        $slug = esc_attr($language['slug']);
        if ($slug !== $current_language) {
            echo '<li class="lang-switcher__item">';
            echo '<a href="' . esc_url($language['url']) . '">';
            echo esc_html($language['name']);
            echo '</a>';
            echo '</li>';
        }
    }
    echo '</ul>';
    echo '</div>';
}
?>