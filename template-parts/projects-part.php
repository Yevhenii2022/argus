<?php
$title = get_field('projects-part_title');
?>

<section class="projects-part">
    <div class="container">
        <div class="projects-part__wrapper">
            <?php if ($title): ?>
                <div class="projects-part__title title">
                    <?= $title ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('projects-part_list')): ?>
                <div class="projects-part__list">
                    <?php while (have_rows('projects-part_list')):
                        the_row();
                        $post_object = get_sub_field('item');
                        $post = $post_object;
                        setup_postdata($post);
                        ?>

                        <?php get_template_part('template-parts/project-card'); ?>

                        <?php wp_reset_postdata(); ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div class="projects-part__button button">
                <?php pll_e('more_projects-part'); ?>
            </div>
        </div>
    </div>
</section>