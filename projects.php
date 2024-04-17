<?php
/*
Template Name: Наші проєкти
*/

get_header(); ?>

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
                        $categories = get_terms(
                            array(
                                'taxonomy' => 'category',
                                'hide_empty' => false,
                            )
                        );

                        foreach ($categories as $category) {
                            if ($category->count > 0 && $category->slug !== 'other') {
                                $category_slug = rawurlencode($category->slug);
                                echo '<li data-category="' . $category_slug . '">' . esc_html($category->name) . '</li>';
                            }
                        }
                        ?>

                    </ul>




                    <ul id="category-filter-right">
                        <li data-category="all" class="active2">
                            <?php pll_e('all_projects'); ?>
                        </li>

                        <?php
                        $categories = get_terms(
                            array(
                                'taxonomy' => 'category',
                                'hide_empty' => false,
                            )
                        );

                        foreach ($categories as $category) {
                            if (in_array($category->slug, array('rent', 'selling'))) {
                                $category_slug = rawurlencode($category->slug);
                                echo '<li data-category="' . $category_slug . '">' . esc_html($category->name) . '</li>';
                            }
                        }
                        ?>

                    </ul>
                </div>

                <!-- dfdf -->
                <div class="projects__selects">

                    <div class="archive-blogs__select custom-select">
                        <select id="archive-blogs__select-category" class="tabs-select">
                            <option value="" disabled selected class="placeholder">
                                <?php pll_e('filters'); ?>
                            </option>
                            <option value="all">
                                <?php pll_e('all_projects'); ?>
                            </option>
                            <?php
                            $categories = get_terms(
                                array(
                                    'taxonomy' => 'category',
                                    'hide_empty' => false,
                                    'count' => true,
                                )
                            );
                            foreach ($categories as $category) {
                                if ($category->count > 0 && $category->slug !== 'other') {
                                    echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>





                    <div class="archive-blogs__select custom-select">
                        <select id="archive-blogs__select-category2" class="tabs-select">
                            <option value="all">
                                <?php pll_e('all_projects'); ?>
                            </option>
                            <?php

                            $categories = get_terms(
                                array(
                                    'taxonomy' => 'category',
                                    'hide_empty' => false,
                                    // 'count' => true,
                                )
                            );
                            foreach ($categories as $category) {
                                if (in_array($category->slug, array('rent', 'selling'))) {
                                    echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <!-- fggfg -->







                <div class="projects-part__list" id="projects-list"></div>



                <button type='button' class="projects__button button" id="load-more-button">
                    <div class="button__wrapper">
                        <p><?php pll_e('download_more'); ?></p>
                    </div>
                </button>




            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>