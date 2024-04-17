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

                <div class="projects-part__list">
                    <?php
                    $args = array(
                        'post_type' => 'projects',
                        'posts_per_page' => 6,
                    );
                    $projects_query = new WP_Query($args);
                    if ($projects_query->have_posts()) :
                        while ($projects_query->have_posts()) : $projects_query->the_post();
                            get_template_part('template-parts/project-card');
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>

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