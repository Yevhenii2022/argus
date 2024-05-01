<?php

/*
 * Template Name: Наші проєкти
 */

get_header();
?>

<main>
    <section class="projects">
        <div class="container">
            <div class="projects__wrapper">

                <div class="projects__top">
                    <?php if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<nav class="yoast-breadcrumbs">', '</nav>');
                    } ?>
                    <h1 class="projects__title title"><?php the_content(); ?></h1>
                </div>

                <div class="projects__category">
                    <ul id="category-filter">
                        <li data-category="all" class="active">
                            <?php pll_e('all_projects'); ?>
                        </li>

                        <?php
                        $real_estate_category = get_term_by('slug', 'real-estate', 'project-type');
                        if ($real_estate_category) {
                            $parent_category_id = $real_estate_category->term_id;

                            $subcategories = get_terms(
                                array(
                                    'taxonomy' => 'project-type',
                                    'hide_empty' => false,
                                    'parent' => $parent_category_id,
                                )
                            );

                            foreach ($subcategories as $subcategory) {
                                $subcategory_slug = rawurlencode($subcategory->slug);
                                echo '<li data-category="' . $subcategory_slug . '">' . esc_html($subcategory->name) . '</li>';
                            }
                        }
                        ?>
                    </ul>

                    <ul id="category-filter-right">
                        <li data-category="all" class="active2">
                            <?php pll_e('all_projects'); ?>
                        </li>

                        <?php
                        $real_estate_category = get_term_by('slug', 'operations', 'project-type');
                        if ($real_estate_category) {
                            $parent_category_id = $real_estate_category->term_id;

                            $subcategories = get_terms(
                                array(
                                    'taxonomy' => 'project-type',
                                    'hide_empty' => false,
                                    'parent' => $parent_category_id,
                                )
                            );

                            foreach ($subcategories as $subcategory) {
                                $subcategory_slug = rawurlencode($subcategory->slug);
                                echo '<li data-category="' . $subcategory_slug . '">' . esc_html($subcategory->name) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>

                <div class="projects__selects">
                    <div class="projects__select blog-select">
                        <select id="projects-select" class="tabs-select">
                            <option value="">Placeholder</option>
                            <option value="all"><?php pll_e('all_projects'); ?></option>
                            <?php
                            $real_estate_category = get_term_by('slug', 'real-estate', 'project-type');

                            if ($real_estate_category) {
                                $parent_category_id = $real_estate_category->term_id;

                                $subcategories = get_terms(
                                    array(
                                        'taxonomy' => 'project-type',
                                        'hide_empty' => false,
                                        'parent' => $parent_category_id,
                                    )
                                );

                                foreach ($subcategories as $subcategory) {
                                    echo '<option value="' . esc_attr($subcategory->slug) . '">' . esc_html($subcategory->name) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="projects__select blog-select">
                        <select id="projects-select2" class="tabs-select">
                            <option value="">Placeholder</option>
                            <option value="all"><?php pll_e('all_projects'); ?></option>
                            <?php
                            $real_estate_category = get_term_by('slug', 'operations', 'project-type');

                            if ($real_estate_category) {
                                $parent_category_id = $real_estate_category->term_id;

                                $subcategories = get_terms(
                                    array(
                                        'taxonomy' => 'project-type',
                                        'hide_empty' => false,
                                        'parent' => $parent_category_id,
                                    )
                                );

                                foreach ($subcategories as $subcategory) {
                                    echo '<option value="' . esc_attr($subcategory->slug) . '">' . esc_html($subcategory->name) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="projects-part__list" id="projects-list"></div>

                <button type='button' class="projects__button button" id="load-more-button">
                    <div class="button__wrapper">
                        <p><?php pll_e('download_more'); ?></p>
                    </div>
                </button>

                <div class="ajax-preloader">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" width="200" height="200" style="shape-rendering: auto; display: block; background: rgba(255, 255, 255, 0);" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g>
                            <circle cx="50" cy="50" fill="none" stroke="#f41b1b" stroke-width="3" r="18" stroke-dasharray="84.82300164692441 30.274333882308138">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.1764705882352942s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                            </circle>
                            <g></g>
                        </g>
                    </svg>
                </div>

            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/contact-us'); ?>

</main>

<?php get_footer(); ?>