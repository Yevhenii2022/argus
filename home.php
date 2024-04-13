<?php
/*
Template Name: Головна сторінка
*/

get_header();
?>

<main>
  <?php get_template_part('template-parts/hero'); ?>

  <?php get_template_part('template-parts/about'); ?>

  <?php get_template_part('template-parts/services-part'); ?>

  <?php get_template_part('template-parts/projects-part'); ?>

  <?php get_template_part('template-parts/contact'); ?>
</main>

<?php get_footer(); ?>